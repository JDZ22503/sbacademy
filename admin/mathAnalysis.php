<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <a href="mathAnalysis.php">analysis</a>
            <a href="hw.php">Add Home Work</a>
            <a href="photos.php">Add Photos</a>
        </div>
        <div class="welcome">
            <form action="#" method="post">
                <table>
                    <tr>
                        <td>Tables:</td>
                        <td><input type="text" name="tables"></td>
                    </tr>
                    <tr>
                        <td>Addition:</td>
                        <td><input type="text" name="add"></td>
                    </tr>
                    <tr>
                        <td>Substraction:</td>
                        <td><input type="text" name="sub"></td>
                    </tr>
                    <tr>
                        <td>Multiplecation:</td>
                        <td><input type="text" name="mul"></td>
                    </tr>
                    <tr>
                        <td>Division:</td>
                        <td><input type="text" name="div"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Submit" name="submit">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
            require "conn.php";

            $name = $_GET['name'] ?? ''; // Set default value to prevent notice error
            $success_message = "";

            if (isset($_POST["submit"])) {
                $tables = $_POST['tables'];
                $add = $_POST['add'];
                $sub = $_POST['sub'];
                $mul = $_POST['mul'];
                $div = $_POST['div'];

                // Assuming you have an 'id' field in your table, update based on that field
                $sql = "UPDATE $name SET Tables='$tables', Addition='$add', Substraction='$sub', multiplication='$mul', Division='$div' WHERE id=1"; // Update based on the id=1 condition, you might need to change this condition based on your database structure
                
                if (mysqli_query($conn, $sql)) {
                    $success_message = "Data updated successfully.";
                } else {
                    $success_message = "Error updating data: " . mysqli_error($conn);
                }
            }

            if (!empty($success_message)) {
                echo "<script>showMessage('$success_message');</script>";
            }
            ?>
        </div>
    </div>
</body>
</html>
