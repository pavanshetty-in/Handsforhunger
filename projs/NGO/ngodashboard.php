<?php
require '../config.php';
session_start();
if (!isset($_SESSION['ngo_id'])) {
  	echo '<script type="text/javascript"> alert("login first") </script>';
     echo '<script>window.location.href = "./ngo_login.php"</script>';
  }
  if (isset($_post['logout'])) {
  	session_destroy();
  	unset($_SESSION['ngo_id']);
  	echo '<script>window.location.href = "../index.php"</script>';
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./../css/home.css" />
    <link rel="stylesheet" href="../css/adminstyle.css" />
    <link rel="stylesheet" href="../css/ratecard.css" />
    <link rel="stylesheet" href="./../css/signin.css" />
    <link href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Rosario&display=swap" rel="stylesheet">
    <title>Feed the Need</title>
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
                        
                        <li><a href="./Volunteer.php">volunteer</a></li>
                        <li><a href="./../contactus.php">contactUs</a></li>
                       

                        <li><a href="./ngohistory.php">history</a></li>
                        <li><a href="ngologout.php">Logout</a>
                            
                        </li>

                    </ul>
                </nav>

            </header>
        </div>


    </div>
    <div style="background-color: #3683cc; padding: 10px;">
    <?php
           $user_num=$_SESSION['ngo_id'];
           $query= "SELECT ngo_name  FROM `ngo` where ngo_id=$user_num";
           $query_run = mysqli_query($con,$query);
           $row=$query_run->fetch_array();
          ?>
        <h1 class="ngoname"><?php echo strtoupper($row['ngo_name']); ?></h1>
        <h5 class="ngoname">Dashboard</h5>
    </div>
    <section>
        <div style="padding:50px">
            <table>
             <tbody>
             <?php 
                    
					$sql="SELECT `food_pickup_request`.ngo_id, `food_pickup_request`.request_id, `food_pickup_request`.user_id, `food_pickup_request`.address, `food_pickup_request`.status, `food_pickup_request`.volunteer_id,`food_pickup_request`.`request_time`,`food_pickup_request`.`food_quantity`,`food_pickup_request`.`food_type`,  user.user_id,user.user_name,user.user_phonenumber,user.user_email, volunteer.volunteer_id, volunteer.volunteer_name FROM `food_pickup_request` LEFT JOIN user ON `food_pickup_request`.user_id = user.user_id LEFT JOIN volunteer ON `food_pickup_request`.volunteer_id = volunteer.volunteer_id WHERE `food_pickup_request`.ngo_id='".$user_num."' AND `food_pickup_request`.status != 'Compleated' ORDER BY request_time ASC"; 
					$query=$con->query($sql);
					
					while($row=$query->fetch_array()){
			?> 
               <tr>
                  <td>ID <b><br><?php echo $row['request_id']; ?></b></td>
                  <td>Request Time <b><br><?php echo $row['request_time']; ?></b></td>
                  <td>User Name<b><br><?php echo $row['user_name']; ?></b></td>
                  <td>Contact Details<b><br><?php echo $row['user_phonenumber']; ?><br><?php echo $row['user_email']; ?></b></td>
                  <td>address<b><br><?php echo $row['address']; ?></b></td>
                  <td>Food Quantity and Type<b><br><?php echo $row['food_quantity']; ?>kg<br><?php echo $row['food_type']; ?></b></td>
                  <td>Status<b><br><?php echo $row['status']; ?></b></td>
                  <td>Assigned TO:<b><br><?php echo $row['volunteer_id']; ?> - <?php echo $row['volunteer_name']; ?></b></td>

               </tr>
               <?php
						
					}
				?>
             </tbody>

            </table>
        </div>
    </section> 
    <section class="counts" style="position: relative;">
        <div >
            <a href="#"><div class="card">
      <?php
        $query="SELECT COUNT(*) as COUNT FROM `volunteer` WHERE ngo_id='".$user_num."'";
        $query_run = mysqli_query($con,$query);
        $row=$query_run->fetch_array();
      ?>
      <h2 style="background-color: transparent; color:#3683cc ;"><?php echo $row['COUNT']; ?></h2>
        <h4 style="background-color: transparent; color:#3683cc ;">Total number volunteer with US</h4>

    </div></a>

    <a href="#"><div class="card">
      <?php
        $query="SELECT COUNT(*) as COUNT FROM food_pickup_request WHERE ngo_id='".$user_num."'";
        $query_run = mysqli_query($con,$query);
        $row=$query_run->fetch_array();
      ?>
      <h2 style="background-color: transparent; color:#3683cc ;"><?php echo $row['COUNT']; ?></h2>
        <h4 style="background-color: transparent; color:#3683cc ;">Total number of Requests</h4>

    </div></a>

    <a href="#"><div class="card">
      <?php
        $query="SELECT COUNT(*) as COUNT FROM food_pickup_request WHERE ngo_id='".$user_num."' and status='Compleated'";
        $query_run = mysqli_query($con,$query);
        $row=$query_run->fetch_array();
      ?>
      <h2 style="background-color: transparent; color:#3683cc ;"><?php echo $row['COUNT']; ?></h2>
        <h4 style="background-color: transparent; color:#3683cc ;">Total number of Requests Compleated</h4>

    </div></a>


        </div>
    </section>
    <section style="position: relative;">
   <div style="background-color: #3683cc; padding: 10px;">
    
        <h1 class="ngoname">Assign To Volunteer</h1>
        
    </div>
    <form name="assign"  class="assign" method="post">
                        <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/location_city-24px.svg" /></i>
                        <select class="textbox" name="reqid" id="reqid" required>
                            <option value="">select a Request ID</option>
                            <?php 
                    
					$sql="SELECT * FROM `food_pickup_request` WHERE `ngo_id`='".$user_num."' AND `status`='Requested to NGO'"; 
					$query=$con->query($sql);
					
					while($row=$query->fetch_array()){
			        ?> 
                         <option value="<?php echo $row['request_id']; ?>"><?php echo $row['request_id']; ?> </option>
                         <?php
						
					      }
				          ?>

                            
                        </select>
                        </div>


                        <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/location_city-24px.svg" /></i>
                        <select class="textbox" name="volid" id="volid" required>
                            <option value="">select your Volunteer</option>
                            <?php 
                    
					        $sql="SELECT * FROM `volunteer` WHERE `ngo_id`='".$user_num."'"; 
					        $query=$con->query($sql);
					
					         while($row=$query->fetch_array()){
			                 ?> 
                              <option value="<?php echo $row['volunteer_id']; ?>"><?php echo $row['volunteer_id']; ?> - <?php echo $row['volunteer_name']; ?> </option>
                              <?php
						
					         }
				              ?>

                            
                        </select>
                        <button class="subbutton" type="submit" name="submit_btnn">Assign</button>
                        </div>
                            
                        <?php 
                      if(isset($_POST['submit_btnn']))
                      {
                      

                      $reqid = $_POST['reqid'];
                      $volid = $_POST['volid'];
                      $status1 = "Assigned To Volunteer";
                      
                      
                      
                      
                      
                                $query= "UPDATE `food_pickup_request` SET `volunteer_id`='$volid', `status`='$status1' WHERE `request_id`='$reqid' ";
                                $query_run = mysqli_query($con,$query);

                                if($query_run)
                                {
                                    
                                    echo '<script>window.location.href="./ngodashboard.php"</script>';
                                    
                                }
                                else
                                {
                                    echo '<script type="text/javascript"> alert("Some Unexpected Error ") </script>' .mysqli_error($con);
                                }
                        
                            }

                    ?>

    </form>

    </section>


</body>

</html>