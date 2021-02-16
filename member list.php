

<html><head><title>member list</title><link rel="stylesheet" href="style.css" />
</head><body style="background-image:none;background-color:#b0bec58f;">

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

$sql = "SELECT ID, NAME, PHONE_NUMBER, ADDRESS FROM members";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  echo "<div id='ml' ><table class='mlc' ><tr style='color:#3f51b5;font-size: 20px;font-weight:bold;padding: 10px;'>
  <th class='d1'>  ID  </th>
  <th class='d2'>NAME</th>
  <th class='d3'> PHONE NUMBER</th>
  <th class='d4'> ADDRESS</th>
  </tr> 
  <tr>
  <td>------</td>
  <td>---------------------------</td>
  <td>-----------------------------------</td>
  <td>-------------------------------------------------------------------</td>
  </tr>";
  while($row = $result->fetch_assoc()) {
    echo   '<tr class="mlf" ><td class="d1">'.$row["ID"]. '</td><td class="d2" >  ' . $row["NAME"].  ' </td><td class="d3"> ' . $row["PHONE_NUMBER"]. ' </td><td class="d4"> ' . $row["ADDRESS"]. ' </td></tr>';
  }
  echo '</table></div>';
  
} else {
  echo '<p style="font-family:ink free;
	font-weight:bold;
	font-size:20px;
	color:#3f51b5;
	padding: 20px;">
	No member exists</p>';
}


$conn->close();
?>
</body></html>