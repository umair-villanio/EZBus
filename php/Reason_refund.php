<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Refund Form</title>
    <link rel="stylesheet" href="../css/style.css">
    

</head>
<body>
    <?php
    if(isset($_POST["confirm"]))
    {

    }
    else 
	{    
        $bid = $_GET["booking_id"] ;
    }
    ?>

    <div class="header">
        <h2 style=" color : white ;">eZbus</h2>
    </div>
    <form name="form2" onsubmit="return validate2()" method="post" action="Sql_refund.php">
        <div class="container">
            <h1>User.Payment</h1>
            <div class="first-row">
                <div class="booking_id">
                    <h3>Booking ID</h3>
                    <div class="input-field" style="margin-right:400px">
                        <input type="text" name="b_id" value="<?php echo $bid ; ?>" readonly>
                    </div>
                </div>
            </div>
            <div>
                <div class="Reason">
                    <h3>Reason</h3>
                    <textarea id="reason" name="reason" rows="10" cols="90" required></textarea>
                </div>
            </div>
            <div>                
               <input class="onpay" type="submit" value="confirm" name="confirm" >
            </div>

        </div>
    </form>
</body>
</html>