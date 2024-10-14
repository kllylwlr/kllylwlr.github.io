//ADDING EVENT LISTENERS ------------------------------
const quantFields = document.getElementsByClassName("quantField");

//Apply 'calcTotal' function to all quantFields
//loop through each quant field & add 'change' event listener
for (var i = 0; i < quantFields.length; i++) {
  quantFields[i].addEventListener("change", calcTotal);
}

//apply 'calcSubtotal' function to all quantFields
for (var i = 0; i < quantFields.length; i++) {
  quantFields[i].addEventListener("change", calcSubtotal);
}



/*
//apply increment value function to all plus buttons
const plusBtns = document.getElementsByClassName("plusBtn");
for (var i=0; i < plusBtns.length; i++){
  plusBtns[i].addEventListener("click", incVal);
}
*/

function calcSubtotal() {
	//create array of products
  products = document.getElementsByClassName("prodContainer");

	//loop through items ----
	for (var i=0; i < products.length; i++)
	{
		var currentItem = products[i];
		//get quantity & price (elements, not values yet)
		var quantityElement = currentItem.getElementsByClassName("quantField")[0];
		var priceElement = currentItem.getElementsByClassName("prodPrice")[0];

		//get values of quantity & price ------------
		//get value from para & remove the $ & parse as float
		var price = parseFloat(priceElement.innerText.replace("$",""));
		console.log("Price is: "+price);
		//get quantity from number input field
		var quantity = quantityElement.value;
		console.log("Quantity value: "+quantity);

		//multiply price & quantity to get subtotal
		var subtotal = quantity * price;
		console.log("subtotal value: "+subtotal);

		//display subtotal of product
		var subtotalElement = currentItem.getElementsByClassName("prodSubtotal")[0];
		subtotalElement.innerHTML = "Subtotal: $" + subtotal.toFixed(2);

	}
}


function calcTotal() {
  //initialize variables
  var total = 0;

  //create array of products
  products = document.getElementsByClassName("prodContainer");

  //iterate through products
  for (var i = 0; i < products.length; i++) {
    //temp store quantity value
    var quantity = products[i].getElementsByClassName("quantField")[0].value;
    //check quantity field more than 0
    if (quantity > 0) {
      //get product price element
      var priceEl = products[i].getElementsByClassName("prodPrice")[0];
      //remove "$" & convert price element to float
      var price = parseFloat(priceEl.innerText.replace("$", ""));
      //multiply price & quantity to get subtotal
      var subtotal = price * quantity;
      //add subtotal to total
      total += subtotal;

    }

  }
  //display total in checkout bar
  var totalElement = document.getElementById("total");
  totalElement.innerHTML = "Total: $ " + total.toFixed(2);
}

/*
//Increment Value Function
function incVal() {
  //get parent element of button
  var parentItem = this.parentNode;
  //get quantity field element
  var quantField = parent.getElementsByClassName("quantField")[0];
  //get current value of quantity field
  var currVal = quantField.value;
  //increment quantity field by 1
  quantField.value = ++curentVal;

}
*/

const checkoutBtn = document.getElementById("menuId");
//checkoutBtn.addEventListener("click", receipt(e));
//checkoutBtn.addEventListener("click", receipt);
checkoutBtn.addEventListener('submit', function(event)
//function receipt(event)
{
	console.log("Function executed");
	//stop form from submitting to new page
	event.preventDefault();

	//check if fields r empty or null (after item fields) ------------------------
	//create form array
	var formArray = document.forms[0];

	//iterate through all form elements to make sure there is value entered
		//'-1' excludes submit button
	for (let i=0; i < formArray.length-2; i++)
	{
		//if field w/ no value found
		if ((formArray.elements[i].value=="") || (formArray.elements[i].value==null))
		{
			//alert user of field they didn't fill out
			alert("Make sure to input "+formArray.elements[i].name);
			//bring focus to alerted field
			formArray.elements[i].focus();
			//select field
			formArray.elements[i].select();
			//turn background of element red
			formArray.elements[i].style.backgroundColor="red";

			//return so form isn't submitted & user must enter missing value
			return;
		}

	}

	//validate zip code (make sure 5 numbers) ---------------
	//get access to zip code
	var zipcodeField = document.getElementById("zipcode");
	var zipcode = zipcodeField.value;

	//check if zipcode length equal to 5
	if (zipcode.length != 5)
	{
		//alert user
		alert("Zip Code must be 5 digits long");
		//bring focus to field
		zipcodeField.focus();
		//select field
		zipcodeField.select();
		//highlight red
		zipcodeField.style.backgroundColor="red";
		return;
	}

	//validate email (make sure contains '@' & '.') ----------------
	//get access to email field
	var emailField = document.getElementById("email");
	var email = emailField.value;
	var atPresent = false;
	var dotPresent = false;

	//iterate through email
	for (let i=0; i < email.length; i++)
	{
		//if '@' found
		if (email[i]=="@")
		{
			atPresent = true;
		}
		//if '.' found
		if (email[i]==".")
		{
			dotPresent = true;
		}
	}

	//if '@' & '.' not present
	if ( !((atPresent == true) && (dotPresent == true)))
	{
		//alert user
		alert("Email must have an '@' symbol and '.' symbol");
		//bring focus to field
		emailField.focus();
		//select field
		emailField.select();
		//highlight red
		emailField.style.backgroundColor="red";
		return;
	}

	//validate phone number ----------
	//get access to email field
	var phoneField = document.getElementById("phone");
	var phone = phoneField.value;

	if (phone.length != 9)
	{
		//alert user
		alert("Phone Number must be 9 digits long");
		//bring focus to field
		phoneField.focus();
		//select field
		phoneField.select();
		//highlight red
		phoneField.style.backgroundColor="red";
		return;
	}


	//display receipt w/ all info in new HTML document --------------------------------

	//calculate how many items user bought --------------------
	//turn document objects into variables b4 new document opened
	//create array of items
	var productsArray = document.getElementsByClassName("prodContainer");
	//create array of items w/ value more than 0
	var cartArray = [];
	for (let i=0; i < productsArray.length; i++)
	{
		//get current item
		var currentItem = productsArray[i];
		//get quantity element of current item
		var quantityElement = currentItem.getElementsByClassName("quantField")[0];
		//get value of quantity
		var itemQuantity = quantityElement.value;
		//if value > 0, add to cart array
		if (itemQuantity > 0)
		{
			cartArray.push(currentItem);
			console.log("Current Array: "+cartArray);
		}
	}

	//get total (before document is cleared
	var totalValue = document.getElementById("total");
	totalValue = parseFloat(totalValue.innerText.replace("Total: $", ""));

	//get user's data
	var userName = document.getElementById("name").value;
	var userPhone = document.getElementById("phone").value;
	var userEmail = document.getElementById("email").value;
	var userZip = document.getElementById("zipcode").value;
	var creditCardValue = document.getElementById("creditCard").value;
	//append last 4 digits of credit card w/ substring
	var userCredit = "xxxx xxxx xxxx "+creditCardValue.substring(creditCardValue.length-4, creditCardValue.length);

	//Open new document
	document.open();

	//style sheet --------------
	var head = "<html><head><title>Receipt</title><link rel='stylesheet' href='style.css'></head><body style='background-color: #502E2C;'>";
	var body = "<div class='bodyText'><div class='receiptDiv'> <h2> Receipt </h2> <h3> Cart </h3> <hr>";
	//Cart grid header
	body += "<div class='gridContainer'> <div class='gridItem'> <h4>Item Image: </h4> </div> <div class='gridItem'> <h4>Item Name: </h4> </div> <div class='gridItem'> <h4>Quantity: </h4> </div> <div class='gridItem'> <h4>Subtotal: </h4> </div>";

	//for each item, create row of 4 grid items
	for (let j=0; j < cartArray.length; j++)
	{
		//get current item
		var currItem = cartArray[j];
		//get item image
		var itemImg = currItem.getElementsByClassName("menuImg")[0].src;
		body += "<div class='gridItem'> <img class='receiptImg' src='"+itemImg+"'> </div>";
		//get item name
		var itemName = currItem.getElementsByClassName("prodName")[0].innerText;
		console.log("Item Name: "+itemName);
		body += "<div class='gridItem'> <p>"+itemName+"</p> </div>";
		//get item quantity
		var itemQuant = currItem.getElementsByClassName("quantField")[0].value;
		console.log("Item Quantity: "+itemQuant);
		body += "<div class='gridItem'> <p>"+itemQuant+"</p> </div>";
		//get item subtotal
		var itemSubtotal = currItem.getElementsByClassName("prodSubtotal")[0];
		itemSubtotal = parseFloat(itemSubtotal.innerText.replace("Subtotal: $", ""));
		console.log("Item Subtotal: "+itemSubtotal);
		body += "<div class='gridItem'> <p>$"+itemSubtotal.toFixed(2)+"</p> </div>";
	}
	//grid 'total'
	body+= "<div class='gridItem'></div> <div class='gridItem'></div> <div class='gridItem'><p class='bold'>Total: </p></div> <div class='gridItem'><p>$"+totalValue.toFixed(2)+"</p></div>";
	//end of grid container
	body += "</div>";

	var currDate = new Date();
	//set year to 2023
	currDate.setFullYear(2023);
	//get month, day & year
	var currMonth = currDate.getMonth()+1;
	var currDay = currDate.getDate();
	var currYear = currDate.getFullYear();

	//print out user info --------------------------------------------------------
	//user info header
	body += "<h3> User Information </h3> <hr>";
	//date
	body += "<p>Date: "+currMonth+"/"+currDay+"/"+currYear+"</p>";
	//user's name
	body += "<p>Name: "+userName+"</p>";
	//user's phone
	body += "<p>Phone Number: "+userPhone+"</p>";
	//user's email
	body += "<p>Email Address: "+userEmail+"</p>";
	//user's zip code
	body += "<p>Zip Code: "+userZip+"</p>";
	//user's credit card
	body += "<p>Credit Card: "+userCredit+"</p>";

	//end of new document
	body += "</div></body></html>"

	//write  style sheet to document
	document.write(head);
	document.write(body);

	//list credit card number as 'x' for all digits except last

});
