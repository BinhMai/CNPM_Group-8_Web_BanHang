
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>
      Chào mừng đến FlatShop
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
      @include('header');
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
                  <li class="steps active">
                    <a class="step-title">
                      01. Tùy chọn đăng nhập
                    </a>
                    <div class="step-description">
                      <div class="row">
                        <div class="col-md-6 col-sm-6">
                          <div class="new-customer">
                            <h5>
                              Khách hàng mới
                            </h5>
                            <label>
                              <span class="input-radio">
                                <input type="radio" name="user">
                              </span>
                              <span class="text">
                                Tôi muốn đăng ký tài khoản để đăng tin trong FlatShop.
                              </span>
                            </label>
                            <label>
                              <span class="input-radio">
                                <input type="radio" name="user">
                              </span>
                              <span class="text">
                                Địa chỉ gửi hàng và địa chỉ thanh toán của tôi là giống nhau.
                              </span>
                            </label>
                            <p class="requir">
                              Bằng cách tạo một tài khoản, bạn sẽ có thể mua sắm hàng ngày. Bạn luôn được cập nhật về tình trạng của một đơn đặt hàng và theo dõi các đơn đặt hàng mà bạn đã thực hiện trước đó.
                            </p>
                            <a href="dang-ki"><button>Tiếp tục</button></a>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <div class="run-customer">
                            <h5>
                              Vui lòng đăng nhập
                            </h5>
                            <form id="login-form">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                              <div class="form-row">
                                <label class="lebel-abs">
                                  Tên tài khoản 
                                  <strong class="red">
                                    *
                                  </strong>
                                </label>
                                <input style="display: none" type="text" name="oldurl" id="oldurl">
                                <input type="text" class="input namefild" name="user" required>
                              </div>
                              <div class="form-row">
                                <label class="lebel-abs" style="margin-top: 20px">
                                  Mật khẩu 
                                  <strong class="red">
                                    *
                                  </strong>
                                </label>
                                <input type="password" class="input namefild" name="password" style="padding-left: 100px; margin-top: 20px " required>
                              </div>                              
                              <button type="submit" style="margin-top: 20px; float: right;">
                                Đăng nhập
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
                    <a class="step-title">
                      02. Thông tin thanh toán
                    </a>
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
                  <li class="steps">
                    <a class="step-title">
                      06. Xem lại
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