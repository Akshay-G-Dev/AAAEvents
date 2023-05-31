
<nav class="navbar navbar-expand-lg navbar-light" style="height: 80px;">
    <a class="navbar-brand" href="#"><span class="company-name">Eventia</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="float: right; right: 0; position: absolute;">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact us.php">Contact Us</a>
            </li>

            <li>
                <?php
             

                if (isset($_SESSION['login_user'])){

                    echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> ';
                    echo '<img src="images/man.png" alt="icon" class="cart "></a>';

                }
                else{
                echo '<a class="btn btn-primary m-1" id="login-signup">Join Us</a>';

                }

                ?>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right:0;">
                    <a class="dropdown-item" href="profile.php">Manage Profile</a>
                    <a class="dropdown-item" href="contact us.php">Feedback</a>
                    <?php if($user->type==="admin"){echo '<a class="dropdown-item" href="view_contact_request.php">View Contact Request</a>';} ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="event_view.php"><?php if($user->type==="admin"){echo 'Manage ';} else{echo 'My ';} ?>Events</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>

                </div>
            </li>
        </ul>
    </div>
</nav>


