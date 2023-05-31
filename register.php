<?php
require_once('database.php'); 
session_start();




function register($username,$password){
  try {
    global $db;
    $sql="INSERT INTO users(email,password) VALUES(?,?)";
    $query=$db->prepare($sql);
    $query->bind_param('ss',$username,$password);
    $exec= $query->execute();
      if($exec==true)
      {
        $_SESSION['success_message']="Registration Successful. Please Login to continue";
      return 1;
      }
      else
      {
        return "Error: " . $sql . "<br>" .$db->error;
      }
  }
  catch (Exception $e){
    $_SESSION['message']=$e;
  }
     
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['email'];
  $email    = $_POST['email'];
  $password = $_POST['psw'];

  $sql = "SELECT id FROM users WHERE email = '$username';";
  $result = mysqli_query($db,$sql);
  $row = mysqli_num_rows($result);
  if($row!=0){
    $_SESSION['error_message']="User already exists";
    $_SESSION['error_message_type']='register';
    header("Location: index.php");
    die();
  }
  $res = register($username,$password);
  if ($res==1) {
    $_SESSION['login_user'] = $myusername;
    header("Location: index.php");
    die();
  }
  header("Location: login.php");
  die();
}
?>

