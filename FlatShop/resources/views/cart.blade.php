
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
        <div class="container shopping-cart">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title">
                Giỏ hàng
              </h3>
              <div class="clearfix">
              </div>
              <table class="shop-table">
                <thead>
                  <tr>
                    <th>
                      Hình ảnh
                    </th>
                    <th>
                      Chi tiết
                    </th>
                    <th>
                      Gía
                    </th>
                    <th>
                      Số lượng
                    </th>
                    <th>
                      Gía
                    </th>
                    <th>
                      Xóa
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php                                                             
                   $ls_order = App\Order::where('userID',Auth::check() ? Auth::id() : Cookie::get('user_ip'))->where('isActive',1)->orderBy('orderID','desc')->limit(Cookie::get('amount'))->get();
                   $total = 0;
                   if(count($ls_order) > 0){
                      foreach($ls_order as $order){
                        $prd = App\Product::find($order->productID);
                        $price = (int)$prd->price * (int)$order->amount;
                        $total+= $price;                                            
                        ?>
                        <tr> 
                          <td><img src="{{$prd->pictures}}" alt=""></td>
                          <td>
                            <div class="shop-details">
                              <div class="productname">{{$prd->productname}}</div>
                              <p>
                                <img alt="" src="images/star.png">
                                <a class="review_num" href="#">02 Đánh giá</a>
                              </p>
                              <div class="color-choser">
                                <span class="text">Màu sản phẩm : </span>
                                <ul>
                                  <li><a class="black-bg " href="#">black</a></li>
                                  <li><a class="red-bg" href="#">light red</a></li>
                                </ul>
                              </div>
                              <p>Mã sản phẩm : <strong class="pcode">Dress 120</strong></p>
                            </div>
                          </td>
                          <td><h5>${{$prd->price}}</h5></td>
                          <td>
                            <select name="">
                              <option value="1" {{$order->amount== "1"?'selected':''}}>1</option>
                              <option value="2" {{$order->amount== "2"?'selected':''}}>2</option>
                              <option value="3" {{$order->amount== "3"?'selected':''}}>3</option>
                            </select>
                          </td>
                          <td><h5><strong class="red">${{$price}}</strong></h5></td>
                          <td><a href="/delete-order?id={{$order->orderID}}"><img src="images/remove.png" alt=""></a></td>
                        </tr>
                        <?php
                      }
                   }else{
                      echo '<tr><td class="btn-warning"><h3>Bạn Chưa Order Sản Phẩm Nào.</h3></td></tr>';
                   }                   
                  ?>                  
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="6">
                      <a href="/Trang-Chu"><button class="pull-left">
                        Tiếp tục mua hàng
                      </button></a>                      
                    </td>
                  </tr>
                </tfoot>
              </table>
              <div class="clearfix">
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <div class="shippingbox">
                    <h5>
                      Mã giảm giá
                    </h5>
                    <form>
                      <label>
                        Nhập mã phiếu giảm giá của bạn nếu bạn có
                      </label>
                      <input type="text" name="">
                      <div class="clearfix">
                      </div>
                      <button>
                        Nhận ưu đãi
                      </button>
                    </form>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="shippingbox">                    
                    <div class="grandtotal">
                      <h5>
                        Tổng Tiền 
                      </h5>
                      <span>
                        ${{$total}}
                      </span>
                    </div>
                    <button id="pay">
                      Thanh Toán
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <script type="text/javascript">
            $(document).ready(function(){          
              $('#pay').click(function(){
                var total = '{{$total}}'; 
                if(total == '0'){
                  alert('Bạn chưa mua hàng');
                }else{
                  var type = {{$type}}
                  if(type == 0){
                       if(confirm('Bạn có muốn đăng nhập?')){
                          document.location = '/login';   
                       }else{
                          $('#openModal').click();
                       }
                    }else{       
                      alert("Đặt Hàng Thành Công.");             
                      var total = {{$total}};
                      $.ajax({
                        beforeSend: function () {
                            $('.close').click();
                            $('body').html('<body style="style="background: #434343"><h2 align="center">Đang xử lý ...</h2></body>');                          
                        },
                        type : 'GET',
                        url  : '/add-bill', 
                        data: {total:total},                     
                        success:  function(result)
                        {        
                            document.location = '/mail='+result;                        
                        }
                       });                     
                    }
                  }
                return false;
              });
            });
          </script>
          <button type="button" style="display: none" id="openModal" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Thông tin khách hàng</h4>
                </div>
                <form class="modal-body" method="post" id="update_user">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-row">
                    <label class="lebel-abs">
                      Tên  
                      <strong class="red">
                        *
                      </strong>
                    </label>
                    <input type="text" class="input namefild" name="nameOrder" id="nameOrder" required>                    
                  </div>
                  <div class="form-row">
                    <label class="lebel-abs">
                      Địa chỉ
                      <strong class="red">
                        *
                      </strong>
                    </label>
                    <input type="text" class="input namefild" name="address" required> 
                  </div>
                  <div class="form-row">
                    <label class="lebel-abs">
                      Số điện thoại
                      <strong class="red">
                        *
                      </strong>
                    </label>
                    <input type="number" class="input namefild" name="telephone" required>
                  </div>
                  <div class="form-row">
                    <label class="lebel-abs">
                      Email
                      <strong class="red">
                        *
                      </strong>
                    </label>
                    <input type="email" class="input namefild" name="email">
                  </div>
          
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success" >Đặt Hàng</button>
                </div>
              </div>
            </form> 
            </div>

          <script type="text/javascript">
            $(document).ready(function(){
               $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
              }); 

              $("#update_user").validate({          
                   submitHandler: submitFormUpdateUser
              });              
              function submitFormUpdateUser(){                      
                  var id = "<?php echo Cookie::get('user_ip')?>";  
                  var total = {{$total}};                                              
                  var data = $('#update_user').serialize()+'&total='+total;
                  alert("Đặt Hàng Thành Công.");                                    
                  $.ajax({
                      beforeSend: function () {
                          $('.close').click();
                          $('body').html('<body style="style="background: #434343"><h2 align="center">Đang xử lý ...</h2></body>');                          
                      },
                      type : 'POST',
                      url  : '/add-bill?id='+id,
                      data : data,                                        
                      success:  function(data)
                      {        
                        if(data != ""){                          
                          document.location = '/mail='+data;
                        }                                                         
                      }
                  });
                  return false;
              }       
            });
          </script>
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
      <div class="clearfix"></div>
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