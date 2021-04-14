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
    <style>
        .m2 {
            background-image: url("../imgs/Frame 1final.svg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 20%;

        }
    </style>
</head>

<body>
    <a href="/"><img src="./../ioc/close-24px.svg" class="close" title="Close Modal"></a>
    <div class="bg bgimg">
        <div class="backbtn">
            <a href="./index.php"><label>Home</label></a>
        </div>
        <div class="model ">

            <div style="text-align: center;align-content: center;">
                <h1 style="margin-bottom: 40px;font-size: 36px;">Contact US</h1>
                <form method="POST" style="float: none; margin-left: 32.5%;">

                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../ioc/person-black-18dp.svg" /></i>
                        <input type="text" class="textbox" placeholder="Name" name="User_name" required />
                    </div>

                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../ioc/mail-black-18dp.svg" /></i>
                        <input type="email" class="textbox" placeholder="Email" required name="user_email" />
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../ioc/mail-black-18dp.svg" /></i>
                        <textarea class="textbox" placeholder=" Your Message" name="message" required></textarea>
                    </div>
                    <div class="new-chat-window">
                        <button type="submit" class="subbutton" id="nextBtn" name="submit_btn"
                            style="float:center">submit</button>
                    </div>

                </form>


            </div>

        </div>
    </div>
</body>

</html>
<?php 
                      if(isset($_POST['submit_btn']))
                      {
                        $User_name = $_POST['User_name'];
                        $user_email = $_POST['user_email'];
                        $message = $_POST['message'];
                        $dt = date("Y-m-d H:i:s");
                        $query= "insert into contactus(name,email,message,date) values('$User_name','$user_email','$message','$dt')";
                                $query_run = mysqli_query($con,$query);

                                if($query_run)
                                {
                                    echo '<script type="text/javascript"> alert("your message sent") </script>';
                                    echo '<script>window.location.href="index.html"</script>';
                                    
                                }
                                else
                                {
                                    echo '<script type="text/javascript"> alert("Some Unexpected Error ") </script>' .mysqli_error($con);
                                }

                      }
    ?>
                      