<?php require "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<!--################ STYLESHEETS  ######################################################## -->

<link rel="stylesheet" href="../../css/Admin/navbar.css">
<link rel="stylesheet" href="../../css/Admin/input.css">

<!--################ END  ######################################################## -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route</title>
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
            <li><a href="booking.php" >Bookings</a></li>
            <li><a href="refund.php">Refund</a></li>
            <li><a href="bus.php">Bus</a></li>
            <li><a href="route.php" class="active" >Routes</a></li>
            <li><a href="feedback.php">Feedbacks</a></li>
            <li><a href="review.php">Reviews</a></li>
          </ul>
      </div>

    <div style="margin-left:17%; margin-top: 50px;padding:1px 16px;height:1000px;">
        <!-- <h1>Welcome Villanio !!</h1> -->
        <h2>Add Route Details</h2>

        <hr>

        <div class="routedetails">
            <form action="update.php" method="post">
                <!-- <form action="./includes/formSubmit.php" method="post"> -->
                <label for="rSrc">Source</label><br>
                <input type="text" id="rSrc" name="rSrc" required><br>

                <label for="rDest">Destination</label><br>
                <input type="text" id="rDest" name="rDest" required><br>

                <!--######################################## STATION #############################################################-->

                <label for="stationnum">Number of Stations</label><br>
                <div class="stationsel">
                    <select id="station" onChange="update()" name="noofstat">
                        <option selected value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                </div>

                <div class="stationhead" style="width:100%;">
                    <label for="details">Station Name</label>
                    <label for="details">Price from Source</label><br>
                </div>

                <div>
                    <div id="stationprice">
                    </div>
                </div>

                <!--######################################## STATION #############################################################-->

                <label for="bSeats">Distance in km</label><br>
                <input type="number" id="bSeats" name="bSeats" required><br>


                <div class="rDetails">
                    <label for="details">Route Details</label><br>
                    <textarea id="rDetails" name="rDetails" rows="4" cols="50"></textarea>
                </div>

                <input type="submit" name="btnsubmitra" value="Submit">


            </form>
        </div>
        <!-- ############################ script add ################################-->
        <script src="../../js/Admin/AddRoute.js">

        </script>

        <!----------------------------- SCRIPT ---------------------------------------------------->



</body>

</html>