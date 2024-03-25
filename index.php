<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHREE BAHUCHAR ACEDEMY</title>
    <link rel="stylesheet" href="style1.css">
</head>
<?php
require_once "conn.php";
extract($_POST);
if (isset($_POST["submit"])) {
    $username = $_POST["namee"];
    $pass = $_POST["pass"];
    $query = "select * from student where name='$name' and password='$pass'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        header("location:home.php");
    } else {
        header("location:error.php");
    }
}
?>

<body>
    <div id="nav">
        <a href="#">HOME</a>
        <a href="#">ABOUT</a>
        <a href="#">CONTECT</a>
        <a href="#">PHOTOS</a>

    </div>
    <div class="container">
        <div class="boder">
            <form action="#" method="post">
                <div class="login">
                    <h2>Sign-up</h2>
                    <hr>
                    <label for="">
                        <h3>Name:</h3>
                    </label>
                    <input class="padding" type="text" name="Name">
                    
                    <label for="">
                        <h3>Passwoed:</h3>
                    </label>
                    <input class="padding" type="passwoed" name="pass">
                    <input class="padding" type="submit" name="submit">
                    <hr>
                    <h3>Create new Account</h3>
                    <a href="signup.php">Click Here</a>
                </div>
            </form>
        </div>
    </div>
   
</body>

</html>