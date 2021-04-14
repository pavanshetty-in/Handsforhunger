<?php
session_start();
unset($_SESSION['ngo_id']);
session_destroy();
header("Location:../index.php");
?>