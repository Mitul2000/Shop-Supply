
<!-- Listing page that inputs the product image, title.
This page will allow the users to buy products placed in the listing after it is generated from createlisting.php-->
<html>
<head>
	<title>Product Listings</title>
	<link rel="stylesheet" href="syle.css">
</head>
<body>
	<video autoplay muted loop id="myVideo">
		<source src="LoginVid.mp4" type="video/mp4">
	</video>
	<form method="POST" action="viewproduct.php">
	<h1>Listings</h1>
	<div id="listofproducts">
	<table id="producttable">
		<thead>
			<tr>
				<th>Product Image</th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Product Description</th>
				<th>Purchase Product</th>
				
			</tr>
		</thead>
		<tbody>
	<?php

		
		$connection = mysqli_connect("localhost","root","100700131","finalproject");
		if (!$connection) 
		{
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM listings";
		$result = mysqli_query($connection,$sql);
		
		if(mysqli_num_rows($result)> 0)
		{
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo "<tr><td>";
				echo '<img src="data:image/jpg;base64,'.base64_encode( $row['Image'] ).'" alt="Image" style="width: 100px; height: 100px;"/>'."</td>";
				echo "<td>".$row['Item']."</td>";
				echo "<td>".$row['Price']."</td>";
				echo "<td>".$row['Description']."</td>";
				echo "<td><button type=\"submit\" name=\"press\" value=".$row['Id'].">View Detail</button></td>";
				echo "</tr>"; 
				
				
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