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
	
	$db = mysqli_connect('******','******','******','******')
	 or die('Error connecting to MySQL server.');
	 echo "Test";
	$login = mysqli_query($db,"select * from ****** where (Username = '" . $_POST['username'] . "') and (Password = '" . md5($_POST['password']) . "')");
	$rowcount = mysqli_num_rows($login);
	echo $rowcount;
	if ($rowcount == 1) {
	$_SESSION['username'] = $_POST['username'];
	header("Location: challenge1.php");
	}
	else
	{
	header("Location: userlogin.php");
	}
}	
?>

<h2>Login Challenge</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  Username: <input type="text" name="username" value="<?php echo $username;?>">
  
  <br><br>
  Password: <input type="text" name="password" value="<?php echo $password;?>">
  <input type="submit" name="submit" value="Submit">  
</form>
</body>
</html>