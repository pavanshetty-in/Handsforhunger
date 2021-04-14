<?php
require '../config.php';
$request_id= $_GET['request_id'];
$query = "UPDATE `food_pickup_request` SET `status`='Compleated' WHERE request_id='$request_id'";
$query_run = mysqli_query($con,$query);
  if($query_run)
  {
    
    echo '<script>window.location.href="volunteerpage.php"</script>';
  }
  else
  {
    echo '<script type="text/javascript"> alert("Error") </script>' .mysqli_error($con);
  }

?>