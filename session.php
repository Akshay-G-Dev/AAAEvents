<?php
   class User{
      public $email;
      public $name;
      public $mobile_number;
   }
   include('database.php');
   session_start();
  
  
   $_SESSION['message']=NULL;
   $_SESSION['query']=NULL;

   if(isset($_SESSION['login_user'])){
      $user_check = $_SESSION['login_user'];
      if($user_check!=NULL){
         $ses_sql = mysqli_query($db,"select id,email,mobile,name from users where id = '$user_check' ")  or die( mysqli_error($db));
         
         $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
         
         $_SESSION['login_user'] = $row['id'];
         $user = new User();
         $user->email = $row['email'];
         $user->name = $row['name'];
         $user->mobile_number = $row['mobile'];
   
         $_SESSION['user_obj'] = serialize($user);

         $user = unserialize($_SESSION['user_obj']);
         
         // header("Location: index.php");
         // header("Location: index.php");
         //die();
      } else {
         // $_SESSION['login_user']=NULL;
         
         //header("Location: index.php");
         // die();
      }
   }
   else {
      $_SESSION['login_user']=NULL;
      $_SESSION['user_obj']=NULL;
      $user=NULL;
      if (!(session_status() == PHP_SESSION_ACTIVE)) {
         $_SESSION['login_user']=NULL;
         $_SESSION['user_obj']=NULL;
         $user=NULL;
         $_SERVER['REQUEST_URI'];
         $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
         echo "The current page name is: ".$curPageName;  
         print $curPageName;
         if($curPageName!="index.php"){
            header('Location: index.php');
         }
      }
      
   }

?>