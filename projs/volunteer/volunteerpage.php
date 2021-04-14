<?php
require '../config.php';
 session_start(); 

  if (!isset($_SESSION['volunteer_id'])) {
  	echo '<script type="text/javascript"> alert("login first") </script>';
     echo '<script>window.location.href = "./volunteer_login.php"</script>';
  }
  if (isset($_post['logout'])) {
  	session_destroy();
  	unset($_SESSION['volunteer_id']);
  	echo '<script>window.location.href = "./../index.php"</script>';
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../css/adminstyle.css" />
    <link rel="stylesheet" href="./../css/signin.css" />
    
    <link href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Rosario&display=swap" rel="stylesheet">
    <title>Feed the Need</title>
    <style>


    </style>
</head>

<body>
    </div>
    <div style="background-color: #3683cc; padding: 10px;">
    <a href="./../index.php"><button class="backbutton" style="position: absolute;">Logout</button></a>
        
    <?php
           $user_num=$_SESSION['volunteer_id'];
           $query= "SELECT * FROM `volunteer` where volunteer_id=$user_num";
           $query_run = mysqli_query($con,$query);
           $row=$query_run->fetch_array();
          ?>

        <h1 class="ngoname">
            <?php echo strtoupper($row['volunteer_name']); ?>
        </h1>
        <h5 class="ngoname">Task</h5>

    </div>
    <section>
        <div style="padding:50px">
            <table>
             <tbody>
             <?php 
                    
					$sql="SELECT `food_pickup_request`.ngo_id, `food_pickup_request`.request_id, `food_pickup_request`.user_id,`food_pickup_request`.`city`, `food_pickup_request`.address, `food_pickup_request`.status, `food_pickup_request`.`volunteer_id`,`food_pickup_request`.`request_time`,`food_pickup_request`.`food_quantity`,`food_pickup_request`.`food_type`, `user`.`user_id`,`user`.`user_name`,`user`.`user_phonenumber`,`user`.`user_email`, `volunteer`.`volunteer_id`, `volunteer`.`volunteer_name` FROM `food_pickup_request` LEFT JOIN user ON `food_pickup_request`.`user_id` = `user`.`user_id` LEFT JOIN `volunteer` ON `food_pickup_request`.`volunteer_id` = `volunteer`.`volunteer_id` WHERE `food_pickup_request`.`volunteer_id`='$user_num' AND `food_pickup_request`.status != 'Compleated' ORDER BY request_time DESC"; 
					$query=$con->query($sql);
					
					while($row=$query->fetch_array()){
			?> 
               <tr>
                  <td>ID <b><br><?php echo $row['request_id']; ?></b></td>
                  <td>Request Time <b><br><?php echo $row['request_time']; ?></b></td>
                  <td>User Name<b><br><?php echo $row['user_name']; ?></b></td>
                  <td>Contact Details<b><br><?php echo $row['user_phonenumber']; ?><br><?php echo $row['user_email']; ?></b></td>
                  <td>City<b><br><?php echo $row['city']; ?></b></td>
                  <td>address<b><br><?php echo $row['address']; ?></b></td>
                  <td>Food Quantity and Type<b><br><?php echo $row['food_quantity']; ?>kg<br><?php echo $row['food_type']; ?></b></td>
                  <td> Current Status<b><br><?php echo $row['status']; ?></b></td>
                  <td>
                      Update<br>
                      <?php

                      $cstatus =$row['status'];

                      if($cstatus=='Assigned To Volunteer')
                      {
                          ?>
                                <a href="Update1.php?request_id=<?php echo $row['request_id'];  ?>"><button type="button" class="aprovebtn" name="submit_btn">Food picked</button></a>
                          <?php
                      }
                      elseif($cstatus=='Food picked')
                      {
                          ?>
                                <a href="Update2.php?request_id=<?php echo $row['request_id'];  ?>"><button type="button" class="aprovebtn" name="submit_btn">Food Distributed</button></a>
                          <?php
                      }

                       ?>
                  </td>

                  

               </tr>
               <?php
						
					}
				?>
             </tbody>

            </table>
        </div>
    </section> 


</body>

</html>