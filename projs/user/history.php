<?php
require '../config.php';
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
        <a href="./../userpage.php"><button class="backbutton" style="position: absolute;">Back</button></a>

        <h1 class="ngoname">
            History
        </h1>

    </div>
    <div style="padding:50px">
        <table>
            <thead>
                <th>Request ID</th>
                <th>Request Time</th>
                <th>City</th>
                <th>Address</th>
                <th>status</th>
                <th>NGO Name</th>
                <th>NGO Contact Details</th>
                <th>volunteer Assigned</th>
                


            </thead>
            <tbody>
                <?php 
                $user_num=$_SESSION['user_id'];
    					$sql="SELECT `food_pickup_request`.`request_id`,`food_pickup_request`.`request_time`, `food_pickup_request`.`user_id`, `food_pickup_request`.`city`, `food_pickup_request`.`address`, `food_pickup_request`.`status`, `food_pickup_request`.`ngo_id`, `food_pickup_request`.`volunteer_id`, `ngo`.`ngo_id`, `ngo`.`ngo_name`, `ngo`.`ngo_phonenumber`,`ngo`.`ngo_email`, `volunteer`.`volunteer_id`,`volunteer`.`volunteer_name`,`volunteer`.`volunteer_ph_number` FROM `food_pickup_request` LEFT JOIN `ngo` on `food_pickup_request`.`ngo_id`=`ngo`.`ngo_id` LEFT JOIN `volunteer` ON `food_pickup_request`.`volunteer_id`=`volunteer`.`volunteer_id` WHERE `food_pickup_request`.`user_id`=$user_num ORDER BY `food_pickup_request`.`request_id` DESC";
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
                        <?php echo $row['city']; ?>
                    </td>
                    <td>
                        <?php echo $row['address']; ?>
                    </td>
                    <td>
                       <b> <?php echo $row['status']; ?><b>
                    </td>
                    <td>
                        <?php echo $row['ngo_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['ngo_phonenumber']; ?><br>
                        <?php echo $row['ngo_email']; ?>
                    </td>
                    <td>
                        <?php echo $row['volunteer_name']; ?>
                        <?php echo $row['volunteer_ph_number']; ?>
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