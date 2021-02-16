
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mes_meal_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$dm = "DELETE FROM members";
$ai1="ALTER TABLE members AUTO_INCREMENT = 1";
$conn->query($dm);
$conn->query($ai1);
$dmd = "DELETE FROM members_deposit";
$ai2="ALTER TABLE members_deposit AUTO_INCREMENT = 1";
$conn->query($dmd);
$conn->query($ai2);
$mt ="DELETE FROM mealtable";
$ai3="ALTER TABLE mealtable AUTO_INCREMENT = 1";
$conn->query($mt);
$conn->query($ai3);
$db = "DELETE FROM bazar";
$ai4="ALTER TABLE bazar AUTO_INCREMENT = 1";
$conn->query($db);
$conn->query($ai4);
$msg='All records  are deleted. Insert new records';
echo "<script>  alert('All records  are deleted. Insert new records'); window.location.replace('manager.php'); </script>";
 //header('Location:manager.php');


?>
