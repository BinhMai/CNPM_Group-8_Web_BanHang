$.getJSON('//freegeoip.net/json/?callback=?', function(data) {
    var data = JSON.stringify(data, null, 2);
    var obj = JSON.parse(data);               
   user_ip = obj['ip'];                               
 
    $('.add-cart').click(function(){                       
       var id_prd_string =$(this).attr('id');
       var id_prd = id_prd_string.substr(6,id_prd_string.length-6);                              
       var v = $('.cart_no').text();
       if(v == ''){
          v = '0';
       }
       var v1 = parseInt(v)+1;                              
       if(v1 < 10)
          var string = '0'+v1;                  
       else
          var string = v1;                                

      $.ajax({
          url: '/add-order',
          type: 'post',
          data: {id_prd: id_prd,am_before:v,am_after:v1,user_ip: user_ip},
          dataType: 'json',
          success:function(data){   
            console.log(data);            
            $('.cart_no').text(data.amount);
            if(data.status = "OK"){
                var id = data['prd']['productID'];            
                $('.button_group_'+id).html('<a href="/cart"><button class="button">Go to Cart</button></a><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button>');                                
                if(data.amount < 4){
                  $('ul.option-cart-item div.list-order').append('<li><div class="cart-item"><div class="image"><img src="'+data['prd']['pictures']+'" alt=""></div><div class="item-description"><p class="name">'+data['prd']['productname']+'</p><p>Size: <span class="light-red">One size</span><br>Quantity: <span class="light-red">01</span></p></div><div class="right"><p class="price" style="margin-top: -3em">$'+data['prd']['price']+'</p><a href="/delete-order?id='+data['orderID']+'" class="remove"><img src="images/remove.png" alt="remove"></a></div></div></li>');                  
                  var string = $('#total').text();   
                  if(string == ''){
                    string = '$0';
                  }                  
                  var total = parseInt(string.substr(1,string.length-1))+data['prd']['price'];                                 
                  $('ul.option-cart-item div.total-cart').html('<li><span class="total" style="margin-left: 56px;padding-top: 0px">Total <strong id="total">$'+total+'.00</strong></span><a href="/cart"><button class="checkout" style="margin-top: 8px">CheckOut</button></a></li>');
                }
            }            
          }
       });                           
    });
 }); 