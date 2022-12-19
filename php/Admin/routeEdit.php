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

    <?php 

    $id = $_GET['id'] ?? NULL;
    


    $sqlretrieve = "SELECT * FROM Route WHERE Route_id=$id";
    $data = $con->query($sqlretrieve);
    $fetchdata = $data->fetch_assoc();

    $sqlstat = "SELECT * FROM route_station WHERE Route_id=$id";
    $count = $con->query($sqlstat);
    $total = $count->fetch_assoc();

    $source = $fetchdata['Source'];
    $destination = $fetchdata['Destination'];
    $details = $fetchdata['Route_Details'];
    $distance = $fetchdata['Distance'];




    ?>
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
            <form action="./update.php" method="post">
                <!-- <form action="./includes/formSubmit.php" method="post"> -->
                <label for="rSrc">Source</label><br>
                <input type="text" id="rSrc" value="<?php echo $source; ?>" name="rSrc" required><br>
                <input type="hidden" name="getid" value="<?php echo $id; ?>">


                <label for="rDest">Destination</label><br>
                <input type="text" id="rDest" value="<?php echo $destination; ?>" name="rDest" required><br>



                <!--######################## STATION ######################-->


                <label for="stationnum">Number of Stations</label><br>
                <div class="stationsel">
                    <?php
                    $noOfRows = 0;
                    $sqlretrieve2 = "SELECT COUNT(Route_id) as aa FROM route_station WHERE Route_id=$id";
                    $data2 = $con->query($sqlretrieve2);
                    while ($row2 = $data2->fetch_assoc()) {
                        $noOfRows =  $row2['aa'];
                    }
                    // echo $noOfRows;


                    ?>
                    <select id="station" onChange="update()" name="noofstat">
                        <?php
                        $selected = "";
                        for ($x = 1; $x <= 9; $x++) {
                            if ($x == $noOfRows) {
                                $selected = "selected";
                                echo "<option selected='" . $selected . "' value='" . $x . "'>" . $x . "</option>";
                            } else {
                                echo "<option value='" . $x . "'>" . $x . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <?php
                $sq = "SELECT station_name,price FROM route_station WHERE Route_id=$id;";
                $sqdata = $con->query($sq);
                $arr = array();
                $arr2 = [];
                while ($row3 = $sqdata->fetch_assoc()) {
                    

                    // echo $row3['station_name'];
                      array_push($arr, $row3['station_name']);
                      array_push($arr2, $row3['price']);
                }
                // print_r($arr);

             foreach($arr as $i=> $t)
                { } 
                
                $cnt = count($arr);
                // echo $cnt; ?>

                <script>
                  var newArr= <?php echo json_encode($arr); ?>;
                  var newArr2= <?php echo json_encode($arr2); ?>;
                  var inpElsName;
                  var inpElsPrice;

                //   var loadData = function(){
                  
                //   }
                  setTimeout(function(){
                    inpElsName = document.querySelectorAll('.stationName') ;
                    inpElsPrice = document.querySelectorAll('.stationPrice') ;
                  
                    console.log(inpElsName);
                    console.log(inpElsPrice);
                   for(let i=0;i<inpElsName.length;i++){
                    inpElsName[i].value = newArr[i];
                    inpElsPrice[i].value = newArr2[i];
                   }

                  },200);
                   //for every el in inpEls set newArr data accordingly

                    
                </script>



                <div class="stationhead" style="width:100%;">
                    <label for="details">Station Name</label>
                    <label for="details">Price from Source</label>
                </div>
                <?php
                $sqlretrieve1 = "SELECT * FROM route_station WHERE Route_id=$id";
                $data = $con->query($sqlretrieve1);
                while ($row1 = $data->fetch_assoc()) {

                ?>
                    <div id="stationprice">
                        <!-- <input type='text' name='station[]' value="<?php echo $row1['Station_name']; ?>"><input type='number' name='price[]' value="<?php echo $row1['Price']; ?>"><br> -->
                    </div>
                <?php } ?>

                <!--######################################## STATION #############################################################-->


                <label for="bSeats">Distance in km</label><br>
                <input type="number" id="bSeats" value="<?php echo $distance ?>" name="bSeats" required><br>

                <div class="rDetails">
                    <label for="details">Route Details</label><br>
                    <textarea id="rDetails" name="rDetails" rows="4" cols="50"><?php echo $details ?></textarea>
                </div>

                <input type="submit" name="btnsubmitrte" value="Submit">
            </form>
        </div>

        <?php
      
        $con->close();
        ?>

        <!-- ############################ script add ################################-->
        <script src="../../js/Admin/AddRoute.js">
        </script>

</body>

</html>