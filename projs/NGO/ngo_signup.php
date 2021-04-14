<?php
require './../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feed the Need</title>
    <link rel="stylesheet" href="./../css/signin.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <div class="bg">
        <div class="backbtn">
            <a href="./../index.php"><label>Home</label></a>
        </div>
        <div class="model" style="min-height: 600px;">

            <div class="left-form">
                <h1 style="margin-bottom: 40px;font-size: 36px;">sing up NGO</h1>
                <form method="post">
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/person-black-18dp.svg" /></i>
                        <input type="text" class="textbox" placeholder="Name of Your NGO" name="ngo_name" required/>
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/mail-black-18dp.svg" /></i>
                        <input type="email" class="textbox" placeholder="Email of Your NGO" name="ngo_email"required />
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/local_phone-black-18dp.svg" /></i>
                        <input type="tel" class="textbox" placeholder="Phone Number of Your NGO" name="ngo_phonenumber" required pattern="[0-9]{10}" title="Mobile should not contain letters and more than 10 digits"/>
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/vpn_key-24px (1).svg" /></i>
                        <input type="password" class="textbox" placeholder="Password" name="password" required/>
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/vpn_key-24px.svg" /></i>
                        <input type="password" class="textbox" placeholder="Repeat your Password" name="cpassword" required/>
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/location_city-24px.svg" /></i>
                        <input type="text" class="textbox" placeholder="Work City" name="ngo_workcity" required/>
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/location_city-24px.svg" /></i>
                        <input type="text" class="textbox" placeholder="Specfic work Area" name="ngo_workarea" required/>
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/apartment-24px.svg" /></i>
                        <input type="text" class="textbox" placeholder="Full Address of NGO" name="ngo_address" required/>
                    </div>
                    <button type="submit" class="subbutton" name="submit_btn">Register</button>

                </form>
            </div>
            <div class="left-form">
                <figure>
                    <img width="444" height="374" src="./../../imgs/ngo.jpg">
                </figure>
                <a href="./ngo_login.php">
                    <p style="text-align: center;">We am already member</p>
                </a>
            </div>

        </div>
    </div>
    </body>

</html>

<?php 
                      if(isset($_POST['submit_btn']))
                      {
                      

                      $ngo_name = $_POST['ngo_name'];
                      $ngo_phonenumber = $_POST['ngo_phonenumber'];
                      $password = $_POST['password'];
                      $cpassword = $_POST['cpassword'];
                      $ngo_email =$_POST['ngo_email'];
                      $ngo_workcity =$_POST['ngo_workcity'];
                      $ngo_workarea =$_POST['ngo_workarea'];
                      $ngo_address =$_POST['ngo_address'];
                      $dt = date("Y-m-d H:i:s");
                      $ngo_approvel_status= 0;
                      $ngo_active =1;
                      
                      if($password==$cpassword)
                      {
                        
                          $query = "select * from ngo WHERE ngo_phonenumber =$ngo_phonenumber OR ngo_email ='$ngo_email'";
                          $query_run = mysqli_query($con,$query);
                        
                          if(mysqli_num_rows($query_run)>0)
                          {
                            echo '<script type="text/javascript"> alert("number or email already registered...") </script>';
                          }
                          
                          else
                          {
                                $query= "insert into ngo(ngo_name,ngo_email,ngo_phonenumber,ngo_password,ngo_workcity,ngo_address,reg_date,ngo_approvel_status,ngo_active,ngo_workarea ) values('$ngo_name','$ngo_email','$ngo_phonenumber','$password','$ngo_workcity','$ngo_address','$dt','$ngo_approvel_status','$ngo_active','$ngo_workarea')";
                                $query_run = mysqli_query($con,$query);

                                if($query_run)
                                {
                                    echo '<script type="text/javascript"> alert("ngo Registered.. Go to login page to login") </script>';
                                    echo '<script>window.location.href="./ngo_login.php"</script>';
                                    
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