<?php
include "config.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Horror Movies</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<div class="container mt-5">

<h2 class="mb-4">Horror Movies</h2>

<div class="row">

<?php

$movies = [

["The Conjuring","2h 10m","8.2"],
["Insidious","1h 55m","7.8"],
["Annabelle","1h 50m","7.0"],
["The Nun","1h 40m","6.9"]

];

foreach($movies as $movie){

?>

<div class="col-md-3 mb-4">

<div class="card">

<img src="https://via.placeholder.com/300x400"
class="card-img-top">

<div class="card-body">

<h5><?= $movie[0] ?></h5>

<p>Duration: <?= $movie[1] ?></p>

<p>IMDb: <?= $movie[2] ?></p>

<a href="booking.php?movie=<?= urlencode($movie[0]) ?>"
class="btn btn-primary">

Book Ticket

</a>

</div>

</div>

</div>

<?php } ?>

</div>

</div>

</body>
</html>