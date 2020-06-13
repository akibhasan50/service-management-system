<?php include "inc/database.php";?>
<?php include "inc/formate.php";?>
<?php 
	include "inc/session.php";
	 
?>
<?php
 
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000"); 

?>
<?php 
$db = new database();
$fm = new formate();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--boorstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--fontawesome-->
    <link rel="stylesheet" href="css/all.min.css">
    <!--googlefont-->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!--custom-->
    <link rel="stylesheet" href="css/style.css">

    <title>E-SERVICE</title>
</head>
<body>
   <!--navigation bar-->
   <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
        <div class="container">
            <a class="navbar-brand " href="index.php">E-SERVICE</a>
            <span class="navbar-text">our service your happiness</span>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
                        <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="myMenu">
                    <ul  class="navbar-nav pl-5  custom-nav">
                        <li  class="nav-item"><a  class="nav-link" href="index.php">Home</a></li>
                        <li  class="nav-item"><a  class="nav-link" href="#Services">Services</a></li>
                        <li  class="nav-item"><a  class="nav-link" href="#Registration">Registration</a></li>
                        <li  class="nav-item"><a  class="nav-link" href="Requester/login.php">Login</a></li>
                        <li  class="nav-item"><a  class="nav-link" href="#Contact">Contact</a></li>
                    </ul>
                </div>
    
        <a  href="Requester/profile.php" class="btn btn-outline-warning text-white"><i class="fas fa-user"></i> Profile</a>
        </div>
  
    
   </nav>
   <!--navigation end-->