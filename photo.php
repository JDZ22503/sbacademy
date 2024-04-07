<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        .enlarged {
            width: 400px; /* Set width to desired enlarged size */
            height: 400px; /* Set height to desired enlarged size */
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
          
        }

        .modal-content {
            margin: auto;
            display: flex;
            width: 100%;
           max-width: 900px;
            height: 99%;
            position: relative;
            padding: 0px;
            background-color: #fefefe;
            justify-content: center;
            align-items: center;
            text-align: center;
            border: 1px solid #888;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .close {
            color: #aaa;
            float: right;
            margin-right: 20px;
            font-size: 50px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        button{
            background: none;
            border: none;
           
            justify-content: center;
        }
        button img{
            width: 200px;
            height: 200px;
            border-radius: 0px;
            padding: 0 10px;
        }
        .name{
            justify-content: center;
            text-align: center;
            width: 100%;

        }
        .event_photo{
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div id="nav">
    <div>
            
            <a href="about.php">ABOUT</a>
            <a href="contact.php">CONTACT</a>
            <a href="photo.php">PHOTOS</a>
        </div>
    </div>
    <div class="mainpart">
        <div class="nev">
            <a href="index.php">Login</a>
            <a href="signup.php">Signup</a>
        </div>
        <div class="name">
            <h1>Photos</h1>
            <?php
            require "conn.php";

            // Query to select distinct event names
            $event_query = "SELECT DISTINCT event_name FROM photos";
            $event_result = mysqli_query($conn, $event_query);

            while ($event_row = mysqli_fetch_assoc($event_result)) {
                $event_name = $event_row['event_name'];
                echo "<h2>$event_name</h2>";

                $photo_query = "SELECT event_photo FROM photos WHERE event_name = '$event_name'";
                $photo_result = mysqli_query($conn, $photo_query);

                echo '<div class="event_photos">';
                while ($photo_row = mysqli_fetch_assoc($photo_result)) {
                    $photo_name = $photo_row['event_photo'];
                    echo "<button onclick='openModal(\"$photo_name\")'><img src='images/$photo_name' alt='Photo'></button>";
                }
                echo "</div>";
            }

            // Free result set
            mysqli_free_result($event_result);
            mysqli_free_result($photo_result);

            // Close connection
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImg">
    </div>

    <script>
        function openModal(photoName) {
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("modalImg");
            modal.style.display = "block";
            modalImg.src = 'images/' + photoName;
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
    </script>
</body>

</html>
