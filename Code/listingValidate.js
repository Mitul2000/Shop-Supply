function validate()
{	
	var FileType = document.getElementById("images").value;
	
	if (FileType=='')
	{
		//alert("Please select an Image file");
		return false;
	}
	else
	{
		var checkextension= FileType.substring(FileType.lastIndexOf('.')+1).toLowerCase();
		if(checkextension== "jpg" || checkextension=="png"|| checkextension=="jpeg")
		{
			//alert("correct file type")
			return true;
			
		}
		else
		{
			alert("Incorrect file type of Image");
			document.getElementById("images").value='';
			return false;
			
		}

	}	
	
	var Pricecheck = document.getElementById("price").value;
	
	if(isNaN(Pricecheck))
	{
		alert("Invalid Price Input");
		return false;
	}
	
	var Quantitycheck = document.getElementById("quantity").value;
	console.log(Quantitycheck);
	//console(Number.isInteger(Quantitycheck));
	
	alert(Number.isInteger(Number(Quantitycheck)));
	if (Number.isInteger(Number(Quantitycheck)))
	{
		alert("The Quantity is an Integer");
		return true;
	}
	else
	{
		alert("The Quantity is not an Integer");
		return false;
	}
	
	
}