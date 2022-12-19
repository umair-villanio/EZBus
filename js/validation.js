function myFunction() {

   var p = document.getElementById('password').value,
     errors = [];
   if (p.length < 8) {
     errors.push("Your password must be at least 8 characters");
   }
   if (p.length > 15) {
     errors.push("Your password must be less than 15 characters");
   }
   if (p.search(/[a-z]/i) < 0) {
     errors.push("Your password must contain at least one letter.");
   }
   if(p.search(/([A-Z])/)<0){
    errors.push("Your password must contain at least one uppercase letter.");
  }
   if (p.search(/[0-9]/) < 0) {
     errors.push("Your password must contain at least one digit.");
   }

   var cnfrm = document.getElementById("cnfrm").value;


   if (p != cnfrm) {
     errors.push("Passwords do not match");

   }

   var email = document.getElementById("email").value;

   var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.com)+$/;

   if (!mailformat.test(email)) {
     errors.push("You have entered an invalid email address!");
   }

   if (errors.length > 0) {
     alert(errors.join("\n"));
     return false;
   }
 }

 function myEdit() {

   var p = document.getElementById('password').value,
     errors = [];
   if (p.length < 8) {
     errors.push("Your password must be at least 8 characters");
   }
   if (p.length > 15) {
     errors.push("Your password must be less than 15 characters");
   }
   if (p.search(/[a-z]/i) < 0) {
     errors.push("Your password must contain at least one letter.");
   }
   if(p.search(/([A-Z])/)<0){
    errors.push("Your password must contain at least one uppercase letter.");
  }
   if (p.search(/[0-9]/) < 0) {
     errors.push("Your password must contain at least one digit.");
   }
   
   var email = document.getElementById("email").value;
   
   var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.com)+$/;
   
   if (!mailformat.test(email)) {
     errors.push("You have entered an invalid email address!");
   }
   
   if (errors.length > 0) {
     alert(errors.join("\n"));
     return false;
   }
   }


 

