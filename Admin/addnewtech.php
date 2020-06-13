<?php 
 define('TITLE',"Technician");
 define('TEXT',"TechnicianMENU");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>

<div class="col-sm-6 mx-5  mt-5 jumbotron">
<?php 
if(isset($_POST['assign'])){
    $name         = $_POST['name'];
    $city         = $_POST['city'];
    $phone        = $_POST['phone'];
    $email        = $_POST['email'];
    

    if($name == "" || $city == "" || $phone == "" || $email  == "" ){
         $msg = "<div class='alert alert-warning mt-2' roll='alert'>Field must not be empty</div>";
    }else{

           $sql = "INSERT INTO  tbl_technician (name,city,phone,email) VALUE('$name','$city','$phone','$email')";
            $value= $db->conn->prepare($sql);
            $value->execute();
                if($value == true){
                    
                    $msg ="<div class='alert alert-success mt-2' roll='alert'>Technician assign successfull</div>";
     
            }else{
                    $msg ="<div class='alert alert-danger mt-2' roll='alert'>Technician not assign</div>";
            }


    }
}
 

?>
    <form action="" method="post" class="mb-5">
        <h5 class="text-center">Add New Technician</h5>

        <div class="form-group">
            <label for="name" class="font-weight-bold">Name</label>
            <input type="text" id="name" class="form-control"  name="name">
        </div>

       

        <div class="form-group">
            <label for="city"  class="font-weight-bold">City</label>
            <input type="text" id="city" class="form-control"   name="city">
        </div>
        <div class="form-group">
            <label for="phone"  class="font-weight-bold">Phone</label>
            <input type="number" id="phone" class="form-control"  name="phone">
        </div>
        <div class="form-group">
            <label for="email"  class="font-weight-bold">Email</label>
            <input type="text" id="email" class="form-control"  name="email">
        </div>

        <div class="text-right">
            <button type="sumbit" name="assign" class="btn btn-success">Assign</button>
            <button type="reset" name="clear" class="btn btn-danger">Reset</button> 

        </div>
           <?php if(isset($msg)){ echo $msg;} ;?>
    </form>
</div>

<?php include "lib/footer.php";?>
