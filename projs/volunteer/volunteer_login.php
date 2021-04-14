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
            <a href="./index.php"><label>Home</label></a>
        </div>
        <div class="model">
            <div class="left-form">
                <figure>
                    <img width="120%" height="100%" src="./../../imgs/volunteer.png">
                </figure>
                
            </div>
            <div class="left-form">
                <h1 style="margin-bottom: 40px;font-size: 36px;">Volunteer sing in</h1>
                <form method="POST">

                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/local_phone-black-18dp.svg" /></i>
                        <input type="tel" class="textbox" placeholder="Phone Number" required name="mob" pattern="[0-9]{10}" title="Mobile should not contain letters and more than 10 digits" />
                    </div>

                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/vpn_key-24px (1).svg" /></i>
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
                        

                        $Mobile_number=$_POST['mob'];
                       $password=$_POST['password'];

                        $query= "select * from `volunteer` WHERE 	volunteer_ph_number='$Mobile_number' AND volunteer_password ='$password'";
                        $query_run = mysqli_query($con,$query);
                        $row=$query_run->fetch_array();
                        if(mysqli_num_rows($query_run)>0)
                        {
                          
                            session_start();
                            $volunteer_id=$row['volunteer_id'];
                            
                            $_SESSION['volunteer_id'] =$volunteer_id;
                            
                            echo '<script>window.location.href = "./volunteerpage.php"</script>';
                        }
                        else
                        {
                          echo '<script type="text/javascript"> alert("Invalid Credentials") </script>';
                        
                       }

                    }
                    ?>