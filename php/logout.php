<?php

    session_start();
	
    if(isset($_GET["Logout"]))
    {
        session_destroy();
        header("Location:login.php");
    }
?>