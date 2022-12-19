<?php

//###########################             REQUIRED PHP FILES           ########################### -->

require "config.php";
require_once "functions.php"; 

 //###########################             SUBMIT ROUTE ADD           ########################### -->


if (isset($_POST["btnsubmitra"])) {

    $src = $_POST["rSrc"];
    $dest = $_POST["rDest"];
    $dist = $_POST["bSeats"];
    $details = $_POST["rDetails"];
    $station = $_POST["station"];
    $price = $_POST["price"];

    $sqlr = "INSERT INTO route(Source,Destination,Distance,Route_Details)VALUES('$src','$dest',$dist,'$details')";

    if ($con->query($sqlr)) {
        $id = mysqli_insert_id($con);

        foreach (array_combine($station, $price) as $code => $cost) {
            $sqltb = "INSERT INTO Route_station (Route_id,Station_name,price) VALUES ((SELECT Route_id from route WHERE Route_id=$id),'$code',$cost);";
            $con->query($sqltb);
        }

?><script>
            alert("Successfully inserted;")
        </script>
<?php

    } else {
        echo "Error:" . $con->error;
    }
    header('Location: Route.php');
    $con->close();
}


// <!-- //###########################             SUBMIT BUS ADD           ########################### -->


if (isset($_POST["btnsubmitba"])) {
    $bBrand = $_POST["bBrand"];
    $dname = $_POST["dname"];
    $dLicense = $_POST["dLicense"];
    $bNum = $_POST["bNum"];
    $rNum = $_POST["routesel"];
    $tDep = $_POST["tDep"];
    $tArr = $_POST["tArr"];
    $bSeats = $_POST["bSeats"];
    $wifi = $_POST["wifi"];
    $ac = $_POST["ac"];
    $days = $_POST["chkl"];

    $image = $_FILES['image'] ?? null;
    $imagePath = '';



    // CREATE DIR FOR IMAGES

    if (!is_dir('images')) {
        mkdir('images');
    }

    // ASSIGN TEMP NAME 

    if ($image && $image['tmp_name']) {
        $imagePath = '../../images/Admin/images/' . randomString(8) . '/' . $image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);
    }

    // INSERT VALUES 

    $sqlr = "INSERT INTO Bus(Route_id,Driver_name,Driver_License,Bus_brand,Bus_no,Seats,Dep_time,Arr_time,AC,WIFI,Bus_img)VALUES((SELECT route_id from route where route_id = $rNum),'$dname','$dLicense','$bBrand','$bNum','$bSeats','$tDep','$tArr','$ac','$wifi','$imagePath')";
    if ($con->query($sqlr)) {
        $id = mysqli_insert_id($con);
        for ($i = 0; $i < sizeof($days); $i++) {
            $query = "INSERT INTO bus_travelling_days (Bus_id,days) VALUES ((SELECT Bus_id from bus WHERE bus_id=$id),'$days[$i]');";
            $con->query($query);
        }

?><script>
            alert("Successfully inserted;")
        </script>
    <?php

    } else {
        echo "Error:" . $con->error;
    }
    header('Location: Bus.php');
    $con->close();
}






//////////////////////////// ROUTE EDIT SUBMIT ///////////////////////////////        


if (isset($_POST["btnsubmitrte"])) {
    $src = $_POST["rSrc"];
    $dest = $_POST["rDest"];
    $dist = $_POST["bSeats"];
    $details = $_POST["rDetails"];
    $station = $_POST["station"];
    $price = $_POST["price"];
    $id = $_POST["getid"];
    // die();

    // var_dump($id);
    // die();

    $sqlr = "UPDATE route SET Route_id='$id',Source='$src',Destination='$dest',Distance='$dist',Route_Details='$details' WHERE Route_id='$id';";

    if ($con->query($sqlr)) {
        $sqltbdel = "DELETE FROM  Route_station where Route_id='$id';";
        $con->query($sqltbdel);

        foreach (array_combine($station, $price) as $code => $cost) {
            $sqltbins = "INSERT INTO Route_station (Route_id,Station_name,price) VALUES ((SELECT Route_id from `route` WHERE Route_id ='$id'),'$code','$cost');";
            $con->query($sqltbins);
        }
    ?><script>
            alert("Successfully inserted;")
        </script>
    <?php
    } else {
        echo "Error:" . $con->error;
    }
    header('Location: Route.php');
    $con->close();
}

//////////////////////////// BUS EDIT SUBMIT ///////////////////////////////        


if (isset($_POST["btnsubmitbse"])) {
    $id = $_POST["getbid"];
    $bBrand = $_POST['bBrand'];
    $rId = $_POST['routesel'];
    // var_dump($rId);
    $dName = $_POST['dname'];
    $dLicense = $_POST['dLicense'];
    $bNo = $_POST['bNum'];
    $Seat = $_POST['bSeats'];
    $dTime = $_POST['tDep'];
    $aTime = $_POST['tArr'];
    $ac = $_POST['ac'];
    $wifi = $_POST['wifi'];
    $days = $_POST["chkl"];
    $sqlretrieve = "SELECT * FROM Bus WHERE Bus_id=$id";
    $data = $con->query($sqlretrieve);
    $fetchdata = $data->fetch_assoc();
    $img = $fetchdata['Bus_img'];


    // var_dump($id);
    //    die();

    $image = $_FILES['image'] ?? null;
    $imagePath = '';

    if (!is_dir('../../images/Admin/images/')) {
        mkdir('../../images/Admin/images/');
    }


    if ($image && $image['tmp_name']) {
        $imagePath = '../../images/Admin/images/' . randomString(8) . '/' . $image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);
    } else if ($img) {
        $imagePath = $fetchdata['Bus_img'];
    }



    $sqlr = "UPDATE bus SET Bus_brand='$bBrand',Route_id=(SELECT Route_id from route WHERE Route_id=$rId),Driver_name='$dName',Driver_license='$dLicense',Bus_no='$bNo',Seats='$Seat',Dep_time='$dTime',Arr_time='$aTime',AC='$ac',WIFI='$wifi',Bus_img='$imagePath' WHERE Bus_id='$id';";

    if ($con->query($sqlr)) {
        $sqltbdel = "DELETE FROM bus_travelling_days where Bus_id='$id';";
        $con->query($sqltbdel);


        for ($i = 0; $i < sizeof($days); $i++) {
            $query = "INSERT INTO bus_travelling_days (Bus_id,days) VALUES ((SELECT Bus_id from bus WHERE bus_id=$id),'$days[$i]');";
            $con->query($query);
        }
    ?><script>
            alert("Successfully inserted;")
        </script>
        <!-- ####################################################### -->

<?php

    } else {
        echo "Error:" . $con->error;
    }
    header('Location: Bus.php');
    $con->close();
}
