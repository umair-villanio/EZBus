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
    <div class="title">Profile details</div>
    <div class="content">
      <form method="post" action="edit.php">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Fisrt Name</span>
            <input type="text" placeholder="Enter your firstname" name="Fname" value="<?php echo $fname;?>" readonly >
          </div>
          <div class="input-box">
            <span class="details">Last name</span>
            <input type="text" placeholder="Enter your lastname" name="Lname" value="<?php echo $lname;?>" readonly>
          </div>
          <div class="input-box">
            <span class="details">User name</span>
            <input type="text" placeholder="Enter your username" name="username" value="<?php echo $uname;?>" readonly>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="Email" value="<?php echo $email;?>" readonly>
          </div>
          <div class="input-box">
              <span class="details">Address</span>
            <textarea rows="5" cols="40" name="address" id="address" readonly><?php echo $address;?></textarea>
          </div>
          <div>
          <div class="input-box">
            <span class="details" style="width:500px;">Password</span>
            <input type="password" placeholder="Enter your password" name="password" id="password"value="<?php echo $password;?>"readonly >
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
          <input type="submit" value="Edit">
        
          
        

      </form>
      <form action="delete.php" class="button" onsubmit="return confirm()">
      <input type="submit" name="btndel" value="Delete">
    <script>
      function confirm(){
        var sure = prompt("Are you sure to delete the account? if yes then type 'CONFIRM'");
        if(sure=='CONFIRM'){
          return true;
        }        
        else{
          alert("Please type 'CONFIRM' to proceed")
          return false;
        }
      }
    </script>
    </div>
      </form>
    </div>
  </div>

</body>
</html>