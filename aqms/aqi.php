<?php
//Initialize Session
session_start();

if (isset($_SESSION['login'])) {

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AQMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style>

    table {
        width: 500px;
        border-collapse: collapse;
        font-family: "Josefin Slab","Helvetica Neue",Helvetica,Arial,sans-serif;
    }


    table, td, th {
        border: 5px solid white;
        padding: 20px;
        text width: 20px;
    }

    th {text-align: center;}
    </style>
</head>

<body>

    <div class="brand">Air Quality Monitoring System</div>
    <div class="address-bar">Rajkiya Engineering College Kannauj</div>

    <!-- Navigation -->
    <?php require_once 'nav.php'; ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
				
				    <h2 class="text-center">Welcome <?php echo $fname; echo " "; echo $lname; ?> - <a href="logout.php">Logout</a>
                    </h2>
				
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>AQMS Data Center</strong>
                    </h2>
                    <hr>
                </div>

                <div>
                    
                    <div id="Hint"><b>Lucknow Data Will Be Displayed Here</b></div>
                    <br>

                    <?php
                        $servername = "sql211.byethost24.com";
                        $username = "b24_28773208";
                        $password = "1@Singhsahab";
                        $dbname = "b24_28773208_aqms";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM data";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<strong><br> Date: ". $row["date"].
                                "<br><br> id: ". $row["id"]. " " . " Tempreature: " . $row["temp"]. "&#8451; " . "  Humidity: " . $row["hum"]. "%; "  . " Atmospheric Pressure: ". $row["p"]. "hpa; " . " PM2.5: ". $row["pm2"]. "µg/m³<br>"
                                 . "PM10: " . $row["pm10"] . "µg/m³; "  .  "  SO2: ". $row["so2"]. "µg/m³; " . " CO: ". $row["co"]. "µg/m³; " . " Battery Temp: " . $row["btemp"]. "&#8451; "  . " Battery Level: " . $row["blevel"] . "%<br></strong>";
                            }
                        } else {
                            echo "0 results";
                        }

                        $conn->close();
                    ?>

                </div>
            </div>
        </div>
    </div>
	
	
	
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; 2021 <a href="#">team@AQMS</a> </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

<?php

} else {
    header("location:login.php ");
}
?>
