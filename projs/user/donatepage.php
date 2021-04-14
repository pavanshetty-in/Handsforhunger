<?php
require './../config.php';
session_start(); 

  if (!isset($_SESSION['user_id'])) {
  	echo '<script type="text/javascript"> alert("login first") </script>';
     echo '<script>window.location.href = "./../login.php"</script>';
  }
  if (isset($_post['logout'])) {
  	session_destroy();
  	unset($_SESSION['user_id']);
  	echo '<script>window.location.href = "index.php"</script>';
  }

function fill_brand($con)
{
$output = '';
$sql = "SELECT ngo_workcity FROM ngo GROUP BY ngo_workcity ";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result))
{
$output .= '<option value="'.$row["ngo_workcity"].'">'.$row["ngo_workcity"].'</option>';
}
return $output;
}
function fill_product($con)  
 {  
      $output = '';  
    
      $output .=  ' <h4>please select your city</h4>';
      $output .=  ' <h6>*Food pickup service is only available in listed cities. </h6>';
      return $output;  
 }  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feed the Need</title>
    <link rel="stylesheet" href="./../css/signin.css" />
    <script src="./../css/request.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <style>
        .bgimg
        {
             background-image: url(../../imgs/finalbg.png);
             background-repeat: no-repeat;
             background-size: 100%;
             background-position: bottom;
             background-color: #f8f8f8;
        }
    </style>
</head>

<body>
    <div class="bg bgimg">
        <div class="backbtn">
            <a href="./../userpage.php"><label>Home</label></a>
        </div>
        <div class="model " style="min-height: 620px;">

            <div class="left-form">
                <h1 style="margin-bottom: 40px;font-size: 36px;">Donate Now</h1>
                <form name="Form" method="post">
                 <div id="tab" style="display: block;">
                    <!-- <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/person-black-18dp.svg" /></i>
                        <input type="text" class="textbox" placeholder="Name" name="city" />
                    </div> -->
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/location_city-24px.svg" /></i>
                        <select class="textbox" placeholder="select your city" name="city" id="city" required>
                            <option value="">select your city</option>
                            <?php echo fill_brand($con); ?>
                        </select>
                        
                    </div>
                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/apartment-24px.svg" /></i>
                        
                            <textarea class="textbox" placeholder="Provide compleare address" name="address" required></textarea>
                    </div>

                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/food1.png" /></i>
                        <input type="number" class="textbox" placeholder="what is Quantity of food ?  in Kilograms " name="quantity" min="5" title="Minimum Quantity should be 5 Kilograms and above" required/>
                    </div>

                    <div class="new-chat-window">
                        <i class="fa fa-search"><img width="15px" src="./../../ioc/food2.png" /></i>
                        <input type="text" class="textbox" placeholder="What is the Food?" name="type" required/>
                    </div>

                     <div id="overflowTest">
                         select your NGO
                        <fieldset class="boxed"  id="ngo_details">
                         
                           <?php echo fill_product($con);?>
                        </fieldset>
                     </div> 

                     


                    
                    <button type="submit" class="subbutton" id="nextBtn"  name="submit_btn" style="float:center">submit</button>
                 </div>
                
                </form>
            </div>
            <div class="left-form">
                <figure>
                    <img width="344" height="354" src="./../../imgs/Frame 1donate.png">
                </figure>

            </div>

        </div>
    </div>
</body>

</html>
<script>  
 $(document).ready(function(){  
      $('#city').change(function(){  
           var city = $(this).val();  
           $.ajax({  
                url:"load_ngo_details.php",  
                method:"POST",  
                data:{city:city},  
                success:function(data){  
                     $('#ngo_details').html(data);  
                }  
           });  
      });  
 });  
 </script>  
 <?php 
                if(isset($_POST['submit_btn']))
                      {
                      

                      $city = $_POST['city'];
                      $address = $_POST['address'];
                      $ngo = $_POST['ngo'];
                      $quantity = $_POST['quantity'];
                      $type = $_POST['type'];

                      $user_num=$_SESSION['user_id'];
                      
                      $dt = date("Y-m-d H:i:s");
                      
                      if($ngo!="")
                      {
                         $query= "insert into `food_pickup_request`(request_time,user_id,city,address,ngo_id,food_quantity,food_type) values('$dt','$user_num','$city','$address','$ngo','$quantity','$type')";
                                $query_run = mysqli_query($con,$query);

                                if($query_run)
                                {
                                    echo '<script type="text/javascript"> alert("Request Sent") </script>';
                                    echo '<script>window.location.href="./../userpage.php"</script>';
                                    
                                }
                                else
                                {
                                    echo '<script type="text/javascript"> alert("Some Unexpected Error ") </script>' .mysqli_error($con);
                                }
                      }
                      else{
                           echo '<script type="text/javascript"> alert("Please Select any NGO") </script>';

                      }
                    }
            ?>