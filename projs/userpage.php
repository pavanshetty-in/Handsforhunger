<?php 
require 'config.php';
  session_start(); 

  if (!isset($_SESSION['user_id'])) {
  	echo '<script type="text/javascript"> alert("login first") </script>';
     echo '<script>window.location.href = "./login.php"</script>';
  }
  if (isset($_post['logout'])) {
  	session_destroy();
  	unset($_SESSION['user_id']);
  	echo '<script>window.location.href = "index.php"</script>';
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
    <title>Feed the Need</title>
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
                        
                        <li><a href="./user/history.php">History</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        

                    </ul>
                </nav>

            </header>
        </div>
        <div>
            <?php
           $user_num=$_SESSION['user_id'];
           $query= "SELECT user_name  FROM `user` where user_id=$user_num";
           $query_run = mysqli_query($con,$query);
           $row=$query_run->fetch_array();
          ?>
            <!-- <h1 class="sec1h1">hi Name</h1> -->
            <h1 class="sec1h1">Hi <?php echo strtoupper($row['user_name']); ?><br> Hunger doesn’t have to exist <br> let’s end it together.</h1>
            <p class="sec1p">If you have excess food from an event, party, wedding etc, please reach us</p>
            <a href="user/donatepage.php"><button type="button" class="sec1but">Donate Now </button></a>
        </div>
    </section>
</body>

</html>