<!DOCTYPE html>
<?php
	session_start() ;

	$_SESSION["link"] = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ;

	if (isset($_SESSION["userID"]))
		$cid = $_SESSION["userID"] ;
	else
		header("Location:login.php") ;


?>
<html lang="en">
<head>
    <meta charset="UTF-8" />

    <title>My reservations</title>
	<link rel="stylesheet" href="../css/myBookingsStyle.css" />
	<link rel="stylesheet" href="../css/headerfootertheme.css">
  
</head>
<body>
<div class="container">
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
					<button class="btn"><li class="list"><a href="#">Reservations</a></li></button>
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





<div class="table" >
<?php
    require 'config.php';

	$sql = "SELECT * FROM bookings WHERE User_id = $cid ";

	$result = $con -> query($sql);

	if($result -> num_rows > 0)
	{
		echo "<table >
				<tr>
					<th>Booking id</th>
					<th>Bus id</th>
					<th>Customer id</th>
					<th>Source</th>
					<th>Destination</th>
					<th>Date</th>
					<th>No of seats</th>
					<th>Price</th>
                    <th>Refund</th>               
				</tr>";
    
		while($row = $result -> fetch_assoc())
		{
			$bid = $row["Booking_id"] ; 

			$refunfsql = "SELECT Booking_id FROM refund WHERE Booking_id = $bid " ;

			$refResult = $con -> query($refunfsql) ;

			if($refResult-> num_rows > 0)
			{
				continue ;
			}

			else {

			

			echo "<form method= 'GET' action='Reason_refund.php'>" ;
			echo "<tr><td>".$row["Booking_id"]."</td>
					  <td>".$row["Bus_id"]."</td>
					  <td>".$row["User_id"]."</td>
					  <td>".$row["Source_station"]."</td>
					  <td>".$row["Destination_station"]."</td>
					  <td>".$row["Date"]."</td>
                      <td>".$row["No_of_Seats"]."</td>
					  <td>".$row["Price"]."</td>" ;
			
					  //$bid = $row["Booking_id"] ; 

			

			echo " <td><input class='refundbtn' name='refundbtn' type='submit' value='refund' ></td>
				</tr> " ;
			}

			// if ($refResult-> num_rows > 0)
			// {

			// 	echo " <td><input class='refundbtn' name='refundbtn' type='submit' value='refund' disabled ></td>
			// 	</tr> " ;
			// }
			// else
			// {
			// 	echo " <td><input class='refundbtn' name='refundbtn' type='submit' value='refund' ></td>
			// 	</tr> " ;
			// }
			
			?>
			<input  type="hidden" name="booking_id" value= <?php  echo $row['Booking_id']?> >
			
			</form>

			<?php
		}
		echo "</table>" ;
	}
	else{
		echo "<script>alert('No records')</script>";
	}
?>
</div>
</div>
<div>

	<footer class="ftr">
			<div class="footer">
	
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
					<td align="right"><a href="#" class="FQs">FAQs</a></td>
				</tr>
				<tr>
					<td>HotLine - 07738921414</td>
					<td style="padding-left:150px;"> Twitter - eZbus service</td>
					<td align="right"><a href="#" class="TandC">Terms and Conditions</a></td>
				</tr>
				</table>
			</div>
		</footer>
</div>
</body>
</html>