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
    <title>Seat Reservation</title>

    <link rel="stylesheet" href="../css/reservationStyle.css">
    <link rel="stylesheet" href="../css/headerfootertheme.css">
</head>

<body>
    <header>
        <h1>eZBus</h1>
    </header>

    <div id="main_container">
        <div id="reservation_details">


            <h2 id="topic">Fill the followings...</h2>

            <form method="GET" action="paymentpage.php " onsubmit="return phonecheck()">

                <?php
                $bus = $_GET["bus"];
                $date = $_GET["date"];
                $start_station = $_GET["start_station"];
                $end_station = $_GET["end_station"];
                $r_source = $_GET["route_source"];
                $r_destination = $_GET["route_destination"];
                $r_detail = $_GET["route_detail"];
                $b_start = $_GET["start_time"];
                $b_end = $_GET["end_time"];
                $bus_no = $_GET["bus_no"];
                $price = $_GET["price"];
                ?>

                
                <label for=''> Bus Number : </label> <br>
                <input type='text' class='input' value="<?php echo $bus_no; ?>"  readonly><br> <br> 

                <label for=''> Date : </label> <br>
                <input type='text'class='input' value="<?php echo $date ;?>" name='date' readonly><br> <br> 

                <label for=''> Start Time : </label> <br>
                <input type='text' class='input' value="<?php echo $b_start. '('. $r_source.')' ;?>"  readonly><br> <br> 

                <label for=''> End time : </label> <br>
                <input type='text' class='input' value="<?php echo $b_end. '(' . $r_destination. ')' ; ?>"  readonly><br> <br> 

                <label for=''> Boarding Place : </label> <br>
                <input type='text' class='input' value="<?php echo $start_station ;?> " name='source_station'  readonly><br> <br> 

                <label for=''> Destination Place : </label> <br>
                <input type='text' class='input' value="<?php echo $end_station ; ?>" name='destination_station'  readonly><br> <br> 


                <input type='hidden' name='bus_id' value="<?php echo $bus ; ?>" >
                <input type='hidden' id='price' name='price' value="<?php echo $price ; ?>">

                


                <label for="">Full name</label> <br>
                <input type="text" class='input' name="booking_name" required> <br> <br>

                <label for="">Telephone No</label> <br>
                <input type="text" id="telNo" class='input' name="phone_no" required> <br> <br>

                <label for="">No of Seats</label> <br>
                <input type="number" class='input' id="NoOfSeats" name="NoOfSeats" min="1" value="1" onclick="increment()">
                <p>(Click the box typing a number to generate the total amount)</p>

                <label for="">Total :</label>
                <input type="text" id="total" name="price" value="<?php echo $price ;?>" readonly>



                <input class='book_button' type="submit" name="Pay" value="PAY" onclick="increment()" >


            </form>

            <script>
                function increment() {
                    document.getElementById("total").value = document.getElementById("NoOfSeats").value * document.getElementById("price").value;
                }
            </script>

        </div>


    </div>

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

    <script src="../js/thanishvalidation.js"></script>
</body>

</html>