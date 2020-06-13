<?php 
include "../inc/session.php";
     session::init();
     session::destroy();
     header("Location:login.php");

?>