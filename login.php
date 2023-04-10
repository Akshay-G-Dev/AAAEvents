<?php
require_once('database.php'); 
   
$firstName =legal_input($first_name);
$lastName  =legal_input($last_name);
$email     =legal_input($email);
$password  =legal_input(md5($password));

$value = trim($value);
$value = stripslashes($value);
$value = htmlspecialchars($value);
return $value;
}


function register($firstName,$lastName,$email,$password){
    global $db;
    $sql="INSERT INTO users(first_name,last_name,email,password) VALUES(?,?,?,?)";
    $query=$db->prepare($sql);
    $query->bind_param('ssss',$firstName,$lastName,$email,$password);
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

?>

