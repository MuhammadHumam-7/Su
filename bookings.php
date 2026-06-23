<?php

include "../config.php";

if($_SESSION['email']!="admin@gmail.com"){
header("Location: ../home.php");
}

if(isset($_GET['confirm'])){

$id = $_GET['confirm'];

mysqli_query(
$conn,
"UPDATE bookings
SET status='Confirmed'
WHERE id='$id'"
);

header("Location: bookings.php");
}

if(isset($_GET['reject'])){

$id = $_GET['reject'];

mysqli_query(
$conn,
"UPDATE bookings
SET status='Rejected'
WHERE id='$id'"
);

header("Location: bookings.php");
}

if(isset($_GET['delete'])){

$id = $_GET['delete'];

mysqli_query(
$conn,
"DELETE FROM bookings
WHERE id='$id'"
);

header("Location: bookings.php");
}

$bookings =
mysqli_query(
$conn,
"SELECT * FROM bookings
ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Bookings</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container mt-5">

<h2>Manage Bookings</h2>

<table class="table table-dark mt-4">

<tr>

<th>ID</th>
<th>Booking ID</th>
<th>Movie</th>
<th>Date</th>
<th>Seats</th>
<th>Status</th>
<th>Actions</th>

</tr>

<?php while($row =
mysqli_fetch_assoc($bookings)){ ?>

<tr>

<td><?= $row['id'] ?></td>

<td><?= $row['booking_id'] ?></td>

<td><?= $row['movie_name'] ?></td>

<td><?= $row['booking_date'] ?></td>

<td><?= $row['seats'] ?></td>

<td><?= $row['status'] ?></td>

<td>

<a href="?confirm=<?= $row['id'] ?>"
class="btn btn-success btn-sm">

Confirm

</a>

<a href="?reject=<?= $row['id'] ?>"
class="btn btn-warning btn-sm">

Reject

</a>

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