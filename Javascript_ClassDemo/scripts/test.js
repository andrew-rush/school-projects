// JavaScript Document

function showPopup(){
   //opens the pop up from where values will passed to this page
     window.showModalDialog('popup.html',"window",'center:yes');
  }

function setVal(valFromPopup){
  //this function will be called from the popup and the value passed in (valFromPopup).
  //Value of someElement in someForm in this page will be set to valFromPopup.
  document.aForm.aField.value=valFromPopup;
}

 function submitVal(val){
     var myObj=window.dialogArguments;
	 alert(myObj.value);
      //myObj.setVal(val); //calls the js method in the main page.
      window.close();
 }