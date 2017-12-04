$(document).on('click','.manager',function(){                  
  var type = <?php echo Cookie::get('login') ?>;                       
  if(type == 0){
     if(confirm('Bạn có muốn đăng nhập?')){
        document.location = '/login';   
     }
  }else{
     document.location = '/manager';
  }
});