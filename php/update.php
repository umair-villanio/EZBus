<?php

    require 'config.php';

if (isset($_POST['Login'])){
    $uname = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO details(user_id,fname,lname,username,email,address,password)
            VALUES ('','$fname','$lname','$uname','$email','$address','$password')" ;

    if($con -> query($sql))
    {
        echo "<script>alert('inserted succesfully')</script>";
        //to redirect to the same page
        header("Location:login.html");
    }

    else{
        echo "<script>alert('Error')</script>";
    }

    $con -> close();
}
if (isset($_POST['Register'])){
    $fname = $_POST["Fname"];
    $lname = $_POST["Lname"];
    $uname = $_POST["username"];
    $email = $_POST["Email"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    
    //Email
    $sql1="SELECT email FROM details WHERE email='$email'";

    $col1 = $con->query($sql1);
    
    if( $col1 -> num_rows > 0)
    {
        echo "<script>alert('Email is already in use by another user')
        window.location.replace('Sign up.php');</script>";
    }
    else
    {
        $sql2="SELECT username FROM details WHERE username='$uname'";

        $col2 = $con->query($sql2);

        if ( $col2 -> num_rows > 0) 
        {
            echo "<script>alert('Username is already used by another user')
            window.location.replace('Sign up.php');</script>";
        }
        else
        {
            $sql = "INSERT INTO details(fname,lname,username,email,address,password)
            VALUES ('$fname','$lname','$uname','$email','$address','$password');" ;

            
            $con -> query($sql) ;

            header("Location:login.php") ;
        }
    }
    $con -> close();
}

if (isset($_POST['editProfile'])){
    $fname = $_POST["Fname"];
    $lname = $_POST["Lname"];
    $uname = $_POST["username"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $id=$_POST["usrid"];

    $sql = "UPDATE details SET fname='$fname',lname='$lname' ,username='$uname' ,email='$email' ,address='$address' ,password='$password' WHERE user_id=$id" ;



    if($con -> query($sql))
    {
        echo "<script>alert('inserted succesfully')</script>";
        //to redirect to the same page
        header("Location:profile.php");
    }
//fname=$fname, lname=$lname
    else{
        echo "<script>alert('Error')</script>";
    }

    $con -> close();
}
?>
