<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	#formbill{
		margin-top: 50px;
		border: #fbe3f1 solid 1px;
		height: auto;
		width: 50%;
		position: absolute;
		left: 27%;
		background: #f1e887;
	}

</style>

<div id="formbill">
	<h2 align="center">Hóa Đơn</h2>
	<span style="margin-left: 20px">Tên : </span><span>Hoàng Xuân Bình</span>
	<br>
	<span style="margin-left: 20px">Địa chỉ nhận hàng : </span><span>Phùng Khoang-Hà Nội</span>
	<br>
	<h2 align="center" style="color: #e671dd">Danh Sách Sản Phẩm</h2>
	<table class="table table-striped">
		<thead>
		 <tr>
			<th>Name</th>	
			<th>Thông tin</th>	
			<th>Giá</th>	
			<th>Số lượng</th>
	  	</tr>
		</thead>
		<tbody>
			<tr>
				<td>Áo</td>
				<td>Đẹp, rẻ, ok</td>
				<td>100000</td>
				<td>1</td>
			</tr>
			<tr>
				<td>Áo</td>
				<td>Đẹp, rẻ, ok</td>
				<td>100000</td>
				<td>1</td>
			</tr>
			<tr>
				<td>Áo</td>
				<td>Đẹp, rẻ, ok</td>
				<td>100000</td>
				<td>1</td>
			</tr>	  
		</tbody>
	</table>
	<span style="float: right;margin-right: 20px">1000000000$</span>
	<span style="float: right;">Tổng: </span>
	<br>	
	<button class="btn btn-danger" style="float: right;margin: 10px 20px 40px 0px">Hủy Đơn Hàng</button>
	<button class="btn btn-success" style="float: right;margin: 10px">Xác Nhận</button>

</div>