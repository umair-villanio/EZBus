<?php require "config.php";
require_once "functions.php"; ?>

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
  <title>Bus</title>
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
            <li><a href="bus.php" class="active">Bus</a></li>
            <li><a href="route.php" >Routes</a></li>
            <li><a href="feedback.php">Feedbacks</a></li>
            <li><a href="review.php">Reviews</a></li>
          </ul>
      </div>


  <div style="margin-left:17%; margin-top: 50px;padding:1px 16px;height:1000px;">
    <!-- <h1>Welcome Villanio !!</h1> -->
    <h2>Add Bus Details</h2>

    <hr>

    <div class="busdetails">
      <form enctype="multipart/form-data" method="post" onsubmit="return validateBusForm()" action="update.php">
        <label for="bBrand">Bus Brand</label><br>
        <input type="text" name="bBrand" id="bBrand" name="bBrand" required><br>
        <div class="imagesel">
          <label for="bImg">

            <span class="btn-file">Add Image</span>
            <img src="../../images/Admin/img/bus.png" alt="" style="width: 10%;display: block;    margin-top: 15px;" id="preview-img">
          </label><br>

          <input type="file" id="bImg" name="image" style="display:none;"><br>

        </div>

        <label for="dName">Driver's Name</label><br>
        <input type="text" id="dname" name="dname" required><br>

        <label for="dLicense">Driver's License</label><br>
        <input type="text" id="dLicense" name="dLicense" maxlength="8" required><br>

        <label for="bNum">Bus Number</label><br>
        <input type="text" id="bNum" name="bNum" maxlength="7" required><br>


        <label for="stationnum">Route</label><br>
        <div class="stationsel">
          <select id="route" onChange="update()" name="routesel">
        <?php $sqlretrieve = "SELECT * FROM Route ";
        $data = $con->query($sqlretrieve);

        while ($row4 = $data->fetch_assoc()) {

          echo "<option  value='".$row4['Route_id']."'>".$row4['Route_id'].": ".$row4['Source']." - ".$row4['Destination']."</option>";}
        ?>
   </select>

        </div>

        <div class="time" style="float: left; margin-right: 60px;">
          <label for="tDep">Departure Time</label><br>
          <input type="time" id="tDep" name="tDep" required>
        </div>
        <div>
          <label for="tArr">Arrival Time</label><br>
          <input type="time" id="tArr" name="tArr" required><br>
        </div>

        <div>
          <label for="bSeats">Number of seats Available</label><br>
          <input type="number" id="bSeats" name="bSeats" maxlength="2" max="99" required><br>
        </div>

        <div>
          <!-- ########CHECKBOX -->
          <label class="containerchk">Monday
            <input type="checkbox" name="chkl[ ]" value="Monday" checked>
            <span class="checkedmark"></span>
          </label>
          <label class="containerchk">Tuesday
            <input type="checkbox" name="chkl[ ]" value="Tuesday">
            <span class="checkedmark"></span>
          </label>
          <label class="containerchk">Wednesday
            <input type="checkbox" name="chkl[ ]" value="Wednesday">
            <span class="checkedmark"></span>
          </label>
          <label class="containerchk">Thursday
            <input type="checkbox" name="chkl[ ]" value="Thursday">
            <span class="checkedmark"></span>
          </label>
          <label class="containerchk">Friday
            <input type="checkbox" name="chkl[ ]" value="Friday">
            <span class="checkedmark"></span>
          </label>
          <label class="containerchk">Saturday
            <input type="checkbox" name="chkl[ ]" value="Saturday">
            <span class="checkedmark"></span>
          </label>
          <label class="containerchk">Sunday
            <input type="checkbox" name="chkl[ ]" value="Sunday">
            <span class="checkedmark"></span>
          </label>

        </div>

        <div class="maincont">
          <div style="display: inline-block;">
            <div><label>Wifi</label></div>
            <div class="radiocont">
              <label class="container">On
                <input type="radio" name="wifi" value="1" checked>
                <span class="checkmark"></span>
              </label>
              <label class="container">Off
                <input type="radio" name="wifi" value="0">
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
          <div style="display: inline-block;">
            <div><label>A/C</label></div>
            <div class="radiocont">
              <label class="container">On
                <input type="radio" name="ac" value="1" checked>
                <span class="checkmark"></span>
              </label>
              <label class="container">Off
                <input type="radio" name="ac" value="0">
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
        </div>
        <input type="submit" name="btnsubmitba" value="Submit">
      </form>
    </div>


    <!----------------------------- SCRIPT ---------------------------------------------------->

    <script>
      document.getElementById('bImg').onchange = function(e) {

        document.querySelector('#preview-img').src = URL.createObjectURL(event.target.files[0]);
      }
    </script>
    <script src="../../js/Admin/Validation.js"></script>

</body>

</html>