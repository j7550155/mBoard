<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_test";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("connect fails: " . $conn->connect_error);
}

//$email=$_POST['email'];
$email=$_POST['emailLogin'];
$pwd=$_POST['pwdLogin'];
$pwd=md5($pwd);


$sql="select * from user where email='$email' ";
$res=$conn->query($sql);
$row=mysqli_fetch_row($res);
//echo $row;

if($email!=null && $pwd!=null  && $row[1]==$email && $row[2]==$pwd){
  echo "登入成功";
  $_SESSION['username'] = $email;
}
else {
  echo "fails";

}

?>
