<?php 
require 'config.php';

session_start() ;
$id= $_SESSION["userID"];

$sql = "SELECT * FROM details WHERE user_id=$id";

$result = $con -> query($sql);
$resultcheck =$result->fetch_assoc();
$fname = $resultcheck['fname'];
$lname = $resultcheck['lname'];
$uname = $resultcheck['username'];
$email = $resultcheck['email'];
$address = $resultcheck['address'];
$password = $resultcheck['password'];
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../css/signup.css">
   </head>
<body>
  <div class="container">
    <div class="title">Edit profile</div>
    <div class="content">
      <form method="post" action="update.php" onsubmit="return myEdit()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Fisrt Name</span>
            <input type="text" placeholder="Enter your firstname" name="Fname" value="<?php echo $fname;?>"  >
          </div>
          <div class="input-box">
            <span class="details">Last name</span>
            <input type="text" placeholder="Enter your lastname" name="Lname" value="<?php echo $lname;?>" >
          </div>
          <div class="input-box">
            <span class="details">User name</span>
            <input type="text" placeholder="Enter your username" name="username" value="<?php echo $uname;?>" >
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" id="email" value="<?php echo $email;?>" required>
          </div>
          <input type="hidden" name="usrid" value="<?php echo $id;?>">
          <div class="input-box">
              <span class="details">Address</span>
            <textarea rows="5" cols="40" name="address" id="address" ><?php echo $address;?></textarea>
          </div>
          <div>
          <div class="input-box">
            <span class="details" style="width:500px;">Password</span>
            <input type="password" placeholder="Enter your password" name="password" id="password"value="<?php echo $password;?>" required >
</div>

<b>Show Password</b>
<input type="checkbox" onclick="Toggle()"></div>

            <script>
            // Change the type of input to password or text
                function Toggle() {
                    var temp = document.getElementById("password");
                    if (temp.type === "password") {
                        temp.type = "text";
                    }
                    else {
                        temp.type = "password";
                    }
                }
        </script>
          
        </div>
        <div class="button">
          <input type="submit" value="Confirm" name="editProfile">
        </div>
      </form>
    </div>
  </div>

<script> function myEdit() {

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
if (p.search(/[0-9]/) < 0) {
  errors.push("Your password must contain at least one digit.");
}

var email = document.getElementById("email").value;

var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

if (!mailformat.test(email)) {
  errors.push("You have entered an invalid email address!");
}

if (errors.length > 0) {
  alert(errors.join("\n"));
  return false;
}
}

</script>
</body>
</html>