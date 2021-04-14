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
<!-- body  -->
<body>
  
    <div class="bg">
        <div class="backbtn">
            <a href="./index.php"><label>Home</label></a>
        </div>
        <div class="model">
            <div class="left-form">
                <figure>
                    <img width="304" height="354" src="./../imgs/hands for hunger bag s1.svg">
                </figure>
                <a href="./signup.php">
                    <p style="text-align: center;">Create an account</p>
                </a>
            </div>
            <div class="left-form">
                <h1 style="margin-bottom: 40px;font-size: 36px;">sing in</h1>
                <form method="POST">

                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../ioc/mail-black-18dp.svg" /></i>
                        <input type="email" class="textbox" placeholder="Email" required name="user_email" />
                    </div>

                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../ioc/vpn_key-24px (1).svg" /></i>
                        <input type="password" class="textbox" placeholder="Password" name="password" required />
                    </div>

                    <button type="submit" class="subbutton" name="login">Log in</button>

                </form>
            </div>

        </div>
    </div>
</body>


</html>
<?php
                    if(isset($_POST['login']))
                    {                        
                        

                        $Mobile_number=$_POST['user_email'];
                       $password=$_POST['password'];

                        $query= "select * from user WHERE user_email='$Mobile_number' AND user_password ='$password'";
                        $query_run = mysqli_query($con,$query);
                        $row=$query_run->fetch_array();
                        if(mysqli_num_rows($query_run)>0)
                        {
                          session_start();
                            $user_id=$row['user_id'];
                            
                            $_SESSION['user_id'] =$user_id;
                            echo '<script>window.location.href = "userpage.php"</script>';
                        }
                        else
                        {
                          echo '<script type="text/javascript"> alert("Invalid Credentials") </script>';
                        
                       }

                    }
                    ?>