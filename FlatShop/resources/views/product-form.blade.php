<div class="modal fade" id="addproduct" role="dialog">
    <div class="modal-dialog" style="margin-left: 280px">
      <div class="modal-content" style="width: 850px">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm sản phẩm</h4>
        </div>
        <div class="modal-body" style="padding: 20px 20px 0px 20px">
          <form id="product-form" action="@php                               
                              if($type == 1){
                                $productID = $product[0]['productID'];
                                echo '/edit-product?productID='.$productID;
                              }else 
                                echo 'add-product';
                          @endphp" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="your-details">  
                    <input type="text" value="0" class="prdID" hidden>                  
                    <div class = "col-md-12" id="images-to-upload" style="border: #cccccc solid 1px;padding-top: 15px;">
                      @if(isset($product))
                        <img id="pictures" src="http://localhost/{{$product[0]['pictures']}}" alt="Cinque Terre" style="margin-bottom: 20px;width:500px;height:262px">                               
                      @else
                        <img id="pictures" src="{{asset('images/slider-image-01.png')}}" alt="Cinque Terre" style="margin-bottom: 20px;width:500px;height:262px">
                      @endif                                
                    </div>
                    <div class="form-row" style="margin-top: 15px">
                      <label class="lebel-abs">
                        Hình ảnh
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <input type="file" name="pictures" class="input namefild form-file" id="images">
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="your-details">                            
                      <div class="form-row">
                      <label class="lebel-abs">
                        Tên
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <input type="text" id="namePrd" class="input namefild" style="margin-top: 8px;" name="prdname" required>
                    </div>
                    <div class="form-row">
                      <label class="lebel-abs">
                        Mô tả
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <textarea type="text" id="desPrd" class="input namefild" name="desciption" required></textarea>
                    </div>                    
                    <div class="form-row">
                      <label class="lebel-abs">
                        Gía
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <input type="number" id="pricePrd" class="input namefild" name="price" required>
                    </div>
                    <div class="form-row">
                      <label class="lebel-abs">
                        Giảm giá                        
                      </label>
                      <input type="number" id="salePrd" class="input namefild" name="saleprice">
                    </div>
                    <div class="form-row">
                      <label class="lebel-abs">
                        Số lượng
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <input type="number" class="input namefild quantumPrd" name="quantuminstock" required>
                    </div>
                    <?php 
                      $ls_category = App\Category::all();                      
                    ?>
                    <div class="form-row">
                      <label class="lebel-abs">
                        Loại mặt hàng
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <select class="form-control form-date" id="position" name="category" style="padding-left: 100px;height: 9%;margin-left: 0px">  
                        <?php 
                          for ($i = 0; $i <count($ls_category); $i++) {
                              ?>
                              <option value={{($i+1)}}>{{$ls_category[$i]['name']}}</option>
                              <?php
                          }                     
                        ?>                                            
                      </select>
                    </div>                                                            
                    <div class="form-row" hidden="true">
                      <label class="lebel-abs">
                        Mã chủ shop
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <select class="form-control form-date" id="owner" name="owner" style="padding-left: 100px;height: 9%;margin-left: 0px">
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=4>4</option>
                      </select>
                    </div>                                                            
                    <button type="submit" style="float: right;position: absolute;top: 395px ;right: 20px">
                      Tiếp tục
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right: 110px;border-radius: 10px">Đóng</button>
        </div>
      </div>
    </div>
 </div>
 <script type="text/javascript">
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
          }
        });     
        $('.close').click(function(){
          location.reload();
        });        
        
        if($('#prdID').val() != 0)          
          $('.modal-title').text('Sửa sản phẩm');          

        var fileCollection = new Array();
        $('#images').on('change',function(e){

          var files = e.target.files;

          $.each(files, function(i, file){

            fileCollection.push(file);

            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){
              var template = '<img src="'+e.target.result+'" alt="Cinque Terre" style="margin-bottom: 20px;width:500px;height:262px">';              
              $('#images-to-upload').html(template);
            };
          });
        });  

        $('#pictures').click(function(){
          $('#images').click();
        });               

        $("#product-form").validate({          
             submitHandler: submitForm
        });
        function submitForm(){ 
          var id = $('.prdID').val();           
          if(id == 0)              
            url = 'add-product';
          else                       
            url = '/edit-product?productID='+id;                               

          var form = $('#product-form')[0];
          var formData = new FormData(form);                

            $.ajax({
                type : 'POST',
                url  : url,
                data : formData,
                contentType: false,
                processData: false,
                success:  function(data)
                {                                          
                  location.reload();
                }
            });
            return false;
        }
      });
    </script> 