<?php 
 define('TITLE',"Requester");
 define('TEXT',"RequesterMENU");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>

 <div class="col-sm-5 mx-5 mt-5 jumbotron">

 <?php 
 if(isset($_POST['update'])){
     $id    = $_POST['requestid']; 
     $name  = $_POST['name']; 
     $email = $_POST['email']; 
 
            $upquery = "UPDATE tbl_service SET 
                name='$name',
                email='$email'
                
                WHERE id='$id'";
                $upresult = $db->conn->prepare($upquery);
                $upvalue = $upresult->execute();
                if ($upvalue == true) {
                    $msg ="<div class='alert alert-success mt-2' roll='alert'>Requester Details update Successfully</div>";
                }else {
                    $msg ="<div class='alert alert-warning mt-2' roll='alert'>Requester Details not update </div>";
                }
 
            }
 
 ?>
  <form action="" method="post" class="mb-5">
        <h5 class="text-center">Update Requester Details</h5>
 <?php 
          if(isset($_GET['id'])){
              $id= $_GET['id'] ;
              
                $sql = "SELECT * FROM tbl_service WHERE id='$id'";
                $data= $db->conn->prepare($sql);
                $data->execute();
                $variable= $data->fetchAll();
                    foreach ($variable as $key) {
?>
  
        <div class="form-group">
            <label for="request id" class="font-weight-bold">Request ID</label>
            <input readonly type="text" id="request id" class="form-control" value="<?php echo $key['id'] ;?>" name="requestid">
        </div>

        <div class="form-group">
            <label for="name" class="font-weight-bold">Name</label>
            <input type="text" id="name" class="form-control"  value="<?php echo  $key['name'] ;?>" name="name">
        </div>

        <div class="form-group">
            <label for="email"  class="font-weight-bold">Email</label>
            <input type="text" id="description" class="form-control"  value="<?php  echo $key['email'] ;?>" name="email">
        </div>

 
        <div class="text-right">
            <button type="sumbit" name="update" class="btn btn-success">Update</button>
            <a href="requester.php"  class="btn btn-secondary">Close</a> 

        </div>
        <?php }};?>
    </form>
    <?php if(isset($msg)){
        echo $msg;
    } ?>

 </div>

<?php include "lib/footer.php";?>
