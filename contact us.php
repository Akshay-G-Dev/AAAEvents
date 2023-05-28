<?php include("session.php");?>
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
        <form>
            <h1>Leave a Message</h1>
            <input type="text" id="firstName" placeholder="First Name" required>
            <input type="text" id="lastName" placeholder="Last Name" required>
            <input type="email" id="email" placeholder="Email" required>
            <input type="text" id="mobile" placeholder="Mobile" required>
            <h4>Type Your Message Here...</h4>
            <textarea required></textarea>
            <input type="submit" value="Send" id="button">
        </form>
    </div>

    <?php include("footer.php");?>
</body>
</html>
