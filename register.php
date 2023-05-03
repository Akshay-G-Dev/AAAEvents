<?php
require_once('database.php'); 
   




function register($username,$password){
    global $db;
    $sql="INSERT INTO users(username,password) VALUES(?,?)";
    $query=$db->prepare($sql);
    $query->bind_param('ss',$username,$password);
    $exec= $query->execute();
     if($exec==true)
     {
      return "You are registered successfully";
     }
     else
     {
       return "Error: " . $sql . "<br>" .$db->error;
     }
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username =$_POST['email'];
  $email     =$_POST['email'];
  $password  =$_POST['psw'];

  register($username,$password);
}
?>

