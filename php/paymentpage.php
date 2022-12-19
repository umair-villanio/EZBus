
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Payment Form</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/headerfootertheme.css">
    <script src="../js/p_validate.js"></script>
</head>
<body>
    <header class="header">
        <h2>eZBus</h2>
    </header>
    <form class="form" name="form1" onsubmit="return validate()" method="POST" action="paymentvalidation.php">
        <div class="container">
            <?php
                $price = $_GET["price"] ;
                $seats = $_GET["NoOfSeats"] ;
                $bus_id = $_GET["bus_id"] ;
                $source_st = $_GET["source_station"] ;
                $destination_st = $_GET["destination_station"] ;
                $date = $_GET["date"] ;
                $name = $_GET["booking_name"] ;
                $phone_no = $_GET["phone_no"] ;
            ?>

            <input type='hidden' name='date' value='<?php echo$date ;?>'>
            <input type='hidden' name='bus' value='<?php echo $bus_id ; ?>'>
            <input type='hidden' name ='start_station' value='<?php echo$source_st;?>'>
            <input type='hidden' name ='end_station' value='<?php echo $destination_st;?>'>
            <input type='hidden' name='price' value='<?php echo $price;?>'>
            <input type='hidden' name='booking_name' value='<?php echo $name;?>'>
            <input type='hidden' name='phone_no' value='<?php echo $phone_no;?>'>
            <input type='hidden' name='NoOfSeats' value='<?php echo $seats;?>'>
            
            <h3>payment method</h3>
            <input type="radio" name="ptype" value="Full" checked>
            <label for="ptype">Full payment</label>
            <input type="radio" name="ptype" value="Half" />
            <label for="ptype">Half payment</label>

            <div class="first-row">
                <div class="owner">
                    <h3>Card type</h3>
                    <div class="selection">
                        <select name="c_type" id="c_type">
                            <option value="Visa">Visa</option>
                            <option value="Master">Master</option>
                        </select>
                    </div>
                </div>
                <div style="margin-right:400px;" class="cvv">
                    <h3>CVV</h3>
                    <div class="input-field">
                        <input type="password" name="cvv" id="cvv" maxlength="3" required />
                    </div>
                </div>
            </div>
            <div class="second-row">
                <div class="card-number">
                    <h3>Card Number</h3>
                    <div class="input-field">
                        <input type="text" id="c_no" name="c_no" required />
                    </div>
                </div>
            </div>
            <div class="third-row">
                <h3>Expiry</h3>
                <div class="selection">
                    <div class="date">
                        <select name="month" id="month">
                            <option value="01">Jan</option>
                            <option value="02">Feb</option>
                            <option value="03">Mar</option>
                            <option value="04">Apr</option>
                            <option value="05">May</option>
                            <option value="06">Jun</option>
                            <option value="07">Jul</option>
                            <option value="08">Aug</option>
                            <option value="09">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                        </select>
                        <select name="year" id="year">
                            <option value="2027">2027</option>
                            <option value="2026">2026</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="cards">
                        <img src="../images/mc.png" />
                        <img src="../images/vi.png" />
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" value="PAY" class="onpay">
            </div>
        </div>
    </form>

<footer class="ftr" style=>
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
</body>
</html>