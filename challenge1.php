<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	echo "Test";
	session_start();
 	echo $_SESSION['username'];
	if(!isset($_SESSION['username'])){
		header("Location: userlogin.php");
		
	}
	
	$db = mysqli_connect('******','******','******','******')
	 or die('Error connecting to MySQL server.');
	 echo "Test";
	$login = mysqli_query($db,"select * from ****** where (Challenge= 1) and (Password = '" . $_POST['password'] . "')");
	$rowcount = mysqli_num_rows($login);
	echo $rowcount;
	if ($rowcount == 1) {
	mysqli_query($db,"Update userloginTable Set Grade = 'C' Where Username = '".$_SESSION['username']."'");
	header("Location: gradechecker.php");
	}
	else
	{
	header("Location: challenge1.php");
	}
}	
?>

<h2>Challenge 1</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  <br><br>
  Password: <input type="text" name="password" value="<?php echo $password;?>">
  <input type="submit" name="submit" value="Submit">  
</form>
</body>
</html>