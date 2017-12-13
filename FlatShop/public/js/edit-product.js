$('.edit').click(function(){
  var id = $(this).attr('id');
  $.ajax({
    url: 'edit-product='+id,
    type: 'get',
    dataType: 'json',
    success: function(result){           
      $('#pictures').attr('src','http://localhost/'+result.product[0]['pictures']);
      $('#namePrd').val(result.product[0]['productname']);
      $('#desPrd').val(result.product[0]['desciption']);
      $('#pricePrd').val(result.product[0]['price']);
      $('#salePrd').val(result.product[0]['saleprice']);
      $('.quantumPrd').val(result.product[0]['quantuminstock']);
      $('#position').val(result.product[0]['categoryID']);
      $('#owner').val(result.product[0]['ownerID']);
      $('.prdID').val(result.product[0]['productID']);                    
      $('#add').click(); 
    }
  });
});      