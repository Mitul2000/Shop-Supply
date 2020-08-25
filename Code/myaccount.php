<html>
<head>
	<title>My Account</title>
	<link rel="stylesheet" href="syle.css">
</head>
<body>
	<video autoplay muted loop id="myVideo">
		<source src="LoginVid.mp4" type="video/mp4">
	</video>
	<div class="box">
	<h1>My Account</h1>
	<div id="generate">
		<form id="generateform" action="generate.php">
		<button type="submit">Generate Inventory Sheet</button>
		</form>
	</div>
	<div id="createlisting">
		<form id="createbutton" action="createlisting.php">
		<button type="submit">Create Listings</button>
		</form>
	<div id="return">
        <h2><a href="index.html">Home Page</a></h2><br>
    </div>
	<div id="listing">
	
	<table id="producttable">
		<thead>
			<tr>
				<th>Product Name</th>
				<th>Product Price</th>	
			</tr>
		</thead>
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
				echo "<tr>";
				echo "<td>".$row['Item']."</td>";
				echo "<td>".$row['Price']."</td>";
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
</div>
</body>