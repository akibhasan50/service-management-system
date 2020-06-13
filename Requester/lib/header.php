<?php include "../inc/database.php";?>
<?php include "../inc/formate.php";?>
<?php 
    include "../inc/session.php";
    session::init();
	 session::checksession();
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--fontawesome-->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--googlefont-->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!--custom-->
    <link rel="stylesheet" href="../css/style.css">

    <title><?php echo TITLE ;?></title>
</head>
<body>

   <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
        <div class="container">
            <a class="navbar-brand " href="profile.php">E-SERVICE</a>
            
        </div>
  
    
   </nav>