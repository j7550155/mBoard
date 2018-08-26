
$(document).ready(function() {

$('#registered').on("click",function() {
  $.ajax({
    url:"reg.php",
    type:"POST",
    data:$('#userinf').serialize(),
    error:function () {
      alert("alert fails");
    },
    success:function (res) {
      $('#msg_reg').html(res);
      $('#msg_reg').fadeIn();
      header("Refresh:1;url=index.php");
    }
  })
})

$('#email').on("keyup", function (){
  // email=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
if ($('#email').val().length>=1) {
  $.ajax( {
    url: 'reg.php',
    type: 'post',
    data: {
      email: $('#email').val(),
      method:"checkEmail"
    },
    error: function(xhr) {
      alert('Ajax request fails');
    },
    success: function(res) {
        //if(res=="repeat"){return false;}
        $('#msg_user_name').html(res);
        $('#msg_user_name').fadeIn();
        if(res=="repeat"){return false;}
    }
  });
}else if($('#email').val()==""){
    $("#msg_user_name").html("email格式錯誤！");
    return false;
  }
})
$('#pwd2').on( "blur", function() {
             if($('#pwd2').val() == $('#pwd').val()){
                 $('#msg_pwd2').html("");
             } else {
                 $('#msg_pwd2').html("Password confirmation error");
                 $('#msg_pwd2').fadeIn();
             }
         });


})
