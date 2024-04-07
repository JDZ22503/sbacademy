<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="nav">
        <a href="admin.php">HOME</a>
        <a href="about.php">ABOUT</a>
        <a href="contact.php">CONTACT</a>
        <a href="photos.php">PHOTOS</a>
    </div>
    <div class="mainpart">
        <div class="nev">
            <a href="analysis.php">analysis</a>
            <a href="hw.php">Add Home Work</a>
            <a href="photos.php">Add Photos</a>
        </div>
        <div class="details">
            <div class="detailsForm">
                <form action="#" method="post" enctype="multipart/form-data"> <!-- Add enctype="multipart/form-data" for file upload -->
                    <table>
                        <tr>
                            <td>Event:</td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td>Upload Photos:</td>
                            <td><input type="file" name="photos[]" multiple accept=".jpg, .png"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Submit" name="Submit">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                require "conn.php";

                if (isset($_POST["Submit"])) {
                    $name = $_POST["name"];
                    $photos = array();
                    $numFiles = count($_FILES['photos']['name']);
                    $folder = "images/"; // Change this to your desired folder

                    $extension = array('jpeg', 'jpg', 'png');
                    foreach ($_FILES['photos']['tmp_name'] as $key => $value) {
                        $filename = $_FILES['photos']['name'][$key];
                        $filename_tmp = $_FILES['photos']['tmp_name'][$key];
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);

                        $finalimg = '';
                        if (in_array($ext, $extension)) {
                            move_uploaded_file($filename_tmp, $folder . $filename);
                            $finalimg = $filename;
                        } else {
                            $filename = str_replace('.', '-', basename($filename, $ext));
                            $newfilename = $filename . time() . "." . $ext;
                            move_uploaded_file($filename_tmp, $folder . $newfilename);
                            $finalimg = $newfilename;
                        }
                        $sql = "INSERT INTO `photos`( `event_name`, `event_photo`) VALUES (?, ?)";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, "ss", $name, $finalimg);
                        mysqli_stmt_execute($stmt);
                    }
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    header('LOCATION:photos.php');
                    exit(); // Stop further execution
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>