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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cookie::queue('amount', $request->amount, 180);        
        Cookie::queue('user_ip', $request->user_ip, 180);

        $order = new Order;
        $order->userID= (string)$request->user_ip;
        if(Auth::check()){           
            $order->userID= (string)Auth::id();        
        }
        
        $order->productID = $request->id_prd;
        $order->amount = 1;
        $order->dateofbirth = Carbon::now()->toDateTimeString();
        $order->dateofend = Carbon::now()->toDateTimeString();        
        if($order->save()){
            $prd = Product::find($order->productID);                                
            return json_encode(array('orderID'=>$order->orderID,'prd'=>$prd));            
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
        //
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
