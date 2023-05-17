<?php
   include('database.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   //if(!isset($_SESSION['login_user'])){
   
   if($user_check!=NULL){
      $ses_sql = mysqli_query($db,"select username from users where username = '$user_check' ");
   
      $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
      
      $login_session = $row['username'];
      header("Location: index.php");
      die();
   } else {
      $_SESSION['login_user']=NULL;
      header("Location: index.php");
      die();
   }
   
?>