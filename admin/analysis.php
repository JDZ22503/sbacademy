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

<a href="analysis.php">analysis</a>
    <a href="hw.php">Add Home Work</a>
    <a href="photos.php">Add Photos</a>

</div>
        <div class="hw scrollable"">
            <table>
                <tr>
                    <th>Name</th>
                    <th>STD</th>
                    <th>PHOTO</th>
                    <th>Home Work</th>
                </tr>
                <?php
                require "conn.php";

                $sql = "SELECT * FROM information";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['name'];
                        $std = $row['std'];
                        $photo1 = $row['photo'];
                ?>
                        <tr>
                            <td><?php echo $name ?></td>
                            <td><?php echo $std ?></td>
                            <td><img src="../images/<?php echo $photo1; ?>" width='100px' height='100px'></td>
                            <td>
                                <button type="button"><a href="mathAnalysis.php?name=<?php echo $name ?>">ADD Analysis</a></button>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>
