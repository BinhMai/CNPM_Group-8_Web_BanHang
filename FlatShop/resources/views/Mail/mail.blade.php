<?php 
	$bill = App\Bill::find($id);
?>
@if($bill->shipper == null)
	Cám ơn bạn đã mua hàng tại flatshop.com</br>
	Mời bạn xác nhận để đơn hàng có thể chuyển đến với bạn một cách sớm nhất.</br>
	<a href="localhost/bill={{$id}}">Xác Nhận</a>
@else
	Bạn có 1 đơn hàng mới cần giao. </br>Vui lòng xác nhận sau khi giao hàng xong.</br>
	<a href="localhost/bill={{$id}}">Thông tin chi tiết</a>
@endif