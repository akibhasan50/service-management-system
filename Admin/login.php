<?php include "../inc/database.php";?>
<?php include "../inc/formate.php";?>
<?php include "../inc/session.php";?>
<?php 
session::init();
//session::checkloginadmin();
$db = new database();
$fm = new formate();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <!--boorstrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--fontawesome-->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--googlefont-->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!--custom-->
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Login Area</title>
</head>
<body>
    <div class="mt-5 text-center " style="font-size:30px">
         <i class="fas fa-user-cog"></i>
        <span>E-SERVICE MANAGEMENT</span> 
         </div>
        
        <p class="mt-5 text-center " style="font-size:20px"><i class="fas fa-user-secret text-danger mr-2"></i>Admin Area</p>
        <?php 
        if($_SERVER['REQUEST_METHOD'] =="POST"){

            
            $email = $fm->validate($_POST['email']);
            $password = $fm->validate($_POST['password']);

            if($email == "" || $password == ""){
              $msg = "<div class='alert alert-warning mt-2' roll='alert'>Field must not be empty</div>";
            }else{
                if(filter_var($email,FILTER_VALIDATE_EMAIL) == FALSE){
                $msg ="<div class='alert alert-warning mt-2' roll='alert'>Enter valid email</div>";
                }

                $sql = "SELECT * FROM tbl_admin where email='$email' And password='$password'";
                $data= $db->conn->prepare($sql);
                $data->execute();
                $key= $data->fetch();

                if($data->rowCount() > 0){
                    session::set("login",true);
                    session::set("email",$key['email']);
                    session::set("id",$key['id']);
                   echo "<script>window.location='dashboard.php'</script>";
                }else{
                    $msg ="<div class='alert alert-danger mt-2' roll='alert'>Invalid Email or Password</div>";
                }
                
            }
            
        }  
    
    ?>
  <di class="container-fluid">
      <div class="row justify-content-center ">
          <div class="col-sm-6 col-md-4">
              <form action="" method="post" class="shadow-lg p-4">
                  <div class="form-group">
                      <i class="fas fa-user"></i><label class="font-weight-bold" for="Email">Email</label>
                      <input type="email" class="form-control" placeholder="Email" name="email">
                      <small class="form-text">We will never share your email with anyone else!</small>
                  </div>

                  <div class="form-group">
                      <i class="fas fa-key"></i><label class="font-weight-bold" for="pass">Password</label>
                      <input type="password" class="form-control" placeholder="Password" name="password">
                      
                  </div>

                      <button type="submit" class="btn btn-outline-danger font-weight-bold btn-block mt-4 shadow-sm">Login</button>
                <?php if(isset($msg)){echo $msg;} ?>
              </form>

              
                      <div class="text-center mt-3">
                          <a class="btn btn-info font-weight-bold shadow-sm" href="../index.php">Back to Home</a>
                      </div>
                      
                  
          </div>
      </div>
  </di>
    

    <!--javascript-->
<script src="../js/jquery.min.js"></script>
<script src="../js/pooper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</body>
</html>