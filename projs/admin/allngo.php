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
            All NGO's
        </h1>

    </div>
    <div style="padding:50px">
        <table>
            <thead>
                <th>NGO ID</th>
                <th>NGo Name</th>
                <th>Contact Details</th>
                <th>Address</th>
                <th>City</th>
                <th>Area of working</th>
                
                <th>Registerd Date</th>
                


            </thead>
            <tbody>
                <?php 
    					$sql="SELECT * FROM `ngo` WHERE ngo_approvel_status='1'";
    					$query=$con->query($sql);
    					
    					while($row=$query->fetch_array()){
    						?>
                <tr>
                    <td>
                        <?php echo $row['ngo_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['ngo_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['ngo_email']; ?><br>
                        <?php echo $row['ngo_phonenumber']; ?>
                    </td>
                    <td>
                        <?php echo $row['ngo_address']; ?>
                    </td>
                    <td>
                        <?php echo $row['ngo_workcity']; ?>
                    </td>
                    <td>
                        <?php echo $row['ngo_workarea']; ?>
                    </td>
                    
                    <td>
                        <?php echo $row['reg_date']; ?>
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