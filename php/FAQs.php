<!DOCTYPE html>
<html>
	<head>
		<title>ezBus</title>
		<link rel ="stylesheet" type ="text/css" href="../css/FAQss.css">
		<link rel ="stylesheet" type ="text/css" href="../css/homepage.css">
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
						<td align="right" class="Username">Welcome <?php session_start(); echo $_SESSION["username"];?></td>
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
			
			<div class ="segment">
				<h3>FAQs - Frequently Asked Questions</h3>
				<p class ="Head">FAQs</p>
				<div class="faqs">
					<details>
						<summary> Is it possible to get a refund if a booking was cancelled? </summary>
						<p class="text">The answer is yes, you can. There is a refund button after a customer reserves a seat.
Once it is clicked a refund request will be sent to the admin</p>
					</details>
					<details>
						<summary> Is it possible to book more than one seat per Customer? </summary>
						<p class="text">Yes it is possible to reserve more than one seat using one Cutomer account but the full payment or payment in half must be given for the number of seats.</p>
					</details>
					<details>
						<summary>Will I be able to update my registration details at a later date? </summary>
						<p class="text">Once you’ve registered with us, you can update your details at any time. For example, if you add your new password or email if you want to.  You can add this information whenever you want to.</p>
					</details>
					<details>
						<summary>Can I delete my review once it's made? </summary>
						<p class="text">Unfortunately no, you cannot delete or edit your review. But a request can be sent to the admin mentioning that the customer wants to change their review</p>
					</details>
				</div>
			</div>
			
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