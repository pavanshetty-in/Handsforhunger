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
<!doctype html!>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/adminstyle.css" />
    <link rel="stylesheet" href="./../css/signin.css" />

    <link href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Rosario&display=swap" rel="stylesheet">
    <title>Feed the Need</title>
    <style>
        .t2 {
            background-color: transparent;
        }
    </style>
</head>

<body>
    <form method="post">
        <div style="background-color: #3683cc; padding: 10px;">


            <h1 class="ngoname">
                Add volunteer
            </h1>

        </div>

        <a href="ngodashboard.php"><button class="backbutton" type="button" name="backbutton">Back to
                Home</button></a>
        <div style="text-align: center; align-content: center; align-items: center;">

            <div style="margin-left: 42%; margin-top: 5%;">
                <div class="new-chat-window">
                    <i class="fa fa-search"><img width="15px" src="./../../ioc/person-black-18dp.svg" /></i>
                    <input type="text" class="textbox t2" placeholder="Name of volunteer" name="vol_name" required />
                </div>

                <div class="new-chat-window">
                    <i class="fa fa-search"><img width="15px" src="./../../ioc/local_phone-black-18dp.svg" /></i>
                    <input type="tel" class="textbox t2" placeholder="Phone Number of volunteer" name="vol_phonenumber"
                        required pattern="[0-9]{10}"
                        title="Mobile should not contain letters and more than 10 digits" />
                </div>

                <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/mail-black-18dp.svg" /></i>
                        <input type="email" class="textbox t2" placeholder="Email of volunteer" name="vol_email"required />
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/apartment-24px.svg" /></i>
                        <input type="text" class="textbox t2" placeholder="Full Address of volunteer" name="vol_address" required/>
                    </div>

                
                <div class="new-chat-window">
                    <i class="fa fa-search"><img width="15px" src="./../../ioc/vpn_key-24px (1).svg" /></i>
                    <input type="text" class="textbox t2" placeholder="Password" name="password" required />
                </div>
                <div class="new-chat-window">
                    <i class="fa fa-search"><img width="15px" src="./../../ioc/vpn_key-24px.svg" /></i>
                    <input type="password" class="textbox t2" placeholder="Repeat Password" name="cpassword" required />
                </div>
            </div>
            <button class="subbutton" type="submit" name="submit_btn">ADD</button>
        </div>

    </form>
    <div style="background-color: #3683cc; padding: 10px; margin-top: 10%;">


        <h1 class="ngoname">
            volunteer's
        </h1>

    </div>
    <div style="padding:50px">
        <table>
            <thead>
                <th>Volunteer ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Added Date and Time</th>
                <th>Remove</th>


            </thead>
            <tbody>
                <?php 
                           $user_num=$_SESSION['ngo_id'];
        					$sql="SELECT * FROM `volunteer` WHERE ngo_id='".$user_num."' ORDER BY volunteer_id";
        					$query=$con->query($sql);
        					
        					while($row=$query->fetch_array()){
        						?>
                <tr>
                    <td>
                        <?php echo $row['volunteer_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['volunteer_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['volunteer_ph_number']; ?>
                    </td>
                    <td>
                        <?php echo $row['volunteer_regdate']; ?>
                    </td>
                    <td>
                        <a href="remove.php?volunteer_id=<?php echo $row['volunteer_id'];  ?>"><button type="button" class="aprovebtn" name="submit_btn" style="background-color: red;">Remove</button></a>
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
<?php 
                      if(isset($_POST['submit_btn']))
                      {
                      

                      $vol_name = $_POST['vol_name'];
                      $vol_phonenumber = $_POST['vol_phonenumber'];
                      $password = $_POST['password'];
                      $cpassword = $_POST['cpassword'];
                      $vol_email = $_POST['vol_email'];
                      $vol_address = $_POST['vol_address'];
                      
                      $dt = date("Y-m-d H:i:s");
                      
                      
                      if($password==$cpassword)
                      {
                        
                          $query = "select * from volunteer WHERE volunteer_ph_number =$vol_phonenumber ";
                          $query_run = mysqli_query($con,$query);
                        
                          if(mysqli_num_rows($query_run)>0)
                          {
                            echo '<script type="text/javascript"> alert("Volunteer already registered...") </script>';
                          }
                          
                          else
                          {
                                $query= "insert into volunteer(volunteer_name,volunteer_ph_number,volunteer_password,volunteer_regdate,ngo_id,volunteer_email,volunteer_address) values('$vol_name','$vol_phonenumber','$password','$dt','$user_num','$vol_email','$vol_address')";
                                $query_run = mysqli_query($con,$query);

                                if($query_run)
                                {
                                    
                                    echo '<script>window.location.href="./volunteer.php"</script>';
                                    
                                }
                                else
                                {
                                    echo '<script type="text/javascript"> alert("Some Unexpected Error ") </script>' .mysqli_error($con);
                                }
                          }
                        }
                        

                      
                      
                      else
                      {
                        echo '<script type="text/javascript"> alert("Password and Confirm password doesnot match") </script>';
                      }

                      }
                      


                    ?>