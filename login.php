<?php
include "config.php";

$message="";

if(isset($_POST['login'])){

$email=$_POST['email'];
$password=$_POST['password'];

$stmt=mysqli_prepare(
$conn,
"SELECT * FROM users
WHERE email=?");

mysqli_stmt_bind_param(
$stmt,
"s",
$email);

mysqli_stmt_execute($stmt);

$result=mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result)==1){

$user=mysqli_fetch_assoc($result);

if(password_verify(
$password,
$user['password'])){

$_SESSION['user_id']=$user['id'];
$_SESSION['username']=$user['username'];
$_SESSION['email']=$user['email'];

if($user['email']=="admin@gmail.com"){

header(
"Location: admin/dashboard.php");

}else{

header(
"Location: home.php");

}

exit();

}else{

$message="Wrong Password";

}

}else{

$message="User Not Found";

}
}
?>