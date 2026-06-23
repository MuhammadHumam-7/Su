<?php

include "../config.php";

if($_SESSION['email']!="admin@gmail.com"){
    header("Location: ../home.php");
}

if(isset($_GET['delete'])){

$id = $_GET['delete'];

mysqli_query(
$conn,
"DELETE FROM users WHERE id='$id'"
);

header("Location: users.php");
}

$users =
mysqli_query(
$conn,
"SELECT * FROM users"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Users</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container mt-5">

<h2>Manage Users</h2>

<table class="table table-dark mt-4">

<tr>

<th>ID</th>
<th>Username</th>
<th>Email</th>
<th>Action</th>

</tr>

<?php while($row =
mysqli_fetch_assoc($users)){ ?>

<tr>

<td><?= $row['id'] ?></td>

<td><?= $row['username'] ?></td>

<td><?= $row['email'] ?></td>

<td>

<a href="?delete=<?= $row['id'] ?>"
class="btn btn-danger btn-sm">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>