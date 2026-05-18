<?php
session_start();
include "db.php";

if($_SERVER['REQUEST_METHOD']==="POST"){

    $name = $_POST["name"];
    $pass = $_POST["pass"];

    $sql = $conn->prepare("SELECT password FROM users WHERE username=?");

    $sql->bind_param('s', $name);
    $sql->execute();

    $sql->bind_result($password);
    $sql->fetch();

    if($password && password_verify($pass, $password)){
        $_SESSION["name"] = $name;
        header("location:home.php");
        exit();
    }
    else{
        echo "<div class='alert alert-danger text-center'>Invalid username or password</div>";
    }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="light">
<head>
    <title>Login</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        crossorigin="anonymous"
    />
</head>

<body>

<h1 style="text-align:center">Login</h1>

<div class="container text-center border shadow">

<form method="post">

    <div class="form-floating mb-3">
        <input
            type="text"
            class="form-control"
            name="name"
            placeholder="Name"
        />
        <label>Name</label>
    </div>

    <div class="form-floating mb-3">
        <input
            type="password"
            class="form-control"
            name="pass"
            placeholder="Password"
        />
        <label>Password</label>
    </div>

    <button type="submit" class="btn btn-primary">
        Submit
    </button>

</form>

</div>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>