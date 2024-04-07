<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
require "conn.php";
$name = $_GET['name'];

if (isset($_GET['name'])) {
   
    $sql = "SELECT * FROM information where name='$name'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    
        $photo = $row["photo"];
    }
}
?>

<body>

    <div id="nav">
        <a href="home.php?name=<?php echo $name?>">HOME</a>
        <a href="about.php?name=<?php echo $name?>">ABOUT</a>
        <a href="contact.php?name=<?php echo $name?>">CONTACT</a>
        <a href="photos.php?name=<?php echo $name?>">PHOTOS</a>
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
        <div class="welcome">
            <h1>Mobile No:7016180335.</h1>

        </div>
    </div>
</body>

</html>