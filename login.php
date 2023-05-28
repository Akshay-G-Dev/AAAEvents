<?php
   include("database.php");
   include("session.php");
   // session_start();
   // class User{
   //    public $email;
   //    public $name;
   //    public $mobile_number;
   // }
   
   $error = null;
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['psw']); 
      
      $sql = "SELECT id,name,mobile FROM users WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);

      if (!$result) {
          trigger_error(mysqli_error($db), E_USER_ERROR);
      }

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);   
      $count = mysqli_num_rows($result);
      echo "$row";
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $row['id'];
         // $user = new User();
         // $user->email = $myusername;
         // $user->name = $row['name'];
   
         // $_SESSION['user_obj'] = serialize($obj);

         // $obj = unserialize($_SESSION['user_obj']);
         
         header("Location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         $_SESSION['error_message']=$error;
         $_SESSION['error_message_type']='login';
         $_SESSION['user_obj'] = NULL;
         header("Location: index.php");
      }
   }
   else{
      $error = "GET not allowed";
      header("Location: index.php");
   }
   
   
?>