<head>
  <title>Chào mừng đến FlatShop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  th{
    text-align: center;
    border: #e6dbea solid 1px !important;
  }
  body{
  	margin: 50px 150px;
  	background-color: white;
  }
  .content{
  	border: 4px solid #00E5EE;
  	border-style: double;
    border-width: thick;
  }
  .table > thead > tr > th{
    background: #cfe8dd !important;
    border: #00E5EE solid 1px !important;
}
.table > tbody > tr > td{
    border: #00E5EE solid 1px !important;   
}
</style>
<?php 
	$bill = App\Bill::find($id);
    $ls_product =  App\Bill::find($id)->ProductBill()->get();
?>
<body>
	<div class="content" style="font-family: bold,Times New Roman">
		<div class="col-md-12" style="border-bottom: 2px solid #00E5EE; margin-top: 15px">
	    	<div class="col-md-4">
            	<img src="images/logo.png" alt="FlatShop" style="background-color:black"></a>
            	<p style="font-size: 15px">Số 08, Nguyễn Trãi, Hà Nội , Việt Nam</p>
               <p style="font-size: 15px">Số điện thoại : (084) 1900 1008</p>
               <p style="font-size: 15px">Email : flatshop@gmail.com</p>
	    	</div>
	    	<div class="col-md-5" align="center" style="padding-bottom: 30px">
				<h2 align="center" style="font-family:bold;color: #00E5EE; ">Hóa Đơn Bán Hàng</h2>
				<p align="center" style="margin-top: 10px;font-size: 20px">Ngày ..... Tháng ..... Năm .......</p>
			</div>
			<div class="col-md-3" >
				<p style="font-size: 18px;padding-top: 15px">Số seri : ............................</p>
				<p style="font-size: 18px">Số hóa đơn : ......................</p>
			</div>
		</div>
		<div class="col-md-12" style="border-bottom: 2px solid #00E5EE">
			<div style="margin:20px">
				<p style="font-size: 20px">Tên khách hàng : {{$bill->name}}</p>
				<p style="font-size: 20px">Địa chỉ : {{$bill->adress}}..................  SĐT : 0{{$bill->telephone}}</p>
			</div>
		</div>
		<table class="table table-striped" style="font-size: 18px;font-family: Times New Roman;border-bottom: 2px solid #00E5EE">
			<thead>
			 <tr style="font-size:20px">
			 	<th>STT</th>
				<th>Tên sản phẩm</th>	
				<th>Thông tin</th>	
				<th>Giá</th>	
				<th>Số lượng</th>
		  	</tr>
			</thead>
			<tbody>
				<?php $total=0; $count=0?>
				@foreach($ls_product as $product)
				<tr>
					<?php 
						$amount = App\Order::where('bill_ID',$bill->bill_ID)->where('productID',$product->productID)->pluck('amount')->first();
						$total+= (int)$product->price * (int)$amount;
						$count = $count + 1;
					?>	
					<td>{{$count}}</td>			
					<td>{{$product->productname}}</td>
					<td>{{$product->desciption}}</td>
					<td>{{$product->price}}</td>
					<td>{{$amount}}</td>
				</tr>			
				@endforeach
				<tr>
					<td colspan="6">TỔNG CỘNG : {{$total }}(Vnđ)</td>
				</tr>
				<tr>
					<td colspan="6">Bằng chữ : .........................................................................</td>
				</tr>
			</tbody>
		</table>	
		<span style="margin-bottom: 2px; padding-left: 180px;font-size: 20px" class="col-md-4">Khách hàng</span>
		<span style="margin-bottom: 2px; padding-left: 100px;font-size: 20px" class="col-md-4">Người giao hàng</span>
		<span style="margin-bottom: 2px; padding-left: 100px;font-size: 20px" class="col-md-4">Người lập hóa đơn</span>
		<span align='left' style="margin-bottom: 2px; padding-left: 160px;font-size: 15px">(Ký và ghi rõ họ tên)</span>
		<span align='center' style="margin-bottom: 2px; padding-left: 160px;font-size: 15px">(Ký và ghi rõ họ tên)</span>
		<span align='right' style="margin-bottom: 2px; padding-left: 235px;font-size: 15px">(Ký và ghi rõ họ tên)</span>
		<br><br><br><br><br><br><br><br>
		<button class="btn btn-danger" style="float: right;margin: 10px 20px 40px 0px">Hủy Đơn Hàng</button>
		<button class="btn btn-success" style="float: right;margin: 10px">Xác Nhận</button>
	</div>
</body>