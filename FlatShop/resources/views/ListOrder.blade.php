</html><!DOCTYPE html>
<html lang="en">
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
</head>
<style>
  td,th{
    text-align: center;
    border: #e6dbea solid 1px !important;
  }
</style>
<body>
  @include('header_manager');   
  <section style="margin: 30px">
    <div class="container-fluid">
      <h2 style="margin-bottom: 20px; font-family: Times New Roman,bold">Danh sách đơn hàng</h2>      
      @if($user->typeofuser != 4)
        <a href="/list-order"><button class="btn btn-success">Tất cả</button></a>
        @if($user->typeofuser != 3)
          <a href="/list-order=0"><button class="btn btn-success">Chưa xác nhận</button></a>
        @endif
        <a href="/list-order=1"><button class="btn btn-success">Chưa giao hàng</button></a>
        <a href="/list-order=2"><button class="btn btn-success">Thành công</button></a>
      @endif
      
      <table class="table table-striped" style="margin-bottom: 0px; margin-top: 15px; font-size: 15px;font-family: Times New Roman">
      <thead>
        <tr style="font-family:bold; font-size:18px">
          <th>STT</th>
          <th>Mã đơn hàng</th>
          <th>Tên</th>
          <th>Địa Chỉ</th>
          <th>Số Điện Thoại</th>
          <th>Thời gian đặt hàng</th>       
          <th>Tổng tiền</th>
          <th>Trạng thái</th>
          <th>Lựa chọn</th>          
        </tr>
      </thead>
      <tbody>           
        <?php $total = 0?>
          @foreach($ls_bill as $bill)          
            @if($bill->status == 2)  
              <?php $total+= (int)$bill->price;?>                    
            @endif
            <tr>
            <td>{{$bill->bill_ID}}</td>
            <td>Order_{{$bill->bill_ID}}</td>
            <td>{{$bill->name}}</td>
            <td>{{$bill->adress}}</td>
            <td>{{$bill->telephone}}</td>          
            <td>{{$bill->dateofbirth}}</td>
            <td>{{$bill->price}}</td>          
            <td style="width: 150px;">
              @if($bill->status == 0)                                      
                @if($user->typeofuser == 1 || $user->typeofuser == 4)
                  Chưa xác nhận
                @else              
                  <input type="checkbox" class="bill" id="{{$bill->bill_ID}}" name="status" value="1">
                @endif              
              @elseif($bill->status == 1)
                @if($user->typeofuser == 1 || $user->typeofuser == 2 || $user->typeofuser == 4)              
                  Đang giao hàng
                @else
                  <input type="checkbox" class="bill" id="{{$bill->bill_ID}}" name="status" value="2">
                @endif              
              @else
                Thành công
              @endif
            </td>
            <td><a href="bill={{$bill->bill_ID}}">Chi tiết</a></td>            
          </tr>
          @endforeach               
        </tbody>
        </table>
      @if(count($ls_bill) == 0)          
        <div class="btn-warning" align="center"><h4 style="padding: 5px">Không có đơn hàng nào</h4></div>
      @endif
    </div>
    @if($user->typeofuser == 1)
      <div class="total" hidden style="float: right;margin-right: 30px; margin-top: 30px"><span style="font-size: 20px"><span style="color: red">Doanh Thu: </span>{{$total}} (Vnđ)</span></div>
    @endif
    @if(isset($ls_bill))
        <div class="col-md-6" style="margin-top: 10px;margin-left: 550px">
          {{$ls_bill->links()}}
        </div>    
    @endif  
  </section>
  <div class="clearfix"></div>
  @include('footer');
  <script>
    $(document).ready(function(){     
      $('.bill').click(function(){
        var value = $('.bill').val();
        var id = $(this).attr('id');
        document.location = '/checkorder?val='+value+id;
      });        
      if(window.location.pathname == '/list-order=2')
        $('.total').show();
    });
  </script>
</body>
</html>