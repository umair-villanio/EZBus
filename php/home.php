<!DOCTYPE html>

<?php
	session_start() ;
	if(isset($_SESSION["userID"]))
	{
		header("Location:homepage.php") ;
	}

?>
<html>
	<head>
		<title>ezBus</title>
		<link rel ="stylesheet" type ="text/css" href="../css/homepage _before.css">
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
						<td align="right"><h4 style="margin-top: 50px;">Have an account? <a href="login.php" class="LogIn">Log In</a></h4>
						<h4>Don't have an account? <a href="Sign up.php" class="register">Register</a></h4></td>
					</tr>
				</table>
				<!--Navigation bar -->
				<ul class="list">
					<button class="btn"><li class="list"><a href="home.php">Home</a></li></button>
					<button class="btn"><li class="list"><a href="rv.php">Reviews</a></li></button>
					
				</ul>
			</header>
			<hr>
			<!--Search box -->
			<div class="search-button">
					<center><a href="search.php"><button class="bttn buss">Search Bus</button></a></center>
			</div>
			<div>
				<table class="aboutUs" width="100%">
				<tr>
					<th align="center" width="50%">
					<h3> Why Choose Us? </h3>
					</th>
					<th width="50%;" align="center" style="margin-left: 20px;">
					<h3 >About Us</h3>
					</th>
				</tr>
				<tr>
					<td align="left" style="margin-left: 20px;">
						<p>
							<ul style="margin-left: 80px;">
								<li>24/7 non-stop Service</li>
								<li>Able to book from anywhere</li>
								<li>Avoid waiting in long queues</li>
								<li>Save your valuable time</li>
								<li>Plan your journey early</li>
							</ul>
						</p>
					</td>
					<td align="justify">
					<div>
						<p>
							We provide full fledged online bus booking platform to reserve bus seats.
							Passengers can make their reservations online and refund if they wish to. 
							The bus tickets can reserved either by paying a half payment or a full 
							payment according to the customer's need. Once the reservation is confirmed 
							an email will be sent to the user or customer.
						</p>
					</div>
					</td>
				</tr>
				</table>
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