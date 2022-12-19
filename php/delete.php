<?php

    require 'config.php';

    session_start() ;
    $id= $_SESSION["userID"];
    
    $sql = "DELETE FROM details WHERE user_id = $id";

    if($con -> query($sql))
    {
        echo"<script> alert('Deleted')</script>";
        header("Location:login.php");
    }
    else
    {
        echo"<script>alert('ERROR')</script>";
    }

    $con -> close();
?>