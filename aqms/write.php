<?php
//for posting data, use the below url 
//"http://officialas.byethost24.com/aqms/write.php?pm2=10&pm10=30&temp=40&hum=80&p=100&co2=82&btlevel=96&btemp=45&so2=10&i=2"
$pm2 = htmlspecialchars($_GET["pm2"]);
$pm10 = htmlspecialchars($_GET["pm10"]);
$temp = htmlspecialchars($_GET["temp"]);
$hum = htmlspecialchars($_GET["hum"]);
$p = htmlspecialchars($_GET["p"]);
$co2 = htmlspecialchars($_GET["co2"]);
$blevel = htmlspecialchars($_GET["btlevel"]);
$btemp = htmlspecialchars($_GET["btemp"]);
$so2 = htmlspecialchars($_GET["so2"]);
echo "$pm2, $pm10, $temp, $hum, $p, $co2, $blevel, $btemp";
echo "<br>";
echo "<br>";


$servername = "sql211.byethost24.com";
$username = "b24_28773208";
$password = "1@Singhsahab";
$dbname = "b24_28773208_aqms";
$date   = date("Y/m/d h:i:sa");
echo "$date";
echo "<br>";
echo "<br>";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

        $sql = "INSERT INTO data  VALUES ('', '$temp','$hum','$p','$pm2','$pm10','$so2','$co','$btemp','$blevel', '$date')";
          
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>