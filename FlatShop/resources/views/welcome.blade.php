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
         @include('header');         
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
               <?php 
                  $category = App\Category::all();                          
               ?>                               
               @foreach($category as $cate)               
               <div class="clearfix"></div>
               <div class="featured-products">
                  @if($cate->categoryID == 4 || $cate->categoryID == 5)
                     <h3 class="title"><strong>{{$cate->name_tv}}</strong></h3>
                  @else
                     <h3 class="title"><strong>Thời Trang </strong> {{$cate->name_tv}}</h3>
                  @endif
                  <div class="control">
                     <a id="prev_featured_{{$cate->categoryID}}" class="prev" href="#">&lt;</a>
                     <a id="next_featured_{{$cate->categoryID}}" class="next" href="#">&gt;</a>
                  </div>
                  <ul id="featured_{{$cate->categoryID}}">
                     <li>
                        <div class="row">
                            <?php                                                       
                              $product = App\Category::find($cate->categoryID)->product()->orderBy('productID','desc')->where('isActive',1)->limit(4)->get();                              
                              if(Auth::check()) $id = Auth::id(); else $id = Cookie::get('user_ip');    
                              $ls_order = App\Order::orderBy('orderID','desc')->where('userID',$id)->limit(Cookie::get('amount'))->get();                             
                           ?>
                           @foreach($product as $prd)
                           <div class="col-md-3 col-sm-6">
                              <div class="products">
                                
                                 <div class="offer">new</div>
                                 <div class="thumbnail" style="margin: 32px 0 5px 0"><a href="details={{$prd->productID}}"><img src="{{$prd->pictures}}" alt="Product Name" style="height: 115%;max-width:92%;margin-top:-35px;"></a></div>
                                 <div class="productname">{{$prd->productname}}</div>
                                 <h4 class="price">${{$prd->price}}</h4>

                                 <?php   
                                    $check = false;
                                    foreach ($ls_order as $order) {
                                       if($order->productID == (int)$prd->productID)
                                          $check = true;
                                    }                                                                   
                                 ?>                                 
                                 @if($check == true)
                                    <div class="button_group_{{$prd->productID}}"><a href="/cart"><button class="button" style="margin-left: 25px">Giỏ hàng</button></a><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                                 @else
                                    <div class="button_group_{{$prd->productID}}"><button class="button add-cart" id="order_{{$prd->productID}}" type=" button">Mua</button><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                                 @endif
                              </div>
                           </div> 
                           @endforeach
                        </div>
                     </li>
                     <li>                        
                        <div class="row">
                            <?php                              
                              $prds = App\Category::find($cate->categoryID)->product()->orderBy('productID','desc')->where('isActive',1)->get();                                              
                              if(count($prds) < 8)
                                 $limit = count($prds);
                              else
                                 $limit = 8;
                              for($i=4;$i<$limit;$i++){                                 
                           ?>
                            <div class="col-md-3 col-sm-6">
                              <div class="products">
                                
                                 <div class="offer">new</div>
                                 <div class="thumbnail"><a href="details"><img src="{{$prds[$i]->pictures}}" alt="Product Name"></a></div>
                                 <div class="productname">{{$prds[$i]->productname}}</div>
                                 <h4 class="price">${{$prds[$i]->price}}</h4>

                                 <?php   
                                    $check = false;
                                    foreach ($ls_order as $order) {
                                       if($order->productID == (int)$prds[$i]->productID)
                                          $check = true;
                                    }                                                                   
                                 ?>                                 
                                 @if($check == true)
                                    <div class="button_group_{{$prds[$i]->productID}}"><a href="/cart"><button class="button" style="margin-left: 25px">Giỏ hàng</button></a><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                                 @else
                                    <div class="button_group_{{$prds[$i]->productID}}"><button class="button add-cart" id="order_{{$prds[$i]->productID}}" type=" button">Mua</button><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                                 @endif
                              </div>
                           </div> 
                           <?php } ?>
                        </div>                        
                     </li>
                  </ul>
               </div>
               @endforeach
               <div class="clearfix"></div>
               <div class="our-brand">
                  <h3 class="title"><strong>Our </strong> Brands</h3>
                  <div class="control">
                     <a id="prev_brand" class="prev" href="#">&lt;</a>
                     <a id="next_brand" class="next" href="#">&gt;</a>
                  </div>
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
         @include('footer');
      </div>

      <script type="text/javascript">
         $(document).ready(function(){            
            $.ajaxSetup({
               headers: {
                  'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
               }
            });            
         });
      </script>
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