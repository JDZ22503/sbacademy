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

    $sql = "INSERT INTO student (f_name, m_name, l_name, email, password, std) VALUES ('$f_Name', '$m_Name', '$l_Name', '$email', '$pass', '$Standard')";
    $sql2 = "INSERT INTO information (name, email, password, std) VALUES ('$f_Name', '$email', '$pass', '$Standard')";
    
    $result1 = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    
    if ($result1 && $result2) {
        // Check if the query executed successfully
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>showPopup();</script>";
            header("location:index.php");
        } else {
            // Handle the case where no rows were affected (probably due to an issue with the query)
            header("location:error.php");
        }
    } else {
        // Handle the case where the query failed to execute
        header("location:error.php");
    }
}

?>


<body>
    <header>
    <div id="nav">
        <div>
            <a href="home.php?name=<?php echo $name?>">HOME</a>
            <a href="about.php?name=<?php echo $name?>">ABOUT</a>
            <a href="contact.php?name=<?php echo $name?>">CONTACT</a>
            <a href="photos.php?name=<?php echo $name?>">PHOTOS</a>
        </div>
        <button id="logout-btn" onclick="logout()">LOGOUT</button>
    </div>
    </header>


    <div class="container">
        <div class="boder">
            <form action="#" method="post">
                <div class="login">
                    <h2>Sign-up</h2>
                    <hr>
                    <label for="">
                        <h3>First Name:</h3>
                    </label>
                    <input class="padding" type="text" name="f_Name" required>
                    <label for="">
                        <h3>Middle Name:</h3>
                    </label>
                    <input class="padding" type="text" name="m_Name" required>
                    <label for="">
                        <h3>Last Name:</h3>
                    </label>
                    <input class="padding" type="text" name="l_Name" required>
                    <label for="">
                        <h3>Standard:</h3>
                    </label>
                    <input class="padding" type="text" name="Standard" required>
                    <label for="">
                        <h3>Email:</h3>
                    </label>
                    <input class="padding" type="text" name="email" required>
                    <label for="">
                        <h3>Passwoed:</h3>
                    </label>
                    <input class="padding" type="password" name="pass" required>
                    <input class="padding" type="submit" name="submit">

                </div>
            </form>
        </div>
    </div>
    <script>
        function logout() {
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "index.php";
            }
        }
    </script>
</body>

</html>