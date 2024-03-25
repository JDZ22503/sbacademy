<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHREE BAHUCHAR ACEDEMY</title>
    <link rel="stylesheet" href="style1.css">
    <script>
        function showPopup() {
            alert("Data stored successfully!");
        }
    </script>
</head>

<?php

require_once "conn.php";
extract($_POST);
if (isset($_POST["submit"])) {

    $sql = "insert into student(name,email,password,std) values('$Name','$email','$pass','$Standard') ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        if ($result) {
            echo "<script>showPopup();</script>";
        } else {
            header("location:error.php");
        }
    }
}

?>

<body>
    <header>
        <div id="nav">
            <a href="#">HOME</a>
            <a href="#">ABOUT</a>
            <a href="#">CONTECT</a>
            <a href="#">PHOTOS</a>

        </div>
    </header>


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
                        <h3>Standard:</h3>
                    </label>
                    <input class="padding" type="text" name="Standard">
                    <label for="">
                        <h3>Email:</h3>
                    </label>
                    <input class="padding" type="text" name="email">
                    <label for="">
                        <h3>Passwoed:</h3>
                    </label>
                    <input class="padding" type="passwoed" name="pass">
                    <input class="padding" type="submit" name="submit">

                </div>
            </form>
        </div>
    </div>
    <footer>

    </footer>
</body>

</html>