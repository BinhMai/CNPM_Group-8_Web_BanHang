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
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                     <div class="logo"><a href="/Trang-Chu"><img src="images/logo.png" alt="FlatShop"></a></div>
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
                              <form><input class="search-submit" type="submit" value=""><input class="search-input" placeholder="Enter your search term..." type="text" value="" name="search"></form>
                           </li>
                           <li class="option-cart">
                              <a href="#" class="cart-icon">cart <span class="cart_no" id="cart_no">{{Cookie::get('amount') < 10 ? '0'.Cookie::get('amount') : Cookie::get('amount')}}</span></a>
                              <ul class="option-cart-item"> 
                                 <div class="list-order">
                                    <?php                                                             
                                       $list_order = App\Order::where('userID',Auth::check() ? Auth::id() : Cookie::get('user_ip'))->where('isActive',1)->orderBy('orderID','desc')->limit(Cookie::get('amount'))->get();                                             
                                       $total = 0;
                                       foreach($list_order as $order){
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
                                    @if(count($list_order) > 0)                                  
                                       <li><span class="total" style="margin-left: 56px;padding-top: 0px">Total <strong id="total">${{$total}}</strong></span><button class="login" onClick="location.href='/cart'" style="margin-top: 8px;float: right;">CheckOut</button></li>
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
									<li><a id="noti">Notification</a></li>                         
								@endif																	
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="noti_Container">            
              <div id="noti_Count">            
                <span id="noti_Counter">1</span>                                                       
              </div>                     
                             

                <div id="notifications">
                    <h3>Notifications</h3>
                    <div id="contentNotice">                
                      <a href='#'>
                        <div style="height:60px;background: #edf2fa">                   
                          <img class="col-md-2" style="padding:5px" src="" height="60" width="60"/>                          
                            <div class="col-md-10" style="padding-top: 3px;color: black">
                              <span style="font-family: VnArabia;">KKKK</span>
                              <span> thích một bài viết của bạn</span>                            
                            </div>
                          <hr style="margin: 3px">  
                        </div>
                      </a>                                    
                    <div class="seeAll"><a href="#">See All</a></div>
                </div>  
                </div>                              
            </div>
            <div id="noti_Button">
                  <input type="hidden" name="_method" value="put">
                  <span class="col-md-4 col-xs-4" style="color: white; padding: 0px;font-family: arial;font-size: 15px">
              <span style="color: white; font-size: 14px">Thông báo</span>
            </span>
        </div>    
		 
	<section style="margin: 15px">
		<div class="container-fluid">
			<h2>List Order</h2>
			<form style="float:right;margin-bottom: 10px">
				<input class="search" placeholder="Search Order..." type="text" value="" name="search">
			</form>
			
		  <table class="table table-striped">
			<thead>
			  <tr>
				<th>ProductID</th>
				<th>Order Time</th>
        <th>Price</th>
				<th>Status</th>
        <th>Option</th>
			  </tr>
			</thead>
			<tbody>
        @foreach($ls_order as $order)
				  <tr>
					<td>{{$order->productID}}</td>
					<td>{{$order->dateofbirth}}</td>
          <td>{{$order->price}}</td>
					<td style="width: 150px;">
            @if($order->status == 0)                                      
              @if($user->typeofuser == 1)
                Confirming
              @else              
                <input type="checkbox" class="order" id="{{$order->orderID}}" name="status" value="1">
              @endif              
            @elseif($order->status == 1)
              @if($user->typeofuser == 1 || $user->typeofuser == 2 || $user->typeofuser == 4)              
                Transporting
              @else
                <input type="checkbox" class="order" id="{{$order->orderID}}" name="status" value="2">
              @endif              
            @else
              Finsish
            @endif
          </td>
          <td style="width: 8%">
             @if($order->status == 0)                                                    
              <a href="register={{$order->orderID}}"><button class="edit btn btn-primary addAcc" style="float: right;margin-left: 5px;"><span class="glyphicon glyphicon-edit"></span></button></a>
              <button id="{{$order->orderID}}" class="btn btn-danger delete" style="float: right"><span class="glyphicon glyphicon-trash"></span></button>                            
            @else
              <a href="register={{$order->orderID}}"><button class="edit btn btn-primary addAcc" style="float: right;margin-right: 23px;"><span class="glyphicon glyphicon-edit"></span></button></a>
            @endif          
          </td> 
				  </tr>
        @endforeach				  
			</tbody>
		  </table>
		</div>
	</section>
	<script>
		$(document).ready(function(){
			$('.edit').click(function(){
				$('#add').click();
			});  
      $('.order').click(function(){
        var value = $('.order').val();
        var id = $(this).attr('id');
        document.location = '/checkorder?val='+value+id;
      });
     $('#noti_Counter')
          .css({ opacity: 0 })            
          .css({ top: '-10px' })
          .animate({ top: '-2px', opacity: 1 }, 500);

      $('#noti').click(function () {                         
          $('#notifications').fadeToggle('fast', 'linear', function () {
              if ($('#notifications').is(':hidden')) {
                  $('#noti_Button').css('background-color', '#2E467C');                     
              }
              else $('#noti_Button').css('background-color', '#FFF');        
          });                          

          $('#noti_Counter').fadeOut('slow');               
      //     var id = {{$user->id}};            

      //     $.ajax({
      // url : 'http://localhost/notice/'+id,
      // type: 'put'
      // });

          return false;
      });
      
      $(document).click(function () {
          $('#notifications').hide();
          if ($('#noti_Counter').is(':hidden')) {                 
              $('#noti_Button').css('background-color', '#2E467C');
          }
      });       
		});
	</script>
</body>
</html>