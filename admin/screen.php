<?php
	session_start();
		if (!isset($_SESSION["user"])) {
		header("location: userlog.php");
	}
	$con = mysqli_connect("localhost", "root", "", "class") or die();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Codedeyo Platform</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
</head>
<body>
	<!--Online users -->
	<div class="reg">
		<h3 style="background: blueviolet;padding: 10px;color: white;">Active Students</h3>
		<h5 style="text-align: center;">Share screen with</h5>
	<div class="online">
			<?php
				if (isset($_SESSION["user"])) {
					$query = mysqli_query($con, "SELECT * FROM session ORDER BY id DESC");
					if (mysqli_num_rows($query) == 0) {
						echo "<code style='color:red;text-decoration:underline;font-weight:bold;'>No user online yet! Happy coding</code>";
					}
					while ($row = mysqli_fetch_assoc($query)) 
							{
					?>
							<a href="screenchat.php?user_id=<?php echo $row['user_id']; ?>"><p style="margin: 0px;
background: linear-gradient(blueviolet, #000);
padding: 10px;
width: 100%;
margin-bottom:6px;
width: 90%;
color: white;"><?php echo $row["username"]; ?> <img src="image/online.png" style="height: 10px;"> <br><small style="color: lightblue;">since: <?php echo $row["time"]; ?></small></p></a>
						<?php	
						}

				}

			?>
	</div>
	<div class="footer" style="padding: 20px;text-align: center;">
		Copyright &copy; 2019 <a href="index.php">Coding Class</a> | <a href="https://www.facebook.com/biggidroid" target="_blank">BiggiDroid Platform</a> - <a href="adminlog.php">Admin</a>
	</div>
	</div>

	
</body>
</html>