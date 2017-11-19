<!DOCTYPE >
  <head>
    <meta http-equiv="Content-Type" content="text/;charset=utf-8"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>
      Welcome to FlatShop
    </title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen"/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/mystyle.css')}}" rel="stylesheet" type="text/css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js" type="text/javascript"></script>


    <meta name="csrf-token" content="<?= csrf_token() ?>">    
  </head>    
  <body>       
    <div class="wrapper">
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="col-md-2 col-sm-2">
              <div class="logo">
                <a href="/">
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
                       @if(isset($userAd))
                        <li><a href="checkout2={{$userAd->userID}}" class="log">{{$userAd->username}}</a></li> 
                        <li><a href="/logout" class="reg" >LogOut</a></li>
                     @else
                        <li><a href="checkout" class="log">Login</a></li>
                        <li><a href="checkout2" class="reg">Register</a></li>
                     @endif    
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
                    <a href="#" class="cart-icon">
                      cart 
                      <span class="cart_no">
                        02
                      </span>
                    </a>
                    <ul class="option-cart-item">
                      <li>
                        <div class="cart-item">
                          <div class="image">
                            <img src="images/products/thum/products-01.png" alt="">
                          </div>
                          <div class="item-description">
                            <p class="name">
                              Lincoln chair
                            </p>
                            <p>
                              Size: 
                              <span class="light-red">
                                One size
                              </span>
                              <br>
                              Quantity: 
                              <span class="light-red">
                                01
                              </span>
                            </p>
                          </div>
                          <div class="right">
                            <p class="price">
                              $30.00
                            </p>
                            <a href="#" class="remove">
                              <img src="images/remove.png" alt="remove">
                            </a>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="cart-item">
                          <div class="image">
                            <img src="images/products/thum/products-02.png" alt="">
                          </div>
                          <div class="item-description">
                            <p class="name">
                              Lincoln chair
                            </p>
                            <p>
                              Size: 
                              <span class="light-red">
                                One size
                              </span>
                              <br>
                              Quantity: 
                              <span class="light-red">
                                01
                              </span>
                            </p>
                          </div>
                          <div class="right">
                            <p class="price">
                              $30.00
                            </p>
                            <a href="#" class="remove">
                              <img src="images/remove.png" alt="remove">
                            </a>
                          </div>
                        </div>
                      </li>
                      <li>
                        <span class="total">
                          Total 
                          <strong>
                            $60.00
                          </strong>
                        </span>
                        <button class="checkout" onClick="location.href='checkout'">
                          CheckOut
                        </button>
                      </li>
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
                            <a href="checkout">
                              CheckOut
                            </a>
                          </li>
                          <li>
                            <a href="checkout2">
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
                      <a href="contact">
                        contact us
                      </a>
                    </li>
					<li><a href="manager">manager</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="page-index">
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
              <div class="checkout-page">
                <ol class="checkout-steps">
                  <li class="steps">
                    <div class="step-title">
                      01. checkout opition
                    </div>
                  </li>
                  <li class="steps active">
                    <a href="checkout" class="step-title">
                      02. billing information
                    </a>
                    <div class="step-description" style="padding: 40px">                      
                      <form action="@php 
                                        if(isset($user))    
                                          $userID = $user[0]['userID'];
                                        if(isset($type))
                                          echo '/edit-user?userID='.$userID;
                                        else 
                                          echo 'add-user';
                                    @endphp" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="url" value="{{$url}}">

                        <div class="row">
                          <div class="col-md-6 col-sm-6">
                            <div class="your-details">
                              <h5>
                                Your Persional Details
                              </h5>
                              <div class="form-row">
                                <label class="lebel-abs">
                                  First Name 
                                  <strong class="red">
                                    *
                                  </strong>
                                </label>
                                <input type="text" class="input namefild" name="firstname" value="{{ isset($user) ? $user[0]['firstname'] : ''}}" required>
                              </div>
                              <div class="form-row">
                                <label class="lebel-abs">
                                  Last Name 
                                  <strong class="red">
                                    *
                                  </strong>
                                </label>
                                <input type="text" class="input namefild" name="lastname" value="{{ isset($user) ? $user[0]['lastname'] : ''}}" required>
                              </div>
                              <div class="form-row">
                                <div class="radio-inline">
                                  <label><input type="radio" name="gender" {{ isset($user) && $user[0]['gender'] == 1 ? 'checked' : ""}} {{ isset($user) ? '' : 'checked'}} value="1">Nam</label>
                                </div>                                                          
                                <div class="radio-inline">
                                  <label><input type="radio" name="gender" {{ isset($user) && $user[0]['gender'] == 0 ? 'checked' : ""}} value="0" >Nữ</label>
                                </div>                                
                              </div>                              
                              <div class="form-row">
                                <label class="lebel-abs">
                                  BirthDay
                                  <strong class="red">
                                    *
                                  </strong>
                                </label>                                
                                <input type="date" class="input namefild form-date" name="dateofbirth" value="{{ isset($user) ? $user[0]['dateofbirth'] : ''}}" required>
                              </div>
                              <div class="form-row">
                                <label class="lebel-abs">
                                  Address
                                  <strong class="red">
                                    *
                                  </strong>
                                </label>
                                <input type="text" class="input namefild" name="address" value="{{ isset($user) ? $user[0]['address'] : ''}}" required>
                              </div>                              
                              <div class="form-row">
                                <label class="lebel-abs">
                                  Email
                                  <strong class="red">
                                    *
                                  </strong>
                                </label>
                                <input type="email" class="input namefild" name="email" value="{{ isset($user) ? $user[0]['email'] : ''}}"  required>
                              </div>
                              <div class="form-row">
                                <label class="lebel-abs">
                                  Telephone
                                  <strong class="red">
                                    *
                                  </strong>
                                </label>
                                <input type="number" class="input namefild" name="telephone" value="{{ isset($user) ? $user[0]['telephone'] : ''}}"  required>
                              </div>
                              @if(Auth::check())
                                <div class="form-row">
                                  <label class="lebel-abs">
                                    Position
                                    <strong class="red">
                                      *
                                    </strong>
                                  </label>
                                  <select class="form-control form-date" id="position" {{isset($user)?'disabled':''}} name="typeofuser" style="padding-left: 100px;height: 7%;margin-left: 0px">
                                    <option value="4" {{ isset($user) && $user[0]['typeofuser'] == 4 ? 'selected' : ""}} >Customer</option>
                                    <option value="3" {{ isset($user) && $user[0]['typeofuser'] == 3 ? 'selected' : ""}}>Shipper</option>
                                    <option value="2" {{ isset($user) && $user[0]['typeofuser'] == 2 ? 'selected' : ""}}>Employee</option>
                                    <option value="1" {{ isset($user) && $user[0]['typeofuser'] == 1 ? 'selected' : ""}}>Admin</option>
                                  </select>
                                </div>                                                            
                              @endif
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-6">
                            <div class="your-details">
                              <h5>
                                Your UserName
                              </h5>                              
                              <div class = "col-md-12" id="images-to-upload">
                                @if(isset($user))
                                  <img id="avatar" src="http://localhost/{{$user[0]['mediaID']}}" class="img-circle" alt="Cinque Terre" style="margin-left: 150px;margin-bottom: 17px;border: #cccccc solid 1px;width:80px;height:103px">                               
                                @else
                                  <img id="avatar" src="{{asset('images/images.jpg')}}" class="img-circle" alt="Cinque Terre" style="margin-left: 150px;margin-bottom: 17px;border: #cccccc solid 1px;width:80px;height:103px">                               
                                @endif                                
                              </div>
                              <div class="form-row" style="margin-top: 15px">
                                    <label class="lebel-abs">
                                      Avatar
                                      <strong class="red">
                                        *
                                      </strong>
                                    </label>
                                    <input type="file" name="pictures" class="input namefild form-file" id="images">
                                  </div>
                              <div class="form-row">                                  
                                  <label class="lebel-abs">
                                    UserName
                                    <strong class="red">
                                      *
                                    </strong>
                                  </label>
                                  @if(!isset($user))
                                    <input type="text" class="input namefild" style="padding-left: 120px;" name="username" value="{{ isset($user) ? $user[0]['username'] : ''}}" required>
                                  @else
                                    <input type="text" class="input namefild" style="padding-left: 120px;" disabled name="username" value="{{ isset($user) ? $user[0]['username'] : ''}}" >
                                  @endif
                                </div>
                                @if(!isset($user))
                                  <div class="form-row">
                                    <label class="lebel-abs">
                                      Password 
                                      <strong class="red">
                                        *
                                      </strong>
                                    </label>
                                    <input type="password" class="input namefild" name="password" required>
                                  </div>
                                  <div class="form-row">
                                    <label class="lebel-abs">
                                      RePassword 
                                      <strong class="red">
                                        *
                                      </strong>
                                    </label>
                                    <input type="password" class="input cpass" style="padding-left: 120px;" name="confpassword" required>
                                  </div> 
                                @endif                             
                              <button type="submit" style="float: right;position: absolute;top: 365px;right: 16px">
                                Continue
                              </button>                              
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </li>
                  <li class="steps">
                    <a href="checkout2" class="step-title">
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
    <script type="text/javascript">
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $('#avatar').click(function(){
          $('#images').click();
        });

        var fileCollection = new Array();
        $('#images').on('change',function(e){

          var files = e.target.files;

          $.each(files, function(i, file){

            fileCollection.push(file);

            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){
              var template = '<img src="'+e.target.result+'" class="img-circle" alt="Cinque Terre" style="margin-left: 150px;margin-bottom: 17px;border: #cccccc solid 1px;width:80px;height:103px">';              
              $('#images-to-upload').html(template);
            };
          });
        });

      });
    </script>
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
</>