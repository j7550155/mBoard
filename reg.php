<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_test";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

if(isset($_POST['method'])){
  $email=$_POST['email'];

  $sql="select * from user where email='$email'";
  $res=$conn->query($sql);
  $row=mysqli_num_rows($res);
  //echo $row;
  if($row!=0){
    echo "帳號重複";
  }
  else {
    echo "ok";
  }

}else {
  $email=$_POST['email'];
  $pwd=$_POST['pwd'];
  $pwd2=$_POST['pwd2'];

  $sql="select * from user where email='$email'";
  $res=$conn->query($sql);
  $row=mysqli_num_rows($res);
  //echo $row;
  if($email==null || $pwd==null){
      echo "註冊失敗(帳號密碼不能空白)";//帳號密碼不可空白
  }
  elseif ($pwd!=$pwd2) {
    echo"註冊失敗(確認密碼失敗)";//密碼確認錯誤
  }
  elseif($row!=0){
    echo "註冊失敗(使用者重複)";//帳號重複
  }else {
    $pwd=md5($pwd);
    $sql_insert="insert into user (email,pwd) values('$email','$pwd')";
    $res_in=$conn->query($sql_insert);
    echo "註冊成功";
    header("Refresh:1;url=index.php");
  }
}




//require_once('connect.php');//引入資料庫連結設定檔

?>
