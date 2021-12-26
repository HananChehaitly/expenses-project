// DOM Elements
windows.onload = function hanan(){
var emailElement = document.getElementById("e");
var formElement = document.getElementById("signupForm");

var phoneElement = document.getElementById("m");
var passwordElement = document.getElementById("p");
var confirmPasswordElement = document.getElementById("cp");
var submitElement = document.getElementById("reg");
var fnameElement = document.getElementById("f");
var lnameElement = document.getElementById("l");

var emailValid;
var confirmPass;
var phoneValid;
var fnameValid;
var lnameValid;
// Listeners

submitElement.addEventListener("click", function () {
    
  validateEmail();
  confirmPassword();
  validatePhone();
  validatefname();
  validatelname();

  if(!phoneValid){
    var element = document.getElementById("phone");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("phone");
    element.classList.remove("alert-danger");
  }


  if(!confirmPass){
    var element = document.getElementById("cpass");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("cpass");
    element.classList.remove("alert-danger");
  }

  if(!emailValid){
    var element = document.getElementById("validemail");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("validemail");
    element.classList.remove("alert-danger");
  }

  if(!fnameValid){
    var element = document.getElementById("fn");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("fn");
    element.classList.remove("alert-danger");
  }

  if(!lnameValid){
     var element = document.getElementById("ln");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("ln");
    element.classList.remove("alert-danger");
  }
  if (emailValid && confirmPass && phoneValid && lnameValid && fnameValid ) {
    formElement.submit();
  }
});

function validateEmail() {
  var emailValue = emailElement.value;
  emailValid = false;
  if (
    emailValue.length > 5 &&
    emailValue.lastIndexOf(".") > emailValue.lastIndexOf("@") &&
    emailValue.lastIndexOf("@") != -1
  ) {
    emailValid = true;
  }
}

function confirmPassword() {
  confirmPass = false;
  if (passwordElement.value == confirmPasswordElement.value && passwordElement.value.length > 5) {
    confirmPass = true;
  }
}

function validatePhone() {
  phoneValid = false;
  var phoneValue = phoneElement.value.split(" ").join("");
  if (
    (phoneValue.length == 12 || phoneValue.length == 11) &&
    phoneValue.indexOf("+961") == 0
  ) {
    phoneValid = true;
  }
}



function validatefname(){
  fnameValid = false;
  if(fnameElement.value.length>2){
      window.alert('entered');
    fnameValid = true;
  }
}

function validatelname(){
  lnameValid = false;
  if(lnameElement.value.length>2){
    lnameValid = true;
  }
}
}