<?php
require '../config.php';
$volunteer_id= $_GET['volunteer_id'];
$query = "DELETE FROM `volunteer` WHERE volunteer_id='$volunteer_id'";
$query_run = mysqli_query($con,$query);
  if($query_run)
  {
    echo '<script type="text/javascript"> alert("Volunteer Removed") </script>';
    echo '<script>window.location.href="volunteer.php"</script>';
  }
  else
  {
    echo '<script type="text/javascript"> alert("Some Unexpected Error") </script>' .mysqli_error($con);
  }

?>