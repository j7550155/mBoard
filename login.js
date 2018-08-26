$(document).ready(function() {

  $('#login').on("click",function() {
    $.ajax({
      url:"login.php",
      type:"POST",
      data:$('#loginForm').serialize(),
      error:function(xhr) {
          alert('Ajax request fails');
      },
      success:function (res) {
        $('#msg_login').html(res);
        if(res=="fails"){
        return;
      }else {
        window.location.assign("index.php");
      }
      }

    })

  })


})
