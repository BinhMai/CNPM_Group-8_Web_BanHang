
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
  <link href="{{asset('css/mystyle.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
  <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js" type="text/javascript"></script>
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
			<h2 style="margin-bottom: 10px">Danh Sách Sản Phẩm</h2>	
      @if($user->typeofuser == 1 || $user->typeofuser == 2)
			<button id="add" class="btn btn-success" data-toggle="modal" data-target="#addproduct"  style="float: right;margin-right: 17px;"><span class="glyphicon glyphicon-plus"></span></button>
      @endif
			<form style="float:right; margin-right: 5px;margin-bottom: 10px">
				<input class="search-submit" type="submit" value=""><input class="search" placeholder="Tìm kiếm sản phẩm..." type="text" value="" name="search">
			</form>
			
			@include('product-form')      
      <a href="/list-product"><button class="btn btn-danger">Tất cả</button></a>
      <a href="/list-product=Men"><button class="btn btn-danger">Nam</button></a>
      <a href="/list-product=Women"><button class="btn btn-danger">Nữ</button></a>
      <a href="/list-product=Kids"><button class="btn btn-danger">Trẻ em</button></a>
      <a href="/list-product=Watch"><button class="btn btn-danger">Đồng hồ</button></a>
      <a href="/list-product=Jewelry"><button class="btn btn-danger">Trang sức</button></a>
      @if($user->typeofuser == 1 || $user->typeofuser == 2)
        <a href="/list-product=NoActive"><button class="btn btn-danger">Không hoạt động</button></a>
      @endif
			
		  <table class="table table-striped">
			<thead>
			  <tr>
        <th>Ảnh</th>         
				<th>Tên sản phẩm</th>       
        <th>Mô tả</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Thể loại</th>
        <!-- <th>Chủ shop</th> -->        
        <th>Lựa chọn</th>				
			  </tr>
			</thead>
			<tbody>            
        @if(isset($ls_product))
          @foreach($ls_product as $product)
  				  <tr>
            <td style="width: 8%">
              <img src="http://localhost/{{$product->pictures}}" class="img-square" alt="Cinque Terre" style="border: #cccccc solid 1px;width:70px;height:70px">           
            </td>
  					<td>{{$product->productname}}</td>
            <td>{{$product->desciption}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->quantuminstock}}</td>
            <td>{{$product->category->name}}</td>         
            <!-- <td>{{$product->ownerID}}</td> -->             
            @if($_SERVER['REQUEST_URI']!='/list-product=NoActive')
              <td style="width: 120px;">
                @if($user->typeofuser == 1 || $user->typeofuser == 2)                
                  <button class="edit btn btn-primary" id="{{$product->productID}}" style="float: right;margin-left: 5px;margin-right: 9px;padding: 10px"><span class="glyphicon glyphicon-edit"></span></button>
                  <a href="delete-product?id={{$product->productID}}"><button class="btn btn-danger" style="float: right;padding: 10px"><span class="glyphicon glyphicon-trash"></span></button></a>
                @else
                  <a href="delete-product?id={{$product->productID}}"><button class="btn btn-danger" style="padding: 10px"><span class="glyphicon glyphicon-trash"></span></button></a>
                @endif
              </td>
            @else
              <td>
                <a href="re-product?id={{$product->productID}}"><button class="btn btn-warning" style="float: right;padding: 10px"><span class="glyphicon glyphicon-repeat"></span></button></a>
              </td>
            @endif
  				  </tr>				  
          @endforeach       
        @endif
			</tbody>
		  </table>
		</div>

    @if(isset($ls_product))
        <div class="col-md-6" style="margin-top: 10px;margin-left: 550px">
          {{$ls_product->links()}}
        </div>       
    @endif  
	</section>
  <div class="clearfix"></div>
  @include('footer'); 
  <script src="{{asset('/js/edit-product.js')}}"></script>
</body>
</html>