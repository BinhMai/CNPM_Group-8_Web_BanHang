<?php

use Illuminate\Http\RedirectResponse;
use App\User;
use App\Order;
use App\Product;
use App\Category;
use App\Bill;
use Carbon\Carbon;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;

Route::get('/bill={id}',function($id){
    if(Bill::find($id) != null)
        return view('Mail.mail-form',['id'=>$id]);
    else
        return redirect('/');
});

Route::get('/mail={id}',function($id){    
    if(Auth::check())
        Mail::to(Auth::user()->email)->send(new NotificationMail($id));
    else{
        $bill = Bill::find($id); 
        if($bill->email != "")              
            Mail::to($bill->email)->send(new NotificationMail($id));
    }
    return redirect('/');
});

Route::get('/', function () {
    Cookie::queue('amount', '0', 180);    
    if(Auth::check())
        Cookie::queue('login', '1', 180);
    else
        Cookie::queue('login', '0', 180);  
	return redirect('/Trang-Chu');
});

Route::get('/Trang-Chu',function(){            
    if(isset($_GET['search']))
        return view('welcome',['name'=>$_GET['search']]);
    else
        return view('welcome');
});

Route::get('/remove-bill={id}',function($id){    
    $bill = Bill::find($id);
    $bill->isActive = 0;
    $bill->save();    
});

Route::get('/confirm-bill={id}',function($id){            
    $bill = Bill::find($id);
    $bill->status = 1;
    $bill->save();    
});

Route::post('/update-order',function(){
    $order = Order::find($_POST['id_order']);
    $order->amount = $_POST['quanty'];
    $order->save();
});

Route::get('/update-bill={id}',function($id){    
    $bill = Bill::find($id);
    $bill->shipper = $_GET['shipper'];    
    $bill->save();  
    $shipper = User::where('lastname',$_GET['shipper'])->first();
    Mail::to($shipper->email)->send(new NotificationMail($bill->bill_ID)); 
});

Route::get('/details={id}', 'ProductController@detail');

Route::post('/nam',function(){
    $from = (int)$_POST['from'];
    $to = (int)$_POST['to'];       
    $product = Product::where('categoryID',1)->where('isActive',1)->where('price','>=',$from)->where('price','<=',$to)->paginate(9);
    return view('product',['product'=>$product]);
});

Route::post('/nu',function(){
    $from = (int)$_POST['from'];
    $to = (int)$_POST['to'];       
    $product = Product::where('categoryID',2)->where('isActive',1)->where('price','>=',$from)->where('price','<=',$to)->paginate(9);
    return view('product',['product'=>$product]);
});
Route::post('/tre-em',function(){
    $from = (int)$_POST['from'];
    $to = (int)$_POST['to'];       
    $product = Product::where('categoryID',3)->where('isActive',1)->where('price','>=',$from)->where('price','<=',$to)->paginate(9);
    return view('product',['product'=>$product]);
});
Route::post('/dong-ho',function(){
    $from = (int)$_POST['from'];
    $to = (int)$_POST['to'];       
    $product = Product::where('categoryID',4)->where('isActive',1)->where('price','>=',$from)->where('price','<=',$to)->paginate(9);
    return view('product',['product'=>$product]);
});

Route::post('/trang-suc',function(){
    $from = (int)$_POST['from'];
    $to = (int)$_POST['to'];       
    $product = Product::where('categoryID',5)->where('isActive',1)->where('price','>=',$from)->where('price','<=',$to)->paginate(9);
    return view('product',['product'=>$product]);
});

Route::get('/nam', 'ProductController@product');
Route::get('/nu', 'ProductController@product');
Route::get('/tre-em', 'ProductController@product');
Route::get('/dong-ho', 'ProductController@product');
Route::get('/trang-suc', 'ProductController@product');

Route::get('/productgird', function () {
    return view('productgird',['user'=>Auth::user()]);
});

Route::get('/cart', function () {   
    if(Auth::check())
        return view('cart',['user'=>Auth::user(),'type'=>1]);        
    else
        return view('cart',['user'=>Auth::user(),'type'=>0]);    

});

Route::get('/list-product', function () {
    $type = Auth::user()->typeofuser;
    if($type == 1 || $type == 2){
        $ls_product = Product::orderBy('productID','desc')->where('isActive',1)->paginate(5);    
        if(isset($_GET['search']))
            $ls_product = Product::orderBy('productID','desc')->where('isActive',1)->where('productname','like','%'.$_GET['search'].'%')->paginate(50);
    }else{
        $ls_product = Auth::user()->product()->where('product_detail.isActive',1)->where('bill_ID','<>',0)->paginate(5);
        if(isset($_GET['search']))
            $ls_product = Auth::user()->product()->where('product_detail.isActive',1)->where('bill_ID','<>',0)->where('productname','like','%'.$_GET['search'].'%')->paginate(50);
    }        
    return view('UserManager',['ls_product'=>$ls_product,'type'=>0,'product'=>null,'user'=>Auth::user()]);
});

Route::get('/edit-product={productID}', function ($productID) {     
    $product = Product::where('productID',$productID)->get();            
    // $ls_product = Product::orderBy('productID','desc')->where('isActive',1)->paginate(5);        
    // return view('UserManager',['product'=>$product,'ls_product'=>$ls_product,'type'=>1,'user'=>Auth::user()]);
    return json_encode(array('product'=>$product));
});

Route::get('/list-product={id}', function ($id) {
    $typeofuser = Auth::user()->typeofuser;
    $categoryID = App\Category::where('name',$id)->pluck('categoryID')->first();
    if($typeofuser == 1 || $typeofuser == 2)
        if($categoryID == null)
            $ls_product = Product::orderBy('productID','desc')->where('product_detail.isActive',0)->paginate(5);
        else
            $ls_product = Product::orderBy('productID','desc')->where('categoryID',$categoryID)->where('product_detail.isActive',1)->paginate(5);    
    else
        $ls_product = Auth::user()->product()->where('categoryID',$categoryID)->where('product_detail.isActive',1)->where('order_detail.bill_ID','<>',0)->paginate(5);
    return view('UserManager',['ls_product'=>$ls_product,'type'=>0,'product'=>null,'user'=>Auth::user()]);
});

Route::get('/manager',function(){
	 return redirect('list-order');
});

Route::get('/list-order', function () {
    $ls_bill = Bill::orderBy('bill_ID','desc')->paginate(5); 
    $typeofuser = Auth::user()->typeofuser;   
    if($typeofuser == 3){
        $ls_bill = Bill::orderBy('bill_ID','desc')->where('shipper',Auth::user()->lastname)->where('status','<>',0)->where('isActive',1)->paginate(5);
        return view('ListOrder',['ls_bill'=>$ls_bill,'user'=>Auth::user()]);    
    }
    if($typeofuser == 4){
        $ls_bill = Bill::orderBy('bill_ID','desc')->where('userID',Auth::id())->where('isActive',1)->paginate(5);
        return view('ListOrder',['ls_bill'=>$ls_bill,'user'=>Auth::user()]);    
    }
    return view('ListOrder',['ls_bill'=>$ls_bill,'user'=>Auth::user()]);
});

Route::get('/list-order={id}', function ($id) {
    $ls_bill = Bill::orderBy('bill_ID','desc')->where('status',$id)->where('isActive',1)->paginate(5); 
    $typeofuser = Auth::user()->typeofuser;   
    if($typeofuser == 3){
        $ls_bill = Bill::orderBy('bill_ID','desc')->where('status','<>',0)->where('status',$id)->where('shipper',Auth::user()->lastname)->where('isActive',1)->paginate(5);
        return view('ListOrder',['ls_bill'=>$ls_bill,'user'=>Auth::user()]);    
    }
    if($typeofuser == 4){
        $ls_bill = Bill::orderBy('bill_ID','desc')->where('userID',Auth::id())->where('status',$id)->where('isActive',1)->paginate(5);
        return view('ListOrder',['ls_bill'=>$ls_bill,'user'=>Auth::user()]);    
    }
    return view('ListOrder',['ls_bill'=>$ls_bill,'user'=>Auth::user()]);
});

Route::get('/list-account', function () {
    $ls_account = User::where('typeofuser','!=','1')->paginate(5);
    $typeofuser = Auth::user()->typeofuser;
    if ($typeofuser == 1){
        return view('AccountManager',['ls_account'=>$ls_account,'type'=>0,'product'=>null,'user'=>Auth::user()]);
    }else{        
        return view('AccountManager',['ls_account'=>$ls_account,'type'=>0,'product'=>null,'user'=>Auth::user()]);
        // return back()->withInput();
    }    
});

Route::get('/dang-nhap', function () {
    if(isset($_GET['update']))
        return view('login',['update'=>$_GET['update']]);
    return view('login',['update'=>0]);
});

Route::get('/dang-ki', function () {
    $oldURL = $_SERVER['HTTP_REFERER'];
    return view('register',['url'=>$oldURL]);
});

Route::get('/dang-ki={userID}', function ($userID) {    
    $oldURL = $_SERVER['HTTP_REFERER'];
    $user = User::where('userID',$userID)->get();
    return view('register',['user'=>$user,'url'=>$oldURL,'type'=>1,'userAd'=>Auth::user()]);
});

Route::get('/contact', function () {
    return view('contact',['user'=>Auth::user()]);
});

Route::post('/login','UserController@login');

Route::post('/add-user','UserController@index');
Route::post('/edit-user','UserController@index');
Route::get('/delete-user','UserController@index');

Route::post('/add-product','ProductController@index');
Route::post('/edit-product','ProductController@index');
Route::get('/delete-product','ProductController@index');
Route::get('/re-product','ProductController@re_product');
Route::post('/add-bill','OrderController@order_user');
Route::get('/add-bill',function(){
    $bill = new Bill;
    $bill->userID = Auth::id();
    $bill->name = Auth::user()->lastname;
    $bill->adress = Auth::user()->address;
    $bill->telephone = Auth::user()->telephone;
    $bill->email = Auth::user()->email;
    $bill->price = $_GET['total'];
    $bill->dateofbirth = Carbon::now()->toDateTimeString();
    $bill->save();
    
    $ls_order = Order::orderBy('orderID','desc')->where('userID',Auth::id())->limit(Cookie::get('amount'))->where('isActive',1)->get();    
    foreach ($ls_order as $order) {
        $order->bill_ID = $bill->bill_ID;
        $order->save();
    }
    $staffs = User::where('typeofuser',2)->get();
    foreach ($staffs as $staff) {
        Mail::to($staff->email)->send(new NotificationMail($bill->bill_ID));      
    }
    return $bill->bill_ID;
});

Route::get('/checkorder','BillController@index');
Route::post('/add-order','OrderController@store');
Route::get('/delete-order','OrderController@destroy');

Route::get('/logout',function(){
    Auth::logout();
    return Redirect::to('/');
});
