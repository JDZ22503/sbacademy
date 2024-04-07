<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style1.css">
</head>
<?php
require "conn.php";
$name = $_GET['name'];
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $sql = "SELECT * FROM information where name='$name'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Assign values retrieved from the database
        $name = $row["name"];
        $std = $row["std"];
        $email = $row["email"];
        $pass = $row["password"];
        $age = $row["age"];
        $addr = $row["address"];
        $photo = $row["photo"];
    }
}
if (isset($_POST["Submit"])) {
    $name = $_POST["name"];
    $std = $_POST["std"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $age = $_POST["age"];
    $addr = $_POST["addr"];

    // Check if the user wants to change the photo
    $change_photo = isset($_POST["change_photo"]) ? true : false;

    // File handling
    if ($change_photo) {
        $photo = $_FILES['photo']['name'];
        $tempName = $_FILES['photo']['tmp_name'];
        $folder = "images/"; // Change this to your desired folder

        // Move uploaded file to destination folder
        move_uploaded_file($tempName, $folder . $photo);
    }

    // Update query
    $sql = "UPDATE information SET name='$name', std='$std', email='$email', password='$pass', age='$age', address='$addr'";
    if ($change_photo) {
        $sql .= ", photo='$photo'";
    }
    $sql .= " WHERE name='$name'";

    if (mysqli_query($conn, $sql)) {
        // Redirect to info.php with the updated record's ID
        header("Location: info.php?name=$name");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<body>

<div id="nav">
        <div>
            <a href="home.php?name=<?php echo $name?>">HOME</a>
            <a href="about.php?name=<?php echo $name?>">ABOUT</a>
            <a href="contact.php?name=<?php echo $name?>">CONTACT</a>
            <a href="photos.php?name=<?php echo $name?>">PHOTOS</a>
        </div>
        <button id="logout-btn" onclick="logout()">LOGOUT</button>
    </div>
    
    <div class="mainpart">
    <div class="nev">
            <div class="photo">
                <img src="images/<?php echo $photo; ?>" width='120px' height='120px' alt="">
            </div>
            <a href="info.php?name=<?php echo $name ?>">Student Infomation</a>
            
           <a href="analysis.php?name=<?php echo $name ?>">analysis</a>
            <a href="tutionWork.php?name=<?php echo $name ?>">Tution Work</a>
        </div>
        <div class="detail">
            <div class="detaisForm">
                <form action="#" method="post" enctype="multipart/form-data"> <!-- Add enctype="multipart/form-data" for file upload -->
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name" value="<?php echo $name ?>"></td>
                        </tr>
                        <tr>
                            <td>Standard:</td>
                            <td><input type="number" name="std" value="<?php echo $std ?>"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email" value="<?php echo $email ?>" required></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="text" name="pass" value="<?php echo $pass ?>"></td>
                        </tr>
                        <tr>
                            <td>Age:</td>
                            <td><input type="number" name="age" value="<?php echo $age ?>"></td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td><textarea name="addr" cols="30" rows="10" required><?php echo $addr ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Change Photo:</td>
                            <td><input type="checkbox" name="change_photo" value="1"> Yes</td>
                        </tr>
                        <tr>
                            <td>Upload Photo:</td>
                            <td><input type="file" name="photo" accept=".jpg, .png"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Submit" name="Submit">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
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
