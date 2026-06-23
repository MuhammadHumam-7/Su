<?php

include "../config.php";

if(!isset($_SESSION['email']) ||
$_SESSION['email'] != "admin@gmail.com"){
    header("Location: ../home.php");
    exit();
}

$totalUsers =
mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM users")
)['total'];

$totalBookings =
mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM bookings")
)['total'];

$pending =
mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM bookings
WHERE status='Pending'")
)['total'];

$confirmed =
mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM bookings
WHERE status='Confirmed'")
)['total'];

$rejected =
mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM bookings
WHERE status='Rejected'")
)['total'];

?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container mt-5">

<h1 class="mb-4">
Admin Dashboard
</h1>

<div class="row">

<div class="col-md-4 mb-3">
<div class="card p-4 text-center">
<h3><?= $totalUsers ?></h3>
<p>Total Users</p>
</div>
</div>

<div class="col-md-4 mb-3">
<div class="card p-4 text-center">
<h3><?= $totalBookings ?></h3>
<p>Total Bookings</p>
</div>
</div>

<div class="col-md-4 mb-3">
<div class="card p-4 text-center">
<h3><?= $pending ?></h3>
<p>Pending</p>
</div>
</div>

<div class="col-md-6 mb-3">
<div class="card p-4 text-center">
<h3><?= $confirmed ?></h3>
<p>Confirmed</p>
</div>
</div>

<div class="col-md-6 mb-3">
<div class="card p-4 text-center">
<h3><?= $rejected ?></h3>
<p>Rejected</p>
</div>
</div>

</div>

<div class="mt-4">

<a href="users.php"
class="btn btn-primary">

Manage Users

</a>

<a href="movies.php"
class="btn btn-success">

Manage Movies

</a>

<a href="bookings.php"
class="btn btn-warning">

Manage Bookings

</a>

<a href="../logout.php"
class="btn btn-danger">

Logout

</a>

</div>

</div>

</body>
</html>