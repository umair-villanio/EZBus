<!DOCTYPE html>
    <?php
        session_start() ;
        require 'config.php' ;

        unset ($_SESSION["link"]) ;
        
        $date = date('d-m-y') ;
        //$_SESSION["cid"] = 100 ;
    ?>
<html>
    <head>
        <title>Search</title>

        <link rel="stylesheet" href="../css/searchStyles.css">
        <link rel="stylesheet" href="../css/theme.css">

    </head>

    <body>
    <header>
				<table>
					<tr>
						<td width="50px">
						<!--bus logo -->
						<div class="logo">
							<a href="#"><img src="../images/download.jpg" alt="Bus logo" ></a>
						</div>
						</td>
						<td><a href="#" id="Name"><h1>Welcome to eZBus</h1></a></td>
					</tr>
				</table>
				<!--Navigation bar -->
				<ul class="list">
					<button class="btn"><li class="list"><a href="home.php">Home</a></li></button>
					<button class="btn"><li class="list"><a href="myBookings.php">Reservations</a></li></button>
					<button class="btn"><li class="list"><a href="Feedback.php">Contact us</a></li></button>
					<button class="btn"><li class="list"><a href="Review.php">Reviews</a></li></button>
					
				</ul>
			</header>

        <form method="GET"  action="searchResults.php">

            <input type="hidden" value="101" name="customer_id"> 
            
            <div id="search_details_container">

                <div id="search_row">
                    <br>
                    <h2>Find your Buses easily...</h2>

                    
                    <div id="departure_container">
                        <label for="">From</label> <br>
                        <select name="departure_station" id="departure_station" required>
                            <option value="" hidden>Enter your departure station</option>
                            <?php
                        
                                
                
                        
                                

                                

                                $sql = " SELECT Station_name FROM route_station" ;

                                $result = $con -> query($sql) ;

                                if ( $result -> num_rows > 0)
                                {
                                    
                                    while( $row  = $result-> fetch_assoc()) 
                                    {
                                        echo "<option>" ;

                                        echo $row["Station_name"] ;
                                        echo "</option>" ;
                                    }
                                }
                            ?>

                        </select>
                    </div>
                    
                    <div id="arrival_container">
                        <label for="">To</label> <br>
                        <select name="arrival_station" id="arrival_station" required>
                            <option value="" hidden>Enter your arrival station</option>
                            <?php
                                require 'config.php' ;

                                $sql = " SELECT Station_name FROM route_station Group by Station_name" ;

                                $result = $con -> query($sql) ;

                                if ( $result -> num_rows > 0)
                                {
                                    
                                    while( $row  = $result-> fetch_assoc()) 
                                    {
                                        echo "<option>" ;

                                        echo $row["Station_name"] ;
                                        echo "</option>" ;
                                    }
                                }


                            ?>
                
                        </select>
                    </div>
                    
                    <div id="date_container">
                        <label for="">Date</label> <br>
                        <input type="date" id="date" name="date" min="" required>
                    </div>
                    
                    <div id="search_container">
                        <input type="submit" value="Search" id="search" name="btnsearch">
    
                    </div>
                    
                </div>
            </div>

        </form>
        
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
        <script src="../js/thanishvalidation.js"></script>
    </body>

</html>