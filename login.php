<!DOCTYPE html>
<html lang="en-US">
	<head> 
		<meta charset = "UTF-8"/>
		<title>mess meal system</title>
		<link rel="stylesheet" href="style.css" />
		
		
		
	</head>
	
	<body>
	
	
	<header>
		<h1>MESS MEAL MANAGEMENT SYSTEM</h1>
		
	</header>
	<section > 
		<div id="sec">
		

		<button class="firstbtn" type="button" onclick="document.getElementById('f').style.display='block'">Manager</button>
		
			<form action="process.php" method="POST" id="f" style="display:none;"> 
				<input type="password" name="password" placeholder="password"/>
				<button class="inner" onclick="">OK</button>
			</form>
		<br><br><br>
		<button class="lastbtn" type="button" onclick="window.location.assign('member.php');">Member</button>
		</div>
		
	</section>
	</body>
</html>


