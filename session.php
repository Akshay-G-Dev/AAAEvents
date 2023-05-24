<?php
   include('database.php');
   session_start();
  
  
   $_SESSION['message']=NULL;
   $_SESSION['query']=NULL;

   if(!isset($_SESSION['login_user'])){
      $user_check = $_SESSION['login_user'];
      if($user_check!=NULL){
         $ses_sql = mysqli_query($db,"select username from users where username = '$user_check' ");
         $_SESSION['query']=$ses_sql;
         $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
         
         $login_session = $row['username'];
         header("Location: index.php");
         $_SESSION['message']="Login Success";
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