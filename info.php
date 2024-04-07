<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <?php
    require "conn.php";
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
        $sql = "SELECT * FROM information where name='$name'";
        $result = mysqli_query($conn, $sql);
        if (isset($_POST["Edit"])) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row["name"];
                    header("Location: edit.php?name=$name");
                    exit;
                }
            }
        }
    }
    // Check if $_GET['name'] is set
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
    ?>
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
                <div class="center">
                    <div class="details">
                        <div class="detailForm">
                            <form action="#" method="post">
                                <table>

                                    <tr>
                                        <td>Name:</td>
                                        <td><?php echo $name ?></td>
                                    </tr>
                                    <tr>
                                        <td>Standard:</td>
                                        <td><?php echo $std ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><?php echo $email ?></td>
                                    </tr>
                                    <tr>
                                        <td>Password:</td>
                                        <td><?php echo $pass ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age:</td>
                                        <td><?php echo $age ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td><?php echo $addr ?></td>
                                    </tr>
                                    <tr>
                                        <td>Photo:</td>
                                        <td><canvas id="canv1"></canvas></td>
                                    </tr>
                                    <script>
                                        var canvas = document.getElementById("canv1");
                                        var context = canvas.getContext("2d");
                                        var image = new Image();
                                        image.onload = function() {
                                            context.drawImage(image, 0, 0, canvas.width, canvas.height);
                                        };
                                        image.src = "images/<?php echo $photo ?>";
                                    </script>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" value="Edit" name="Edit">
                                        </td>
                                    </tr>
                            <?php
                        }
                    }
                            ?>
                                </table>
                            </form>
                        </div>
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