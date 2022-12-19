<?php require "config.php";
require_once "functions.php"; ?>

<!DOCTYPE html>
<html lang="en">
<!--################ STYLESHEETS  ######################################################## -->
<script src="../../js/Admin/Validation.js"></script>

<link rel="stylesheet" href="../../css/Admin/navbar.css">
<link rel="stylesheet" href="../../css/Admin/input.css">

<style>
</style>

<!--################ END  ######################################################## -->

<?php

$id = $_GET['id'] ?? NULL;

$sqlretrieve = "SELECT * FROM Bus WHERE Bus_id=$id";
$data = $con->query($sqlretrieve);
$fetchdata = $data->fetch_assoc();

$sqltravelretrieve = "SELECT * FROM `bus_travelling_days` WHERE Bus_id=$id ORDER BY Days DESC";
$traveldays = $con->query($sqltravelretrieve);

$arr = array();

while ($row3 = $traveldays->fetch_assoc()) {
  array_push($arr, $row3['Days']);
}

$bBrand = $fetchdata['Bus_brand'];
$rId = $fetchdata['Route_id'];
$dName = $fetchdata['Driver_name'];
$dLicense = $fetchdata['Driver_license'];
$bNo = $fetchdata['Bus_no'];
$Seat = $fetchdata['Seats'];
$dTime = $fetchdata['Dep_time'];
$aTime = $fetchdata['Arr_time'];
$ac = $fetchdata['AC'];
$wifi = $fetchdata['WIFI'];
$bImg = $fetchdata['Bus_img'];


?>

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
      <form enctype="multipart/form-data" method="post" onsubmit="return validateBusForm()" action="./update.php">
        <label for="bBrand">Bus Brand</label><br>
        <input type="text" name="bBrand" id="bBrand" name="bBrand" value="<?php echo $bBrand; ?>" required><br>
        <input type="hidden" name="getbid" value="<?php echo $id; ?>">
        <div class="imagesel">
          <label for="bImg">

            <span class="btn-file">Add Image</span>
            <?php if ($fetchdata['Bus_img']) { ?>
              <img src="<?php echo $fetchdata['Bus_img'] ?>" alt="" style="width: 10%;display: block; margin-top: 15px;" id="preview-img">

            <?php } else { ?><img src="../../images/Admin/img/bus.png" alt="" style="width: 10%;display: block;    margin-top: 15px;" id="preview-img"><?php } ?>
          </label><br>

          <input type="file" id="bImg" name="image" style="display:none;"><br>

        </div>


        <label for="dName">Driver's Name</label><br>
        <input type="text" id="dname" name="dname" value="<?php echo $dName; ?>" required><br>

        <label for="dLicense">Driver's License</label><br>
        <input type="text" id="dLicense" name="dLicense" value="<?php echo $dLicense; ?>" maxlength="8" required><br>

        <label for="bNum">Bus Number</label><br>
        <input type="text" id="bNum" name="bNum" value="<?php echo $bNo; ?>" maxlength="7" required><br>


        <label for="stationnum">Route</label><br>
        <div class="stationsel">
          <select id="route" onChange="update()" name="routesel">
            <?php $sqlretrieve = "SELECT * FROM Route ";
            $data = $con->query($sqlretrieve);

            while ($row4 = $data->fetch_assoc()) {
              if ($row4['Route_id'] == $rId) {
                echo "<option selected value='" . $row4['Route_id'] . "'>" . $row4['Route_id'] . ": " . $row4['Source'] . " - " . $row4['Destination'] . "</option>";
              } else {
                echo "<option value='" . $row4['Route_id'] . "'>" . $row4['Route_id'] . ": " . $row4['Source'] . " - " . $row4['Destination'] . "</option>";
              }
            }

            ?>
          </select>

        </div>
        <div class="time" style="float: left; margin-right: 60px;">
          <label for="tDep">Departure Time</label><br>
          <input type="time" id="tDep" name="tDep" value="<?php echo $dTime; ?>" required>
        </div>
        <div>
          <label for="tArr">Arrival Time</label><br>
          <input type="time" id="tArr" name="tArr" value="<?php echo $aTime; ?>" required><br>
        </div>

        <div>
          <label for="bSeats">Number of seats Available</label><br>
          <input type="number" id="bSeats" name="bSeats" value="<?php echo $Seat; ?>" maxlength="2" max="99" required><br>
        </div>

        <div>

          <?php
          $mon = "";
          $tues = "";
          $wed = "";
          $thurs = "";
          $fri = "";
          $sat = "";
          $sun = "";

          foreach ($arr as $aaa) :
            if ($aaa == "Monday") {
              $mon = "checked";
            }
            if ($aaa == "Tuesday") {
              $tues = "checked";
            }
            if ($aaa == "Wednesday") {
              $wed = "checked";
            }
            if ($aaa == "Thursday") {
              $thurs = "checked";
            }
            if ($aaa == "Friday") {
              $fri = "checked";
            }
            if ($aaa == "Saturday") {
              $sat = "checked";
            }
            if ($aaa == "Sunday") {
              $sun = "checked";
            }
          endforeach;
          ?>


          <!-- ########CHECKBOX -->
          <label class="containerchk">Monday
            <input type="checkbox" name="chkl[ ]" value="Monday" <?php echo $mon; ?>>
            <span class="checkedmark"></span>
          </label>
          <label class="containerchk">Tuesday
            <input type="checkbox" name="chkl[ ]" value="Tuesday" <?php echo $tues; ?>>
            <span class="checkedmark"></span>
          </label>
          <label class="containerchk">Wednesday
            <input type="checkbox" name="chkl[ ]" value="Wednesday" <?php echo $wed; ?>>
            <span class="checkedmark"></span>
          </label>
          <label class="containerchk">Thursday
            <input type="checkbox" name="chkl[ ]" value="Thursday" <?php echo $thurs; ?>>
            <span class="checkedmark"></span>
          </label>
          <label class="containerchk">Friday
            <input type="checkbox" name="chkl[ ]" value="Friday" <?php echo $fri; ?>>
            <span class="checkedmark"></span>
          </label>
          <label class="containerchk">Saturday
            <input type="checkbox" name="chkl[ ]" value="Saturday" <?php echo $sat; ?>>
            <span class="checkedmark"></span>
          </label>
          <label class="containerchk">Sunday
            <input type="checkbox" name="chkl[ ]" value="Sunday" <?php echo $sun; ?>>
            <span class="checkedmark"></span>
          </label>

          <?php ?>

        </div>


        <div class="maincont">
          <div style="display: inline-block;">
            <div><label>Wifi</label></div>
            <div class="radiocont">
              <label class="container">On
                <?php if ($wifi == 1) { ?>
                  <input type="radio" name="wifi" value="1" checked>
                  <span class="checkmark"></span>
              </label>
              <label class="container">Off
                <input type="radio" name="wifi" value="0">
                <span class="checkmark"></span>
              </label>

            <?php } else { ?>
              <input type="radio" name="wifi" value="1">
              <span class="checkmark"></span>
              </label>
              <label class="container">Off
                <input type="radio" name="wifi" value="0" checked>
                <span class="checkmark"></span>
              </label>

            <?php } ?>

            </div>
          </div>
          <div style="display: inline-block;">
            <div><label>A/C</label></div>
            <div class="radiocont">
              <label class="container">On
                <?php if ($ac == 1) { ?>
                  <input type="radio" name="ac" value="1" checked>
                  <span class="checkmark"></span>
              </label>
              <label class="container">Off
                <input type="radio" name="ac" value="0">
                <span class="checkmark"></span>
              </label>
            <?php } else { ?>
              <input type="radio" name="ac" value="1">
              <span class="checkmark"></span>
              </label>
              <label class="container">Off
                <input type="radio" name="ac" value="0" checked>
                <span class="checkmark"></span>
              </label>

            <?php } ?>

            </div>
          </div>

        </div>


        <input type="submit" name="btnsubmitbse" value="Submit">
      </form>
    </div>
    <!-- ##########################   PHP ########################################### -->
    <?php

    $con->close();

    ?>

    <!----------------------------- SCRIPT ---------------------------------------------------->

    <script>
      document.getElementById('bImg').onchange = function(e) {

        document.querySelector('#preview-img').src = URL.createObjectURL(event.target.files[0]);
      }
    </script>

</body>

</html>