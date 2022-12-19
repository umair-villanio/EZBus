<?php

    require 'config.php' ;
	
	$booking_id = $_POST["b_id"];
	$reason_ = $_POST["reason"];
	
	$sql = "INSERT INTO refund(Booking_id , Reason) VALUES ((SELECT Booking_id from bookings where Booking_id=$booking_id) , '$reason_')";
	
	
	if($con -> query($sql))
	{
		header("location:myBookings.php");
	}	
	else
	{
		echo "Error". $con -> error;
	}	
	
	$con -> close();	
?>	