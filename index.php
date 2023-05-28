<?php
    include("session.php");
    if(isset($_SESSION['user_obj']) && $_SESSION['user_obj']){
        $user = unserialize($_SESSION['user_obj']);
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php");?>
   
    
  
    <script src="login.js"></script>
    <title>Eventia</title>
    
</head>

<body>
    <?php
        include("nav.php");
    ?>

    <div class="header">
        <!-- Ayush ka header hai yha pe--->
        <div class="text-box">
            <h3>HOW CAN WE HELP YOU?</h3>
            <div class="row">
                <a href="gallery.php">Gallery</a>
                <a href="catlog.php">Organise a Event <!--<span>&#x27F6;</span>--></a>
            </div>
        </div>
        <div class="social-icons">
            <a href=""><img src="images/dribble.png"></a>
            <a href=""><img src="images/telegram.png"></a>
            <a href=""><img src="images/instagram.png"></a>
        </div>
    </div>
    
    <!---catlog-->
    <section>
        <div class="catlogRow gx-0 row">
            <h2>You Dream We Organise</h2>
            <div class="col catlogCol">
                <img src="images/event-type-1.jpeg" alt="Social Event" width="300" height="300" style="border-radius: 100%; padding: 2%;">
                <h4>Social Event</h4>
            </div>
            <div class="col catlogCol active">
                <img src="images/event-type-2.jpeg" alt="Social Event" width="300" height="300" style="border-radius: 100%; padding: 2%;">
                <h4>Professional Event</h4>
            </div>
            <div class="col catlogCol">
                <img src="images/event-type-3.jpeg" alt="Social Event" width="300" height="300" style="border-radius: 100%; padding: 2%;">
                <h4>Personal Event</h4>
            </div>
            <button type="button" class="btn btn-sm btn-outline-dark" style="height: 3em;">Book Now</button>
        </div>
    </section>
    <!--testmonial-->
    <section>
        <div id="Testimonials" class="row testimonial-row" style="padding: 4%; font-family: 'Merienda', cursive;">
            <div class="Testimonials_top">
                <div class="Testimonials_title">
                    <h2>Testimonials</h2>
                </div>
            </div>
            <div class="testimonials_content col col-lg-4 col-md-6 col-sm-12">
                <div class="testimonials_avatar">
                    <img src="images/ava1.png" alt="">
                </div>
                <div class="testimonials_text_before"><i class="fa fa-quote-right"></i></div>
                <div class="testimonials_text">
                    <p> They were exactly what we were looking for when we started to plan our wedding.
                        They were super patient with all our questions during the planning process and during the days just prior to our wedding.
                        We honestly couldn’t have asked for a better team of professionals to make our day the most amazing day ever.
                    </p>
                    <div class="testimonials_information">
                        <h3>John Doe</h3>
                        <h4>customer</h4>
                    </div>
                </div>
                <div class="testimonials_text_after"><i class="fa fa-quote-left"></i></div>
            </div>
            <div class="testimonials_content col col-lg-4 col-md-6 col-sm-12">
                <div class="testimonials_avatar">
                    <img src="images/download.jpeg" alt="">
                </div>
                <div class="testimonials_text_before"><i class="fa fa-quote-right"></i></div>
                <div class="testimonials_text">
                    <p>So thankful for Maria, she worked wite and my husband on a time constraint. We planned our wedding in 3 months, due to my father who was terminally ill.
                        Our wedding was absolutely beautiful and everything we envisioned our special day to be!h m
                    </p>
                    <div class="testimonials_information">
                        <h3>Deki Sugi</h3>
                        <h4>customer</h4>
                    </div>
                </div>
                <div class="testimonials_text_after"><i class="fa fa-quote-left"></i></div>
            </div>
            <div class="testimonials_content col col-lg-4 col-md-12 col-sm-12">
                <div class="testimonials_avatar">
                    <img src="images/ava2.png" alt="">
                </div>
                <div class="testimonials_text_before"><i class="fa fa-quote-right"></i></div>
                <div class="testimonials_text">
                    <p> They really are the dream team and we couldn’t be happier.
                        They helped our magical weekend wedding dreams come true.
                        They were always very patient, responsive, and are in the know with the most current and fabulous trends.
                        We absolutely reccomend them without hesitation! Thank you! Thank you! Thank you!
                    </p>
                    <div class="testimonials_information">
                        <h3>Annaya</h3>
                        <h4>Customer</h4>
                    </div>
                </div>
                <div class="testimonials_text_after"><i class="fa fa-quote-left"></i></div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!--footer-
    <footer id="footer">
        <div>
            <span class="company-name">Eventia</span>
            <div class="links">
                <ul>
                    <li><a style="color: white;" href="#">Home</a></li>
                    <li><a style="color: white;" href="#">Contact Us</a></li>
                    <li><a style="color: white;" href="feedback.html">Feedback</a></li>
                    <li><a style="color: white;" href="aboutus.html">About Us</a></li>
                </ul>
            </div>
            <div class="social-icons">
                <a href=""><img src="images/dribble.png"></a>
                <a href=""><img src="images/telegram.png"></a>
                <a href=""><img src="images/instagram.png"></a>
            </div>
        </div>
        <span class="copyright">Copyright &copy; 2022</span>
    </footer>-->
    <?php include("footer.php");?>

    <section class="popup">
        <div class=" popup-box" id="register-popup-box" onsubmit="return confirmpassword()">
            <div class="register-container">
                <form method="POST" action="register.php" id="register-form">

                <span class="message-line"><?php
                if(isset($_SESSION['message']) && $_SESSION['message']){
                    echo $_SESSION['message'];
                }
                ?>
                </span>
                <h1>Register</h1> <span class="close-popup"><i class="fa-solid fa-xmark"></i></span>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <table>
                    <tr>
                        <td><label for="email"><b>Email</b></label></td>
                        <td><input type="email" placeholder="Enter Email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <td><label for="psw"><b>Password</b></label></td>
                        <td><input type="password" placeholder="Enter Password" name="psw" id="reg-psw" required></td>
                    </tr>
                    <tr>
                        <td><label for="psw-repeat"><b>Repeat Password</b></label></td>
                        <td><input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required></td>
                    </tr>
                    <hr>
                </table>
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                <input type="submit" class="registerbtn" value="Register"></input>
                </form>
            </div>
            <div class="container signin">
                <p>Already have an account? <a href="#" id="login-page-btn">Sign in</a>.</p>
            </div>
        </div>
        <div class="popup-box" id="login-popup-box" >
            <div class="login-container">
                <form method="POST" action="login.php">

                
                <h1>Login</h1> <span class="close-popup"><i class="fa-solid fa-xmark"></i></span>
                <p>Welcome Back</p>
                <hr>
                <table>
                    <tr>
                        <td><label for="email"><b>Email</b></label></td>
                        <td><input type="text" placeholder="Enter Email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <td><label for="psw"><b>Password</b></label></td>
                        <td><input type="password" placeholder="Enter Password" name="psw" id="psw" required></td>
                    </tr>
                    
                    <hr>
                </table>
                <input type="submit" class="registerbtn" value="Login"></input>
                </form>
            </div>
            <div class="container signin">
                <p>New User? <a href="#" id="signup-page-btn">Register</a>.</p>
            </div>
           
        </div>
    </section>
    
    <style>
    .close-popup {
        position: absolute;
        right: 2em;
        top: 1em;
        cursor: pointer;
        transition: 0.1s all ease-in;

    }

    .close-popup:hover {
        transform: scale(1.5);
    }

    .popup {

        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        max-height: 100vw;
        background-size: contain;
        height: 100vh;
        display: none;

        justify-content: center;
        background-color: rgba(114, 104, 104, 0.486);
    }

    .popup.open {
        display: flex;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        -moz-backdrop-filter: blur(5px);
    }

    .popup-box {

        position: relative;
        /*left:40%;
            top: 40%; */
        
        margin-top: 6em;
        background-color: rgb(255, 255, 255);
        height: fit-content;
        width: 30em;
        display: none;
    }
   
    </style>
    <?php
        include("alerts.php");
?>
</body>

<script>

function whichTransitionEvent(){
  var t,
      el = document.createElement("fakeelement");

  var transitions = {
    "transition"      : "transitionend",
    "OTransition"     : "oTransitionEnd",
    "MozTransition"   : "transitionend",
    "WebkitTransition": "webkitTransitionEnd"
  }

  for (t in transitions){
    if (el.style[t] !== undefined){
        console.log(transitions[t]);
      return transitions[t];
    }
  }
}

var transitionEvent = whichTransitionEvent();

$(".catlogCol").on("animationend", function () {
        $(this).removeClass("animate");
    });
$(".catlogCol").hover(function () {
    $(this).addClass("animate");    
});
</script>


</html>

<?php
    unset($_SESSION['message']);
    unset($_SESSION['error_message']);
    unset($_SESSION['error_message_type']);
    unset($_SESSION['success_message']);
?>
