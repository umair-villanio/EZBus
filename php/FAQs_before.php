<!DOCTYPE html>
<?php
session_start() ;
	if(isset($_SESSION["userID"]))
	{
		header("Location:FAQs.php") ;
	}
?>

<html>
	<head>
		<title>ezBus</title>
		<link rel ="stylesheet" type ="text/css" href="../css/before_login.css">
		<link rel ="stylesheet" type ="text/css" href="../css/FAQss.css">
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
						<td align="right"><h4 style="margin-top: 50px;">Have an account? <a href="login.php" class="LogIn">Log In</a></h4>
						<h4>Don't have an account? <a href="#" class="register">Register</a></h4></td>
						
					</tr>
				</table>
				<!--Navigation bar -->
				<ul class="list">
					<button class="btn"><li class="list"><a href="home.php">Home</a></li></button>
					<button class="btn"><li class="list"><a href="rv.php">Review</a></li></button>

				</ul>
			</header>
			<hr>	
			
			
			
			<div class ="segment">
				<h3 style="padding-top : 13px ; margin-left: 10px ;">FAQs - Frequently Asked Questions</h3>
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
			<td align="right"><a href="FAQs_before.php" class="FQs">FAQs</a></td>
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