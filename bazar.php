<!DOCTYPE html>
<html lang="en-US"> 
	<head> 
		<meta charset = "UTF-8"/>
		<title>bazar</title>
		<link rel="stylesheet" href="style.css" />
		
	</head>
	
	<body style="background-image:none; background-color:#b0bec58f;">
	<a href="manager.php"><img src="images/bb.png" style="width:50px;height:50px;margin: 5px 10px;"></a>
		<h2 style="margin-left:15px;padding:15px;font-size:40px;font-family:Ink Free;
		font-weight:bold;color:#3f51b5;">BAZAR</h2>
	
		<form action="" method ="POST"> 
		<label for="" class="bz">Date:</label>
		<input type="date" value="" name="date" class="boxbz" />
		<label for="" class="bz">Amount:</label>
		<input type="number" step="0.01" value="" name="amount" class="boxbz" />
		<input type="submit" name="submit" value="add" class="addbz"/>
		</form>
		
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
		
		if(isset($_POST['submit'])){
		
		$s = "INSERT INTO bazar(date,amount)VALUES('".$_POST['date']."','".$_POST['amount']."')";
		
		if ($conn->query($s) === TRUE) {
		  
		} else {
		  echo "Error: " . $s . "<br>" . $conn->error;
		}
		}
		$sql = "SELECT date,amount FROM bazar";
		$result = $conn->query($sql);
		
		$sum=0.00;
		if ($result->num_rows > 0) {    
		  // output data of each row
		  echo '<div id="bzr"><h4>PREVIOUS RECORD</h4>';
		 echo' <span class="bzpr">    Date  </span> <span class="bzpr n l"> Amount   </span><br>';
		  while($row = $result->fetch_assoc()) {
			echo "<span class='bzpr r'  >" . $row["date"]. "</span><span class='bzpr r n'> " . $row["amount"]. "</span><br>";
			$sum+= $row["amount"];
		  }
		  echo '<span class="r">-------------------------------------------------</span><br>';
		echo "<span class='r a'>"	.$sum. "</span></div>";
		 
		} else {
		  echo "<div class='bzpr' style='margin:30px'>No record exists</div>";
		}
		
		
		$conn->close();
		?>
		
	
	</body>
</html>