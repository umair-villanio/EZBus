<!DOCTYPE html>

<html>
    <head>
        <title>Bus Details</title>

        <link rel="stylesheet" href="../css/busDetailsStyle.css">
        <link rel="stylesheet" href="../css/headerfootertheme.css">
    </head>

    <body>
        <header>
            <h1>eZBus</h1>
        </header>


        <div id="bus_details_container">

            <?php

                require 'config.php' ;

                $bus_id = $_GET["id"] ;

                $sql = "SELECT Bus_id , Route_id ,Driver_name , Driver_license ,Bus_no ,Seats , Dep_time , Arr_time ,AC , WIFI ,Bus_img  FROM bus WHERE Bus_id = $bus_id" ;

                $bus_result = $con-> query($sql) ;

                while ($bus_row = $bus_result->fetch_assoc())
                {
                    echo "<div id='bus_details'> " ;

                        echo "<div id='bus_image'>" ;
                            if ( $bus_row["Bus_img"] != null) 
                            {
                ?>                
                                <a href='busDetails.php' ><img class='bus_image' src='<?php echo "../Admin/". $bus_row["Bus_img"]  ; ?>' alt='Bus image'> </a> 
                <?php
                            }
                            else
                            {
                ?>
                                <a href='busDetails.php'><img class='bus_image' src='../images/buslogo.jpg' alt='bus image'> </a> 
                <?php
                            }
                ?>
                            
                        </div> 

                        <div id='bus_info'>
                            <ul> 
                                <?php
                                echo "<li>Bus Number : ". $bus_row['Bus_no']."</li>  
                                <li>Driver license no : " . $bus_row['Driver_license']  ."</li>" ;
                                ?>
                            </ul>
                        </div>

                        <?php
                        $route_id = $bus_row['Route_id'] ;
                        $sqlroute = "SELECT Source , Destination , Route_details , Distance FROM route WHERE Route_id =  $route_id"  ;

                        $resultRoute = $con-> query($sqlroute) ;
            
                        while($routeinfo = $resultRoute-> fetch_assoc())
                        {
                            echo "<h2> Distance : </h3>" ; 
                            echo "<p>" . $routeinfo['Distance']. " Km : ". $routeinfo['Source'] . " to " . $routeinfo['Destination'] ." ( " . $routeinfo['Route_details'] ." ) " ."</p>" ;
                           
                            $sqlStations = "SELECT  Station_name , Price FROM route_station WHERE Route_id = $route_id ORDER BY Price" ;

                            $result_stations = $con->query($sqlStations) ;
                            $text = '' ;
                            $count = 0 ;
                            while($station_row = $result_stations->fetch_assoc())
                            {
                                if($count == 0)
                                    $text .=  $station_row["Station_name"]  ;
                                else 
                                    $text .= " - " . $station_row["Station_name"]  ;
                                $count++ ;
                            }
                            echo "<div id='routes'> 
                            <h2>Route :</h2>" ;
                            echo "<p>". $text ."</p>" ;

                        }
                        ?>
                        </div> 

                        <div id='features'>
                            <h2>Features :</h2> 
                            <ul>
                            <?php
                            if ($bus_row["AC"] == 1)
                                echo "<li class='feature_list'>AC</li>" ;
                            
                            if ($bus_row["WIFI"] == 1)
                                echo "<li class='feature_list'>WIFI</li>" ;
                            ?>
                            </ul>

                        </div>

                    </div> 

            <?php
                }
            ?>
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
					<td align="right"><a href="#" class="FQs">FAQs</a></td>
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