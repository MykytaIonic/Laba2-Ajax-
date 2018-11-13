<?php
	session_start();
?>
<html>
<head>

	<title></title>
	 <link rel="stylesheet" href="style.css">
</head>
<body>
	<a href="index.php">On main Page</a>
	<?php
	$dbhost='localhost';
	$dbuser='root';
	$dbpwd='';
	$dbname='Laba2';
	$con=mysqli_connect($dbhost,$dbuser,$dbpwd,$dbname);
	if($con){
		$id = mysqli_real_escape_string($con,trim($_SESSION['seeID']));
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
			echo '<center>
			<div class="cont2" width="300" height="400">
				<p>
					<img width="200" height="100" src="'.$row["img"].'">
				</p>
				<p>
				login
				<input type="text" name="login" value="'.$row["login"].'" readonly>
				</p>
				<div class="fn">
					<p>
					first name
					<input type="text" name="first_name" value="'.$row["fname"].'" readonly>
					</p>
				</div>
				<div class="ln">
					<p>
					last name
					<input type="text" name="last_name" value="'.$row["lname"].'" readonly>
					</p>
				</div>
			</div>
			</center>';
			mysqli_close($con);
	}
?>
</body>
