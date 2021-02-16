<html>

<head>
<title>table</title>
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
	
	$psql = "SELECT NAME,PHONE_NUMBER FROM members";
	$result = $conn->query($psql);
	$c = $result->num_rows;
	//$sql = "SELECT name FROM mealtable where id <= $c";
	//$result = $conn->query($sql);
	
	
	if ($c > 0) {
		echo "<table style='margin-top:15px;'><tr class='adM' style='font-size: 25px;'><th >Name/<br>Date</th>	";
  // output data of each row
		   while($row = $result->fetch_assoc()) {
			 echo "<th>".$row["NAME"]. "</th>" ;
			}
			echo '</tr>';
	
	ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
	
	if(isset($_POST['submit'])){
		for($j=1;$j<=$c;$j++){
			//$n = "SELECT name,phnNum FROM mealtable where id=$j";
			//$r = $conn->query($n);
			$psql = "SELECT NAME,PHONE_NUMBER FROM members where id = $j";
			$result = $conn->query($psql);
			$nm = $result->fetch_assoc();
			$s3 = "INSERT INTO mealtable(name,phnNum,date,brekfast,lunch,dinner)VALUES('".$nm['NAME']."','".$nm['PHONE_NUMBER']."','".$_POST['date']."','".$_POST['brekfast'][$j-1]."','".$_POST['lunch'][$j-1]."','".$_POST['dinner'][$j-1]."')";
			$np = "INSERT INTO previous_record_1(name,phnNum,date,Bf,L,D)VALUES('".$nm['NAME']."','".$nm['PHONE_NUMBER']."','".$_POST['date']."','".$_POST['brekfast'][$j-1]."','".$_POST['lunch'][$j-1]."','".$_POST['dinner'][$j-1]."')";
			$np1 = $conn->query($np);
			$res3 = $conn->query($s3);
					
		}
	}		
	
	$s1 = "SELECT date FROM mealtable";
	$res1 = $conn->query($s1);
	$m = $res1->num_rows;
	$sum = array();		
	$l=0;		
			
	if($m !=0)
				
	{
		for($i = 1;$i<=$m;$i+=$c){
			$s2 = "SELECT date FROM mealtable where id=$i";
			$res2 = $conn->query($s2);
			$date = $res2->fetch_assoc();
			echo  "<tr class='bz' style='text-align:center;'><td>".$date["date"]. "</td>";
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
		
		/*for($j=1;$j<=$c;$j++){
		echo $sum[$j]. "	";}*/
	}
	
	
	
	echo '<tr ><td ><form method = "post" action=""> 
	<input type="date" name="date" style="width:130px;"></td>';
	
	for($j=1;$j<=$c;$j++){
		echo '<td ><input type="number" step="0.001" name="brekfast[]" style="width:44px; " />
			<input type="number" step="0.001" name="lunch[]" style="width:44px; margin-left:-5px"/>
			<input type="number" step="0.001" name="dinner[]" style="width:44px;margin:-5px; "/></td>';
	}
	
	echo '</tr></table><br> <input type="submit" name="submit" value="add" class="addbz" style="margin-left:100px;"></form>';	 
											
	
	$conn->close();
	} 
	else {
	  echo "<div class='bzpr' style='margin:30px'>No record exists</div>";
	}
?>

</body>
</html>


