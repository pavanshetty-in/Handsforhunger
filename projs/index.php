<?php
require 'config.php';
session_start();
if (isset($_SESSION['ngo_id'])) {
  	
     echo '<script>window.location.href = "./NGO/ngodashboard.php"</script>';
  }
  
if (isset($_SESSION['user_id'])) {
  	
     echo '<script>window.location.href = "./userpage.php"</script>';
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/home.css" />
    <link href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Rosario&display=swap" rel="stylesheet">
    <title>Hands for Hunger</title>
    
</head>

<body>
    <section class="sec1">
        <div class="navigation">
            <header>
                <a href="/">
                    <div class="logo"><img src="../imgs/Frame 1final.svg" alt="logo" width="222" height="68"></div>
                </a>
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="./aboutus.html">AboutUs</a></li>
                        <li><a href="./contactus.php">contactUs</a></li>
                        <!-- <li><a href="user/posts"> volunteer </a></li> -->

                        <li><a href="./login.php">signin</a></li>
                        <li><a href="./signup.php">signup</a>
                            <!-- <ul> 
                        <li><a href="scribe_signup">As Scribe</a></li>
                        <li><a href="student_signup">As student</a></li>
                    </ul>-->
                        </li>
                        <li><a href="./volunteer/volunteer_login.php">Volunteer</a></li>

                    </ul>
                </nav>

            </header>
        </div>
        <div>
            <h1 class="sec1h1">Hunger doesn’t have to exist <br> let’s end it together.</h1>
            <p class="sec1p">If you have excess food from an event, party, wedding etc, please reach us</p>
            <a href="./gal.html"><button type="button" class="sec1but">Reach Now </button></a>
        </div>
    </section>
    <section class="sec2">
        <div class="sec2block">
            <h1 class="sec2h1">Who are we?</h1>
            <p class="sec2p">We aim to redistribute surplus food to those who are in need of it. If you have excess food
                from an
                event, party,
                wedding etc, please Reach Us, our Nearest volunteers will collect the excess food from you and
                distribute it among
                people who need it.</p>
        </div>
    </section>
    <section class="sec3">
        <div class="optivity">
            <h1 class="sec3text">
                Join Us</h1>
            <p class="sec3p">No Food Waste is a participative drive, where similar individuals meet up to the assistance
                of the most required with
                nourishment. In the event that you are somebody who needs to have any kind of effect in the life of an
                individual, you
                can do that by contributing your opportunity to our different activities.</p>
            <!-- <button class="sec3but">join us as volunteer</button> -->
            <a href="./NGO/ngo_signup.php"> <button class="sec3but sec3but2 ">Join us as NGO</button></a>
            <video autoplay muted loop id="myVideo">
                <source src="../imgs/video 3.mp4" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>


        </div>
    </section>
    <section class="footer">
        <div class=" logo" style="padding:1.5%; width: 35%;"><img src="../imgs/Frame 1final.svg" alt="logo" width="322"
                height="98">
        </div>

        <div class="footercon1">
            <img height="30px" src="./../ioc/location.svg"><br>
            <p>Bangalore, Karnataka, India</p>
        </div>
        <div class="footercon1">
            <img height="30px" src="./../ioc/email.svg"><br>
            <p>help@feedtheneed.com</p>
        </div>
        <div class="footercon1">
            <img height="30px" src="./../ioc/call.svg" alt="cant"><br>
            <p>080-98432678</p>
        </div>
        <div class="footercon1" style=" position: relative;top: -10%;">
            <!-- <h1 style="margin-bottom: 10%;">Menu</h1> -->
            <a href="aboutus">
                <p class="footermenu ">About Us</p>
            </a>
            <a href="contactus">
                <p class="footermenu">Contact Us</p>
            </a>
            
            <a href="signin">
                <p class="footermenu">sign in</p>
            </a>
            
            <a href="student_signup">
                <p class="footermenu">sign up</p>
            </a>
            <a href="./NGO/ngo_login.php">
                <p class="footermenu">NGO sign in</p>
            </a>
            
            <a href="./NGO/ngo_signup.php">
                <p class="footermenu">NGO sign up</p>
            </a>
            <a href="./volunteer/volunteer_login.php">
                <p class="footermenu">Volunteer Sign in</p>
            </a>
            <!-- <a href="./admin/admin_login.php">
                <p class="footermenu">.</p>
            </a> -->
        </div>
    </section>

</body>

</html>