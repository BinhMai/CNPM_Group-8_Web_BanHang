<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Carbon\Carbon;
use Auth;
use App\Product;
use Cookie;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $string =  $_GET['val'];
        $val = substr($string, 0,1);
        $id = substr($string, 1,strlen($string)-1);  
        
        $order = Order::find($id);
        $order->status = $val;
        if($order->save())
            return back()->withInput();   
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
        $id_order = $_GET['id'];
        $ls_order = Order::orderBy('orderID','desc')->where('userID',$id_order)->limit(Cookie::get('amount'))->where('status',0)->where('isActive',1)->get();
        foreach ($ls_order as $order) {
            $order->name = $_POST['nameOrder'];
            $order->adress = $_POST['address'];
            $order->telephone = $_POST['telephone'];
            $order->email = $_POST['email'];
            $order->save();
        }
        return "true";
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
                $order->name = Auth::user()->lastname;  
                $order->adress = Auth::user()->address;   
                $order->telephone = Auth::user()->telephone;    
                $order->email = Auth::user()->email;                                          
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
