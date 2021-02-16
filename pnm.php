<!DOCTYPE html>
<html lang="en-US"> 
	<head> 
		<meta charset = "UTF-8"/>
		<title>add members</title>
		<link rel="stylesheet" href="style.css" />
		
	</head>
	
	
	<body style="background-image:none;">
		
		<!-- ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED); -->
		<form  method="POST" action="pnm2.php" id="" style=""> 
		<?php  
		  $number = $_POST['num'];
		  
		  for($i = 0;$i<$number;$i++)
		  {
		
		?>
			<input type="hidden" value = "<?php echo $number; ?>" name = "number"/>
				<label class="adM">Name:</label>
				<input type="text" name="name[]" class="blk" />
				<label for="" class="adM">Phone Number:</label>
				<input type="text" name="phnNum[]" class="blk" />
				<label for="" class="adM">Address:</label>
				<input type="text" name="address[]" class="blk" /><br>
				<?php } ?><br>
				
				<input type="submit" name="submit" value="ADD" class="addbz" />
				
		</form>
		
		
	</body>
	
</html>


	