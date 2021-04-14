<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feed the Need</title>
    <link rel="stylesheet" href="./css/signin.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <div class="bg">
        <div class="backbtn">
            <a href="./index.php"><label>Home</label></a>
        </div>
        <div class="model">

            <div class="left-form">
                <h1 style="margin-bottom: 40px;font-size: 36px;">sing up</h1>
                <form method="post">
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../ioc/person-black-18dp.svg" /></i>
                        <input type="text" class="textbox" placeholder="Name" name="User_name" required/>
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../ioc/mail-black-18dp.svg" /></i>
                        <input type="email" class="textbox" placeholder="Email" name="user_email"required />
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../ioc/local_phone-black-18dp.svg" /></i>
                        <input type="tel" class="textbox" placeholder="Phone Number" name="Mobile_number" required pattern="[0-9]{10}" title="Mobile should not contain letters and more than 10 digits"/>
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../ioc/vpn_key-24px (1).svg" /></i>
                        <input type="password" class="textbox" placeholder="Password" name="password" required/>
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../ioc/vpn_key-24px.svg" /></i>
                        <input type="password" class="textbox" placeholder="Repeat your Password" name="cpassword" required/>
                    </div>
                    <button type="submit" class="subbutton" name="submit_btn">Register</button>

                </form>
            </div>
            <div class="left-form">
                <figure>
                    <img width="344" height="354" src="./../imgs/hands for hunger bg s2.svg">
                </figure>
                <a href="./login.php">
                    <p style="text-align: center;">I am already member</p>
                </a>
            </div>

        </div>
    </div>
    </body>

</html>

<?php 
                      if(isset($_POST['submit_btn']))
                      {
                      

                      $User_name = $_POST['User_name'];
                      $Mobile_number = $_POST['Mobile_number'];
                      $password = $_POST['password'];
                      $cpassword = $_POST['cpassword'];
                      $user_email =$_POST['user_email'];
                      $dt = date("Y-m-d H:i:s");
                      
                      if($password==$cpassword)
                      {
                        
                          $query = "select * from user WHERE user_phonenumber =$Mobile_number OR user_email ='$user_email'";
                          $query_run = mysqli_query($con,$query);
                        
                          if(mysqli_num_rows($query_run)>0)
                          {
                            echo '<script type="text/javascript"> alert("Number OR Email already registered...") </script>';
                          }
                          
                          else
                          {
                                $query= "insert into user(user_name,user_phonenumber,user_email,user_password,reg_date) values('$User_name','$Mobile_number','$user_email','$password','$dt')";
                                $query_run = mysqli_query($con,$query);

                                if($query_run)
                                {
                                    echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
                                    echo '<script>window.location.href="login.php"</script>';
                                    
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