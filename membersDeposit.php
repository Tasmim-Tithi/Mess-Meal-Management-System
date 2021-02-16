<!DOCTYPE html>
<html lang="en-US"> 
	<head> 
		<meta charset = "UTF-8"/>
		<title>deposit</title>
		<link rel="stylesheet" href="style.css" />
		
	</head>
	
	<body style="background-image:none;background-color:#b0bec58f;">
	<a href="manager.php"><img src="images/bb.png" style="width:50px;height:50px;margin: 5px 10px;"></a>
		
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
		
		
		
		$sql = "select NAME,totalDeposit from members_deposit";
		$result = $conn->query($sql);
		$form = '<div style="display:inline;margin-left:-40px;">
		<form action="" method="POST" style="display: inline;"> 
		<input type="number" name="amount[]"/></div> <br>';
		$count = $result->num_rows;
		
		if ( $count > 0) {
		  // output data of each row
		while($row = $result->fetch_assoc()) {
			echo  '<div id="md"><span class="adM">' .$row["NAME"] .'</span>' .$form.'</div>' ;
		  }
		echo '<input type="submit" name="submit" value="add" class="addbz" style="margin-left: 50px;"/> </form>';
		}
		else {
		echo '<p class="addM">No member added</p>';
		}
		
		
		
		if(isset($_POST['submit'])){
			
			//$sql = "select totalDeposit from members_deposit";
			$s1 = "SELECT NAME FROM members_deposit WHERE totalDeposit=''";
			$res1 = $conn->query($s1);
			//$row1 = $res1->fetch_assoc();
			$m = $res1->num_rows;
			$s2 = "SELECT NAME FROM members_deposit";
			$res2 = $conn->query($s2);
			$c = $res2->num_rows;
			//echo $c ."<br>";
			for($i=0;$i< $c;$i++)
			{
				
				if($m !=0)
					//$row["totalDeposit"][$i] = 0;
					{
						$p = $_POST['amount'][$i];
						echo "ohh" ."<br>"; 
						//echo $p ."<br>";
					}
				else{
						$s3 = "SELECT totalDeposit FROM members_deposit where id = $i+1";
						$res3 = $conn->query($s3);
						$row2 = $res3->fetch_assoc();
						//echo $row2["totalDeposit"] ."<br>";
						$p = $_POST['amount'][$i]+ $row2["totalDeposit"];
						
			
					}
				$s4 = " Update members_deposit SET totalDeposit = '$p' where id = $i+1" ;
				if($conn->query($s4)=== TRUE)
				{ /* echo "New record created successfully.";*/
				}
				
				
			}
			
		}
		
		if ( $count > 0) {
			
			echo '<div id="mds"><h4 style="margin-left: 30px;">PREVIOUS RECORD</h4>';
			echo '<table>';
			echo' <tr class="bzpr"> <th>   Name  </th><th>  Deposit   </th></tr>';
			echo '<tr class="r"><td>-------------------------------</td><td>----------------------</td></tr>';
			$sql = "select NAME,totalDeposit from members_deposit";
			$result = $conn->query($sql);
			
			while($row = $result->fetch_assoc()) {
					echo "<tr class='bzpr r'  ><td style='padding: 10px;'>" . $row["NAME"]. "</td>
					<td style='text-align:center; padding: 10px;'> " . $row["totalDeposit"]. "</td></tr>";
			
				}
				echo '</table></div>';
		}
		
		
		$conn->close();
		?>
		
	</body>
		
		
</html>