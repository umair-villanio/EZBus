<?php
require "config.php";
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<!--################ STYLESHEETS  ######################################################## -->
<link rel="stylesheet" href="../../css/Admin/navbar.css">
<link rel="stylesheet" href="../../css/Admin/table.css">
<!--################ END  ######################################################## -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
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
          <li><a href="adminDashboard.php" >Dashboard</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="booking.php" class="active">Bookings</a></li>
            <li><a href="refund.php">Refund</a></li>
            <li><a href="bus.php">Bus</a></li>
            <li><a href="route.php" >Routes</a></li>
            <li><a href="feedback.php">Feedbacks</a></li>
            <li><a href="review.php">Reviews</a></li>
          </ul>
      </div>

    <div style="margin-left:17%; margin-top: 50px;padding:1px 16px;height:1000px;">
        <h2>BOOKING</h2>
        <hr><br>


        <div class="wrap">
            <form action="" method="post" action="">
                <div class="search">
                    <input type="text" name="search" class="searchTerm" placeholder="Search...">
                    <button type="submit" name='searchbtn' class="searchButton">
                        <a href="#"><img src="../../images/Admin/img/search.png" alt=""></a>
                    </button>

                </div>
            </form>
        </div>
        <br><br>

        <?php
        $sql1 = "SELECT Booking_id,User_id,Bus_id,Booked_name,Phone_no,Source_station,Destination_station,Date,No_of_Seats,Price FROM bookings";
        $result = $con->query($sql1);


        if (isset($_POST['searchbtn'])) {
            $search = $_POST['search'];
            $sql2 = "SELECT * FROM bookings WHERE Booking_id LIKE '%$search%' OR User_id LIKE '%$search%' OR Booked_name LIKE '%$search%'OR Source_station LIKE '%$search%' OR Destination_station LIKE '%$search%'";
            tableBook($sql2);
        } else {
            $sql = "SELECT Booking_id,User_id,Bus_id,Booked_name,Phone_no,Source_station,Destination_station,Date,No_of_Seats,Price FROM bookings";
            tableBook($sql);
        }
        $con->close();
        ?>
    </div>

</body>

</html>