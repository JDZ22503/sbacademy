<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // Function to display pop-up message
        function showMessage(message) {
            alert(message);
        }
    </script>
</head>
<?php
require "conn.php";

$name = $_GET['name'] ?? '';

if (isset($_GET['name'])) {
    $sql = "SELECT * FROM $name";
    $result = mysqli_query($conn, $sql);
}
?>

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
       
        <div class="welcome">
            <form action="#" method="post">
                <table>
                    <tr>
                        <td>Subject:</td>
                        <td><input type="text" name="sub"></td>
                    </tr>
                    <tr>
                        <td>Home Work:</td>
                        <td><input type="text" name="hw"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Submit" name="submit">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
            $success_message = "";

            if (isset($_POST["submit"])) {
                $hw = $_POST["hw"];
                $sub = $_POST["sub"];

                // Using prepared statement to prevent SQL injection
                $stmt = $conn->prepare("INSERT INTO $name (name, hw, sub) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $name, $hw, $sub);

                if ($stmt->execute()) {
                    $success_message = "Data inserted successfully.";
                } else {
                    $success_message = "Error inserting data: " . $conn->error;
                }

                $stmt->close();
            }
            ?>
            <?php
            if (!empty($success_message)) {
                echo "<script>showMessage('$success_message');</script>";
            }
            ?>
        </div>
    </div>
</body>

</html>