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


$title=$_POST['title'];
$article=$_POST['article'];
$email=$_SESSION['username'];



$sql="insert into board (title,article,email) values('$title','$article','$email')";
$res=$conn->query($sql);
echo "ok";
//echo $row;


 ?>
