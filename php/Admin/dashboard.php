<?php

$sqlbus = "SELECT COUNT(Bus_id) as bCount FROM Bus;";
$bdata = $con->query($sqlbus);
$bfetchdata = $bdata->fetch_assoc();
$bCnt = $bfetchdata['bCount'];


$sqlreview = "SELECT COUNT(review_id) as rvCount FROM review;";
$rvdata = $con->query($sqlreview);
$rvfetchdata = $rvdata->fetch_assoc();
$rvCnt = $rvfetchdata['rvCount'];

$sqlroute = "SELECT COUNT(Route_id) as rCount FROM Route;";
$rdata = $con->query($sqlroute);
$rfetchdata = $rdata->fetch_assoc();
$rCnt = $rfetchdata['rCount'];

$sqlseat = "SELECT SUM(Seats) as seatCount FROM Bus;";
$seatdata = $con->query($sqlseat);
$seatfetchdata = $seatdata->fetch_assoc();
$seatCnt = $seatfetchdata['seatCount'];
if ($seatCnt==NULL){$seatCnt=0;}

$sqlusr = "SELECT COUNT(user_id) as userCount FROM details;";
$usrdata = $con->query($sqlusr);
$usrfetchdata = $usrdata->fetch_assoc();
$usrCnt = $usrfetchdata['userCount'];

$sqlusradm = "SELECT COUNT(user_id) as useradmCount FROM details WHERE type='A';";
$usradmdata = $con->query($sqlusradm);
$usradmfetchdata = $usradmdata->fetch_assoc();
$usradmCnt = $usradmfetchdata['useradmCount'];

$sqlbk = "SELECT COUNT(Booking_id) as bkCount FROM bookings;";
$bkdata = $con->query($sqlbk);
$bkfetchdata = $bkdata->fetch_assoc();
$bkCnt = $bkfetchdata['bkCount'];


$sqlpr = "SELECT SUM(Price) as totalPrice FROM bookings;";
$prdata = $con->query($sqlpr);
$prfetchdata = $prdata->fetch_assoc();
$prCnt = $prfetchdata['totalPrice'];

if ($prCnt==NULL){$prCnt=0;}
