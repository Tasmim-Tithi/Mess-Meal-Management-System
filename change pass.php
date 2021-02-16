<html>
<head>
<title>change pass</title>
</head>
<body style="background-image:none;background-color:#b0bec58f;">
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


 echo '<div style=""><form action="" method="post">
	<lebel style="font-family:ink free;font-size: 20px;font-weight:bold; ">New Password:</lebel>
			<input type="password" name ="pass" style="border-radius:5px; font-family:ink free;width: 200px; height:30px;">
			<input type="submit" name="submit" value="change" style="border-radius:10px;
	width: 80px;
	font-family:ink free;
	font-weight:bold;
	font-size:20px;
	margin-left:20px;
	cursor:pointer;"></form><div>';
	
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
		if(isset($_POST['submit'])){
				$p = $_POST['pass'];
				$sql = "update login_manager SET password = '$p'";
				$conn->query($sql);
				echo "<script> alert('Password changed'); window.location.replace('login.php');</script> ";
				
			}
	
?>
</body>
</html>