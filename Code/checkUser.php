<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
	body{
		background-color: black;
	}
	.container
	{
		margin: auto;
		width: 864px;
		height: 578px;
		height: 600px;
		background-image: url("error.jpg");
		background-repeat: no-repeat;
	}
	</style>
</head>
<body>
	<div class="container">
	<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="100700131";
$dbname="finalproject";

$connection= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (mysqli_connect_errno())
{
	die ("Database connection failed: " . mysqli_connect-error()."(" . mysqli_connect_errno() . ")");
}


if (isset($_POST['username']) && isset($_POST['password'])){
	$user= $_POST['username'];
	$password= $_POST['password'];

	$sql="SELECT * FROM owners WHERE Username='".$user."' AND Password='".$password."' LIMIT 1";
$res= mysqli_query($connection,$sql);

if (mysqli_num_rows($res)==1){
	header("Location: myaccount.php");
	die();
}else {
	echo "<div class=\"errorpage\">";
	echo "<h2>"."<p style='text-align:center;'>"."The login credentials you entered are invalid."."</h2>"."</p>";
	echo "<h2>".'<a href="login.php">Click here</a>'." to try again OR if you are not an admin ". '<a href="index.html">Click here</a>'." to return to home page"."</h2>";
	echo "</div>";
	exit();
}

}

?>

	</div>

</body>
</html>

