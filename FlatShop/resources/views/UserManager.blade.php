
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/favicon.png">
  <title>Welcome to FlatShop</title>
  <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen"/>
  <link href="{{asset('css/sequence-looptheme.css')}}" rel="stylesheet" media="all"/>
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/mystyle.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
  <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js" type="text/javascript"></script>
</head>
<style>
	td,th{
		text-align: center;
		border: #e6dbea solid 1px !important;
	}
</style>
<body>  
	<div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-md-2 col-sm-2">
                     <div class="logo"><a href="/"><img src="images/logo.png" alt="FlatShop"></a></div>
                  </div>
                  <div class="col-md-10 col-sm-10">
                     <div class="header_top">
                        <div class="row">
                           <div class="col-md-3">
                              <ul class="option_nav">
                                 <li class="dorpdown">
                                    <a href="#">Eng</a>
                                    <ul class="subnav">
                                       <li><a href="#">Eng</a></li>
                                       <li><a href="#">Vns</a></li>
                                       <li><a href="#">Fer</a></li>
                                       <li><a href="#">Gem</a></li>
                                    </ul>
                                 </li>
                                 <li class="dorpdown">
                                    <a href="#">USD</a>
                                    <ul class="subnav">
                                       <li><a href="#">USD</a></li>
                                       <li><a href="#">UKD</a></li>
                                       <li><a href="#">FER</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                           <div class="col-md-6">
                              <ul class="topmenu">
                                 <li><a href="#">About Us</a></li>
                                 <li><a href="#">News</a></li>
                                 <li><a href="#">Service</a></li>
                                 <li><a href="#">Recruiment</a></li>
                                 <li><a href="#">Media</a></li>
                                 <li><a href="#">Support</a></li>
                              </ul>
                           </div>
                           <div class="col-md-3">
                              <ul class="usermenu">
                                 @if(isset($user))
                                    <li><a href="register={{$user->userID}}" class="log">{{$user->username}}</a></li> 
                                    <li><a href="/logout" class="reg" >LogOut</a></li>
                                 @else
                                    <li><a href="login" class="log">Login</a></li>
                                    <li><a href="register" class="reg">Register</a></li>
                                 @endif     
                              </ul>
                           </div>
                        </div>
                     </div>					 
                     <div class="clearfix"></div>
                     <div class="header_bottom">
                        <ul class="option">
                           <li id="search" class="search">
                              <form><input class="search-submit" type="submit" value=""><input class="search-input" placeholder="Enter..." type="text" value="" name="search"></form>
                           </li>
                           <li class="option-cart">
                              <a href="#" class="cart-icon">cart <span class="cart_no">{{Cookie::get('amount') < 10 ? '0'.Cookie::get('amount') : Cookie::get('amount')}}</span></a>
                              <ul class="option-cart-item"> 
                                 <div class="list-order">
                                    <?php    
                                       if(Cookie::get('amount') < 4)                                                         
                                          $limit = Cookie::get('amount');
                                       else
                                          $limit = 3;
                                       $ls_order = App\Order::where('userID',Auth::check() ? Auth::id() : Cookie::get('user_ip'))->where('isActive',1)->orderBy('orderID','desc')->limit($limit)->get();                                             
                                       $total = 0;
                                       foreach($ls_order as $order){
                                          $prd = App\Product::find($order->productID);
                                          $total+= $prd->price;
                                          ?>
                                             <li>
                                                <div class="cart-item"><div class="image"><img src="{{$prd->pictures}}" alt=""></div>
                                                   <div class="item-description">
                                                      <p class="name">{{$prd->productname}}</p>
                                                      <p>Size: <span class="light-red">One size</span><br>Quantity: <span class="light-red">01</span></p>
                                                   </div>
                                                   <div class="right"><p class="price" style="margin-top: -3em">${{$prd->price}}.00</p>
                                                      <a href="/delete-order?id={{$order->orderID}}" class="remove"><img src="images/remove.png" alt="remove"></a>
                                                   </div>
                                                </div>
                                             </li>
                                          <?php
                                       }                                                    
                                    ?>                                     
                                 </div>     
                                 <div class="total-cart">
                                    @if(count($ls_order) > 0)                                  
                                       <li><span class="total" style="margin-left: 56px;padding-top: 0px">Total <strong id="total">${{$total}}</strong></span><button class="login" onClick="location.href='/cart'" style="margin-top: 8px;float: right;">See All</button></li>
                                    @else
                                       <li>Bạn Chưa Order Sản Phẩm Nào.</li>
                                    @endif
                                 </div>                                                               
                              </ul>
                           </li>
                        </ul>
                        <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                        <div class="navbar-collapse collapse">
                           <ul class="nav navbar-nav">
								<li><a href="register={{Auth::user()->userID}}">Profile</a></li>
								@if($user->typeofuser == 1)
									<li><a href="list-account">Account Manager</a></li>
								@endif		
								@if($user->typeofuser != 3)
									<li><a href="list-product">Product Manager</a></li>
								@endif
								<li><a href="list-order">Order Manager</a></li>
								@if($user->typeofuser != 1 && $user->typeofuser != 4)
									<li><a href="#">Notification</a></li>                         
								@endif																	
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>		 
		 
	<section style="margin: 15px">		
			<h2 style="margin-bottom: 10px">Danh Sách Sản Phẩm</h2>	
			<button id="add" class="btn btn-success" data-toggle="modal" data-target="#addproduct"  style="float: right;margin-right: 17px;"><span class="glyphicon glyphicon-plus"></span></button>
			<form style="float:right; margin-right: 5px;margin-bottom: 10px">
				<input class="search-submit" type="submit" value=""><input class="search" placeholder="Search product..." type="text" value="" name="search">
			</form>
			
			@include('product-form')      
      <a href="/list-product=Men"><button class="btn btn-danger">Nam</button></a>
      <a href="/list-product=Women"><button class="btn btn-danger">Nữ</button></a>
      <a href="/list-product=Kids"><button class="btn btn-danger">Trẻ em</button></a>
      <a href="/list-product=Watch"><button class="btn btn-danger">Đồng hồ</button></a>
      <a href="/list-product=Jewelry"><button class="btn btn-danger">Trang sức</button></a>
      @if($user->typeofuser == 1 || $user->typeofuser == 2)
        <a href="/list-product=NoActive"><button class="btn btn-danger">Không hoạt động</button></a>
      @endif
			
		  <table class="table table-striped">
			<thead>
			  <tr>
        <th>Ảnh</th>         
				<th>Tên sản phẩm</th>       
        <th>Mô tả</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Thể loại</th>
        <th>Chủ shop</th>        
        <th>Lựa chọn</th>				
			  </tr>
			</thead>
			<tbody>
        @if(isset($ls_product))
          @foreach($ls_product as $product)
  				  <tr>
            <td style="width: 8%">
              <img src="http://localhost/{{$product->pictures}}" class="img-square" alt="Cinque Terre" style="border: #cccccc solid 1px;width:70px;height:70px">           
            </td>
  					<td>{{$product->productname}}</td>
            <td>{{$product->desciption}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->quantuminstock}}</td>
            <td>{{$product->category->name}}</td>         
            <td>{{$product->ownerID}}</td>             
            @if($_SERVER['REQUEST_URI']!='/list-product=NoActive')
              <td style="width: 120px;">
                @if($user->typeofuser == 1 || $user->typeofuser == 2)
                  <a href="edit-product={{$product->productID}}"><button class="edit btn btn-primary" style="float: right;margin-left: 5px;margin-right: 9px;padding: 10px"><span class="glyphicon glyphicon-edit"></span></button></a>
                  <a href="delete-product?id={{$product->productID}}"><button class="btn btn-danger" style="float: right;padding: 10px"><span class="glyphicon glyphicon-trash"></span></button></a>
                @else
                  <a href="delete-product?id={{$product->productID}}"><button class="btn btn-danger" style="padding: 10px"><span class="glyphicon glyphicon-trash"></span></button></a>
                @endif
              </td>
            @else
              <td>
                <a href="re-product?id={{$product->productID}}"><button class="btn btn-warning" style="float: right;padding: 10px"><span class="glyphicon glyphicon-repeat"></span></button></a>
              </td>
            @endif
  				  </tr>				  
          @endforeach
        @endif
			</tbody>
		  </table>
		</div>

    @if(isset($ls_product))
        <div class="col-md-6" style="margin-top: 10px;margin-left: 550px">
          {{$ls_product->links()}}
        </div>    
    @endif  
	</section>	
  <script type="text/javascript">
    $(document).ready(function(){
      var pathname = window.location.pathname;      
      var check = pathname.indexOf('/edit-product=');      
      if(check == 0)
        $('#add').click();
    });
  </script>
</body>
</html>