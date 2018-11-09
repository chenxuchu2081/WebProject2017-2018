   //form is not allow nothing
   function checkFields() {
	if (document.getElementById('User').value == ""){
	  alert("Please your full name!");
	  return false;
	}
	if (document.getElementById('email').value == ""){
	  alert("Please enter your email!");
	  return false;
	}
	if (document.getElementById('telephone').value == ""){
	  alert("Please enter your telephone!");
	  return false;
	}
	if (document.getElementById('ordernumber').value == ""){
	  alert("Please enter the number of your orders!");
	  return false;
	}
			
    }

	//all select checkbox
	function allselected(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
     
	 //form sumbit email
	 function checkemail(){
		 if (document.getElementById('Email').value == ""){
	  alert("Please enter your email!");
	  return false;
	}
	 }
	



	