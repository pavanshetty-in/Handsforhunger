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
            Message's
        </h1>

    </div>
    <div style="padding:50px">
        <table>
            <thead>
                <th>Name</th>
                <th>Email ID</th>
                <th>Message</th>
                <th>Sent Date and Time</th>


            </thead>
            <tbody>
                <?php 
    					$sql="SELECT * FROM `contactus` ORDER BY date DESC";
    					$query=$con->query($sql);
    					
    					while($row=$query->fetch_array()){
    						?>
                <tr>
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['message']; ?>
                    </td>
                    <td>
                        <?php echo $row['date']; ?>
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