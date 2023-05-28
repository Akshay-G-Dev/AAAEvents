<?php
include('session.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php");?>
    <title>Eventor-profile</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="icon" href="icon.ico"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/footer.css">
    <style>
        #sub:hover{
        background-color: gray;
        /* border-color: gray; */
      }

      #sub{
        color: white;
        background-color:black;
        /* border-radius: 5px; */
        /* border-color:black; */
        width: 300px;

        border-style: none;
        
      }
      .con{
        padding-top: 1em;
        text-align: left;
      }
      footer {
        bottom: 0;
      }

      body {
        background-image: url(images/loginbg.png);
        max-width: 100vw;
      }
      label {
        width: 30em;
        color: black;
      }
      input[type=text], input[type=email] {
        width: 16em;
        height: 2em;
        stroke: black;
        background-color: #dedede !important;
      }
      h1 {
        padding-top: 2em;
        color: black;
        width: auto;
        font-size: 3em;
        text-align: center;
      }
      .box {
        margin-left: 2em;
        margin-right: 2em;
        margin-bottom: 10em;
      }

      .container {
        box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: fit-content;
        margin: auto;
        text-align: center;
        background-color: #f2f2f2;
        margin-top: 150px;
        border-radius: 5px;
      }
      input[type=submit]{
        padding:0.5em;
        text-transform: uppercase;
      }
    </style>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="box">
            <h1>PROFILE</h1>
            <div id="pic">
                <a href="#">
                </a>
                    <img src="images/man.png" style="width: 10em" />
            </div>
            <form action="profile_update.php" method="post">
                <div class="con">
                    <table>
                        <tr>
                            <td><label for="name">Name : </label></td>
                            <?php
                            echo '<td><input type="text" id="name" placeholder="Name" name="name" value="' . $user->name . '" required/></td>';
                            ?>
                          
                        </tr>
                        <tr>
                            <td><label for="mobno">Contact No : </label></td>
                            <td>
                                <?php echo '<input type="text" id="mobno" placeholder="Contact No" name="mobile" value="'.$user->mobile_number . '" required/>';?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Email">Email : </label></td>
                            <td>
                              <?php
                              echo '<input type="email" id="Email" placeholder="Email" name="email" value="' . $user->email . '" required/></td>';
                              ?>
                        </tr>
                    </table>
                </div>
                <div style="padding-top: 10em;padding-bottom: 2em;">
                    <input id="sub" type="submit" value="save" />
                </div>
            </form>
        </div>
    </div>
    <?php include("footer.php");?>
</body>

</html>
