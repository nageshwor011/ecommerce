 /* code for form validation of contract page*/
 function conValidation() {

	var fname = document.getElementById('fName').value;
	var email = document.getElementById('email').value;
	var messages = document.getElementById('messages').value;
	var phonenumber = document.getElementById('mobileNo').value;
	var phonenumber = document.getElementById('mobileNo').value;
	
	if(fname.trim() ==''){
		alert('please fill the name');
	}
	if(email.trim() ==''){
		alert('please fill the email');
	}
	if(messages.trim() ==''){
		alert('please fill the message');
	}
	if (phonenumber.trim() =='') {
	  alert("please fill phonenumber");
	  return false;
	}
	if (isNaN (phonenumber)) {
	  alert("enter Number only not charcter");
	}
	if (phonenumber.length !=10) {
	  alert("mobile number must be 10 digit ");
	  return false;
	}
	
 }

 function signIN(){
	var sinEmail = document.getElementById('emaillogin').value;
	var sinPassword = document.getElementById('passwordlogin').value;
	var emaillogin = document.getElementById('emailloginError').value;

	if(sinEmail.trim() ==''){
		alert('please fill the Email ID');
		emaillogin.innerHtml= 'Please fill the email id it cant be blank';
	}
	if(sinPassword.trim() ==''){
		alert('please fill the Password');
	}
 }