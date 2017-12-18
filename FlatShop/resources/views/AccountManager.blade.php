
<!DOCTYPE html>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
	<section style="margin: 15px">
		<div class="container-fluid">
			<h2>Danh sách tài khoản</h2>
			<a href="{{asset('/dang-ki')}}"><button id="add" class="btn btn-success" data-toggle="modal" data-target="#addproduct"  style="float: right;margin-bottom: 10px;margin-right: 7px;"><span class="glyphicon glyphicon-plus"></span></button></a>
			<form style="float:right; margin-right: 5px;">
				<input class="search-submit" type="submit" value=""><input class="search" placeholder="Search employee..." type="text" value="" name="search">
			</form>
			
			@include('product-form');
			
		  <table class="table table-striped">
			<thead>
			  <tr>
        <th>Ảnh đại diện</th>  
				<th>Tên</th>				
        <th>Tên tài khoản</th>
				<th>Email</th>
        <th>Số điện thoại</th>
        <th>Chức vụ</th>        
				<th>Lựa chọn</th>
			  </tr>
			</thead>
			<tbody>
            @foreach($ls_account as $acc)
				      <tr>          
                <td><img src="http://localhost/{{$acc->mediaID}}" class="img-circle" alt="Cinque Terre" style="border: #cccccc solid 1px;width:40px;height:40px"></td>
                <td>{{$acc->firstname}} {{$acc->lastname}} </td>                
                <td>{{$acc->username}}</td>
                <td>{{$acc->email}}</td>
                <td>{{$acc->telephone}}</td>
                <td>
                  @if($acc->typeofuser == 1)
                    {{'Admin'}}
                  @elseif($acc->typeofuser == 3)
                    {{'Nhân viên giao hàng'}}
                  @elseif($acc->typeofuser == 2)
                    {{'Nhân viên bán hàng'}}
                  @else
                    {{'Khách hàng'}}
                  @endif
                </td>                  
                <td style="width: 8%;">
                  <a href="dang-ki={{$acc->userID}}"><button class="edit btn btn-primary addAcc" style="float: right;margin-left: 5px;padding: 10px"><span class="glyphicon glyphicon-edit"></span></button></a>
                  <button id="{{$acc->userID}}" class="btn btn-danger delete" style="float: right;padding: 10px"><span class="glyphicon glyphicon-trash"></span></button>
                </td>		
				      </tr>			
          @endforeach     	  
			</tbody>
		  </table>
		</div>
    @if(isset($ls_account))
        <div class="col-md-6" style="margin-top: 10px;margin-left: 550px">
          {{$ls_account->links()}}
        </div>    
    @endif  
	</section>	
  <div class="clearfix"></div>
  @include('footer');
  <script type="text/javascript">
    $('.delete').click(function(){
        var id = $(this).attr('id');        

        $.ajax({
          url : 'delete-user?id='+id,
          type: 'get',
          success: function(){          
            document.location= "http://localhost/list-account";                       
          }
        });
      });
  </script>
</body>
</html>