<!DOCTYPE html>
<?php
  session_start() ;
?>

<html>

<head>
  <link rel="stylesheet" href="../css/signup.css">
  <title>Sign up</title>
   <script src="../js/validation.js"> 

  </script>
</head>

<body>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<div class ="cntr" style="width:100%;">
		<div class="whole" >
			<header>
				<table>
					<tr>
						<td width="50px">
						<!--bus logo -->
						<div class="logo">
							<a href="#"><img src="../images/download.jpg" alt="Bus logo" ></a>
						</div>
						</td>
						<td><a href="#" id="Name"><h1>Welcome to eZBus</h1></a></td>
						
					</tr>
				</table>
				<!--Navigation bar -->
				<ul class="list">
					<button class="btn"><li class="list"><a href="home.php">Home</a></li></button>
					<button class="btn"><li class="list"><a href="review.php">Reviews</a></li></button>
				</ul>
			</header>
			<hr>
			<br>

			<div style="display:flex;justify-content:center">
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form method="post" action="update.php" onsubmit="return myFunction()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Fisrt Name</span>
            <input type="text" placeholder="Enter your firstname" name="Fname" required>
          </div>
          <div class="input-box">
            <span class="details">Last name</span>
            <input type="text" placeholder="Enter your lastname" name="Lname" required>
          </div>
          <div class="input-box">
            <span class="details">User name</span>
            <input type="text" placeholder="Enter your username" name="username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="Email" id="email" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <textarea rows="5" cols="40" name="address" id="address"></textarea>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" id="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" id="cnfrm" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="Register" value="Register">
        </div>
        <p style="text-align:center">Already registered? <a href="login.php">Sign in</a></p>
      </form>
    </div>
  </div>
</div>
</div>
</div>
  <?php
    echo "<script>alert('Registration succesfull'</script>";
  ?>

<script>
function myFunction() {

var p = document.getElementById('password').value,
  errors = [];
if (p.length < 8) {
  errors.push("Your password must be at least 8 characters");
}
if (p.length > 15) {
  errors.push("Your password must be less than 15 characters");
}
if (p.search(/[a-z]/) < 0) {
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
  errors.push("Make sure to have @ and end with '.com' in your Email!");
}

if (errors.length > 0) {
  alert(errors.join("\n"));
  return false;
}
}
  </script>
</body>

</html>