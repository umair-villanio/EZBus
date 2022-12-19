<?php

    $server = "localhost" ;
    $username = "root" ;
    $password ="" ;
    $database = "ezbus" ;

    $con = new mysqli( $server , $username , $password , $database) ; 

    if ( $con-> connect_error)
    {
        die ("Connection failed" . $con->connect_error) ;
    }
    
?> 