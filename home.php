<?php
include "config.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Home</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<section class="hero">
    <div>
        <h1 class="display-3 fw-bold">
            Book Your Favorite Movies
        </h1>

        <p class="lead">
            Horror • Fantasy • Romantic • Action
        </p>

        <a href="#categories" class="btn btn-primary btn-lg">
            Explore Movies
        </a>
    </div>
</section>

<div class="container mt-5">

    <h2 class="mb-4">Trending Movies</h2>

    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="https://image.tmdb.org/t/p/w500/fxHMgYQ1L9WvskmYjvA1.jpg" class="card-img-top">
                <div class="card-body">
                    <h5>John Wick</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="https://image.tmdb.org/t/p/w500/harry.jpg" class="card-img-top">
                <div class="card-body">
                    <h5>Harry Potter</h5>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="container mt-5" id="categories">

<h2 class="mb-4">Categories</h2>

<div class="row">

<div class="col-md-3 mb-4">
<div class="card p-4 text-center">
<h4>Horror</h4>
<a href="horror.php" class="btn btn-primary mt-3">
View Movies
</a>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card p-4 text-center">
<h4>Fantasy</h4>
<a href="fantasy.php" class="btn btn-primary mt-3">
View Movies
</a>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card p-4 text-center">
<h4>Romantic</h4>
<a href="romantic.php" class="btn btn-primary mt-3">
View Movies
</a>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card p-4 text-center">
<h4>Action</h4>
<a href="action.php" class="btn btn-primary mt-3">
View Movies
</a>
</div>
</div>

</div>

</div>

<?php include "footer.php"; ?>

</body>
</html>