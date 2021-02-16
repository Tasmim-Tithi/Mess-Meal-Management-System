
<html>
<head><title>add members</title></head>
</html>
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

	
	$s = "INSERT INTO members(NAME,PHONE_NUMBER,ADDRESS)VALUES";
	$s1 = "INSERT INTO members_deposit(NAME,PHONE_NUMBER)VALUES";
	
	//$s2 = "INSERT INTO mealtable(name,phnNum)VALUES";
	
	for($i=0;$i<$_POST['number'];$i++)
	{
		$s .="('".$_POST['name'][$i]."','".$_POST['phnNum'][$i]."','".$_POST['address'][$i]."'),"; 
		$s1 .="('".$_POST['name'][$i]."','".$_POST['phnNum'][$i]."'),";
		//$s2 .="('".$_POST['name'][$i]."','".$_POST['phnNum'][$i]."'),";
	}
	$s = rtrim($s,","); 
	$s1 = rtrim($s1,",");
	//$s2 = rtrim($s2,",");
	if ($conn->query($s) === TRUE) {
				
		$conn->query($s1);
		//$conn->query($s2);
		
		echo "<script>  alert('New record created successfully'); window.location.replace('manager.php'); </script>";} 
	else {
		  echo "Error: " . $s . "<br>" . $conn->error;
		}
		
		/// echo "Error: " . $s2 . "<br>" . $conn->error;
		
		

$conn->close();

	
?>