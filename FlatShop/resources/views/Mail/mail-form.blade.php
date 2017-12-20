<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="csrf-token" content="<?= csrf_token() ?>">
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
	@if(Auth::check() && (Auth::user()->typeofuser == 1 || Auth::user()->typeofuser == 2) && $bill->status ==1)
		@php
			$shipper = App\User::where('typeofuser',3)->get();
		@endphp
		<div class="form-group">
			<a href="/list-order=1"><button class="btn btn-success" id="send_bill" style="float: right;margin: 20px">Gửi đơn hàng</button></a>			
		  <select class="form-control" id="sell" style="width: 120px;float: right;margin-top: 20px; margin-bottom: 50px">
		    @foreach($shipper as $ship)
		    	<option>{{$ship->lastname}}</option>
		    @endforeach
		  </select>		
		  <label style="float: right;margin-top: 25px; margin-right: 10px">Lựa chọn người giao hàng</label> 
		</div>	
	@endif
	@if($bill->status == 0)
		<button class="btn btn-danger" id="remove-bill" style="float: right;margin: 10px 20px 40px 0px">Hủy Đơn Hàng</button>
		<button class="btn btn-success" id="confirm-bill" style="float: right;margin: 10px">Xác Nhận</button>	
	@endif

</div>
<script type="text/javascript">
	$(document).ready(function(){
		 $.ajaxSetup({
          headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
          }
        });   
		var id = '{{$id}}';
		$('#remove-bill').click(function(){
			$.ajax({
				url: '/remove-bill='+id,
				type: 'get',
				success: function(){
					alert('Hủy đơn hàng thành công');
					window.location = '/';
				}
			});
			return false;
		});		
		$('#confirm-bill').click(function(){
			$.ajax({
				url: '/confirm-bill='+id,
				type: 'get',
				success: function(){
					alert('Xác nhận đơn hàng thành công');
					window.location = '/';
				}
			});
			return false;
		});			
		$('#send_bill').click(function(){
			$.ajax({
				beforeSend: function () {                
                  $('body').html('<body style="style="background: #434343"><h2 align="center">Đang xử lý ...</h2></body>');                          
              	},
				url: '/update-bill='+id,
				type: 'get',
				data: {'shipper': $('#sell :selected').text()},
				success: function(data){
					window.location = "/list-order";
				}
			});			
			return false;
		});						
	});
</script>