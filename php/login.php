<!DOCTYPE html>
<?php 
session_start() ;
?>
<html>
    <script src="../js/validation.js"> </script>
    <head>
        <title>Login form</title>
        <link rel="stylesheet" href="../css/login.css">
        
    </head>
    <body>	
        <div class ="container">
		<div class="whole">
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

            
        <form method="post" action="validate.php" class="box">
        <div class="title">Login</div><br>
             <div class="content">
             <form action="#">
            <div class="user-details">
            <div class="input-box">
            <input type="text" name="username" placeholder="Username" id="username" required>
            </div>
            <div class="input-box">
            <input type="password" name="password" placeholder="Password" id="password" required>
            <div id="message"></div>
            </div>
            <input type="checkbox" onclick="Toggle()">
            <b>Show Password</b>
      
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
            
            <div class="button">
            <input type="submit" value="Login" name="Login">
            </div>
             </div>
             </form>
             <p style="text-align:center">Not registered? <a href="Sign up.php">Register</a></p>
        </div>
        </form>

    
    </body>
</html>