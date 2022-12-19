<?php

//###########################             RANDOM STRING             ###########################


function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }

    return $str;
}


//###########################             ROUTE TABLE            ###########################


function tableroute($sqlquery)
{
    global $con;
    if ($result = $con->query($sqlquery)) {
        if ($result->num_rows > 0) {
            echo ("<table class='table'> <tr>
<th>#</th>
<th>Source</th>
<th>Destination</th>
<th>Distance</th>
<th>Route Details</th>
<th>Action</th>
</tr>
");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row['Route_id'] . "</td>
                <td>" . $row['Source'] . "</td>
                <td>" . $row['Destination'] . "</td>
                <td>" . $row['Distance'] . "</td>
                <td class='route_det' >" . $row['Route_Details'] . "</td>
        <td style='width:15%;'>"; ?>
                <form action="delete.php" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
                    <a href="RouteEdit.php?id=<?php echo $row['Route_id'] ?>" name="editbtn" class="editbtn">Edit</a>

                    <input type="hidden" name="delete" value="<?php echo $row['Route_id'] ?>" />
                    <button type="submit" name="delbtnrt" class="deletebtn">Delete</button>
                </form>
                </tr>
            <?php }
            echo ("</table>");
        } else {
            echo ("<table class='table'> <tr>
<th>#</th>
<th>Source</th>
<th>Destination</th>
<th>Distance</th>
<th>Route Details</th>
<th>Action</th>
</tr>
");
        }
    }
}

//###########################             BUS TABLE            ###########################

function tablebus($sqlquery)
{
    global $con;
    if ($result = $con->query($sqlquery)) {
        if ($result->num_rows > 0) {
            echo "<table class='table'>
        <tr>
        <th>#</th>
        <th>Route id</th>";
            //<th>Driver name</th>
            //<th>Driver's License</th>
            echo "  <th>Bus brand</th>
       <th>Bus number</th>
    
        <th>Seats</th>
        <th>Dep time</th>
        <th>Arr time</th>
        <th>AC</th>
        <th>WIFI</th>
        <th>Image</th>
        <th>Action</th>
      </tr>";
            while ($row = $result->fetch_assoc()) {
                //Read and utilize the row data
                echo "<tr>
        <td>" . $row['Bus_id'] . "</td>";
                if ($row['Route_id'] === NULL) {
                    echo "<td>" . "NULL" . "</td>";
                } else {
                    echo "<td>" . $row['Route_id'] . "</td>";
                }
                echo
                // " <td>" . $row['Driver_name'] . "</td>
                // <td>" . $row['Driver_License'] . "</td>
                "<td>" . $row['Bus_brand'] . "</td>
        <td>" . $row['Bus_no'] . "</td>
        <td>" . $row['Seats'] . "</td>
        <td>" . $row['Dep_time'] . "</td>
        <td>" . $row['Arr_time'] . "</td>
        <td>" . $row['AC'] . "</td>
        <td>" . $row['WIFI'] . "</td>
        <td>" ?> <?php if ($row['Bus_img']) : ?>
                    <img width="50px" src="<?php echo $row['Bus_img'] ?>" alt="<?php echo $row['Bus_brand'] ?>">
                    <?php endif; ?><?php echo "</td>
        
        
        <td style='width:15%;'>"; ?>
                    <form action="delete.php" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
                        <a href="BusEdit.php?id=<?php echo $row['Bus_id'] ?>" name="editbtn" class="editbtn">Edit</a>

                        <input type="hidden" name="delete" value="<?php echo $row['Bus_id'] ?>" />
                        <button type="submit" name="delbtnbs" class="deletebtn">Delete</button>
                    </form>
                    </tr>
                    <?php }


                echo ("</table>");
            } else {
                echo ("<table class='table'> <tr>
            <th>#</th>
            <th>Route id</th>");
                //<th>Driver name</th>
                //<th>Driver's License</th>
                echo "  <th>Bus brand</th>
           <th>Bus number</th>
          
            <th>Seats</th>
            <th>Dep time</th>
            <th>Arr time</th>
            <th>AC</th>
            <th>WIFI</th>
            <th>Image</th>
            <th>Action</th>
          </tr>";
            }
        }
    }



    //###########################           REFUND TABLE          ###########################

    function tablerefund($sqlquery)
    {
        global $con;
        if ($result = $con->query($sqlquery)) {
            if ($result->num_rows > 0) {
                echo ("<table class='table' style='margin-top:19px;'> <tr>
<th>#</th>
<th>Booking id</th>
<th>Reason</th>
<th>Amount</th>
<th>Action</th>
</tr>
");
                while ($row = $result->fetch_assoc()) {

                    if ($row['Confirmation_status'] == NULL) {


                        echo "<tr>
                <td>" . $row['Refund_id'] . "</td>
                <td>" . $row['Booking_id'] . "</td>
                <td class='route_det'>" . $row['Reason'] . "</td>
                <td>" . $row['Amount'] . "</td>
    
               
        <td style='width:15%;'>"; ?>
                        <form action="delete.php" method="post">


                            <input type="hidden" name="delete" value="<?php echo $row['Refund_id'] ?>" />
                            <button type="submit" name="accbtnrf" style="background-color:rgb(49, 49, 245)" class="deletebtn" onclick="return confirm('Are you sure you want to accept refund ?')">Accept</button>
                            <button type="submit" name="delbtnrf" class="deletebtn" onclick="return confirm('Are you sure you want to reject refund ?')">Reject</button>
                        </form>
                        </tr>
                    <?php }
                }
                echo ("</table>");
            } else {
                echo ("<table class='table' style='margin-top:19px;'> <tr>
<th>#</th>
<th>Booking id</th>
<th>Reason</th>
<th>Amount</th>
<th>Action</th>
</tr>

");
            }
        }
    }



    //###########################           REVIEW TABLE          ###########################

    function tablereview($sqlquery)
    {
        global $con;
        if ($result = $con->query($sqlquery)) {
            if ($result->num_rows > 0) {
                echo ("<table class='table' style='margin-top:19px;'> <tr>
<th>#</th>
<th>User id</th>
<th>Review</th>
<th>Rating</th>
<th>Action</th>
</tr>
");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                <td>" . $row['review_id'] . "</td>
                <td>" . $row['user_id'] . "</td>
                <td class='route_det'>" . $row['Review_comment'] . "</td>
                <td>" . $row['review_rating'] . "</td>
               
        <td style='width:15%;'>"; ?>
                    <form action="delete.php" method="post" onclick="return confirm('Are you sure you want to delete ?')">
                        <input type="hidden" name="delete" value="<?php echo $row['review_id'] ?>" />
                        <button type="submit" name="delbtnrv" class="deletebtn">Delete</button>
                    </form>
                    </tr>
                    <?php }
                echo ("</table>");
            } else {
                echo ("<table class='table' style='margin-top:19px;'> <tr>
            <th>#</th>
            <th>User id</th>
            <th>Review</th>
            <th>Rating</th>
            <th>Action</th>
            </tr>

");
            }
        }
    }



    //###########################           FEEDBACK TABLE          ###########################

    function tablefeedback($sqlquery)
    {
        global $con;
        if ($result = $con->query($sqlquery)) {
            if ($result->num_rows > 0) {
                echo ("<table class='table' style='margin-top:19px;'> <tr>
<th>#</th>
<th>User id</th>
<th>Feedback content</th>
<th>Action</th>
</tr>
");
                while ($row = $result->fetch_assoc()) {
                    if ($row['reply_status'] == 0) {
                        echo "<tr>
                <td>" . $row['feed_id'] . "</td>
                <td>" . $row['user_id'] . "</td>
                <td class='route_det'>" . $row['feedback_content'] . "</td>
                
               
        <td style='width:15%;'>"; ?>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="delete" value="<?php echo $row['feed_id'] ?>" />
                            <button type="submit" name="repbtnfb" style="background-color:rgb(49, 49, 245)" class="deletebtn">Reply</button>
                            <button type="submit" name="delbtnfb" class="deletebtn" onclick="return confirm('Are you sure you want to delete ?')">Delete</button>
                        </form>
                        </tr>
                    <?php }
                }
                echo ("</table>");
            } else {
                echo ("<table class='table' style='margin-top:19px;'> <tr>
            <th>#</th>
            <th>User id</th>
            <th>Feedback content</th>
            
            <th>Action</th>
            </tr>

");
            }
        }
    }

    //###########################           BOOKING TABLE          ###########################

    function tableBook($sqlquery)
    {
        global $con;
        if ($result = $con->query($sqlquery)) {
            if ($result->num_rows > 0) {
                echo ("<table class='table' style='margin-top:19px;'> <tr>
                 <th>#</th>
                 <th>User id</th>
                 <th>Bus id</th>
                 <th>Name</th>
                 <th>Phone</th>
                 <th>Source</th>
                 <th>Destination</th>
                 <th>Date</th>
                 <th>Seats</th>
                 <th>Price</th>
                 </tr>
                 ");
                while ($row = $result->fetch_assoc()) {


                    echo "<tr>
                 <td>" . $row['Booking_id'] . "</td>
                 <td>" . $row['User_id'] . "</td>
                 <td>" . $row['Bus_id'] . "</td>
                 <td>" . $row['Booked_name'] . "</td>
                 <td>" . $row['Phone_no'] . "</td>
                 <td>" . $row['Source_station'] . "</td>
                 <td>" . $row['Destination_station'] . "</td>
                 <td>" . $row['Date'] . "</td>
                 <td>" . $row['No_of_Seats'] . "</td>
                 <td>" . $row['Price'] . "</td>";
                    ?>
                    </tr>
                <?php }
                echo ("</table>");
            } else {
                echo ("<table class='table' style='margin-top:19px;'> <tr>
             <th>#</th>
             <th>User id</th>
             <th>Bus id</th>
             <th>Name</th>
             <th>Phone</th>
             <th>Source</th>
             <th>Destination</th>
             <th>Date</th>
             <th>Seats</th>
             <th>Price</th>
             </tr>
 
 ");
            }
        }
    }


    //###########################           USER TABLE          ###########################

    function tableUser($sqlquery)
    {
        global $con;
        if ($result = $con->query($sqlquery)) {
            if ($result->num_rows > 0) {
                echo ("<table class='table' style='margin-top:19px;'> <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Type</th>
                <th>Action</th>
                </tr>
");

                while ($row = $result->fetch_assoc()) {
                    if ($row['username']=='Admin'){continue;}
                    if ($row['type'] == 'A') {
                        $type = "Admin";
                    } else {
                        $type = "User";
                    }

                    echo "<tr>
                <td>" . $row['user_id'] . "</td>
                <td>" . $row['fname'] . "</td>
                <td>" . $row['lname'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['email'] . "</td>
                <td class='route_det'>" . $row['address'] . "</td>
                <td>" . $type . "</td>
               
        <td style='width:20%;'>"; ?>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="delete" value="<?php echo $row['user_id'] ?>" />
                        <?php if ($row['type'] == 'U') { ?>
                            <button type='submit' name='mkadm' style='background-color:rgb(49, 49, 245); width:129px' class='deletebtn' onclick="return confirm('Are you sure you want to change admin privilege ?')"> Make Admin </button><?php } else { ?>
                            <button type='submit' name='rmadm' style=' width:129px' class='deletebtn' onclick="return confirm('Are you sure you want to change admin privilege ?')">Remove Admin</button>
                        <?php } ?>

                        <button type="submit" name="delbtnusr" class="deletebtn" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
                    </tr>
    <?php
                }
                echo ("</table>");
            } else {
                echo ("<table class='table' style='margin-top:19px;'> <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Address</th>
            <th>Type</th>
            <th>Action</th>
            </tr>

");
            }
        }
    }
