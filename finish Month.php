<html>

<head>
<title>table</title>
<link rel="stylesheet" href="style.css" />
</head>

<body style="background-image:none;background-color:#b0bec58f; overflow:scroll;">

<div id="box1"></div>
			<div  class="tooltip" ><p><a href="new month.php">Start a month?</a></p>
			<span class="tooltiptext">clicking start a month, will delete your previous records of month,bazar,members and also members deposit data</span>
			</div>
<?php 
	ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
	
	
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
	
	$psql = "SELECT NAME FROM members";
	$result = $conn->query($psql);
	$c = $result->num_rows;
	//$sql = "SELECT name FROM mealtable where id <= $c";
	//$result = $conn->query($sql);
	
	
	if ($c > 0) {
		
		echo "<div><table style='margin-top:30px; margin-left:20px;'><tr class='adM' style='font-size: 22px;'>
		<th>Days</th><th >Name/Date</th>	";
  // output data of each row
		   while($row = $result->fetch_assoc()) {
			 echo "<th>".$row["NAME"]. "</th>" ;
			}
			echo '</tr>';
	
	
	ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
	$s1 = "SELECT date FROM mealtable";
	$res1 = $conn->query($s1);
	$m = $res1->num_rows;
	$sum = array();
	
	$ts=0;		
			
	if($m !=0)
				
	{
		$g=0;
		for($i = 1;$i<=$m;$i+=$c){
			$s2 = "SELECT date FROM mealtable where id=$i";
			$res2 = $conn->query($s2);
			$date = $res2->fetch_assoc();
			echo  "<tr class='bz' style='text-align:center;font-size:15px'><td>".++$g."</td><td>".$date["date"]. "</td>";
			$k = 1;
			for($j=$i;$j<=($i+$c-1);$j++){
				
				$s3 = "SELECT brekfast,lunch,dinner FROM mealtable where id = $j";
				$res3 = $conn->query($s3);
				$meal = $res3->fetch_assoc(); 
				echo 	"<td>".$meal["brekfast"]. " | " . $meal["lunch"]. " | " . $meal["dinner"]. " </td>";
			    $sum[$k] += $meal["brekfast"]+$meal["lunch"]+$meal["dinner"];
				$k++;
	
			}
			echo '</tr>';
			
			
			
		}
	}	
		echo '<tr class="bz" style="text-align:center;"><td>-------- </td><td> ------------ </td>';
		
		for($j=1;$j<=$c;$j++){
			echo '<td> ------------- </td>';
		}
		echo '</tr>';
		echo '<tr class="bz" style="text-align:center;"><td>'.$g.'</td><td>total</td>';
		for($j=1;$j<=$c;$j++){
			$ts+=$sum[$j];
			echo "<td>".$sum[$j]. "</td>";
		
		}
		echo '</tr></table></div>';
	
	$sqlb = "SELECT amount FROM bazar";
	$resultb = $conn->query($sqlb);
		
	$sumb =0.00;
	if ($resultb->num_rows > 0) {    
		  // output data of each row
		while($rowb = $resultb->fetch_assoc()) {
			$sumb+= $rowb["amount"];
		  }
	} 
	if($ts>0){
	$mealRate = $sumb/$ts;}
	$rmr = round($mealRate,2);
	echo "<p class='adM' style='font-size: 25px; padding: 10px;'>MEAL RATE:   " .$rmr."</p><br>";
	
	echo "<table style='margin-top:15px;margin-left:20px;'><tr class='adM' style='font-size: 25px;'><th >Name</th><th>Total Cost</th>
	<th>Debit(-)/Credit(+)</th></tr>";	
	
	echo '<tr class="bz" style="text-align:center;"><td>------------------ </td>
	<td> -------------------- </td><td>-------------------------</td></tr>';
	$pmealR = array();
	$t = array();
	
	for($i=1;$i<= $c;$i++){
		$s3 = "SELECT NAME,totalDeposit FROM members_deposit where id = $i";
		$res3 = $conn->query($s3);
		$row2 = $res3->fetch_assoc();
		$p = $row2["totalDeposit"];
		$pmealR[$i] = $rmr*$sum[$i];
		$t[$i] = $p - $pmealR[$i];
	}
	for($i = 1;$i<=$c;$i++)
	{
		$s4 = "SELECT NAME FROM members_deposit where id = $i";
		$res4 = $conn->query($s4);
		$row4 = $res4->fetch_assoc();
		echo "<tr class='bz' style='text-align:center;'><td>".$row4["NAME"]."</td><td>" .round($pmealR[$i],2)."</td><td>".round($t[$i],2)."</td></tr>";
	}
	echo '</table>';
	
											
	
	$conn->close();
	
	}
	
	else{
		echo "<div class='bzpr' style='margin:30px'>No record exists</div>";
	}
?>
</body>
</html>


