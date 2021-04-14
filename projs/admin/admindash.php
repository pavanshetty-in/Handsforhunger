<?php
require '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./../css/home.css" />
    <link rel="stylesheet" href="../css/adminstyle.css" />
    <link rel="stylesheet" href="../css/ratecard.css" />
    <link href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Rosario&display=swap" rel="stylesheet">
    <title>Feed the Need</title>
    <style>
        .c2 {
           margin: 25px;
          }
        </style>
</head>

<body>
    <div class="sec1ngo">
        <div class="navigation" style="position: relative;">
            <header>
                <a href="/">
                    <div class="logo"><img src="../../imgs/Frame 1final.svg" alt="logo" width="222" height="68"></div>
                </a>
                <nav>
                    <ul>
                        <li><a href="allmessages.php">Messages</a></li>
                        <li><a href="./approvengo.php">Approve(NGO)</a></li>
                        <li><a href="./allrequests.php">Requests</a></li>


                        <li><a href="./allngo.php">NGO's</a></li>
                        <li><a href="./allusers.php">Users</a></li>
                        <li><a href="../index.php">Logout</a>

                        </li>

                    </ul>
                </nav>

            </header>
        </div>


    </div>
    <div style="background-color: #3683cc; padding: 10px;">

        <h1 class="ngoname">
            Admin
        </h1>
        <h5 class="ngoname">Dashboard</h5>
    </div>

    <section>
        <div>
            <a href="#">
                <div class="card c2">
                    <?php
            $query="SELECT COUNT(*) as COUNT FROM `ngo` ";
            $query_run = mysqli_query($con,$query);
            $row=$query_run->fetch_array();
          ?>
                    <h2 style="background-color: transparent; color:#3683cc ;">
                        <?php echo $row['COUNT']; ?>
                    </h2>
                    <h4 style="background-color: transparent; color:#3683cc ;">Total number Registerd NGO's</h4>

                </div>
            </a>

            <a href="#">
                <div class="card c2">
                    <?php
            $query="SELECT COUNT(*) as COUNT FROM `user` ";
            $query_run = mysqli_query($con,$query);
            $row=$query_run->fetch_array();
          ?>
                    <h2 style="background-color: transparent; color:#3683cc ;">
                        <?php echo $row['COUNT']; ?>
                    </h2>
                    <h4 style="background-color: transparent; color:#3683cc ;">Total number Registerd User's</h4>

                </div>
            </a>

            <a href="#">
                <div class="card c2">
                    <?php
            $query="SELECT COUNT(*) as COUNT FROM `food_pickup_request` ";
            $query_run = mysqli_query($con,$query);
            $row=$query_run->fetch_array();
          ?>
                    <h2 style="background-color: transparent; color:#3683cc ;">
                        <?php echo $row['COUNT']; ?>
                    </h2>
                    <h4 style="background-color: transparent; color:#3683cc ;">Total number Requests Recived</h4>

                </div>
            </a>

            <a href="#">
                <div class="card c2">
                    <?php
            $query="SELECT COUNT(*) as COUNT FROM `food_pickup_request` WHERE status='Compleated' ";
            $query_run = mysqli_query($con,$query);
            $row=$query_run->fetch_array();
          ?>
                    <h2 style="background-color: transparent; color:#3683cc ;">
                        <?php echo $row['COUNT']; ?>
                    </h2>
                    <h4 style="background-color: transparent; color:#3683cc ;">Total number Requests Compleated</h4>

                </div>
            </a>


        </div>
    </section>
</body>

</html>