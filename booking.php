<?php

include "config.php";

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit();
}

$message = "";

if(isset($_POST['book'])){

$name = $_POST['name'];
$email = $_POST['email'];
$movie = $_POST['movie'];
$date = $_POST['date'];
$time = $_POST['time'];
$seats = $_POST['seats'];

$booking_id =
"MOV".rand(10000,99999);

$stmt = mysqli_prepare(
$conn,
"INSERT INTO bookings
(user_id,movie_name,booking_date,
show_time,seats,booking_id)
VALUES(?,?,?,?,?,?)"
);

mysqli_stmt_bind_param(
$stmt,
"isssis",
$_SESSION['user_id'],
$movie,
$date,
$time,
$seats,
$booking_id
);

if(mysqli_stmt_execute($stmt)){

$message =
"Ticket booked successfully.
Booking ID: ".$booking_id;

}
}

$movie =
isset($_GET['movie'])
? $_GET['movie']
: "";

?>

<!DOCTYPE html>
<html>
<head>

<title>Book Ticket</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card p-4">

<h2>Book Ticket</h2>

<?php if($message){ ?>

<div class="alert alert-success">
<?= $message ?>
</div>

<?php } ?>

<form method="POST">

<input type="text"
name="name"
class="form-control mb-3"
placeholder="Name"
required>

<input type="email"
name="email"
class="form-control mb-3"
placeholder="Email"
required>

<input type="text"
name="movie"
value="<?= $movie ?>"
class="form-control mb-3"
readonly>

<input type="date"
name="date"
class="form-control mb-3"
required>

<select name="time"
class="form-control mb-3">

<option>10:00 AM</option>
<option>01:00 PM</option>
<option>04:00 PM</option>
<option>07:00 PM</option>

</select>

<input type="number"
name="seats"
class="form-control mb-3"
placeholder="Seats"
required>

<button
name="book"
class="btn btn-primary w-100">

Book Ticket

</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>