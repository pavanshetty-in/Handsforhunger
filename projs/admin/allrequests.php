<?php
require '../config.php';
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
        <a href="./admindash.php"><button class="backbutton" style="position: absolute;">Back</button></a>

        <h1 class="ngoname">
            All Requests's
        </h1>

    </div>
    <div style="padding:50px">
        <table>
            <thead>
                <th>Request ID</th>
                <th>Request time</th>
                <th>User ID</th>
                <th>Address</th>
                <th>City</th>
                <th>Status</th>
                <th>NGO ID</th>
                <th>volunteer Id</th>
                


            </thead>
            <tbody>
                <?php 
    					$sql="SELECT * FROM `food_pickup_request` ORDER BY request_id DESC";
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
                        <?php echo $row['user_id']; ?>
                       
                    </td>
                    <td>
                        <?php echo $row['address']; ?>
                    </td>
                    <td>
                        <?php echo $row['city']; ?>
                    </td>
                    
                    <td>
                        <?php echo $row['status']; ?>
                    </td>
                    <td>
                        <?php echo $row['ngo_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['volunteer_id']; ?>
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