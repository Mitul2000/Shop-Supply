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
	<title>Selected Product</title>
	<script type="text/javascript" src="Infovalidation.js"></script>
    <link rel="stylesheet" href="syle.css">
	
</head>
<body>
	<video autoplay muted loop id="MyVideo">
		<source src="LoginVid.mp4" type="video/mp4">
	</video>

	
<div id="productdisplay">
	
<form  method="POST" action="invupdate.php" name="orderlist" id="orderlist" onsubmit="return validation()">

	
<div class="image">
<?php

if($_POST['press'])
{
	$id= $_POST['press'];
	
	$sql = "SELECT * FROM listings WHERE Id='".$id."'";
	$result = mysqli_query($connection,$sql);
	if(mysqli_num_rows($result)> 0)
		{
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo "<h1>".$row['Item']."</h1><br>";
				echo "<img src='data:image/jpeg;base64,". base64_encode($row['Image']). "'/>";
       	 		echo "<h2>Price: ".$row['Price']."$</h2><br>";
       	 		echo "<h2>Description: </h2><h3>".$row['Description']."</h3><br>";
				echo '<h2>Quantity</h2><input type="number" id="quantity" value="1" name="quantity" min="1" max="'.$row['Startingcount'].'" onchange="calculatetotalprice()">';
				echo '<input type="hidden" id="prices" name="prices" value="'.$row['Price'].'">';
				echo '<input type="hidden" id="id" name="id" value="'.$id.'">';
				$Startingcount = $row['Startingcount'];
				$prices = $row['Price'];
				
								
				
			}
        }
    else 
    {
            echo "0 result";
    }
    mysqli_close($connection);    
}

?>
<div id = "totalPrice"></div>
</div>
<div class="info">
			

			<div class="Credit_Card">
            	
                <h3>Name</h3>
                
                <input type="text" id="fname" name='fname' placeholder="First Name" required >
                <input type="text" id="lname" name='lname' placeholder="Last Name" required >
                <br>
                
                <h3>Credit Card</h3>

                <input type="text"  id="CreditCardNum" name='CreditCardNum' placeholder="Card Number" required/>
                <input type="text"  id="SecurityCode" name='SecurityCode' placeholder="Security Code" required>
                <br>

                <h3>Expiration Month</h3>
                <select id="ExpireMonth" name='ExpireMonth'>
                <option value="None">None</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                </select>

                <h3 >Expiration Year</h3>
                <select id="ExpireYear" name='ExpireYear'>
                <option value="None">None</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
                </select>
                
               
                
            </div>
            <br>

            <div id= "ShippingAddress">
            	<h3>Shipping Address</h3>            	
                <input type="text" id="StreetAddress" name='StreetAddress' placeholder="Street Address" required >

                <input type="text" id="StreetAddress2" name='StreetAddress2' placeholder="Street Address Line 2" required>
                
                <input type="text" id="City" name='City' placeholder="City" required>
                
                <input type="text" id="State_province" name= "State_province" placeholder="State/Province" required>
                

                <input type="text" id="Postal_Zip" name='Postal_Zip' placeholder="Postal/Zip Code" required>

                <h3>Country</h3>
                <select id="CountrySelect" name='CountrySelect' required>
                	<option value ="Canada">Canada</option>
                	<option value ="USA">USA</option>
                </select>
            </div>

            <div id = "DeliveryDate">
            <h3>Delivery Date</h3>
            
			<input type="date" name="Deldate" id="Deldate" min="2019-11-01" required>
			<br>
			<label for="Deldate">Delivery Date</label>
            </div>


            <div id ="email">
            	<h3>Email</h3>
            	 <input type="email" id="email" name='email' placeholder="example@example.com" required >
                
            </div>
            <br>
            <div id = "Buttonreset">
            	<button id = "buttonclear" type="reset">Clear</button>
		        <button id= "submitbutton" onclick = "" type="submit">Submit</button>
            </div>
</div>
</form>
</div>

</body>