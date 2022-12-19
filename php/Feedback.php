<!DOCTYPE html>
<?php
    session_start() ;

    $_SESSION["link"] = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ;

    

    if (isset($_SESSION["userID"]))
    {
        //echo "logged in" ;
        $uid = $_SESSION["userID"] ;
        //echo $cid ;
    }
    else 
    {
        header("Location:login.php") ;
    }

    //echo $_SESSION["link"] ;
?>
<html>
	<head>
		<title>ezBus</title>
		<link rel ="stylesheet" type ="text/css" href="../CSS/feedback.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="../js/profile.js"></script>
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
						<td align="right" class="Username">Welcome <?php echo $_SESSION["username"];?></td>
						<td align="right" width="10px" style="padding-left:5px;"><img src="../images/user.jpg" id="prfuser"></td>
						<td width="10px" style="padding-top:30px; padding-right:10px;" align="left">
							<div class="prfedit">
								<button onclick="myFunction()" class="editbutton"><i class="arrow down"></i></button>
								<div id="listItems" class="droplist">
									<a href="#Edit">Edit Profile</a>
									<a href="logout.php?Logout=Logout">Logout</a>
								</div>
							</div>
						</td>
					</tr>
				</table>
				<!--Navigation bar -->
				<ul class="list">
					<button class="btn"><li class="list"><a href="home.php">Home</a></li></button>
					<button class="btn"><li class="list"><a href="myBookings.php">Reservations</a></li></button>
					<button class="btn"><li class="list"><a href="Feedback.php">Contact us</a></li></button>
					<button class="btn"><li class="list"><a href="Review.php">Reviews</a></li></button>
					
					<?php
					
						require 'config.php';
						
						$vary = $_SESSION["username"];
					
						$sql="SELECT type FROM details WHERE username Like '$vary' ";
						
						$row = $con -> query($sql);
						
						$result = $row-> fetch_assoc();
						
						if ($result['type'] == 'A')
						{
							echo "<button class='btn'><li class='list'><a href='Admin/adminDashboard.php'>Admin</a></li></button>";
						}
						
					
					?>
					
				</ul>
			</header>
			<hr>
			<br><br>
			<div class="feedback_req">
			<h2>WE VALUE YOUR REQUESTS!</h2><br><br>
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label style="font-size: 18px;">Enter the subject of your request: </label><br>
			<input type="text" name="subject" style="margin-top: 5px; width:30% ; "required ><br><br>
			<label style="font-size: 18px;">Description</label><br>
			<textarea name="request" rows="8" cols="50" style="font-size: 18px; margin-top: 5px;" required></textarea>
			<br><br>
			<input type="submit" value="SUBMIT" name="btnsubmit">
			</form>
			
			<?php

				require 'config.php';

				if(isset ($_POST['btnsubmit']) )
				{
				
					$subject = $_POST["subject"];
					$req = $_POST["request"];
					
					$recorded_id = 1;
					
					$sql = "INSERT INTO feedback(user_id , subject ,feedback_content ,reply_status) values( (SELECT user_id FROM details WHERE user_id= $recorded_id) , '$subject' ,'$req',0)";
					
					if ( $con -> query($sql))
					{
						echo "<br>Request Sent!";
					}
					else
					{
						echo "error". $con->error;
					}
					
					$con -> close(); 
				}

			?>
		</div>
	</div>
	<!--footer --><!--some internal css has been added -->
	<footer class="ftr">
		<center><h3>Follow us on</h3></center><br>
		<table id="footerTable">
		<tr>
			<td></td>
			<td style="padding-left:150px;">Facebook  - eZbus Service</td>
			<td></td>
		<tr>
		<tr>
			<td>eZbus21@gmail.com</td>
			<td style="padding-left:150px;">Instagram - eZbus</td>
			<td align="right"><a href="FAQs.php" class="FQs">FAQs</a></td>
		<tr>
		<tr>
			<td>HotLine - 07738921414</td>
			<td style="padding-left:150px;"> Twitter - eZbus service</td>
			<td align="right"><a href="#" class="TandC">Terms and Conditions</a></td>
		<tr>
		</table>
	</footer>
	</body>
</html>	