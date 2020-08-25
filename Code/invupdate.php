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

	if(!empty( $_POST))
	{
		$id= $_POST['id'];
		$sql = "SELECT * FROM inventory WHERE Id='".$id."'";
		$result = mysqli_query($connection,$sql);
		
		if(mysqli_num_rows($result)== 1)
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
				$itemsold = $row['Itemsold'];
				$Endingcount = $row['Endingcount'];
				$itemprice = $row['Price'];
			}
		}
		$sql1= "UPDATE inventory SET Endingcount ='".($Endingcount-$_POST['quantity'])."' WHERE Id= '".$id."'";
		$insert1= mysqli_query($connection,$sql1);
		if ( $insert1 == true ) 
		{
		
		}
		else
		{
			die("Error: {$connection->errno} : {$connection->error}");
		}	
		
		$itemsoldcalc = ($itemsold + $_POST['quantity']);
		
		$sql2= "UPDATE inventory SET Itemsold ='".$itemsoldcalc."' WHERE Id = '".$id."'";
		$insert2= mysqli_query($connection,$sql2);
		if ( $insert2 == true  ) 
		{
		
		}
		else
		{
			die("Error: {$connection->errno} : {$connection->error}");
		}
		
	}
	if(!empty( $_POST))
	{
		$id= $_POST['id'];
		$sql = "SELECT * FROM inventory WHERE Id='".$id."'";
		$result = mysqli_query($connection,$sql);
		
		if(mysqli_num_rows($result)== 1)
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
				$itemsold = $row['Itemsold'];
				$itemprice = $row['Price'];
			}
		}
		$cashcollectcalc = ($itemprice * $itemsold);

		$sql3= "UPDATE inventory SET Cashcollected ='".$cashcollectcalc."' WHERE Id = '".$id."'";
		$insert3= mysqli_query($connection,$sql3);
		if ( $insert3 == true  ) 
		{
		
		}
		else
		{
			die("Error: {$connection->errno} : {$connection->error}");
		}
		header("Location: index.html");
		die();
	}
?>