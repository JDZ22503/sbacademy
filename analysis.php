<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style1.css">
    <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <?php
    require "conn.php";

    $name = $_GET['name'];
    $sql = "SELECT * FROM information where name='$name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $photo = $row["photo"];

        if (isset($_GET['name'])) {

            $sql = "SELECT Tables, Addition, Substraction, multiplication, Division FROM $name where id= 1";

            $result = mysqli_query($conn, $sql);
            $tables = [];
            $addition = [];
            $substraction = [];
            $multiplication = [];
            $division = [];

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    $tables[] = $row['Tables'];
                    $addition[] = $row['Addition'];
                    $substraction[] = $row['Substraction'];
                    $multiplication[] = $row['multiplication'];
                    $division[] = $row['Division'];
                }
            }
        }
    }
    ?>

    <div id="nav">
        <div>
            <a href="home.php?name=<?php echo $name ?>">HOME</a>
            <a href="about.php?name=<?php echo $name ?>">ABOUT</a>
            <a href="contact.php?name=<?php echo $name ?>">CONTACT</a>
            <a href="photos.php?name=<?php echo $name ?>">PHOTOS</a>
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
        <div class="centeranalysis">
            <div class="analysis">
                <h1>Maths Analysis</h1>
                <div id="myChart" style="width:100%; height:60vh"></div>

            </div>
        </div>
    </div>

    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            const data = google.visualization.arrayToDataTable([
                ['Operation', 'Marks'],
                ['Tables: <?php echo $tables[0]; ?>', <?php echo $tables[0]; ?>],
                ['Addition: <?php echo $addition[0]; ?>', <?php echo $addition[0]; ?>],
                ['Substraction: <?php echo $substraction[0]; ?>', <?php echo $substraction[0]; ?>],
                ['Multiplication: <?php echo $multiplication[0]; ?>', <?php echo $multiplication[0]; ?>],
                ['Division: <?php echo $division[0]; ?>', <?php echo $division[0]; ?>]
            ]);

            const options = {
                title: '',
                backgroundColor: 'none'

            };

            const chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }

        function logout() {
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "index.php";
            }
        }
    </script>
</body>

</html>