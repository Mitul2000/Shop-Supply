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




?>
<html>
<head>
	<title>Create Listing</title>
	<script type="text/javascript" src="listingValidate.js"></script>
	<link rel="stylesheet" href="syle.css">
</head>

<body>

	<video autoplay muted loop id="myVideo">
	<source src="LoginVid.mp4" type="video/mp4">
	</video>
	<div class="box">
	<div id="createlisting">
	<form id="listingform" method="POST" enctype="multipart/form-data" action="" onsubmit="return validate()">
		<h1>My Account</h1>
		<input type="text" name="Title" placeholder="Title" required ><br>
		<input type="file" id="images" name="image"><br>
		<input type="text" id="price" placeholder="Price" name="price" required><br>
		<input type="text" id="quantity" placeholder="Quantity" name="quantity" required><br>
		<input type="text" placeholder="Description" name="description"><br>
		<input type="submit" name="submit" value="Insert">
	</form>
	</div>	
	</div>


<?php

if(!empty( $_POST)) 
{
try{


$fileContent= addslashes(file_get_contents($_FILES['image']['tmp_name']));

$sql = "INSERT INTO listings (Item,Price,Startingcount,Description,Image) VALUES('".$_POST["Title"]."','".$_POST["price"]."','".$_POST["quantity"]."','".$_POST["description"]."','$fileContent')";
$result = mysqli_query($connection,$sql);
if($result == true)
        {
        $sql2 = "SELECT * FROM listings WHERE Item='".$_POST["Title"]."'";
        $result2 = mysqli_query($connection,$sql2);
        while($row = mysqli_fetch_assoc($result2)) 
        {

            $sql2 = "INSERT INTO inventory (Id, Item, Startingcount, Endingcount, Itemsold, Price, Cashcollected) VALUES ('".$row['Id']."','".$row['Item']."','".$row['Startingcount']."','".$row['Startingcount']."','0','".$row['Price']."','0')";

            mysqli_query($connection, $sql2);
        }

    echo"<h2>"."Thank you for registering"."</h2>";
    header("Location: myaccount.php");
    die();
}
else
{
    echo "<h2>".'<a href="createlisting.php">Click here</a>'." to try again."."</h2>";
}
$pdo= null;
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
}


?>


</body>

</html>