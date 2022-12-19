<?php
	session_start() ;

    require 'config.php' ;
	// from booking page
    $price = $_POST["price"] ;
    $seats = $_POST["NoOfSeats"] ;
    $bus_id = $_POST["bus"] ;
    $source_st = $_POST["start_station"] ;
    $destination_st = $_POST["end_station"] ;
    $bdate = $_POST["date"] ;
    $name = $_POST["booking_name"] ;
    $phone_no = $_POST["phone_no"] ;

	$cid =$_SESSION["userID"] ;
	//from payment page
	$payment_type = $_POST["ptype"];
	$card_no = $_POST["c_no"];
	$ctype = $_POST["c_type"];
	$exp_day = '01';
    $exp_month =$_POST["month"];	
	$exp_year =$_POST["year"];
	$cdate = $exp_year."-".$exp_month."-".$exp_day;
	

	if($payment_type == 'Full')
		$price = $price ;
	else if ($payment_type == 'Half')
		$price = floatval( $price )/ 2 ; 

	$sql = "INSERT INTO bookings( Bus_id , User_id , Source_station , Destination_station , Date , No_of_Seats ,Price , Card_type , Card_no , Expiry_Date , Payment_Type , Booked_name , Phone_no) VALUES ( $bus_id , $cid , '$source_st' , '$destination_st' , '$bdate' , $seats , $price , '$ctype' , '$card_no' , '$cdate' , '$payment_type' , '$name' , '$phone_no')";
	
	if($con -> query($sql))
	{
		echo "<script> alert('Reservation_succesfull!!!') ;</script>" ;
 		echo "<script> window.location.replace('myBookings.php') ;</script>" ;
	
    }

	else
	{
		echo "Error". $con -> error;
		header("Location:".$_SESSION["link"]) ;
	
	}	
	
	$con -> close();
	
?>	