<?php
session_start();
include "db.php";

if(!isset($_SESSION["name"])){
    header("location:login.php");
    exit();
}

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM books WHERE id=$id");
$row = $res->fetch_assoc();

if(isset($_POST['update'])){

    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $copies = $_POST['copies'];

    $sql = $conn->prepare("UPDATE books SET title=?, author=?, genre=?, copies=? WHERE id=?");
    $sql->bind_param("sssii", $title, $author, $genre, $copies, $id);
    $sql->execute();

    header("location:home.php");
}
?>

<!doctype html>
<html>
<head>
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<form method="POST">

<div class="form-floating mb-3">
<input 
type="text" 
class="form-control" 
name="title" 
value="<?php echo $row['title']; ?>">
<label>Book Title</label>
</div>

<div class="form-floating mb-3">
<input 
type="text" 
class="form-control" 
name="author" 
value="<?php echo $row['author']; ?>">
<label>Author Name</label>
</div>

<div class="form-floating mb-3">
<input 
type="text" 
class="form-control" 
name="genre" 
value="<?php echo $row['genre']; ?>">
<label>Genre</label>
</div>

<div class="form-floating mb-3">
<input 
type="number" 
class="form-control" 
name="copies" 
value="<?php echo $row['copies']; ?>">
<label>Available Copies</label>
</div>

<button type="submit" name="update" class="btn btn-primary">
    Update
</button>

<a href="home.php" class="btn btn-secondary">Cancel</a>

</form>

</div>

</body>
</html>