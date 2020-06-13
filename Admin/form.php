<?php 
if(session_status() !== PHP_SESSION_ACTIVE){
     include "../inc/session.php";   
    session::init();
    session::checksession();
}

?>
<div class="col-sm-5  mt-5 jumbotron">
<?php 
if(isset($_POST['assign'])){
    $rqst_id      = $_POST['requestid'];   
    $rqst_info    = $_POST['requestinfo'];
    $description  = $_POST['description'];
    $name         = $_POST['name'];
    $address1     = $_POST['address1'];
    $address2     = $_POST['address2'];
    $city         = $_POST['city'];
    $road         = $_POST['road'];
    $zip          = $_POST['zip'];
    $phone        = $_POST['phone'];
    $email        = $_POST['email'];
    $technician   = $_POST['technician'];
    $date         = $_POST['date'];

    if($rqst_id == "" ||  $rqst_info == "" ||   $description == "" || $name == "" ||  $address1 == "" || $city == "" || $zip == "" || $phone == "" || $email  == "" || $technician  == "" || $date  == ""){
         $msg = "<div class='alert alert-warning mt-2' roll='alert'>Field must not be empty</div>";
    }else{
        
         
         
           $sql = "INSERT INTO  assign_work (rqst_id,rqst_info,description,name,address1,address2,city,road,zip,phone,email,technician,date) VALUE('$rqst_id','$rqst_info','$description','$name','$address1','$address2','$city','$road','$zip','$phone','$email','$technician','$date')";

            $value= $db->conn->prepare($sql);
            $value->execute();
                if($value == true){
                    
                    $msg ="<div class='alert alert-success mt-2' roll='alert'>Work assign successfull</div>";
     
            }else{
                    $msg ="<div class='alert alert-danger mt-2' roll='alert'>Work not assign</div>";
            }


    }
}


?>
    <form action="" method="post" class="mb-5">
        <h5 class="text-center">Assign work order request</h5>
<?php 
       if(isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
       }
       if(isset($_REQUEST['view'])) {

        $sql = "SELECT * FROM tbl_service where id='$id'";
        $data= $db->conn->prepare($sql);
        $data->execute();
        $variable= $data->fetchAll();
       foreach ($variable as $key) {     
?>
        <div class="form-group">
            <label for="request id" class="font-weight-bold">Request ID</label>
            <input type="text" id="request info" class="form-control" value="<?php echo $key['id'] ;?>" name="requestid">
        </div>

        <div class="form-group">
            <label for="request info" class="font-weight-bold">Request Info</label>
            <input type="text" id="request info" class="form-control"  value="<?php echo $key['rqst_info'] ;?>" name="requestinfo">
        </div>

        <div class="form-group">
            <label for="description"  class="font-weight-bold">Description</label>
            <input type="text" id="description" class="form-control" value="<?php echo $key['description'] ;?>" name="description">
        </div>

        <div class="form-group">
            <label for="name"  class="font-weight-bold">Name</label>
            <input type="text" id="name" class="form-control"  value="<?php echo $key['name'] ;?>" name="name">
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address1" class="font-weight-bold" >Address Line 1</label>
                <input class="form-control" type="text" name="address1" id="address" value="<?php echo $key['address1'] ;?>">
            </div>

            <div class="form-group col-md-6">
                <label for="address2"  class="font-weight-bold">Address Line 2 <small>(optional)</small> </label>
                <input  class="form-control" type="text" name="address2" id="address2" value="<?php echo $key['address2'] ;?>">
            </div>
        </div>

         <div class="form-row">
            <div class="form-group col-md-4">
                <label for="city"  class="font-weight-bold">City</label>
                <input class="form-control" type="text" name="city" id="city" value="<?php echo $key['city'] ;?>">
            </div>

            <div class="form-group col-md-4">
                <label for="road" class="font-weight-bold" >Road <small> (optional)</small></label>
                <input  class="form-control" type="text" name="road" id="road" value="<?php echo $key['road'] ;?>">
            </div>
            <div class="form-group col-md-4">
                <label for="zip"  class="font-weight-bold">Zip</label>
                <input  class="form-control" type="text" name="zip" id="zip" value="<?php echo $key['zip'] ;?>">
            </div>
        </div>

         <div class="form-row">
            <div class="form-group col-md-4">
                <label for="phone" class="font-weight-bold" >Phone</label>
                <input class="form-control" type="text" onkeypress="isNumber(event)" name="phone" id="phone" value="<?php echo $key['phone'] ;?>">
            </div>

            <div class="form-group col-md-8 ">
                <label for="email"  class="font-weight-bold">Email</label>
                <input  class="form-control" type="email" name="email" id="email" value="<?php echo $key['email'] ;?>">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="technician"  class="font-weight-bold">Assign to Technician</label>
                <input  class="form-control" type="text" name="technician" id="technician" placeholder="">
            </div>

            <div class="form-group col-md-6">
                <label for="date"  class="font-weight-bold">Date</label>
                <input  class="form-control" type="date" name="date" id="date" placeholder="">
            </div>
            

        </div>
        <div class="text-right">
            <button type="sumbit" name="assign" class="btn btn-success">Assign</button>
            <button type="reset" name="clear" class="btn btn-danger">Reset</button> 

        </div>
           <?php if(isset($msg)){ echo $msg;} ;?>
    </form>
       <?php }}else{ ;?>
        
        <div class="form-group">
            <label for="request id" class="font-weight-bold">Request ID</label>
            <input type="text" id="request info" class="form-control"  name="requestid">
        </div>

        <div class="form-group">
            <label for="request info" class="font-weight-bold">Request Info</label>
            <input type="text" id="request info" class="form-control"   name="requestinfo">
        </div>

        <div class="form-group">
            <label for="description"  class="font-weight-bold">Description</label>
            <input type="text" id="description" class="form-control"  name="description">
        </div>

        <div class="form-group">
            <label for="name"  class="font-weight-bold">Name</label>
            <input type="text" id="name" class="form-control"  name="name">
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address1" class="font-weight-bold" >Address Line 1</label>
                <input class="form-control" type="text" name="address1" id="address" >
            </div>

            <div class="form-group col-md-6">
                <label for="address2"  class="font-weight-bold">Address Line 2 <small>(optional)</small> </label>
                <input  class="form-control" type="text" name="address2" id="address2" >
            </div>
        </div>

         <div class="form-row">
            <div class="form-group col-md-4">
                <label for="city"  class="font-weight-bold">City</label>
                <input class="form-control" type="text" name="city" id="city" >
            </div>

            <div class="form-group col-md-4">
                <label for="road" class="font-weight-bold" >Road <small> (optional)</small></label>
                <input  class="form-control" type="text" name="road" id="road" >
            </div>
            <div class="form-group col-md-4">
                <label for="zip"  class="font-weight-bold">Zip</label>
                <input  class="form-control" type="text" name="zip" id="zip" >
            </div>
        </div>

         <div class="form-row">
            <div class="form-group col-md-4">
                <label for="phone" class="font-weight-bold" >Phone</label>
                <input class="form-control" type="text" onkeypress="isNumber(event)" name="phone" id="phone" >
            </div>

            <div class="form-group col-md-8 ">
                <label for="email"  class="font-weight-bold">Email</label>
                <input  class="form-control" type="email" name="email" id="email" >
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="technician"  class="font-weight-bold">Assign to Technician</label>
                <input  class="form-control" type="text" name="technician" id="technician" placeholder="">
            </div>

            <div class="form-group col-md-6">
                <label for="date"  class="font-weight-bold">Date</label>
                <input  class="form-control" type="date" name="date" id="date" placeholder="">
            </div>
            

        </div>
        <div class="text-right">
            <button type="sumbit" name="assign" class="btn btn-success">Assign</button>
            <button type="reset" name="clear" class="btn btn-danger">Reset</button> 
           
        </div>
           <?php if(isset($msg)){ echo $msg;} ;?>
    </form>
       <?php };?>
</div>