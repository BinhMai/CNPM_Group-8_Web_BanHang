<!DOCTYPE html>;;
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/favicon.png">
  <title>Chào mừng đến FlatShop</title>
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
      <meta name="csrf-token" content="<?= csrf_token() ?>">
  </head>
  <body>
    <div class="wrapper">
      @include('header');    
      <div class="clearfix">
      </div>
      <div class="container_fullwidth">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="category leftbar">
                <h3 class="title">
                  Phân loại
                </h3>
                <ul>
                  <?php $ca=App\Category::get(); ?>
                    @foreach($ca as $ca)
                     <li><a href="{{$ca->url}}">{{$ca->name_tv}}</a></li>
                      @endforeach
                </ul>
              </div>
              <div class="clearfix">
              </div>
              <div class="price-filter leftbar">
                <h3 class="title">
                  Giá
                </h3>
                <form class="pricing" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <input type="text" hidden name="category" value="{{substr($_SERVER['REQUEST_URI'],1)}}">
                  <label>
                    $ 
                    <input type="number" name="from" style="width: 140px" required>
                  </label>                  
                  <label>
                    $ 
                    <input type="number" name="to" style="width: 140px" required>
                  </label>
                  <input type="submit" value="Search" style="width: 55px;margin-top: 30px">
                </form>
              </div>              
              <div class="product-tag leftbar">
                <h3 class="title">
                  <strong>
                    Thẻ
                  </strong>
                   Sản phẩm
                </h3>
                <ul>
                  <li>
                    <a href="#">
                      Aó khoác đẹp
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Mẫu mới
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Gía rẻ
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Sale lớn
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      FlatShop
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Hàng mới về
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Cửa hàng FlatShop
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Chất liệu đẹp
                    </a>
                  </li>
                </ul>
              </div>
              <div class="clearfix">
              </div>
              <div class="leftbanner">
                <img src="images/banner-small-01.png" alt="">
              </div>
            </div>
            <div class="col-md-9">
              <div class="banner">
                <div class="bannerslide" id="bannerslide">
                  <ul class="slides">
                    <li>
                      <a href="#">
                        <img src="images/12.png" alt=""/>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <img src="images/13.png" alt=""/>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="clearfix">
              </div>              
              <div class="products-grid">
                @if($product != '[]')              
                <div class="toolbar">
                  <div class="sorter" style="float: right;width: 30%">                    
                    {{$product->links()}}
                  </div>                  
                </div>
                <div class="clearfix">
                </div>
                <?php $i=0;?>
                <div class="row">
                  @foreach($product as $pr)                        
                  <?php $i++;?>
                  @if($i%3 != 1)                  
                    <div class="col-md-4 col-sm-6">
                  @else
                      <div class="col-md-4 col-sm-6" style="clear:both;">
                  @endif  
                    <div class="products">
                      <div class="thumbnail">
                        <a href="/details={{$pr->productID}}">
                          <img src="{{$pr->pictures}}" alt="Product Name" style="height: 115%;max-width:92%;margin-top:-35px;">
                        </a>
                      </div>
                      <div class="productname">
                        {{$pr->productname}}
                        
                      </div>
                      <h4 class="price">
                       ${{$pr->price}}
                      </h4>
                      <?php   
                        $check = false;
                        if(Cookie::get('amount') < 4)                                                        
                           $lm = Cookie::get('amount');
                        else
                           $lm = 3;
                        $ls_order = App\Order::where('userID',Auth::check() ? Auth::id() : Cookie::get('user_ip'))->where('isActive',1)->orderBy('orderID','desc')->limit($lm)->get();
                        foreach ($ls_order as $order) {
                           if($order->productID == (int)$pr->productID)
                              $check = true;
                        }                                                                   
                     ?>                                 
                     @if($check == true)
                        <div class="button_group_{{$pr->productID}}"><a href="/cart"><button class="button" style="margin-left: 25px">Giỏ hàng</button></a><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                     @else
                        <div class="button_group_{{$pr->productID}}"><button class="button add-cart" id="order_{{$pr->productID}}" type=" button">Mua</button><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                     @endif
                    </div>
                  </div>
                  @endforeach
                  </div>
                  
                <div class="clearfix">
                </div>
                <div class="toolbar">
                  <div class="sorter bottom" style="float: right;width: 30%">
                    {{$product->links()}}
                  </div>                  
                </div>
                <div class="clearfix">
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix">
          </div>          
          <div class="our-brand">
            <h3 class="title" style="font-family: sans-serif;">
              <strong>
                Nhãn hiệu  
              </strong>
              của chúng tôi
            </h3>
            <div class="control">
              <a id="prev_brand" class="prev" href="#">
                &lt;
              </a>
              <a id="next_brand" class="next" href="#">
                &gt;
              </a>
            </div>
            <ul id="braldLogo">
              <li>
                <ul class="brand_item">
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/envato.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/themeforest.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/photodune.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/activeden.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/envato.png" alt="">
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <ul class="brand_item">
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/envato.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/themeforest.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/photodune.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/activeden.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/envato.png" alt="">
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          @else
            <h2>Không có sản phẩm nào.</h2>
          @endif
        </div>
      </div>
      <div class="clearfix">
      </div>      
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
    <script type="text/javascript" src="js/jquery-1.10.2.min.js">
    </script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js">
    </script>
    <script type="text/javascript" src="js/bootstrap.min.js">
    </script>
    <script defer src="js/jquery.flexslider.js">
    </script>
    <script type="text/javascript" src="js/jquery.sequence-min.js">
    </script>
    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js">
    </script>
    <script type="text/javascript" src="js/script.min.js" >
    </script>
    <script type="text/javascript" src="js/add-to-cart.js" >
    </script>
  </body>
</html>