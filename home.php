<?php
session_start();
include "db.php";

if(!isset($_SESSION["name"])){
    header("location:login.php");
    exit();
}

$result = $conn->query("SELECT * FROM books");
?>

<!doctype html>
<html>
<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.table-header th{
    color: white;
    background: linear-gradient(270deg, #ff4e50, #1f1c2c, #24c6dc);
    background-size: 600% 600%;
    animation: move 6s ease infinite;
}

@keyframes move{
    0%{
        background-position: 0% 50%;
    }
    50%{
        background-position: 100% 50%;
    }
    100%{
        background-position: 0% 50%;
    }
}
</style>
</head>

<body>

<nav class="navbar navbar-dark bg-black fixed-top">
    <div class="container">
        <span class="navbar-brand">Hello <?php echo $_SESSION["name"]; ?></span>

        <div>
            <a href="insert.php" class="btn btn-primary">Add Book</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</nav>

<br><br><br>

<div class="container mt-3">

<div id="carouselId" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/fs/7e7b1c86096163.5d8f442f309b6.jpg"
                 class="d-block w-100"
                 style="height:500px; object-fit:cover;">
            <div class="carousel-caption">
                <h5>Life is Beautiful</h5>
            </div>
        </div>

        <div class="carousel-item">
            <img src="https://img.magnific.com/free-vector/bike-guy-wattpad-book-cover_23-2149452163.jpg"
                 class="d-block w-100"
                 style="height:500px; object-fit:cover;">
            <div class="carousel-caption">
                <h5>The Bike Guy</h5>
            </div>
        </div>

        <div class="carousel-item">
            <img src="https://images-platform.99static.com//AbIyXGdQ_uHaBZ2Q8aw7mQHFelE=/0x4000:1999x6000/fit-in/590x590/99designs-contests-attachments/107/107145/attachment_107145375"
                 class="d-block w-100"
                 style="height:500px; object-fit:cover;">
            <div class="carousel-caption">
                <h5>Letters from Kattie</h5>
            </div>
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>

</div>

<div class="container mt-4">

<table class="table table-bordered text-center">

<tr class="table-header">
    <th>ID</th>
    <th>Title</th>
    <th>Author</th>
    <th>Genre</th>
    <th>Copies</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['author']; ?></td>
    <td><?php echo $row['genre']; ?></td>
    <td><?php echo $row['copies']; ?></td>

    <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
            Edit
        </a>
    </td>

    <td>
        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">
            Delete
        </a>
    </td>
</tr>

<?php } ?>

</table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>