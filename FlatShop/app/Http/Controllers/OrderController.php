<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Carbon\Carbon;
use App\User;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Product;
use Cookie;
use App\Bill;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function order_user(){
        $bill = new Bill;    
        $bill->userID = Cookie::get('user_ip');
        $bill->name = $_POST['nameOrder'];
        $bill->adress = $_POST['address'];
        $bill->telephone = $_POST['telephone'];
        $bill->email = $_POST['email'];
        $bill->price = $_POST['total'];
        $bill->dateofbirth = Carbon::now()->toDateTimeString();
        $bill->save();

        $id_order = $_GET['id'];
        $ls_order = Order::orderBy('orderID','desc')->where('userID',$id_order)->limit(Cookie::get('amount'))->where('isActive',1)->get();
        foreach ($ls_order as $order) {
            $order->bill_ID = $bill->bill_ID;
            $order->save();
        }
        $staffs = User::where('typeofuser',2)->get();
        foreach ($staffs as $staff) {
            Mail::to($staff->email)->send(new NotificationMail($bill->bill_ID));      
        }
        return $bill->bill_ID;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        Cookie::queue('user_ip', $request->user_ip, 180);        
        if($request->am_after < 10)
            $amount = '0'.$request->am_after;
        else
            $amount = $request->am_after;

        if(Auth::check())
            $id = (string)Auth::id();
        else
            $id = (string)$request->user_ip;

        $check = false;
        $ls_order = Order::orderBy('orderID','desc')->where('userID',$id)->limit(Cookie::get('amount'))->get();    
        foreach ($ls_order as $order) {
            if($order->productID == $request->id_prd)        
                $check = true;
        }    
        if($check == false){                   
            Cookie::queue('amount', $request->am_after, 180);
            $order = new Order;    
            if(Auth::check()){           
                $order->userID= $id;                
            }
            $order->userID= $id;
            $order->productID = $request->id_prd;
            $order->amount = 1;
            $order->dateofbirth = Carbon::now()->toDateTimeString();
            $order->dateofend = Carbon::now()->toDateTimeString();        
            if($order->save()){
                $prd = Product::find($order->productID);                                
                return json_encode(array('status'=>"OK",'orderID'=>$order->orderID,'prd'=>$prd,'amount'=>$amount));            
            }            
        }else{
            return json_encode(array('status'=>"NC",'amount'=>$request->am_before)); 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $amount = Cookie::get('amount') -1;
        Cookie::queue('amount', $amount, 180);    
        $id = $_GET['id'];
        $order = Order::find($id);        
        $order->isActive = 0;
        if($order->save())
            return back()->withInput();    
    }
}
