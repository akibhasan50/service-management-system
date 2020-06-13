<?php 
  define('TITLE',"Technician");
 define('TEXT',"TechnicianMENU");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>

 <div class="col-sm-7 mx-5 mt-5 jumbotron">

 <?php 
 
 if(isset($_POST['update'])){
     $id    =$_POST['id'];
     $name  = $_POST['name']; 
     $city = $_POST['city'];
     $phone  = $_POST['phone']; 
     $email = $_POST['email']; 
 
            $sql = "UPDATE tbl_technician SET 
                name='$name',
                city='$city',
                phone='$phone',
                email='$email'

                WHERE id='$id'";
                $data = $db->conn->prepare($sql);
                $value = $data->execute();
                if ($value == true) {
                    $msg ="<div class='alert alert-success mt-2' roll='alert'>Technician Details update Successfully</div>";
                }else {
                    $msg ="<div class='alert alert-warning mt-2' roll='alert'>Technician Details not update </div>";
                }
 
            }
 
 ?>
  <form action="" method="post" class="mb-5">
        <h5 class="text-center">Update Requester Details</h5>
 <?php 
          if(isset($_GET['id'])){
              $id= $_GET['id'] ;
              
                $sql = "SELECT * FROM tbl_technician WHERE id='$id'";
                $data= $db->conn->prepare($sql);
                $data->execute();
                $variable= $data->fetchAll();
                    foreach ($variable as $key) {
?>
        <div class="form-group">
            <label for="id" class="font-weight-bold">Id</label>
            <input type="text" readonly id="id" class="form-control" value="<?php echo $key['id'] ;?>"  name="id">
        </div>
        <div class="form-group">
            <label for="name" class="font-weight-bold">Name</label>
            <input type="text" id="name" class="form-control" value="<?php echo $key['name'] ;?>"  name="name">
        </div>

       

        <div class="form-group">
            <label for="city"  class="font-weight-bold">City</label>
            <input type="text" id="city" class="form-control" value="<?php echo $key['city'] ;?>"   name="city">
        </div>
        <div class="form-group">
            <label for="phone"  class="font-weight-bold">Phone</label>
            <input type="number" id="phone" class="form-control" value="<?php echo $key['phone'] ;?>"  name="phone">
        </div>
        <div class="form-group">
            <label for="email"  class="font-weight-bold">Email</label>
            <input type="text" id="email" class="form-control" value="<?php echo $key['email'] ;?>"  name="email">
        </div>

        <div class="text-right">
            <button type="sumbit" name="update" class="btn btn-success">Update</button>
            <a href="technician.php"  class="btn btn-secondary">Close</a> 

        </div>
        <?php }};?>
    </form>
    <?php if(isset($msg)){
        echo $msg;
    } ?>

 </div>

<?php include "lib/footer.php";?>
