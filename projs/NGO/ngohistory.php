<?php
require '../config.php';
session_start(); 

  if (!isset($_SESSION['ngo_id'])) {
  	echo '<script type="text/javascript"> alert("login first") </script>';
     echo '<script>window.location.href = "./ngo_login.php"</script>';
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

    <link rel="stylesheet" href="../css/adminstyle.css" />

    <link href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Rosario&display=swap" rel="stylesheet">
    <title>Feed the Need</title>
    <style>


    </style>
</head>

<body>
    </div>
    <div style="background-color: #3683cc; padding: 10px;">
        <a href="./ngodashboard.php"><button class="backbutton" style="position: absolute;">Back</button></a>

        <h1 class="ngoname">
            History
        </h1>

    </div>
    <div style="padding:50px">
        <table>
            <thead>
                <th>Request ID</th>
                <th>Request Time</th>
                <th>User Name</th>
                <th>Contact Details</th>
                <th>address</th>
                <th>Quantity </th>
                <th>Type of food</th>

                <th>Status</th>
                <th>volunteer Assigned</th>
                


            </thead>
            <tbody>
                <?php 
                $user_num=$_SESSION['ngo_id'];
    					$sql="SELECT `food_pickup_request`.ngo_id, `food_pickup_request`.request_id, `food_pickup_request`.user_id, `food_pickup_request`.address, `food_pickup_request`.status, `food_pickup_request`.volunteer_id,`food_pickup_request`.`request_time`,`food_pickup_request`.`food_quantity`,`food_pickup_request`.`food_type`, user.user_id,user.user_name,user.user_phonenumber,user.user_email, volunteer.volunteer_id, volunteer.volunteer_name FROM `food_pickup_request` LEFT JOIN user ON `food_pickup_request`.user_id = user.user_id LEFT JOIN volunteer ON `food_pickup_request`.volunteer_id = volunteer.volunteer_id WHERE `food_pickup_request`.ngo_id='".$user_num."' ORDER BY request_time DESC";
    					$query=$con->query($sql);
    					
    					while($row=$query->fetch_array()){
    						?>
                <tr>
                    <td>
                        <?php echo $row['request_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['request_time']; ?>
                    </td>
                    <td>
                        <?php echo $row['user_name']; ?>
                    </td>
                    <td>
                       <b> <?php echo $row['user_phonenumber']; ?>
                           <br><?php echo $row['user_email']; ?></b>
                    </td>
                    <td>
                        <?php echo $row['address']; ?>
                    </td>
                    <td>
                        <?php echo $row['food_quantity']; ?>
                    </td>
                    <td>
                        <?php echo $row['food_type']; ?>
                    </td>
                    <td>
                        <?php echo $row['status']; ?>
                    </td>
                    <td>
                        <?php echo $row['volunteer_id']; ?><br>
                        <?php echo $row['volunteer_name']; ?>
                    </td>
                    
                   



                </tr>
                <?php
    						
    					}
    				?>
            </tbody>
        </table>
    </div>


</body>

</html>