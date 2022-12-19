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
        header("Location:rv.php") ;
    }

    //echo $_SESSION["link"] ;
?>
<?php

	//linking configuration file
	require 'config.php';
	

?>


<html>
	<head>
		<title>ezBus</title>
		<link rel ="stylesheet" type ="text/css" href="../css/review.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css"
		 integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
		<script src="../js/profile.js"></script>
	</head>
	<body>
	<div class ="container">
		<div class="whole">
			<header>
				<table>
					<table>
					<tr>
						<td width="50px">
						<!--bus logo -->
						<div class="logo">
							<a href="#"><img src="../images/download.jpg" alt="Bus logo" ></a>
						</div>
						</td>
						<td><a href="#" id="Name"><h1>Welcome to eZBus</h1></a></td>
						<td align="right" class="Username">Welcome <?php  echo $_SESSION["username"];?></td>
						<td align="right" width="10px" style="padding-left:5px;"><img src="../images/user.jpg" id="prfuser"></td>
						<td width="10px" style="padding-top:30px; padding-right:10px;" align="left">
							<div class="prfedit">
								<button onclick="myFunction()" class="editbutton"><i class="arrow down"></i></button>
								<div id="listItems" class="droplist">
									<a href="profile.php">Edit Profile</a>
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
					<button class="btn"><li class="list"><a href="feedback.php">Contact us</a></li></button>
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
			<h2 class="review">Let Us Know Your Review!</h2><br>
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
					<label style="font-size: 18px; margin-left: 100px;" >Ratings:</label>	
					<div class="rating">
						<input type="radio" name="star" id="star1" value="5"><label for="star1"></label>
						<input type="radio" name="star" id="star2" value="4"><label for="star2"></label>
						<input type="radio" name="star" id="star3" value="3"><label for="star3"></label>
						<input type="radio" name="star" id="star4" value="2"><label for="star4"></label>
						<input type="radio" name="star" id="star5" value="1"><label for="star5"></label>
					</div>
					<br><br><br><br><br>
					<div class="review_area">
					<label style="font-size: 18px;">Enter your comment:</label><br>
					<textarea name="Comment" rows="9" cols="50" style="font-size: 16px;"></textarea>
					</div><br>
					<div class="sumbitBTN">
					<input type="submit" value="SUBMIT" name="btnsubmit">
					</div>
				</form>
				
				<?php 
				
					if(isset ($_POST['btnsubmit']) )
					{

						$rate = $_POST["star"];
						$review_comment = $_POST["Comment"];
						
						$recorded_id = $_SESSION["userID"];
						
						$sqli = "SELECT user_id FROM review WHERE user_id='$recorded_id'";
						$row = $con -> query($sqli);
						
						if($result = $row->fetch_assoc())
						{
							echo "<script>alert('You have already made a review');
							window.location.replace('Review.php')</script>;";
							
						}
						else
						{
							$sql = "Insert into review(user_id , review_rating, Review_comment) values
							( (SELECT user_id FROM details WHERE user_id = $recorded_id), $rate , '$review_comment' )";
						
							if($con -> query($sql))
							{
								echo "<br>Data inserted succefully";
							}
							else
							{
								echo "<br>Error";
							}
							 
						}
						$result = $row->fetch_assoc();
						
						
						$con  -> close();
					}
				?>
				
				<?php
							//Linking the configuration file
							require 'config.php';
							
							$sql = "SELECT D.username, R.review_rating, R.Review_comment from review R, details D WHERE D.user_id = R.user_id";
							
							$result = $con->query($sql);
							
							if($result->num_rows > 0)
							{
								echo "<br><br><table border='3' class='rating_table'>
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
				<br><br>
				
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
		</tr>
		
		<tr>
			<td>eZbus21@gmail.com</td>
			<td style="padding-left:150px;">Instagram - eZbus</td>
			<td align="right"><a href="FAQs.php" class="FQs">FAQs</a></td>
		</tr>
		<tr>
			<td>HotLine - 07738921414</td>
			<td style="padding-left:150px;"> Twitter - eZbus service</td>
			<td align="right"><a href="#" class="TandC">Terms and Conditions</a></td>
		</tr>
		</table>
	</footer>
	</body>
</html>	