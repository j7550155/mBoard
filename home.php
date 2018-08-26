<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" >
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript" src="reg.js"></script>
    <script type="text/javascript" src="login.js"></script>
<!--<script type="text/javascript">
$(document).ready(function() {


/*$('#registered').click(function () {
  email=$('#email').val();
  pwd=$('#pwd').val();
  pwd2=$('#pwd2').val();
  $.ajax({
    url:"reg.php",
    type:"POST",
    data:{
      email:email,
      pwd:pwd,
      pwd2:pwd2;
    },
    error: function(xhr) {
      alert('Ajax request fails');
    },
    success: function(res) {
      if(res=="0"){
      alert("帳密不可空白");
      return false;
    }else if (res=="d") {
      alert("密碼確認錯誤");
      return false;
     else if (res=="1") {
       alert("帳號重複") ;
       return false;
     }else

       return true;
    }
    }
  })

})
*/
/*pwd =function () {
  if($('#pwd2').val().length>0){
    if($('#pwd').val()==$('#pwd2').val()){
      $('#msg_pwd2').html("");
    }
    else {
      $('#msg_pwd2').html("Password confirmation error");
      $('#msg_pwd2').fadeIn();
    }
  }
}*/
regobj=function() {
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
    }
  })
}

/*regobj=function () {
  if($('#pwd2').val()!=$('#pwd').val()) {
  //  return false;
    $('#msg_reg').html("失敗");
  }else if (checkEmailobj()==false) {
    return false;
  }else {
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
      }
    })
  }
}
*/
checkEmailobj = function (){
  // email=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
if ($('#email').val().length>=1) {
  $.ajax( {
    url: 'checkEmail.php',
    type: 'post',
    data: {
      email: $('#email').val(),
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
}/*
pwd2obj = function (){
if ($('#pwd2').val()!=$('#pwd').val()) {
  $('#msg_pwd2').html("密碼確認錯誤");
}else {
  $('#msg_pwd2').html("");
}
}

*/
$('#pwd2').on( "blur", function() {
             if($('#pwd2').val() == $('#pwd').val()){
                 $('#msg_pwd2').html("");
             } else {
                 $('#msg_pwd2').html("Password confirmation error");
                 $('#msg_pwd2').fadeIn();
             }
         });
})
</script>-->
    <meta charset="utf-8">
    <title>registered</title>

  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
      <div class="navbar-header">
          <a class="navbar-brand" href="home.php">test/index</a>
      </div>
      <div>
          <ul class="nav navbar-nav">
              <li class="active"><a href="user.php">會員中心</a></li>
              <li><a href="index.php" id="board" name="board">布告欄</a></li>
              <li><a href="logout.php" >登出</a></li>
              <span id="msg" name="msg"></span>
          </ul>
      </div>

      </div>
  </nav>
<div class="container">
  <div class="row">
    <div class="col-md-5">
      <h1 class="text-center">會員註冊</h1></br>
      <h2 id="msg_reg" name="msg_reg"></h2>
    </div>
    <div class="col-md-2">

    </div>
    <div class="col-md-5">

      <h1 class="text-center">會員登入</h1></br>
      <h2 id="msg_login" name="msg_login"></h2>
    </div>
  </div>

  <div class="row">

    <div class="col-md-5">
      <form  id="userinf" name="userinf" action="" method="post"  onSubmit="return false" class="form-horizontal" role="form" >  <!--//onSubmit="return false"-->

        <div class="form-group">
          <label  class=" control-label">帳號(Email)</label>
          <input type="email" class="form-control" id="email" name="email" value="" placeholder="email"  required >
          <span  id="msg_user_name" name="msg_user_name"></span></br>
        </div>

        <div class="form-group">
          <label  class=" control-label">密碼</label>
          <input type="text" id="pwd" class="form-control" name="pwd" value="" placeholder="password">
        </div>

        <div class="form-group">
          <label  class=" control-label">密碼確認</label>
          <input type="text" class="form-control" id="pwd2" name="pwd2" value="" placeholder="Password Confirmation
          ">
          <span  id="msg_pwd2" name="msg_pwd2"></span></br>
          </br>
        </div>

        <button type="button" class="btn btn-secondary pull-right" name="registered" id="registered" value="" >註冊</button>
      </form>

    </div>
    <div class="col-md-2">
    </div>


    <div class="col-md-5">
      <form  id="loginForm" name="loginForm" action="" method="post"  onSubmit="return false" class="form-horizontal" role="form" >  <!--//onSubmit="return false"-->

        <div class="form-group">
          <label  class=" control-label">帳號(Email)</label>
          <input type="email" class="form-control" id="emailLogin" name="emailLogin" value="" placeholder="email"  required >
          <span  id="msg_user_name" name="msg_user_name"></span></br>
        </div>

        <div class="form-group">
          <label  class=" control-label">密碼</label>
          <input type="text" id="pwdLogin" class="form-control" name="pwdLogin" value="" placeholder="password">
        </div></br>

        <button type="button"  class="btn btn-secondary pull-right" name="login" id="login" value="" >登入</button>

      </form>
    </div>
  </div>
</div>



  </body>
</html>
