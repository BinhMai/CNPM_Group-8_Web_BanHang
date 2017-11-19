<div class="modal fade" id="addproduct" role="dialog">
    <div class="modal-dialog" style="margin-left: 280px">
      <div class="modal-content" style="width: 850px">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{isset($product) ? 'Edit Product' : 'Add New Product'}}</h4>
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
                    <div class = "col-md-12" id="images-to-upload" style="border: #cccccc solid 1px;padding-top: 15px;">
                      @if(isset($product))
                        <img id="pictures" src="http://localhost/{{$product[0]['pictures']}}" alt="Cinque Terre" style="margin-bottom: 20px;width:500px;height:262px">                               
                      @else
                        <img id="pictures" src="{{asset('images/slider-image-01.png')}}" alt="Cinque Terre" style="margin-bottom: 20px;width:500px;height:262px">
                      @endif                                
                    </div>
                    <div class="form-row" style="margin-top: 15px">
                      <label class="lebel-abs">
                        Pictures
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
                        Name 
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <input type="text" class="input namefild" style="margin-top: 8px;" name="prdname" value="{{ isset($product) ? $product[0]['productname'] : ''}}" required>
                    </div>
                    <div class="form-row">
                      <label class="lebel-abs">
                        Desciption
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <textarea type="text" class="input namefild" name="desciption" value="{{ isset($product) ? $product[0]['desciption'] : ''}}" required> </textarea>
                    </div>                    
                    <div class="form-row">
                      <label class="lebel-abs">
                        Price
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <input type="number" class="input namefild" name="price" value="{{ isset($product) ? $product[0]['price'] : ''}}"  required>
                    </div>
                    <div class="form-row">
                      <label class="lebel-abs">
                        Sale Price                        
                      </label>
                      <input type="number" class="input namefild" name="saleprice" value="{{ isset($product) ? $product[0]['saleprice'] : ''}}">
                    </div>
                    <div class="form-row">
                      <label class="lebel-abs">
                        Quantum
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <input type="number" class="input namefild" name="quantuminstock" value="{{ isset($product) ? $product[0]['quantuminstock'] : ''}}"  required>
                    </div>
                    <div class="form-row">
                      <label class="lebel-abs">
                        Category
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <select class="form-control form-date" id="position" name="category" style="padding-left: 100px;height: 9%;margin-left: 0px">
                        <option value="A" {{ isset($product) && $product[0]['categoryID'] == 'A' ? 'selected' : ""}} >A</option>
                        <option value="B" {{ isset($product) && $product[0]['categoryID'] == 'B' ? 'selected' : ""}}>B</option>
                        <option value="C" {{ isset($product) && $product[0]['categoryID'] == 'C' ? 'selected' : ""}}>C</option>
                        <option value="D" {{ isset($product) && $product[0]['categoryID'] == 'D' ? 'selected' : ""}}>D</option>
                      </select>
                    </div>                                                            
                    <div class="form-row">
                      <label class="lebel-abs">
                        Owner
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <select class="form-control form-date" id="owner" name="owner" style="padding-left: 100px;height: 9%;margin-left: 0px">
                        <option value="A" {{ isset($product) && $product[0]['ownerID'] == 'A' ? 'selected' : ""}} >A</option>
                        <option value="B" {{ isset($product) && $product[0]['ownerID'] == 'B' ? 'selected' : ""}}>B</option>
                        <option value="C" {{ isset($product) && $product[0]['ownerID'] == 'C' ? 'selected' : ""}}>C</option>
                        <option value="D" {{ isset($product) && $product[0]['ownerID'] == 'D' ? 'selected' : ""}}>D</option>
                      </select>
                    </div>                                                            
                    <button type="submit" style="float: right;position: absolute;top: 395px ;right: 20px">
                      Continue
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right: 110px;border-radius: 10px">Close</button>
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
          var url = '';          
          var check = {{$type}};                            

          if(check == 0){              
            url = 'add-product';
          }else{            
            id = '{{$product[0]["productID"]}}';
            url = '/edit-product?productID='+id;                      
          }         

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
                  document.location = "http://localhost/list-product";            
                }
            });
            return false;
        }



      });
    </script> 