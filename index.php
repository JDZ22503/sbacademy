<?php
require_once "conn.php";

if (isset($_POST["submit"])) {
    // Table name
    $name = $_POST["f_Name"];

    // SQL to create table if it doesn't exist
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS $name (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        hw TEXT,
        sub varchar(255),
        photo VARCHAR(255),
        date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, Tables VARCHAR(255), Addition VARCHAR(255), Substraction VARCHAR(255), multiplication VARCHAR(255), Division VARCHAR(255), english VARCHAR(255)
    )";

    if (mysqli_query($conn, $sqlCreateTable)) {
        echo "Table created successfully or already exists.<br>";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    // Check if username and password match admin credentials
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    if ($email === "admin@gmail.com" && $pass === "sbacademy2024") {
        header("Location: admin/admin.php");
        exit; // Ensure script stops execution after redirection
    }

    // Check against regular student credentials
    $query = "SELECT * FROM student WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row["f_name"];
            header("Location: home.php?name=$name");
            exit; // Ensure script stops execution after redirection
        }
    } else {
        header("Location: error.php");
        exit; // Ensure script stops execution after redirection
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHREE BAHUCHAR ACEDEMY</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
<div id="nav">
        <div>
            
            <a href="about.php">ABOUT</a>
            <a href="contact.php">CONTACT</a>
            <a href="photo.php">PHOTOS</a>
        </div>
       
    </div>
    <div class="container">
        <div class="boder">
            <form action="#" method="post">
                <div class="login">
                    <h2>Sign-up</h2>
                    <hr>
                    <label for="">
                        <h3>First Name:</h3>
                    </label>
                    <input class="padding" type="text" name="f_Name">
                    <label for="">
                        <h3>Email id:</h3>
                    </label>
                    <input class="padding" type="text" name="email">
                    
                    <label for="">
                        <h3>Password:</h3>
                    </label>
                    <input class="padding" type="password" name="pass">
                    <input class="padding" type="submit" name="submit">
                    <hr>
                    <h3>Create new Account</h3>
                    <a href="signup.php">Click Here</a>
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
