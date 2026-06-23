<?php
include "config.php";

$message="";

if(isset($_POST['register'])){

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm = $_POST['confirm'];

if(empty($username) || empty($email) ||
empty($password) || empty($confirm)){

$message = "All fields required";

}
elseif($password != $confirm){

$message = "Passwords do not match";

}
else{

$check =
mysqli_prepare($conn,
"SELECT id FROM users WHERE email=?");

mysqli_stmt_bind_param(
$check,"s",$email);

mysqli_stmt_execute($check);

$result =
mysqli_stmt_get_result($check);

if(mysqli_num_rows($result)>0){

$message="Email already exists";

}else{

$hash =
password_hash($password,
PASSWORD_DEFAULT);

$stmt=
mysqli_prepare($conn,
"INSERT INTO users
(username,email,password)
VALUES(?,?,?)");

mysqli_stmt_bind_param(
$stmt,"sss",
$username,
$email,
$hash);

if(mysqli_stmt_execute($stmt)){

$message="Registration Successful";

}else{

$message="Error";

}
}
}
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card p-4">

<h2 class="text-center mb-4">
Register
</h2>

<?php if($message!=""){ ?>

<div class="alert alert-info">
<?php echo $message; ?>
</div>

<?php } ?>

<form method="POST">

<input type="text"
name="username"
class="form-control mb-3"
placeholder="Username">

<input type="email"
name="email"
class="form-control mb-3"
placeholder="Email">

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password">

<input type="password"
name="confirm"
class="form-control mb-3"
placeholder="Confirm Password">

<button
name="register"
class="btn btn-primary w-100">

Register

</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>