<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php 
	$bill = App\Bill::find($id);
    $ls_product =  App\Bill::find($id)->ProductBill()->get();
?>

<div class="container-fuild">
	<h2 align="center">Hóa Đơn</h2>
	<span style="margin-left: 20px">Tên : </span><span>{{$bill->name}}</span>
	<br>
	<span style="margin-left: 20px">Địa chỉ nhận hàng : </span><span>{{$bill->adress}}</span>
	<br>
	<h2 align="center" style="color: #e671dd">Danh Sách Sản Phẩm</h2>
	<table class="table table-striped">
		<thead>
		 <tr>
			<th>Tên sản phẩm</th>	
			<th>Thông tin</th>	
			<th>Giá</th>	
			<th>Số lượng</th>
	  	</tr>
		</thead>
		<tbody>
			<?php $total=0;?>
			@foreach($ls_product as $product)
			<tr>
				<?php 
					$amount = App\Order::where('bill_ID',$bill->bill_ID)->where('productID',$product->productID)->pluck('amount')->first();
					$total+= (int)$product->price * (int)$amount;
				?>				
				<td>{{$product->productname}}</td>
				<td>{{$product->desciption}}</td>
				<td>{{$product->price}}</td>
				<td>{{$amount}}</td>
			</tr>			
			@endforeach
		</tbody>
	</table>
	<span style="float: right;margin-right: 50px; font-size: 20px">{{$total }}(Vnđ)</span>
	<span style="float: right;font-size: 20px">Tổng: </span>
	<br>		
	<button class="btn btn-danger" style="float: right;margin: 10px 20px 40px 0px">Hủy Đơn Hàng</button>
	<button class="btn btn-success" style="float: right;margin: 10px">Xác Nhận</button>

</div>