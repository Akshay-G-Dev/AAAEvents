<?php include("session.php");?>

<?php 
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $message=$_POST['message'];
    $query="INSERT INTO contactus (firstname,lastname,email,mobile,message) VALUES('$fname','$lname','$email','$mobile','$message')";
    $result=$conn->query($query);
    
      if (!$result) {
          trigger_error(mysqli_error($db), E_USER_ERROR);
      }
    if($result){
        $_SESSION['success_message']="Message Sent Successfully";
        header("location:index.php");
    }
    else{
        $_SESSION['error_message']="Message Sending Failed";
        header("location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("head.php");?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <?php include("nav.php");?>
    <div class="container" style="margin:0 !important; min-width:100vw;">
        <form action="" method="POST">
            <h1>Leave a Message</h1>
            <input type="text" id="firstName" name="fname" placeholder="First Name" required>
            <input type="text" id="lastName" name="lname" placeholder="Last Name" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="text" id="mobile" name="mobile" placeholder="Mobile" required>
            <h4>Type Your Message Here...</h4>
            <textarea required name="message"></textarea>
            <input type="submit" value="Send" id="button">
        </form>
    </div>

    <?php include("footer.php");?>
</body>
</html>
