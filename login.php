<?php
   include("database.php");
   session_start();

   
   $error = null;
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['psw']); 
      
      $sql = "SELECT id,name,mobile FROM users WHERE email = '$myusername' and password = '$mypassword' LIMIT 1";
      
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
	
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $row['id'];
         $user = new User();
         $user->email = $myusername;
         $user->name = $row['name'];
   
         $_SESSION['user_obj'] = serialize($obj);

         $obj = unserialize($_SESSION['user_obj']);
         
         header("Location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
   else{
      $error = "GET not allowed";
   }
   $_SESSION['message']=$error;
   header("Location: index.php");
?>