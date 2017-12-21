<!DOCTYPE >
  <head>
    <meta http-equiv="Content-Type" content="text/;charset=utf-8"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>
      Chào mừng đến FlatShop
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
      @if($_SERVER['REQUEST_URI']=='/dang-ki')     
        @include('header');
      @else
        @include('header_manager');
      @endif

      <div class="clearfix">
      </div>
      <div class="container_fullwidth">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="special-deal leftbar" style="margin-top:0;">
                <h4 class="title">
                  <strong>
                    Ưu đãi 
                  </strong>
                   Đặc biệt
                </h4>
                <?php $ls_product = App\Product::orderBy('productID','desc')->limit(3)->get()?>
                @foreach($ls_product as $product)
                  <div class="special-item">
                  <div class="product-image">
                    <a href="details={{$product->productID}}">
                      <img src="{{$product->pictures}}" alt="">
                    </a>
                  </div>
                  <div class="product-info">
                    <p>
                      <a href="details">
                        {{$product->productname}}
                      </a>
                    </p>
                    <h5 class="price">
                      ${{$product->price}}
                    </h5>
                  </div>
                </div>
                @endforeach                
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
                      Mẫu mới
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Chất liệu đẹp
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Cửa hàng FlatShop
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Gía rẻ
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Hàng mới về
                    </a>
                  </li>
                </ul>
              </div>              
            </div>              
            <div class="col-md-9">
              <div class="login-page">
                <ol class="login-steps">
                  <li class="steps">
                    <div class="step-title">
                      01. Tùy chọn đăng nhập
                    </div>
                  </li>
                  <li class="steps active">
                    <a class="step-title">
                      02. Thông tin thanh toán
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
                                Thông tin cá nhân
                              </h5>
                              <div class="form-row">
                                <label class="lebel-abs">
                                  Họ 
                                  <strong class="red">
                                    *
                                  </strong>
                                </label>
                                <input type="text" class="input namefild" name="firstname" value="{{ isset($user) ? $user[0]['firstname'] : ''}}" required>
                              </div>
                              <div class="form-row">
                                <label class="lebel-abs">
                                  Tên  
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
                                  Ngày sinh                                  
                                </label>                                
                                <input type="date" class="input namefild form-date" name="dateofbirth" value="{{ isset($user) ? $user[0]['dateofbirth'] : ''}}">
                              </div>
                              <div class="form-row">
                                <label class="lebel-abs">
                                  Địa chỉ
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
                                  Số điện thoại
                                  <strong class="red">
                                    *
                                  </strong>
                                </label>
                                <input type="number" class="input namefild" name="telephone" value="{{ isset($user) ? $user[0]['telephone'] : ''}}"  required>
                              </div>
                              @if(Auth::check())
                                <div class="form-row">
                                  <label class="lebel-abs">
                                    Chức vụ
                                    <strong class="red">
                                      *
                                    </strong>
                                  </label>
                                  <select class="form-control form-date" id="position" {{isset($user)?'disabled':''}} name="typeofuser" style="padding-left: 100px;height: 7%;margin-left: 0px">
                                    <option value="4" {{ isset($user) && $user[0]['typeofuser'] == 4 ? 'selected' : ""}} >Khách hàng</option>
                                    <option value="3" {{ isset($user) && $user[0]['typeofuser'] == 3 ? 'selected' : ""}}>Nhân viên giao hàng</option>
                                    <option value="2" {{ isset($user) && $user[0]['typeofuser'] == 2 ? 'selected' : ""}}>Nhân viên bán hàng</option>                                    
                                  </select>
                                </div>                                                            
                              @endif
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-6">
                            <div class="your-details">
                              <h5>
                                Tài khoản
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
                                      Ảnh đại diện
                                      <strong class="red">
                                        *
                                      </strong>
                                    </label>
                                    <input type="file" name="pictures" class="input namefild form-file" id="images">
                                  </div>
                              <div class="form-row">                                  
                                  <label class="lebel-abs">
                                    Tên tài khoản
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
                                      Mật khẩu
                                      <strong class="red">
                                        *
                                      </strong>
                                    </label>
                                    <input type="password" class="input namefild" name="password" required>
                                  </div>
                                  <div class="form-row">
                                    <label class="lebel-abs">
                                      Nhập lại mật khẩu
                                      <strong class="red">
                                        *
                                      </strong>
                                    </label>
                                    <input type="password" class="input cpass" style="padding-left: 120px;" name="confpassword" required>
                                  </div> 
                                @endif                             
                              <button type="submit" style="float: right;position: absolute;top: 365px;right: 16px">
                                Tiếp tục
                              </button>                              
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </li>
                  <li class="steps">
                    <a class="step-title">
                      03. Thông tin vận chuyển
                    </a>
                  </li>
                  <li class="steps">
                    <a class="step-title">
                      04. Phương thức vận chuyển 
                    </a>
                  </li>
                  <li class="steps">
                    <a class="step-title">
                      05. Thông tin sau khi thanh toán 
                    </a>
                  </li>
                </ol>
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
        </div>
      </div>
      <div class="clearfix">
      </div>
      @include('footer');
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