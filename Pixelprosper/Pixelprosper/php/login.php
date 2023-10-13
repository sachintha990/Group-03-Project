<?php
session_start();

    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $link_address = 'service.html';

    //Database connection
    $con = new mysqli('localhost','root','','pixelprosper',3306);
    if($con->connect_error){
        die('Connection Failed : '.$con->connect_error);
    }else{
        $stmt = $con->prepare("select*from registration where email = ?");
        $stmt->bind_param("s", $Email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if($data['Password'] === $Password){
                echo '<script>alert("Login Successfully... Welcome to PixelProsper")</script>';
            } else {
                echo '<script>alert("Invalid Email or Password")</script>';
            }
        } else {
            echo '<script>alert("Invalid Email or Password")</script>';
        }
    }
?>