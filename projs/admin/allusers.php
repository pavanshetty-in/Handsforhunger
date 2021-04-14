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
            User's
        </h1>

    </div>
    <div style="padding:50px">
        <table>
            <thead>
                <th>User ID</th>
                <th>User Name</th>
                <th>Contact Details</th>
                <th>Registerd Date</th>


            </thead>
            <tbody>
                <?php 
    					$sql="SELECT * FROM `user` ORDER BY user_id DESC";
    					$query=$con->query($sql);
    					
    					while($row=$query->fetch_array()){
    						?>
                <tr>
                    <td>
                        <?php echo $row['user_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['user_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['user_phonenumber']; ?><br>
                        <?php echo $row['user_email']; ?>
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