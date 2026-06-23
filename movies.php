<?php

include "../config.php";

if($_SESSION['email']!="admin@gmail.com"){
header("Location: ../home.php");
}

if(isset($_POST['add'])){

$title = $_POST['title'];
$category = $_POST['category'];
$poster = $_POST['poster'];
$duration = $_POST['duration'];
$rating = $_POST['rating'];
$description = $_POST['description'];

$stmt = mysqli_prepare(
$conn,
"INSERT INTO movies
(title,category,poster,
duration,rating,description)
VALUES(?,?,?,?,?,?)"
);

mysqli_stmt_bind_param(
$stmt,
"ssssss",
$title,
$category,
$poster,
$duration,
$rating,
$description
);

mysqli_stmt_execute($stmt);
}

if(isset($_GET['delete'])){

$id = $_GET['delete'];

mysqli_query(
$conn,
"DELETE FROM movies
WHERE id='$id'"
);
}

$movies =
mysqli_query(
$conn,
"SELECT * FROM movies"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Movies</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container mt-5">

<h2>Add Movie</h2>

<form method="POST">

<input type="text"
name="title"
class="form-control mb-2"
placeholder="Title">

<input type="text"
name="category"
class="form-control mb-2"
placeholder="Category">

<input type="text"
name="poster"
class="form-control mb-2"
placeholder="Poster URL">

<input type="text"
name="duration"
class="form-control mb-2"
placeholder="Duration">

<input type="text"
name="rating"
class="form-control mb-2"
placeholder="Rating">

<textarea
name="description"
class="form-control mb-2"
placeholder="Description">
</textarea>

<button
name="add"
class="btn btn-primary">

Add Movie

</button>

</form>

<hr>

<h2 class="mt-4">
Movie List
</h2>

<table class="table table-dark">

<tr>

<th>ID</th>
<th>Title</th>
<th>Category</th>
<th>Action</th>

</tr>

<?php while($row =
mysqli_fetch_assoc($movies)){ ?>

<tr>

<td><?= $row['id'] ?></td>

<td><?= $row['title'] ?></td>

<td><?= $row['category'] ?></td>

<td>

<a href="?delete=<?= $row['id'] ?>"
class="btn btn-danger">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>