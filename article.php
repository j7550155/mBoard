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

$method=$_POST['method'];

if($method=="show"){
  $id=$_POST['idnum'];
  $email=$_SESSION['username'];
  //$method=$_POST['method'];
  $sql="select * from board where email='$email' and id='$id'";
  $res=$conn->query($sql);
    while ($row=mysqli_fetch_array($res)) {
      $article=$row['article'];
      echo $article;
    }
}elseif ($method=="fix") {

    $id=$_POST['idnum'];
    $email=$_SESSION['username'];
    $article=$_POST['article'];


    $sql="update board set article='$article' where email='$email' and id='$id'";
    $res=$conn->query($sql);
      echo "ok";
}elseif ($method=="deletes") {

  $id=$_POST['idnum'];
  $email=$_SESSION['username'];
  //$article=$_POST['article'];


  $sql="delete from board where email='$email' and id='$id'";
  $res=$conn->query($sql);
    echo "ok";
}




 ?>
