// JavaScript Document
	
	function addCookie(tag, value)
	{
		var expireDate = new Date;
		var expireString = "";
		expireDate.setTime( expireDate.getTime() + (1000 * 60 * 60 * 24 * 365) );
		expireString = "expires " + expireDate.toGMTString();
		document.cookie = tag + '=' + escape(value) + ";" + expireString + ";";
	}
	
	function getCookie(tag)
	{
		var value = null;
		var myCookie = document.cookie + ";";
		var findTag = tag + "=";
		var endPos;
		if(myCookie.length > 0)
		{
			//alert("Cookie has a value: " + myCookie);
			var beginPos = myCookie.indexOf(findTag);
			if(beginPos != -1)
			{
				//alert("Searching string beginning at position: " + beginPos);
				beginPos += findTag.length;
				endPos = myCookie.indexOf(";", beginPos);
				
				if(endPos == -1)
				{
					endPos = myCookie.length;
				}
				value = unescape(myCookie.substring(beginPos, endPos));
			}
		}
		return value;
	}
	
	function checkVisitor()
	{
		var username = getCookie('name');
		//alert("Hello, " + username);
		if(username != null)
		{
			// alert("Welcome back to the website, " + username);
			var message = "<h3 class = \"centerContent\">Welcome back to the website, " + username + "</h3>";
			document.getElementById("welcome").innerHTML=message;
		} 
		else 
		{
			username = prompt("Please enter your name");
			if( (username != null) && (username != "") )
			{
				addCookie("name", username);
			}
		}
	}