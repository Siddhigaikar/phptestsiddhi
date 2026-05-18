<?php
session_start();
include "db.php";

if(!isset($_SESSION["name"])){
    header("location:login.php");
    exit();
}

$msg = "";

if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $total = $_POST['total'];
    $copies = $_POST['copies'];

    if($title != "" && $author != "" && $genre != "" && $total != "" && $copies != ""){

        $sql = $conn->prepare("INSERT INTO books(title, author, genre, total_copies, copies) VALUES (?,?,?,?,?)");
        $sql->bind_param("sssii", $title, $author, $genre, $total, $copies);
        $sql->execute();

        header("location:home.php");
        exit();
    }
    else{
        $msg = "All fields are required";
    }
}
?>

<!doctype html>
<html>
<head>
    <title>Insert Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<?php if($msg != ""){ ?>
<div class="alert alert-danger text-center">
    <?php echo $msg; ?>
</div>
<?php } ?>

<form method="POST">

<div class="form-floating mb-3">
<input type="text" class="form-control" name="title">
<label>Book Title</label>
</div>

<div class="form-floating mb-3">
<input type="text" class="form-control" name="author">
<label>Author Name</label>
</div>

<div class="form-floating mb-3">
<input type="text" class="form-control" name="genre">
<label>Genre</label>
</div>

<div class="form-floating mb-3">
<input type="number" class="form-control" name="total">
<label>Total Copies</label>
</div>

<div class="form-floating mb-3">
<input type="number" class="form-control" name="copies">
<label>Available Copies</label>
</div>

<button type="submit" name="submit" class="btn btn-primary">
    Insert
</button>

</form>

</div>

</body>
</html>