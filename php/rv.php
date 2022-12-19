<!DOCTYPE html>
<html>
	<head>
		<title>ezBus</title>
		<link rel ="stylesheet" type ="text/css" href="../css/review.css">
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
					<button class="btn"><li class="list"><a href="rv.php">Review</a></li></button>

				</ul>
			</header>
			<hr>	
			
			
			
			<?php
							//Linking the configuration file
							require 'config.php';
							
							$sql = "SELECT D.username, R.review_rating, R.Review_comment from review R, details D WHERE D.user_id = R.user_id";
							
							$result = $con->query($sql);
							
							if($result->num_rows > 0)
							{
								echo "<table border='3' class='rating_table'>
										<tr>
											<th>Username</th>
											<th>Review Rating</th>
											<th>Comment</th>
										</tr>" ;
								
								//read data
								while($row = $result->fetch_assoc())
								{
									echo "<tr><td>". $row["username"]."</td><td>" .$row["review_rating"]. "</td><td>" . $row["Review_comment"]."</td><br>" ;
								}
								echo "</table>";
							}
							else
							{
								echo "no results";
							}
							
							$con->close();
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