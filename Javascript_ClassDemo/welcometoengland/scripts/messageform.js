// JavaScript Document

	var messageText = "Welcome to England!!! ... Become a Member Today!!! ---";
	var messageLength = messageText.length - 1;
	
	function scrollMessage()
		{
			tempMessage = messageText.substring(1, messageLength) + messageText.substring(0,1);
			messageText = tempMessage;
			document.myForm.message.value = messageText;
			setTimeout("scrollMessage()", 250);
		}