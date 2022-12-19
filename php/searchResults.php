<!DOCTYPE html>
<?php
    
    session_start() ;
?>
<html>
    <head>
        <title>Search Results</title>

        <link rel="stylesheet" href="../css/searchResultStyles.css">
        <link rel="stylesheet" href="../css/theme.css">

    </head>


    <body>
            <header>
                <h1>eZBus</h1>
            </header>
            
        <div id="view_main">
            <h2>Search Results...</h2> 

            <ul>
                <div class="list_view">

                <?php
                    require 'config.php' ;
                    
                    

                    /* #########  checking if the search button is clicked */
                    if(isset($_GET["btnsearch"]))
                    {
                    
                    /*#########   Information fetched from search page*/ 
                    $start_station = $_GET["departure_station"];
                    $end_station = $_GET["arrival_station"];
                    $date =  $_GET["date"]  ;
                    
                    
            
                    $day = date("D" , strtotime($date)) ; //Formating date into days
                    
                    //Filtering the routes according to user selected From station
                    $sql = "SELECT Route_id , Station_name , Price FROM route_station where Station_name Like '%$start_station%'" ;

                    $result = $con -> query($sql) ;
                    

                    //Filtering the routes according to user selected To station
                    $sql1 = "SELECT Route_id , Station_name , Price FROM route_station where Station_name Like '%$end_station%' " ;

                    $result1 = $con -> query($sql1) ;

                    $routes = array() ;

                    $count = 0 ;
                    

                    if( ($result -> num_rows > 0) && ($result1 -> num_rows > 0) )
                    {

                        while ( $row = $result-> fetch_assoc())
                        {

                            $sql1 = "SELECT Route_id , Station_name , Price FROM route_station where Station_name Like '%$end_station%' " ;

                            $result1 = $con -> query($sql1) ;

                            while ( $row1 = $result1 -> fetch_assoc())
                            {
                                //checking if two stations are available in same route and its direction of traveling is same
                                if( $row["Route_id"] == $row1["Route_id"] && $row["Price"] < $row1["Price"])
                                {
                                    $routes[$count] = $row["Route_id"] ; //finding the available routes for user selected stations
                                    $count++ ;
                                }
                            }
                        }
                    }
                    //######################################################################################
                    if ( $count == 0)
                    {
                        echo "No Bus available" ;
                    }
                    else
                    {
                    

                    $sql2 = "SELECT Bus_id , Route_id FROM bus "  ;

                    $result2 = $con -> query($sql2) ;

                    $buses = array() ;
                    $bus_count = 0 ;

                    //filtering the buses according to filtered routes
                    while( $row2 = $result2 -> fetch_assoc() )
                    {
                        foreach( $routes as $values)
                        {
                            if ( $row2["Route_id"] == $values)
                            {
                                $buses[$bus_count] = $row2["Bus_id"] ;
                                $bus_count++ ;
                            }
                        }
                    }

                    $finalBus = array() ;
                    $x = 0 ;

                    //Filtering the buses according to the user selected date 
                    foreach ( $buses as $busvalues)
                    {
                        $sql3 = "SELECT bus_id , Days FROM  bus_travelling_days where bus_id = $busvalues AND Days Like '$day%'" ;

                        $result3 = $con -> query($sql3) ;

                        while ( $row3 = $result3-> fetch_assoc())
                        {
                            $finalBus[$x] = $row3["bus_id"] ; //final available buses according to user selected stations and date
                            $x++ ;
                        }
                    }

                    //foreach ( $finalBus as $y)
                       // echo $y ;

                        $busAmount = 0 ;

                        foreach ( $finalBus as $y)
                        {
                            //fetching the details about available buses from database
                            $sql4 = "SELECT Bus_id , Route_id ,Driver_name , Driver_license ,Bus_no ,Seats , Dep_time , Arr_time ,AC , WIFI ,Bus_img  FROM bus WHERE Bus_id = $y"   ;

                            $result4 = $con-> query($sql4) ;

                            while( $row4 = $result4 -> fetch_assoc())
                            {   
                                $bus_id = $row4["Bus_id"] ;
                                $bus_no = $row4["Bus_no"] ;
                                

                                $b_start = $row4["Dep_time"] ;
                                $b_end = $row4["Arr_time"] ;
                    
                                $route = $row4["Route_id"]  ;
                                
                                //fetching details about the route that the bus travels
                                $sqlroute = "SELECT Source , Destination , Route_details FROM route WHERE Route_id =  $route"  ;

                                $resultRoute = $con-> query($sqlroute) ;

                                while($routeinfo = $resultRoute-> fetch_assoc())
                                {
                                    $r_detail = $routeinfo["Route_details"] ;
                                    $r_source = $routeinfo["Source"] ;
                                    $r_destination = $routeinfo["Destination"] ;
                                    echo  "<li class='item_box'>" ;
                                ?>
                                    <!-- Displaying the details -->
                                    <form method='GET' action='reservation.php'>

                                    <div class='item'>

                                    <div class='bus_image_name'>

                                    <!-- Bus Image -->
                                    <?php
                                    if ( $row4["Bus_img"] != null)
                                    {

                                    ?>
                                        <!-- //////////////////should be changed -->
                                        <a href='busDetails.php?id=<?php echo $bus_id ; ?>' ><img class='bus_image' src='<?php echo "../Admin/".$row4['Bus_img'] ; ?>' alt='Bus image'> </a> 
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <a href='busDetails.php?id=<?php echo $bus_id ; ?>'><img class='bus_image' src='../images/buslogo.jpg' alt='bus image'> </a> 
                                    <?php
                                    }
                                    ?>
                                        <!-- //Bus number -->
                                    <p><?php echo "Bus no: ". $row4["Bus_no"] ;?> </p> 
                                        

                                    </div> 

                                    <div class='bus_detail'> 

                                        <div class='start_to_end'> 
                                            <div class='start_station'>
                                                <p><?php echo $routeinfo["Source"] ;?> </p>  
                                                <p class='time'> <?php echo  $row4["Dep_time"]. "am" ; ?> </p> 
                                            </div>

                                            <div class='to_word'>
                                                <p>to</p> 
                                                <p><?php echo $routeinfo["Route_details"] ; ?> </p>
                                            </div> 

                                            <div class='final_station'> 
                                                <p> <?php echo $routeinfo["Destination"] ; ?> </p>
                                                <p class='time'>  <?php echo $row4["Arr_time"] . " pm " ;?></p> 

                                            </div> 
                                            </div> 

                                        <!-- //Features of bus -->
                                        <div class='features'>
                                            <ul> 
                                                <?php
                                                if ($row4["AC"] == 1)
                                                    echo "<li>AC</li>" ;
                                                if ($row4["WIFI"] == 1)
                                                    echo "<li>WIFI</li>" ;
                                                ?>
                                                
                                            </ul> 

                                        </div> 
                                        


                                    </div>

                                    <!-- // finding the ticket price  -->
                                    <?php
                                    $sql5 = "SELECT Price FROM route_station WHERE Station_name Like '%$start_station%' AND Route_id = $route " ;
                                    $result5 = $con -> query($sql5) ;

                                    $sql6 = "SELECT Price FROM route_station WHERE Station_name Like '%$end_station%' AND Route_id = $route " ;
                                    $result6 = $con -> query($sql6) ;

                                    while( $row5 = $result5->fetch_assoc())
                                    {
                                        while($row6 = $result6 -> fetch_assoc())
                                            $ticket = $row6["Price"] - $row5["Price"] ;
                                    }
                                    ?>
                                    
                                    <input type='hidden' name='date' value='<?php echo$date ;?>'>
                                    <input type='hidden' name='bus' value='<?php echo $bus_id ; ?>'>
                                    <input type='hidden' name='bus_no' value='<?php echo $bus_no;?>'>
                                    <input type='hidden' name ='date' value='<?php echo $date;?>'>
                                    <input type='hidden' name ='start_station' value='<?php echo$start_station;?>'>
                                    <input type='hidden' name ='end_station' value='<?php echo $end_station;?>'>
                                    <input type='hidden' name='route_detail' value='<?php echo $r_detail;?>'>
                                    <input type='hidden' name='route_source' value='<?php echo $r_source;?>'>
                                    <input type='hidden' name='route_destination' value='<?php echo $r_destination;?>'>
                                    <input type='hidden' name='start_time' value='<?php echo $b_start;?>'>
                                    <input type='hidden' name='end_time' value='<?php echo $b_end;?>'>
                                    <input type='hidden' name='price' value='<?php echo $ticket;?>'>

                                    <?php

                                        $seatcheck = "SELECT SUM(No_of_Seats) AS 'seats' FROM bookings WHERE Bus_id = $bus_id AND Date = '$date' " ;

                                        $seatResults = $con -> query($seatcheck) ;

                                        $seat = $seatResults -> fetch_assoc() ;

                                        $availSeats = $row4["Seats"]-$seat["seats"] ;



                                    ?>

                                    <div class='bus_price'> 
                                        <p class='price_value'> <?php echo $ticket . " Rs"; ?></p> 
                                        <p>per seat</p> 

                                        <?php 
                                            if ($availSeats <= 0)
                                                echo "<p> No seats available</p>";
                                            else
                                            {
                                                echo "<p>Total Seats : " . $row4['Seats']. "<br> Available Seats : " . $availSeats. " </p>" ;
                                            }
                                        ?>
                                        <input type='submit' class='book_button' value='Book' name= 'book' 
                                        <?php if ($availSeats <= 0)
                                                  echo "disabled" ;        
                                        ?> >

                                                                    
                                    </div>
                                </div>
                                </form>
                            </li>
                            <?php
                            $busAmount++ ;
                            
                                }

                            
                            }
                    }
                    
                    if($busAmount == 0)
                        echo "No Buses available" ;
                    }
                    }
                ?>
                
                </div>

            </ul>

        </div>

        <footer class="ftr">
        <div class="footer">

            <center><h3>Follow us on</h3></center><br>
            <table id="footerTable">
            <tr>
            
                <td></td>
                <td style="padding-left:150px;">Facebook  - eZbus Service</td>
                <td></td>
            </tr>
            
            <tr>
                <td>eZbus21@gmail.com</td>
                <td style="padding-left:150px;">Instagram - eZbus</td>
                <td align="right"><a href="FAQs_before.php" class="FQs">FAQs</a></td>
            </tr>
            <tr>
                <td>HotLine - 07738921414</td>
                <td style="padding-left:150px;"> Twitter - eZbus service</td>
                <td align="right"><a href="#" class="TandC">Terms and Conditions</a></td>
            </tr>
            </table>
        </div>
	</footer>
    </body>
</html>