
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>
      Welcome to FlatShop
    </title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
</script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js">
</script>
<![endif]-->
  </head>
  <body>
    <div class="wrapper">
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="col-md-2 col-sm-2">
              <div class="logo">
                <a href="/Trang-Chu">
                  <img src="images/logo.png" alt="FlatShop">
                </a>
              </div>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="header_top">
                <div class="row">
                  <div class="col-md-3">
                    <ul class="option_nav">
                      <li class="dorpdown">
                        <a href="#">
                          Eng
                        </a>
                        <ul class="subnav">
                          <li>
                            <a href="#">
                              Eng
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              Vns
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              Fer
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              Gem
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class="dorpdown">
                        <a href="#">
                          USD
                        </a>
                        <ul class="subnav">
                          <li>
                            <a href="#">
                              USD
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              UKD
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              FER
                            </a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <ul class="topmenu">
                      <li>
                        <a href="#">
                          About Us
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          News
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Service
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Recruiment
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Media
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Support
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-3">
                    <ul class="usermenu">
                      <li>
                        <a href="login" class="log">
                          Login
                        </a>
                      </li>
                      <li>
                        <a href="register" class="reg">
                          Register
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="clearfix">
              </div>
              <div class="header_bottom">
                <ul class="option">
                  <li id="search" class="search">
                    <form>
                      <input class="search-submit" type="submit" value="">
                      <input class="search-input" placeholder="Enter your search term..." type="text" value="" name="search">
                    </form>
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
                                       <li><span class="total" style="margin-left: 56px;padding-top: 0px">Total <strong id="total">${{$total}}</strong></span><button class="login" onClick="location.href='/cart'" style="margin-top: 8px;">CheckOut</button></li>
                                    @else
                                       <li>Bạn Chưa Order Sản Phẩm Nào.</li>
                                    @endif
                                 </div>                                                               
                              </ul>
                           </li>
                </ul>
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">
                      Toggle navigation
                    </span>
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                  </button>
                </div>
                <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <li class="active dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Home
                      </a>
                      <div class="dropdown-menu">
                        <ul class="mega-menu-links">
                          <li>
                            <a href="/">
                              home
                            </a>
                          </li>
                          <li>
                            <a href="home2">
                              home2
                            </a>
                          </li>
                          <li>
                            <a href="home3">
                              home3
                            </a>
                          </li>
                          <li>
                            <a href="productlitst">
                              Productlitst
                            </a>
                          </li>
                          <li>
                            <a href="productgird">
                              Productgird
                            </a>
                          </li>
                          <li>
                            <a href="details">
                              Details
                            </a>
                          </li>
                          <li>
                            <a href="cart">
                              Cart
                            </a>
                          </li>
                          <li>
                            <a href="login">
                              CheckOut
                            </a>
                          </li>
                          <li>
                            <a href="register">
                              CheckOut2
                            </a>
                          </li>
                          <li>
                            <a href="contact">
                              contact
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="productgird">
                        men
                      </a>
                    </li>
                    <li>
                      <a href="productlitst">
                        women
                      </a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Fashion
                      </a>
                      <div class="dropdown-menu mega-menu">
                        <div class="row">
                          <div class="col-md-6 col-sm-6">
                            <ul class="mega-menu-links">
                              <li>
                                <a href="productgird">
                                  New Collection
                                </a>
                              </li>
                              <li>
                                <a href="productgird">
                                  Shirts & tops
                                </a>
                              </li>
                              <li>
                                <a href="productgird">
                                  Laptop & Brie
                                </a>
                              </li>
                              <li>
                                <a href="productgird">
                                  Dresses
                                </a>
                              </li>
                              <li>
                                <a href="productgird">
                                  Blazers & Jackets
                                </a>
                              </li>
                              <li>
                                <a href="productgird">
                                  Shoulder Bags
                                </a>
                              </li>
                            </ul>
                          </div>
                          <div class="col-md-6 col-sm-6">
                            <ul class="mega-menu-links">
                              <li>
                                <a href="productgird">
                                  New Collection
                                </a>
                              </li>
                              <li>
                                <a href="productgird">
                                  Shirts & tops
                                </a>
                              </li>
                              <li>
                                <a href="productgird">
                                  Laptop & Brie
                                </a>
                              </li>
                              <li>
                                <a href="productgird">
                                  Dresses
                                </a>
                              </li>
                              <li>
                                <a href="productgird">
                                  Blazers & Jackets
                                </a>
                              </li>
                              <li>
                                <a href="productgird">
                                  Shoulder Bags
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <a href="productgird">
                        gift
                      </a>
                    </li>
                    <li>
                      <a href="productgird">
                        kids
                      </a>
                    </li>
                    <li>
                      <a href="productgird">
                        blog
                      </a>
                    </li>
                    <li>
                      <a href="productgird">
                        jewelry
                      </a>
                    </li>
                    <li>
                      <a href="contact">
                        contact us
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="page-/">
          <div class="container">
            <p>
              Home - CheckOut
            </p>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
      <div class="container_fullwidth">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="special-deal leftbar" style="margin-top:0;">
                <h4 class="title">
                  Special 
                  <strong>
                    Deals
                  </strong>
                </h4>
                <div class="special-item">
                  <div class="product-image">
                    <a href="details">
                      <img src="images/products/thum/products-01.png" alt="">
                    </a>
                  </div>
                  <div class="product-info">
                    <p>
                      <a href="details">
                        Licoln Corner Unit
                      </a>
                    </p>
                    <h5 class="price">
                      $300.00
                    </h5>
                  </div>
                </div>
                <div class="special-item">
                  <div class="product-image">
                    <a href="details">
                      <img src="images/products/thum/products-02.png" alt="">
                    </a>
                  </div>
                  <div class="product-info">
                    <p>
                      <a href="details">
                        Licoln Corner Unit
                      </a>
                    </p>
                    <h5 class="price">
                      $300.00
                    </h5>
                  </div>
                </div>
                <div class="special-item">
                  <div class="product-image">
                    <a href="details">
                      <img src="images/products/thum/products-03.png" alt="">
                    </a>
                  </div>
                  <div class="product-info">
                    <p>
                      <a href="details">
                        Licoln Corner Unit
                      </a>
                    </p>
                    <h5 class="price">
                      $300.00
                    </h5>
                  </div>
                </div>
              </div>
              <div class="product-tag leftbar">
                <h3 class="title">
                  Products 
                  <strong>
                    Tags
                  </strong>
                </h3>
                <ul>
                  <li>
                    <a href="#">
                      Lincoln us
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      SDress for Girl
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Corner
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Window
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      PG
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Oscar
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Bath room
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      PSD
                    </a>
                  </li>
                </ul>
              </div>
              <div class="get-newsletter leftbar">
                <h3 class="title">
                  Get 
                  <strong>
                    newsletter
                  </strong>
                </h3>
                <p>
                  Casio G Shock Digital Dial Black.
                </p>
                <form>
                  <input class="email" type="text" name="" placeholder="Your Email...">
                  <input class="submit" type="submit" value="Submit">
                </form>
              </div>
              <div class="fbl-box leftbar">
                <h3 class="title">
                  Facebook
                </h3>
                <span class="likebutton">
                  <a href="#">
                    <img src="images/fblike.png" alt="">
                  </a>
                </span>
                <p>
                  12k people like Flat Shop.
                </p>
                <ul>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                </ul>
                <div class="fbplug">
                  <a href="#">
                    <span>
                      <img src="images/fbicon.png" alt="">
                    </span>
                    Facebook social plugin
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="login-page">
                <ol class="login-steps">
                  <li class="steps active">
                    <a href="login" class="step-title">
                      01. login opition
                    </a>
                    <div class="step-description">
                      <div class="row">
                        <div class="col-md-6 col-sm-6">
                          <div class="new-customer">
                            <h5>
                              New Customer
                            </h5>
                            <label>
                              <span class="input-radio">
                                <input type="radio" name="user">
                              </span>
                              <span class="text">
                                I wish to subscribe to the Herbal Store newsletter.
                              </span>
                            </label>
                            <label>
                              <span class="input-radio">
                                <input type="radio" name="user">
                              </span>
                              <span class="text">
                                My delivery and billing addresses are the same.
                              </span>
                            </label>
                            <p class="requir">
                              By creating an account you will be able to shop faste be up to date on an order's status, and keep track of the orders you have previously made.
                            </p>
                            <button>
                              Continue
                            </button>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <div class="run-customer">
                            <h5>
                              Rerunning Customer
                            </h5>
                            <form id="login-form">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                              <div class="form-row">
                                <label class="lebel-abs">
                                  Email 
                                  <strong class="red">
                                    *
                                  </strong>
                                </label>
                                <input style="display: none" type="text" name="oldurl" id="oldurl">
                                <input type="text" class="input namefild" name="user">
                              </div>
                              <div class="form-row">
                                <label class="lebel-abs">
                                  Password 
                                  <strong class="red">
                                    *
                                  </strong>
                                </label>
                                <input type="password" class="input namefild" name="password" style="padding-left: 100px">
                              </div>
                              <p class="forgoten">
                                <a href="#">
                                  Forgoten your password?
                                </a>
                              </p>
                              <button type="submit">
                                Login
                              </button>
                            </form>                          
                            <script type="text/javascript">
                              $(document).ready(function(){
                                $.ajaxSetup({
                                  headers: {
                                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                                  }
                                }); 

                                $("#login-form").validate({          
                                     submitHandler: submitFormLogin
                                });
                                function submitFormLogin(){  
                                    $('#oldurl').val(document.referrer); 
                                    var update = {{$update}};                                                      
                                    var data = $('#login-form').serialize()+'&update='+update;
                                    $.ajax({
                                        type : 'POST',
                                        url  : '/login',
                                        data : data,                                        
                                        success:  function(data)
                                        {        
                                          console.log(data);                                 
                                          if(data != null) 
                                            document.location = data;            
                                          else
                                            alert('Tên tài khoản hoặc mật khẩu không chính xác');
                                        }
                                    });
                                    return false;
                                }       

                              });
                            </script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="steps">
                    <a href="register" class="step-title">
                      02. billing information
                    </a>
                  </li>
                  <li class="steps">
                    <a href="register" class="step-title">
                      03. Shipping information
                    </a>
                  </li>
                  <li class="steps">
                    <a href="#" class="step-title">
                      04. shipping method 
                    </a>
                  </li>
                  <li class="steps">
                    <a href="#" class="step-title">
                      05. payment information 
                    </a>
                  </li>
                  <li class="steps">
                    <a href="#" class="step-title">
                      06. oder review
                    </a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="clearfix">
          </div>
          <div class="our-brand">
            <h3 class="title">
              <strong>
                Our 
              </strong>
              Brands
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
        </div>
      </div>
      <div class="clearfix">
      </div>
      <div class="footer">
        <div class="footer-info">
          <div class="container">
            <div class="row">
              <div class="col-md-3">
                <div class="footer-logo">
                  <a href="#">
                    <img src="images/logo.png" alt="">
                  </a>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <h4 class="title">
                  Contact 
                  <strong>
                    Info
                  </strong>
                </h4>
                <p>
                  No. 08, Nguyen Trai, Hanoi , Vietnam
                </p>
                <p>
                  Call Us : (084) 1900 1008
                </p>
                <p>
                  Email : michael@leebros.us
                </p>
              </div>
              <div class="col-md-3 col-sm-6">
                <h4 class="title">
                  Customer
                  <strong>
                    Support
                  </strong>
                </h4>
                <ul class="support">
                  <li>
                    <a href="#">
                      FAQ
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Payment Option
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Booking Tips
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Infomation
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-md-3">
                <h4 class="title">
                  Get Our 
                  <strong>
                    Newsletter 
                  </strong>
                </h4>
                <p>
                  Lorem ipsum dolor ipsum dolor.
                </p>
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
                <p>
                  Copyright © 2012. Designed by 
                  <a href="#">
                    Michael Lee
                  </a>
                  . All rights reseved
                </p>
              </div>
              <div class="col-md-6">
                <ul class="social-icon">
                  <li>
                    <a href="#" class="linkedin">
                    </a>
                  </li>
                  <li>
                    <a href="#" class="google-plus">
                    </a>
                  </li>
                  <li>
                    <a href="#" class="twitter">
                    </a>
                  </li>
                  <li>
                    <a href="#" class="facebook">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript==================================================-->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js">
    </script>
    <script type="text/javascript" src="js/bootstrap.min.js">
    </script>
    <script defer src="js/jquery.flexslider.js">
    </script>
    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js">
    </script>
    <script type="text/javascript" src="js/script.min.js" >
    </script>
  </body>
</html>