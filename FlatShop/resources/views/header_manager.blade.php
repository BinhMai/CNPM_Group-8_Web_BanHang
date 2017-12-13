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
                        @if(Auth::check())
                           <li><a href="dang-ki={{Auth::id()}}" class="log">{{Auth::user()->username}}</a></li> 
                           <li><a href="/logout" class="reg" >Đăng xuất</a></li>
                        @else
                           <li><a href="dang-nhap" class="log">Đăng nhập</a></li>
                           <li><a href="dang-ki" class="reg">Đăng kí</a></li>
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
                              <li><span class="total" style="margin-left: 56px;padding-top: 0px">Tổng :<strong id="total">${{$total}}</strong></span><button class="login" onClick="location.href='/cart'" style="margin-top: 8px;float: right;">See All</button></li>
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
					<li><a href="dang-ki={{Auth::id()}}">Tài khoản</a></li>
					@if(Auth::user()->typeofuser == 1)
						<li><a href="list-account">Quản lý tài khoản</a></li>
					@endif		
					@if(Auth::user()->typeofuser != 3)
						<li><a href="list-product">Quản lý sản phẩm</a></li>
					@endif
					<li><a href="list-order">Quản lý đơn hàng</a></li>					
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>		 
	