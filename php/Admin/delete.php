<!-- //###########################            REQUIRED FILES          ########################### -->
<?php
require "config.php";

//###########################             DEL FUNC ROUTE          ########################### -->

function deleteDatart($Route_id)
{
    global $con;
    $sql3 = "delete from route where Route_id='$Route_id'";
    if ($con->query($sql3)) {
        echo "Deleted successfully<BR />";
    } else {
        echo "Error: " . $con->error;
    }
}

//###########################             DELETE ROUTE           ########################### -->

if (isset($_POST['delbtnrt'])) {
    $delrec = $_POST['delete'];
    deleteDatart($delrec);
    header('Location: Route.php');
}


//###########################             DEL BUS FUNC           ########################### -->

function deleteDatabs($Bus_id)
{
    global $con;
    $sql3 = "delete from bus where Bus_id='$Bus_id'";
    if ($con->query($sql3)) {
        echo "Deleted successfully<BR />";
    } else {
        echo "Error: " . $con->error;
    }
}

//###########################             DELETE BUS           ########################### -->

if (isset($_POST['delbtnbs'])) {
    $delrec = $_POST['delete'];
    deleteDatabs($delrec);
    header('Location: Bus.php');
}


//###########################             DEL REFUND FUNC           ########################### -->

function rejectRefund($Refund_id)
{
    global $con;
    $sql3 = "UPDATE Refund SET Confirmation_status=0  where Refund_id ='$Refund_id';";
    $sqle1 = "SELECT d.email FROM details d,Refund r, bookings b WHERE d.user_id=b.user_id AND r.Booking_id=b.Booking_id AND r.Refund_id='$Refund_id'; ";

    $dat = $con->query($sqle1);
    $res = $dat->fetch_assoc();

    $to = $res['email'];
    $subject = "Regarding Refund";
    $msg = "Dear valued customer, This email is been sent to notify you that the requested for a refund has been rejected.Please contact customer service for more inquiries";
    $headers = "From:umair.hussain.online@gmail.com";

    if ($con->query($sql3)) {
        echo "Deleted successfully<BR/>";
        if (mail($to, $subject, $msg, $headers)) {
            echo "Email sent successfully to $to";
        } else {
            echo "Sorry, failed while sending mail!";
        }
    } else {
        echo "Error: " . $con->error;
    }
}

//###########################             DELETE REFUND           ########################### -->

if (isset($_POST['delbtnrf'])) {
    $delrec = $_POST['delete'];
    rejectRefund($delrec);
    header('Location: refund.php');
}


//###########################             ACC REFUND FUNC           ########################### -->

function acceptRefund($Refund_id)
{
    global $con;
    $sql3 = "UPDATE Refund SET Confirmation_status=1  where Refund_id ='$Refund_id';";

    $sql5 = "SELECT b.booking_id  FROM bookings b,refund r WHERE b.booking_id= r.booking_id and r.refund_id = '$Refund_id'";
    $dat5 = $con->query($sql5);
    $res5 = $dat5->fetch_assoc();
    $bk_id = $res5['booking_id'];

    $sql5del = "DELETE FROM bookings WHERE booking_id=$bk_id" ;

    $sqle = "SELECT d.email FROM details d,Refund r, bookings b WHERE d.user_id=b.user_id AND r.Booking_id=b.Booking_id AND r.Refund_id='$Refund_id'; ";
    $dat = $con->query($sqle);
    $res = $dat->fetch_assoc();

    //##  EMAIL  ##
    $to = $res['email'];
    $subject = "Regarding Refund";
    $msg = "Dear valued customer, This email is been sent to notify you that we have accepted your request for a refund.";
    $headers = "From:umair.hussain.online@gmail.com";


    if ($con->query($sql3)) {
        echo "Accepted successfully<BR/>";
        if ($con->query($sql5del)) {
            echo "Deleted from booking";
        }

        if (mail($to, $subject, $msg, $headers)) {
            echo "Email sent successfully to $to";
        } else {
            echo "Sorry, failed while sending mail!";
        }
    } else {
        echo "Error: " . $con->error;
    }
}

//###########################             ACCEPT REFUND           ########################### -->

if (isset($_POST['accbtnrf'])) {


    $delrec = $_POST['delete'];
    acceptRefund($delrec);
    header('Location: refund.php');
}


//###########################             DEL REVIEW FUNC           ########################### -->

function deleteReview($Review_id)
{
    global $con;
    $sql3 = "delete from review where review_id='$Review_id'";
    if ($con->query($sql3)) {
        echo "Deleted successfully<BR />";
    } else {
        echo "Error: " . $con->error;
    }
}

//###########################             DELETE REVIEW           ########################### -->

if (isset($_POST['delbtnrv'])) {
    $delrec = $_POST['delete'];
    deleteReview($delrec);
    header('Location: review.php');
}

//###########################             DEL FEEDBACK FUNC           ########################### -->

function deleteFeedback($feed_id)
{
    global $con;
    $sql3 = "delete from feedback where feed_id='$feed_id'";
    if ($con->query($sql3)) {
        echo "Deleted successfully<BR />";
    } else {
        echo "Error: " . $con->error;
    }
}

//###########################             DELETE FEEDBACK           ########################### -->

if (isset($_POST['delbtnfb'])) {
    $delrec = $_POST['delete'];
    deleteFeedback($delrec);
    header('Location: Feedback.php');
}


//###########################             REPLY FEEDBACK FUNC           ########################### -->

function replyFeedback($feed_id)
{
    global $con;
    $sql3 = "UPDATE feedback SET reply_status=1  where feed_id ='$feed_id';";
    $sqle2 = "SELECT d.email FROM details d,feedback f WHERE d.user_id=f.user_id AND f.feed_id='$feed_id'; ";

    $dat = $con->query($sqle2);
    $res = $dat->fetch_assoc();

    //##  EMAIL  ##
    $to = $res['email'];
    $subject = "Regarding Refund";
    $msg = "Dear valued customer, This email has been sent to notify you that your feedback is being taken to our consideration.";
    $headers = "From:umair.hussain.online@gmail.com";


    if ($con->query($sql3)) {
        echo "Accepted successfully<BR/>";

        if (mail($to, $subject, $msg, $headers)) {
            echo "Email sent successfully to $to";
        } else {
            echo "Sorry, failed while sending mail!";
        }
    } else {
        echo "Error: " . $con->error;
    }
}

//###########################             REPLY FEEDBACK           ########################### -->

if (isset($_POST['repbtnfb'])) {


    $delrec = $_POST['delete'];
    replyFeedback($delrec);
    header('Location: Feedback.php');
}

//###########################             DEL USER FUNC           ########################### -->

function deleteUser($user_id)
{
    global $con;
    $sql3 = "delete from details where user_id='$user_id'";
    if ($con->query($sql3)) {
        echo "Deleted successfully<BR />";
    } else {
        echo "Error: " . $con->error;
    }
}

//###########################             DELETE USER           ########################### -->

if (isset($_POST['delbtnusr'])) {
    $delrec = $_POST['delete'];
    deleteUser($delrec);
    header('Location: Users.php');
}

//###########################             ADD USER ADMIN        ########################### -->

if (isset($_POST['mkadm'])) {
    $id = $_POST['delete'];
    $sql3 = "UPDATE details SET type='A' where user_id ='$id';";
    $con->query($sql3);

    header('Location: Users.php');
}

//###########################             REMOVE USER ADMIN        ########################### -->

if (isset($_POST['rmadm'])) {
    $id = $_POST['delete'];
    $sql3 = "UPDATE details SET type='U' where user_id ='$id';";
    $con->query($sql3);

    header('Location: Users.php');
}