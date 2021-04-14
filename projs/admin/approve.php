<?php
require '../config.php';
$ngo_id= $_GET['ngo_id'];
$query = "UPDATE `ngo` SET `ngo_approvel_status`=1 WHERE ngo_id='$ngo_id'";
$query_run = mysqli_query($con,$query);
  if($query_run)
  {
    echo '<script type="text/javascript"> alert("Approved") </script>';
    echo '<script>window.location.href="approvengo.php"</script>';
  }
  else
  {
    echo '<script type="text/javascript"> alert("Error") </script>' .mysqli_error($con);
  }

?>