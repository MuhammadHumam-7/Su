<?php

include "config.php";
include "navbar.php";

$user =
$_SESSION['user_id'];

$result =
mysqli_query(
$conn,
"SELECT * FROM bookings
WHERE user_id='$user'
ORDER BY id DESC"
);

?>

<div class="container mt-5">

<h2>My Bookings</h2>

<table class="table table-dark mt-4">

<tr>

<th>Booking ID</th>
<th>Movie</th>
<th>Date</th>
<th>Time</th>
<th>Seats</th>
<th>Status</th>

</tr>

<?php while($row =
mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['booking_id'] ?></td>

<td><?= $row['movie_name'] ?></td>

<td><?= $row['booking_date'] ?></td>

<td><?= $row['show_time'] ?></td>

<td><?= $row['seats'] ?></td>

<td>

<?php

if($row['status']=="Pending"){

echo "<span class='badge bg-warning'>Pending</span>";

}elseif($row['status']=="Confirmed"){

echo "<span class='badge bg-success'>Confirmed</span>";

}else{

echo "<span class='badge bg-danger'>Rejected</span>";

}

?>

</td>

</tr>

<?php } ?>

</table>

</div>