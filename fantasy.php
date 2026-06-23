<?php
include "config.php";
include "navbar.php";

$movies = [

["Harry Potter","2h 30m","8.5"],
["The Lord of the Rings","3h","9.0"],
["The Hobbit","2h 40m","8.0"],
["Fantastic Beasts","2h 15m","7.8"]

];
?>

<!DOCTYPE html>
<html>
<head>

<title>Fantasy</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<div class="container mt-5">

<h2>Fantasy Movies</h2>

<div class="row">

<?php foreach($movies as $movie){ ?>

<div class="col-md-3 mb-4">

<div class="card">

<img src="https://via.placeholder.com/300x400" class="card-img-top">

<div class="card-body">

<h5><?= $movie[0] ?></h5>

<p><?= $movie[1] ?></p>

<p>IMDb <?= $movie[2] ?></p>

<a href="booking.php?movie=<?= urlencode($movie[0]) ?>" class="btn btn-primary">

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