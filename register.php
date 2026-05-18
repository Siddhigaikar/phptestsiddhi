<?php
include "db.php";

if($_SERVER['REQUEST_METHOD']==="POST"){

    $fullname=$_POST["fullname"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $password=password_hash($_POST["password"],PASSWORD_DEFAULT);

    $sql=$conn->prepare("insert into users(fullname,username,email,phone,password) values (?,?,?,?,?)");
    $sql->bind_param('sssss',$fullname,$username,$email,$phone,$password);

    if($sql->execute()){
        header("location:login.php");
    }
    else{
        echo "invalid";
    }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Register</title>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
    </head>

    <body>

        <main>
            <h1 style="text-align:center">Register</h1>

            <div class="container text-center border shadow">

                <form method="post">

                    <div class="form-floating mb-3">
    <input 
    type="text" 
    class="form-control" 
    name="fullname" id="f1">
    <label for="f1">Full Name</label>
</div>

<div class="form-floating mb-3">
    <input 
    type="text" 
    class="form-control" 
    name="username" id="f2">
    <label for="f2">Username</label>
</div>

<div class="form-floating mb-3">
    <input 
    type="text" 
    class="form-control" 
    name="email" id="f3">
    <label for="f3">Email</label>
</div>

<div class="form-floating mb-3">
    <input 
    type="text" 
    class="form-control" 
    name="phone" id="f4">
    <label for="f4">Phone</label>
</div>

<div class="form-floating mb-3">
    <input 
    type="password" 
    class="form-control" 
    name="password" id="f5">
    <label for="f5">Password</label>
</div>

                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>

                </form>

            </div>
        </main>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        ></script>

    </body>
</html>