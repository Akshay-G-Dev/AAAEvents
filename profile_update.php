<?php
include("session.php");
include("database.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    
    $user_id = $_SESSION['login_user'];
    
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    // $password = $_POST['psw'];
    $sql = "UPDATE users SET name='$name',mobile='$mobile',email='$email' WHERE id='$user_id'";
    $result = mysqli_query($db,$sql);
    if (!$result) {
        trigger_error(mysqli_error($db), E_USER_ERROR);
    }
    $user = new User();
    $user->name = $name;
    $user->mobile_number = $mobile;
    $user->email = $email;
    $_SESSION['user_obj'] = serialize($user);
    header("Location: profile.php");
    die();
}

?>