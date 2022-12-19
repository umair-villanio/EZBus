<?php
require "config.php";
require "dashboard.php";
?>

<!DOCTYPE html>
<html lang="en">

 <!--################ STYLESHEETS  ######################################################## -->


<link rel="stylesheet" href="../../css/Admin/navbar.css">
<link rel="stylesheet" href="../../css/Admin/admindash.css">
<style>
.column a{
  text-decoration: none;
}
</style>
 <!--################ STYLESHEETS  ######################################################## -->


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
  <div class="navbar">
    <a href="../home.php">Home</a>
   
   <div class="dropdown">
     <form action="" method="post">
      <button class="dropbtn">Profile </form>
      </button>
      <div class="dropdown-content">
        <a href="../profile.php">My Account</a>
        <a href="../logout.php?Logout=Logout">Logout</a>

        
      </div>
    </div> 
    <a href="../home.php" id="website" style="float:left">eZBus</a>
  
   
  </div>
      <div class="leftnav">
       
        <ul>
          <div class="pr">
            <a src href="../profile.php"><img src="../../images/Admin/img/marsh.gif" title="profile" alt="profile" id="profilelogo"></a>
            <div id="profname"><b>Admin</b></div>
          </div>
          <li><a href="adminDashboard.php" class="active">Dashboard</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="booking.php" >Bookings</a></li>
            <li><a href="refund.php">Refund</a></li>
            <li><a href="bus.php">Bus</a></li>
            <li><a href="route.php" >Routes</a></li>
            <li><a href="feedback.php">Feedbacks</a></li>
            <li><a href="review.php">Reviews</a></li>
          </ul>
      </div>

      <div style="margin-left:17%; margin-top: 50px;padding:1px 16px;height:1000px;">
          <h2>DASHBOARD</h2>
          <hr>
      
        <div class="row">

          <div class="column">
            <a href="users.php"><img src="../../images/Admin/img/customer.png" alt="Buses" style="width:50%" >
            <figcaption style="color: red ;">Customer</figcaption>
            <div class="dashname" style="background-color: red ;"><?php echo $usrCnt; ?></div></a>
          </div>

          <div class="column">
          <a href="booking.php"><img src="../../images/Admin/img/booking.png" alt="Route" style="width:50%">
            <figcaption style="color: #F0AD4E ;">Booking</figcaption>
            <div class="dashname" style="background-color: #ff9500 ;"><?php echo $bkCnt; ?></div></a>
          </div>

          <div class="column">
          <a href="booking.php"><img src="../../images/Admin/img/sale.png" alt="Users" style="width:50%">
            <figcaption style="color: #00c400 ;">Sale</figcaption>
            <div class="dashname" style="background-color: #00c400 ;"><?php echo $prCnt; ?></div></a>
          </div>

          <div class="column">
          <a href="users.php"><img src="../../images/Admin/img/admin.png" alt="Admin" style="width:50%">
            <figcaption style="color: #08baf0;">Admin</figcaption>
            <div class="dashname" style="background-color: #08baf0;"><?php echo $usradmCnt; ?></div></a>
          </div>

          <div class="column">
          <a href="bus.php"><img src="../../images/Admin/img/bus.png" alt="Reviews" style="width:50%">
            <figcaption style="color: #5CB85C ;">Bus</figcaption>
            <div class="dashname" style="background-color: #00c400 ;"><b><?php echo $bCnt; ?></b></div></a>
          </div>

          <div class="column">
          <a href="bus.php"><img src="../../images/Admin/img/seat.png" alt="Bookings" style="width:50%">
            <figcaption style="color: #08baf0;">Seat</figcaption>
            <div class="dashname" style="background-color: #08baf0;"><b><?php echo $seatCnt; ?></b></div></a>
          </div>

          <div class="column">
          <a href="route.php"><img src="../../images/Admin/img/route.png" alt="Seats" style="width:50%">
            <figcaption style="color: red;">Route</figcaption>
            <div class="dashname" style="background-color: red ;"><b><?php echo $rCnt; ?></b></div></a>
          </div>

          <div class="column">
          <a href="review.php"><img src="../../images/Admin/img/review.png" alt="Sales" style="width:50%">
            <figcaption style="color: #F0AD4E ;">Review</figcaption>
            <div class="dashname" style="background-color: #ff9500 ;"><b><?php echo $rvCnt; ?></b></div></div></div>
  
        </div>  
      </div>

</body>


</html>