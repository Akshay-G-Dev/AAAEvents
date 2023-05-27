<?php
session_start();
echo $_SESSION['message'];

if (isset($_SESSION['login_user'])){

    $user_check = $_SESSION['login_user'];
} else
{ 
  header('Location: index.php');
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eventor-profile</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="icon.ico">
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
      input {
        width: 16em;
        height: 2em;
        stroke: black;
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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="height: 80px;">
        <a class="navbar-brand" href="#"><span class="company-name">Eventia</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" style="float: right; right: 0; position: absolute;">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact us.html">Contact Us</a>
                </li>
                <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Dropdown
                       </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>-->
                <!--<form class="form-inline my-2 my-lg-0">
                     <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                   </form>-->
                <li>
                    <!--<a class="btn btn-primary m-1" id="login-signup">Register</a>-->
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="images/man.png" alt="icon" class="cart ">
                        
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.html">Manage Profile</a>
                        <a class="dropdown-item" href="feedback.html">Feedback</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Help</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="box">
            <h1>PROFILE</h1>
            <div id="pic">
                <a href="#">
                    <img src="images/man.png" style="width: 10em" />
                </a>
            </div>
            <form action="#">
                <div class="con">
                    <table>
                        <tr>
                            <td><label for="name">Name : </label></td>
                            <?php
                            echo '<td><input type="text" id="name" placeholder="Name" value="' . $_SESSION["name"] . '>';
                            ?>
                          /></td>
                        </tr>
                        <tr>
                            <td><label for="mobno">Contact No : </label></td>
                            <td>
                                <input type="text" id="mobno" placeholder="Contact No" />
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Email">Email : </label></td>
                            <td>
                              <?php
                              echo '<input type="text" id="Email" placeholder="Email" value="' . $_SESSION['email'] . '/></td>';
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
    <footer>
       
          <span class="company-name">Eventia</span>
          <ul>
            <li style="--clr:#00ade1">
              <a href="index.html" data-text="&nbsp;Home">&nbsp;Home&nbsp;</a>
            </li>
            <li style="--clr:#dc00d4">
              <a href="aboutus.html" data-text="&nbsp;AboutUs">&nbsp;AboutUs&nbsp;</a>
            </li>
            <li style="--clr:#ff6493">
              <a href="contact us.html" data-text="&nbsp;ContactUs">&nbsp;ContactUs&nbsp;</a>
            </li>
            <!-- <li style="--clr:#ffdd1c">
              <a href="#" data-text="&nbsp;Feedback">&nbsp;Feedback&nbsp;</a>
            </li> -->
            
            
            
          </ul>
     
      </footer>
</body>

</html>
