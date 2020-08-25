
var letters = /^[a-zA-Z]+$/;



function getQuantityPrice()
{
	var quantity = 0;
	var theForm = document.forms["orderlist"];
	var selectquantity = theForm.elements["quantity"];
	quantity = selectquantity.value;
	console.log(quantity);
	return quantity;
}

function calculatetotalprice()
{
	var totalprice = 0;
	var totalTaxed = 0;
	var price = document.getElementById('prices').value;
	console.log(price);
	var quantityprice = getQuantityPrice();
	totalprice = price * quantityprice;
	
	totalTaxed = totalprice*1.13;

	var divobj = document.getElementById('totalPrice');
    divobj.style.display='block';
	divobj.innerHTML = ("Total:            " + totalTaxed + "$");
	




}
function validation()
{

	//validates to see if there are just spaces in the First Name
	var FirstNameCheck = document.getElementById("fname").value;
	var modFirstname = FirstNameCheck.trim();

	//sets all the border color to null.
	document.getElementById("fname").style.borderColor=null;
	document.getElementById("lname").style.borderColor=null;
	document.getElementById("CreditCardNum").style.borderColor=null;
	document.getElementById("SecurityCode").style.borderColor=null;
	document.getElementById("ExpireMonth").style.borderColor=null;
	document.getElementById("ExpireYear").style.borderColor=null;

	//validates to 
	if(modFirstname == null || modFirstname == "" || !(modFirstname.match(letters)))
	{
		document.getElementById("fname").style.borderColor="red";
		alert("Invalid First Name input. Valid input requires no Spaces and no Numbers");
		return false;	
	}


	//validates to see if there are just spaces in the Last Name
	var LastNameCheck = document.getElementById("lname").value;
	var modLastname = LastNameCheck.trim();
	if (modLastname == null || modLastname == ""|| !(modLastname.match(letters)))
	{
		document.getElementById("lname").style.borderColor="red";
		alert("Invalid Last Name input. Valid input requires no Spaces and no Numbers");
		return false;	
	}

	//validates credit card number 
	var CreditNumCheck = document.getElementById("CreditCardNum").value;
	
	if ((isNaN(CreditNumCheck)) || CreditNumCheck.length<15 || CreditNumCheck.length>16)
	{
		document.getElementById("CreditCardNum").style.borderColor="red";
		alert("Invalid CreditNumCheck input. Valid input require 15 or 16 digit numbers");
		return false;
	}

	//validates security Code
	var SecurityCodeCheck = document.getElementById("SecurityCode").value;
	if ((isNaN(SecurityCodeCheck)) || SecurityCodeCheck.length<3 || SecurityCodeCheck.length>4)
	{
		document.getElementById("SecurityCode").style.borderColor="red";
		alert("Invalid Secruity Code input. Valid input require 3 or 4 digit numbers");
		return false;
	}

	//validates Expiration Month
	var exMonth = document.getElementById('ExpireMonth').value;
	if (exMonth == "None")
	{
		document.getElementById("ExpireMonth").style.borderColor="red";
		alert("Invalid Expiration Month. Select the appropriate Month");
		return false;
	}

	//validation for Expiration Year
	var exYear = document.getElementById("ExpireYear").value;
	if(exYear == "None")
	{
		document.getElementById("ExpireYear").style.borderColor="red";
		alert("Invalid Expiration Year. Select the appropriate Year");
		return false;
	}
	if (true)
	{
		alert("Purchase made successfully");
	}


}