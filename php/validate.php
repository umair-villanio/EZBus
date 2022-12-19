<?php

            require 'config.php' ;

            $userName = $_POST["username"] ;
            $pswrd = $_POST["password"] ;

            
            $usr = "SELECT username from details" ;
            $result1  = $con -> query($usr)  ;

                $count = 0 ;
                while($row = $result1 ->fetch_assoc())
                {
                    $count++ ;
                    $psw = "SELECT user_id , password FROM details where username Like '$userName' " ;

                    $paswrdResults = $con-> query($psw) ;

                    while ($row1 = $paswrdResults -> fetch_assoc())
                    {
                        if($row1["password"] == $pswrd) 
                        {
                            session_start() ;
                            $_SESSION["userID"] = $row1["user_id"] ;
                            $_SESSION["username"] = $userName;
                            
                            $previous = $_SESSION["link"] ;

                            if (isset($_SESSION["link"]))
                            {
                                echo "<script>alert('Login succesful')
                                window.location.replace('". $previous ."');</script>";
                            }
                            else 
                            {
                                echo "<script>alert('Login succesful')
                                window.location.replace('homepage.php');</script>";
                            }

                            
                      
                        }
                        else 
                        {
                            echo "<script> alert('Incorrect password')
                            window.location.replace('login.php'); </script>" ;

                            //header("Location:login.php") ;
                        }
                    }
                }
            

            if ( $count != 0)
            {
                echo "<script> alert('Incorrect Username')
                window.location.replace('login.php'); </script>" ;
                
            }
 ?>
