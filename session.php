<?php
   include('database.php');
   session_start();
  
  
   $_SESSION['message']=NULL;
   $_SESSION['query']=NULL;

   if(isset($_SESSION['login_user'])){
      $user_check = $_SESSION['login_user'];
      if($user_check!=NULL){
         $ses_sql = mysqli_query($db,"select name, username from users where username = '$user_check' ")  or die( mysqli_error($db));
         
         $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
         
         $_SESSION['login_user'] = $row['username'];
         $_SESSION['name']=$row['name'];
         // header("Location: index.php");
         //die();
      } else {
         // $_SESSION['login_user']=NULL;
         
         //header("Location: index.php");
         // die();
      }
   }
   else {
      if (!(session_status() == PHP_SESSION_ACTIVE)) {
         $_SESSION['login_user']=NULL;
      }
      
   }

?>