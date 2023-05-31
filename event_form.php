<?php
include ('session.php');
if (!$user) {
    $_SESSION['message'] = "You need to login first";
    header("location:index.php");
}

if($_SERVER['REQUEST_METHOD']==="POST"){
    $name=$_POST['name'];
    $type=$_POST['type'];
    $date=$_POST['date'];
    $city=$_POST['city'];
    $members=$_POST['members'];
    $user_id=$user->id;
    $query="INSERT INTO events (name,type,date,city,members,user_id) VALUES ('$name','$type','$date','$city','$members','$user_id')";
    $result=$conn->query($query);
    if($result){
        $_SESSION['success_message']="Event Registered Successfully";
        header("location:index.php");
    }
    else{
        $_SESSION['error_message']="Event Registration Failed";
        header("location:index.php");
    }
}