<?php
include("session.php");
if(!$user){
  $_SESSION['message']="You need to login first";
  header("Location: index.php");
  
}
?>
<html>
<head>
  <?php include("head.php");?>
  <title>Event Form</title>
<link rel="stylesheet" href="form.css">

</head>
<body>  
  <?php include("nav.php");?>
  
            <form method="post" action="event_form.php">
              <h2 style="color:#fff; text-decoration:underline; margin-bottom:1em;">Event Registeration Form</h2>
                <label> Name: </label> <br>
                <input type="text" placeholder="Enter Full Name" value="<?php if($user){echo $user->name;} echo'" readonly=True'; ?>" required/> <br>
                <label> Your E-mail: </label> </br>
                <input type="email" placeholder="Your Email" value="<?php if($user){echo $user->email;} echo'" readonly=True'; ?>" required> <br>
                <label> Mobile: </label> <br>
                <input type="tel" placeholder="Enter phone number" value="<?php if($user){echo $user->mobile_number;} echo'" readonly=True'; ?>"  required/> <br>
                <label> Name of Event: </label> </br>
                <input type="text" placeholder="eg. Birthday" name="name" required/><br>
                <label> Type of Event: </label> </br>
                <select id="type" name="type" required>
                    <option disabled selected value>--Select--</option>
                    <option class="option" value="Social">Social</option>
                    <option class="option" value="Personal">Personal</option>
                    <option class="option" value="Professional">Professional</option>
                    <option class="option" value="Other">Other</option>
                  </select><br>
                <label> Date: </label> <br>
                <input type="date" name="date" required /> <br>
                <label> City: </label> </br>
                <input type="text" placeholder="Enter City"  name="city" required/> <br>
                <label> Number of member(Approx): </label> <br>
                <input type="number"  name="members" placeholder="" required/>
              <br>
              <button> Submit </button>
              </form>
        <h1 id="wf" style="opacity:0;width: 600px; margin-top:1.1em;display:none; margin-bottom:1em">Thank you</h1>
<script type="text/javascript" src="form.js"></script>
</body>
</html>


