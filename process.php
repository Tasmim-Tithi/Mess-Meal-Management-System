<?php
$password = $_POST['password'];


$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "mes_meal_database";

// Create connection
$conn = new mysqli($servername, $username, $pass, $dbname);

// Check connection
/*if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";*/


$sql = "SELECT password FROM login_manager";
$result = $conn->query($sql);
$row = $result->fetch_assoc();



if ($row["password"]==$password){
  // output data of each row
    echo "<script> window.location.assign('manager.php'); </script>";
  } else {
	
  echo "<script> alert('Wrong Password');window.location.assign('login.php'); </script>";
  
}

mysqli_close($conn);


?>