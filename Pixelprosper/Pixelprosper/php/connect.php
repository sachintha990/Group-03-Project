<?php
    $UserName = $_POST['fristname'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    //Database connection
    $conn = new mysqli('localhost','root','','pixelprosper',3306);
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(UserName, Email, Password)
        values(?,?,?)");
        $stmt->bind_param("sss",$UserName, $Email, $Password);
        $stmt->execute();
        echo '<script>alert("Registration Successfully... Please Login")</script>';
        $stmt->close();
        $conn->close();
    }
?>