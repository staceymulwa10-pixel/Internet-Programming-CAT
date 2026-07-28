function validateRegistration(){

let fullname=document.forms["registerForm"]["fullname"].value;

let email=document.forms["registerForm"]["email"].value;

let password=document.forms["registerForm"]["password"].value;

let confirm=document.forms["registerForm"]["confirm_password"].value;

if(fullname==""){

alert("Full Name is required");

return false;

}

if(email==""){

alert("Email is required");

return false;

}

if(password.length<8){

alert("Password must be at least 8 characters");

return false;

}

if(password!=confirm){

alert("Passwords do not match");

return false;

}

return true;

}