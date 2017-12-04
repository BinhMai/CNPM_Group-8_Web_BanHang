<!DOCTYPE html>
<html>
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
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
      
      <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script><![endif]-->
      <meta name="csrf-token" content="<?= csrf_token() ?>">
   </head>
   <body id="home">
      <div class="wrapper">
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
                                       $ls_order = App\Order::where('userID',Auth::check() ? Auth::id() : Cookie::get('user_ip'))->where('isActive',1)->orderBy('orderID','desc')->limit(Cookie::get('amount'))->get();                                             
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
                              <li class="active dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                                 <div class="dropdown-menu">
                                    <ul class="mega-menu-links">
                                       <li><a href="/Trang-Chu">home</a></li>
                                       <li><a href="home2">home2</a></li>
                                       <li><a href="home3">home3</a></li>
                                       <li><a href="productlitst">Productlitst</a></li>
                                       <li><a href="productgird">Productgird</a></li>
                                       <li><a href="details">Details</a></li>
                                       <li><a href="cart">Cart</a></li>
                                       <li><a href="login">CheckOut</a></li>
                                       <li><a href="register">CheckOut2</a></li>
                                       <li><a href="contact">contact</a></li>
                                    </ul>
                                 </div>
                              </li>
                              <?php $ca=App\Category::get(); ?>
                             @foreach($ca as $ca)
                              <li><a href="{{$ca->name}}">{{$ca->name}}</a></li>
                               @endforeach                             
                           
                              <li><a href="contact">contact us</a></li>
							         <li><a class="manager">manager</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <script type="text/javascript">
            $(document).ready(function(){
               $(document).on('click','.manager',function(){                  
                  var type = <?php echo Cookie::get('login') ?>;                       
                  if(type == 0){
                     if(confirm('Bạn có muốn đăng nhập?')){
                        document.location = '/login';   
                     }
                  }else{
                     document.location = '/manager';
                  }
               });
            });                   
         </script>
         <div class="clearfix"></div>
         <div class="hom-slider">
            <div class="container">
               <div id="sequence">
                  <div class="sequence-prev"><i class="fa fa-angle-left"></i></div>
                  <div class="sequence-next"><i class="fa fa-angle-right"></i></div>
                  <ul class="sequence-canvas">
                     <li class="animate-in">
                        <div class="flat-caption caption1 formLeft delay300 text-center"><span class="suphead">Paris show 2017</span></div>
                        <div class="flat-caption caption2 formLeft delay400 text-center">
                           <h1>Collection For Winter</h1>
                        </div>
                        <div class="flat-caption caption3 formLeft delay500 text-center">
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </div>
                        <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="#">More Details</a></div>
                        <div class="flat-image formBottom delay200" data-duration="5" data-bottom="true"><img src="images/slider-image-01.png" alt=""></div>
                     </li>
                     <li>
                        <div class="flat-caption caption2 formLeft delay400">
                           <h1>Collection For Winter</h1>
                        </div>
                        <div class="flat-caption caption3 formLeft delay500">
                           <h2>Etiam velit purus, luctus vitae velit sedauctor<br>egestas diam, Etiam velit purus.</h2>
                        </div>
                        <div class="flat-button caption5 formLeft delay600"><a class="more" href="#">More Details</a></div>
                        <div class="flat-image formBottom delay200" data-bottom="true"><img src="images/slider-image-02.png" alt=""></div>
                     </li>
                     <li>
                        <div class="flat-caption caption2 formLeft delay400 text-center">
                           <h1>New Fashion of 2017</h1>
                        </div>
                        <div class="flat-caption caption3 formLeft delay500 text-center">
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </div>
                        <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="#">More Details</a></div>
                        <div class="flat-image formBottom delay200" data-bottom="true"><img src="images/slider-image-03.png" alt=""></div>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="promotion-banner">
               <div class="container">
                  <div class="row">
                     <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="promo-box"><img src="images/promotion-01.png" alt=""></div>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="promo-box"><img src="images/promotion-02.png" alt=""></div>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="promo-box"><img src="images/promotion-03.png" alt=""></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
         <div class="container_fullwidth">
            <div class="container">
              
               <div class="clearfix"></div>
               <div class="featured-products">
                  <h3 class="title"><strong>Featured </strong> Products</h3>
                  <div class="control"><a id="prev_featured" class="prev" href="#">&lt;</a><a id="next_featured" class="next" href="#">&gt;</a></div>
                  <ul id="featured">
                     <li>
                        <div class="row">
                            <?php 
                                    $pr=App\Product::orderBy('productID','desc')->get();
                                    for($i=0;$i<12;$i++){
                                 ?>
                           <div class="col-md-3 col-sm-6">
                              <div class="products">
                                
                                 <div class="offer">new</div>
                                 <div class="thumbnail"><a href="details={{$pr[$i]['productID']}}"><img src="{{$pr[$i]['pictures']}}" alt="Product Name" style="height: 115%;max-width:92%;margin-top:-35px;"></a></div>
                                 <div class="productname">{{$pr[$i]['productname']}}</div>
                                 <h4 class="price">${{$pr[$i]['price']}}</h4>

                                 <?php if(Auth::check()) $id = Auth::id(); else $id = Cookie::get('user_ip');
                                       $check = App\Order::where('userID',$id)->where('productID',(int)$pr[$i]['productID'])->where('isActive',1)->get();?>                                 
                                 @if(count($check) > 0)
                                    <div class="button_group_{{$pr[$i]['productID']}}"><a href="/details={{$pr[$i]['productID']}}"><button class="button" style="margin-left: 25px">More Detail</button></a><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                                 @else
                                    <div class="button_group_{{$pr[$i]['productID']}}"><button class="button add-cart" id="order_{{$pr[$i]['productID']}}" type=" button">Add To Cart</button><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                                 @endif
                              </div>
                           </div> 
                           <?php } ?>
                        </div>
                     </li>
                     <li>
                        <div class="row">
                            <?php 
                     
                                for($i=12;$i<23;$i++){
                           ?>
                           <div class="col-md-3 col-sm-6">
                              <div class="products">
                                
                                 <div class="offer">new</div>
                                 <div class="thumbnail"><a href="details"><img src="{{$pr[$i]['pictures']}}" alt="Product Name"></a></div>
                                 <div class="productname">{{$pr[$i]['productname']}}</div>
                                 <h4 class="price">${{$pr[$i]['price']}}</h4>
                                 <div class="button_group"><button class="button add-cart" type="button">Add To Cart</button><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                              </div>
                           </div> 
                           <?php } ?>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="clearfix"></div>
               <div class="our-brand">
                  <h3 class="title"><strong>Our </strong> Brands</h3>
                  <div class="control"><a id="prev_brand" class="prev" href="#">&lt;</a><a id="next_brand" class="next" href="#">&gt;</a></div>
                  <ul id="braldLogo">
                     <li>
                        <ul class="brand_item">
                           <li>
                              <a href="#">
                                 <div class="brand-logo"><img src="images/envato.png" alt=""></div>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                                 <div class="brand-logo"><img src="images/themeforest.png" alt=""></div>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                                 <div class="brand-logo"><img src="images/photodune.png" alt=""></div>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                                 <div class="brand-logo"><img src="images/activeden.png" alt=""></div>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                                 <div class="brand-logo"><img src="images/envato.png" alt=""></div>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <ul class="brand_item">
                           <li>
                              <a href="#">
                                 <div class="brand-logo"><img src="images/envato.png" alt=""></div>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                                 <div class="brand-logo"><img src="images/themeforest.png" alt=""></div>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                                 <div class="brand-logo"><img src="images/photodune.png" alt=""></div>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                                 <div class="brand-logo"><img src="images/activeden.png" alt=""></div>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                                 <div class="brand-logo"><img src="images/envato.png" alt=""></div>
                              </a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
         <div class="footer">
            <div class="footer-info">
               <div class="container">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="footer-logo"><a href="#"><img src="images/logo.png" alt=""></a></div>
                     </div>
                     <div class="col-md-3 col-sm-6">
                        <h4 class="title">Contact <strong>Info</strong></h4>
                        <p>No. 08, Nguyen Trai, Hanoi , Vietnam</p>
                        <p>Call Us : (084) 1900 1008</p>
                        <p>Email : michael@leebros.us</p>
                     </div>
                     <div class="col-md-3 col-sm-6">
                        <h4 class="title">Customer<strong> Support</strong></h4>
                        <ul class="support">
                           <li><a href="#">FAQ</a></li>
                           <li><a href="#">Payment Option</a></li>
                           <li><a href="#">Booking Tips</a></li>
                           <li><a href="#">Infomation</a></li>
                        </ul>
                     </div>
                     <div class="col-md-3">
                        <h4 class="title">Get Our <strong>Newsletter </strong></h4>
                        <p>Lorem ipsum dolor ipsum dolor.</p>
                        <form class="newsletter">
							<input type="text" name="" placeholder="Type your email....">
							<input type="submit" value="SignUp" class="button">
						</form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright-info">
               <div class="container">
                  <div class="row">
                     <div class="col-md-6">
                        <p>Copyright © 2012. Designed by <a href="#">Michael Lee</a>. All rights reseved</p>
                     </div>
                     <div class="col-md-6">
                        <ul class="social-icon">
                           <li><a href="#" class="linkedin"></a></li>
                           <li><a href="#" class="google-plus"></a></li>
                           <li><a href="#" class="twitter"></a></li>
                           <li><a href="#" class="facebook"></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script type="text/javascript">
         $(document).ready(function(){            
            $.ajaxSetup({
               headers: {
                  'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
               }
            });            
         });
      </script>>
      <!-- Bootstrap core JavaScript==================================================-->
	  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	  <script type="text/javascript" src="js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="js/jquery.sequence-min.js"></script>
	  <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript" src="js/script.min.js" ></script>
     <script type="text/javascript" src="js/add-to-cart.js"></script>
   </body>
</html>