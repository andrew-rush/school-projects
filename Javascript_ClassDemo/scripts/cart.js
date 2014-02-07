// JavaScript Document

	// set our variables
	var cart = new Array(); // holds the selected items
	var totalPrice = 0; // total price of selected items
	var titles = ["HTML5: Up & Running",
					"Introducing HTML5",
					"HTML5: Canvas",
					"The Book of CSS3",
					"CSS3: The Missing Manual",
					"CSS3: Pushing the Limits",
					"JavaScript: The Good Parts",
					"Functional JavaScript",
					"Testable JavaScript"];
					
	var prices = [17.99,
					20.20,
					28.91,
					21.36,
					20.99,
					30.62,
					17.99,
					20.24,
					19.98];
	var name = "";
	var customerID = "";
	var phone = "";
	var orderC;
	
	// function adds item items to cart and updates the totalPrice
	function addToCart(item)
	{
		cart.push(item);
		totalPrice = totalPrice + prices[item];
		alert("Successfully added \"" + titles[item] + " to your shopping cart.");
	}
	
	function viewCart()
	{	
		if(cart.length > 0)		
		{
			
			console.debug(this);
			
			var features = "toolbar=yes,location=no,directories=yes,menubar=yes";
			features += "scrollbars=yes,width=650,height=600,left=100,top=25";
			
			var orderC = window.open("", "CartWindow", features);
			orderC.document.open();
			orderC.document.write("<html><head><title>Shopping Cart Order</title>\n");
			orderC.document.write("<style>input {display:none} #nonprint{display:none}</style>\n");
			orderC.document.write("<script src=\"scripts/cart.js\"></script>");
			orderC.document.write("</head><body>\n");
			orderC.document.write("<table border=\"1\" width=\"500\">\n");
			orderC.document.write("<tr><td colspan = \"2\"><h1>Shopping Cart</h1></td></tr>\n");
			orderC.document.write("<tr><td width=\"300\">Name</td><td width=\"200\">" + name + "</td</tr>");
			orderC.document.write("<tr><td width=\"300\">Customer ID</td><td width=\"200\">" + customerID + "</td</tr>");
			orderC.document.write("<tr><td width=\"300\">Phone</td><td width=\"200\">" + phone + "</td</tr>");

			for(i=0; i<cart.length;i++)
			{
				if( titles[cart[i]] != "undefined")
					orderC.document.write("<tr><td width='300'>" + titles[cart[i]] + "</td><td width='100'>$" + prices[cart[i]] + "</td></tr>");
			}
			totalPriceFixed = totalPrice.toFixed(2);
			orderC.document.write("<tr><td width=\"300\">Total</td><td width=\"200\" colspan=\"2\">$" + totalPriceFixed + "</td></tr>");
			orderC.document.write("</table>");
			orderC.document.write("<p><a href=\"javascript: printOrder()\">print order</a><p>");
			orderC.document.close();
			orderC.focus();
		}
		else
		{
			alert("Your shopping cart is currently empty.");
		}
	}
	
	function printOrder()
	{
		//window.close();
		viewOrder();
	}
	
	function removeFromCart(item)
	{
		for(i=0; i<cart.length; i++)
		{
			if(cart[i] == item)
				cart.splice(item, 1);
		}
		viewCart();
	}
	
	
	function removeFromCartOld(id)
	{
		var element = document.getElementById(id + '_cartRow');
		var total = document.getElementById('cartTotal');
		var price = parseFloat(document.getElementById(id + '_price').innerHTML);
		
		totalPrice -= price;
		ftotalPrice = totalPrice.toFixed(2);
		total.innerHTML = '$' + ftotalPrice + '';
		element.parentNode.removeChild(element);
	}
	
	function viewOrder()
	{
		
			console.debug(this);
		if(name == "")
			name = prompt("Enter your name:", "");
		if(customerID == "")
			customerID = prompt("Enter your customer ID:", "");
		if(phone == "")
			phone = prompt("Enter your phone number:", "");
		
		var features = "toolbar=yes,location=no,directories=yes,menubar=yes";
		features += "scrollbars=yes,width=650,height=600,left=100,top=25";
		
		var order = window.open("", "OrderWindow", features);
			order.document.open();
			order.document.write("<html><head><title>Shopping Cart Order</title>\n");
			order.document.write("<style>input {display:none} #nonprint{display:none}</style>\n");
			order.document.write("<script src=\"scripts/cart.js\"></script>");
			order.document.write("</head><body onLoad='self.print()'>\n");
			order.document.write("<table border=\"1\" width=\"500\">\n");
			order.document.write("<tr><td colspan = \"3\"><h1>Order Form</h1><p style=\"text-align:center\">Thank you for your order, " + name + "</td></tr>\n");
			order.document.write("<tr><td width=\"300\">Name</td><td width=\"200\" colspan=\"2\">" + name + "</td</tr>");
			order.document.write("<tr><td width=\"300\">Customer ID</td><td width=\"200\" colspan=\"2\">" + customerID + "</td</tr>");
			order.document.write("<tr><td width=\"300\">Phone</td><td width=\"200\" colspan=\"2\">" + phone + "</td</tr>");

			for(i=0; i<cart.length;i++)
			{
				if( titles[cart[i]] != "undefined")
					order.document.write("<tr><td width='300'>" + titles[cart[i]] + "</td><td width='100'>$" + prices[cart[i]] + "</td><td width='100'><a href='#' onClick='removeFromCart(" + cart[i] + ")'>remove</a></td></tr>");
			}
			totalPriceFixed = totalPrice.toFixed(2);
			order.document.write("<tr><td width=\"300\">Total</td><td width=\"200\" colspan=\"2\">$" + totalPriceFixed + "</td></tr>");
			order.document.write("</table>");
			order.document.write("<p>Print this order and send it to me!<p>");
			order.document.close();
			order.focus();
	}
	
	function setValue(value)
	{
		
	}
