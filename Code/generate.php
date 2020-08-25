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
    <title>Inventory Sheet</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		table
		{	
			
			border-collapse: collapse;
			width: 100%;
			color: #d96459;
			font-family: monospace;
			font-size: 25px;
			text-align: left;
			
		}
		th{
			background-color: #588c7e;
			color:white;
		}
		tr:nth-child(even) 
		{
			background-color:#f2f2f2;
		}
	</style>
</head>
<body>
	
    <div id="inventory">
    <table id="inventorytable">
        <tr>
            <th>Product Name</th>
            <th>Starting Count</th>
            <th>Ending Count</th>
            <th>Item Sold</th>
            <th>Price</th>
            <th>Revenue</th>

        </tr>
    <?php
    $sql = "SELECT * FROM inventory";
    $result = mysqli_query($connection,$sql);
    if(mysqli_num_rows($result)> 0)
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                echo"<tr>";
                echo "<td>".$row['Item']."</td>";
                echo "<td>".$row['Startingcount']."</td>";
                echo "<td>".$row['Endingcount']."</td>";
                echo "<td>".$row['Itemsold']."</td>";
                echo "<td>".$row['Price']."</td>";
                echo "<td>".$row['Cashcollected']."</td>";
                echo"</tr>";
            }
            echo "</table>";

        }

        else {
            echo "0 result";
        }
        mysqli_close($connection);
    ?>
    </div>
</body>