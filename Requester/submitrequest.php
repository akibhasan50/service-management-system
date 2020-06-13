<?php 
 define('TITLE',"Submit Request");
 define('TEXT',"SubmitRequest");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>
       
<?php 
if($_SERVER['REQUEST_METHOD'] =="POST"){
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
    $date         = $_POST['date'];

    if( $rqst_info == "" ||   $description == "" || $name == "" ||  $address1 == "" || $city == "" || $zip == "" || $phone == "" || $email  == "" || $date  == ""){
         $msg = "<div class='alert alert-warning mt-2' roll='alert'>Field must not be empty</div>";
    }else{
        
         
         
           $sql = "INSERT INTO  tbl_service (rqst_info,description,name,address1,address2,city,road,zip,phone,email,date) VALUE('$rqst_info','$description','$name','$address1','$address2','$city','$road','$zip','$phone','$email','$date')";

            $value= $db->conn->prepare($sql);
            $value->execute();
            
            
            
                if($value == true){
                    
                    $msg ="<div class='alert alert-success mt-2' roll='alert'>Request for service submitted successfull</div>";
                    $id =$db->conn->lastInsertId();
                    header('Location:rqstsuccess.php?id='.$id);
                    
            }else{
                    $msg ="<div class='alert alert-danger mt-2' roll='alert'>Request for service not submitted </div>";
            }


    }
}


?>
<div class="col-sm-8 col-md-9 mt-5">

    <form action="" method="post" class="mx-5 mb-5">
        <div class="form-group">
            <label for="request info" class="font-weight-bold">Request Info</label>
            <input type="text" id="request info" class="form-control" placeholder="Request Info" name="requestinfo">
        </div>

        <div class="form-group">
            <label for="description"  class="font-weight-bold">Description</label>
            <input type="text" id="description" class="form-control" placeholder="Description" name="description">
        </div>

        <div class="form-group">
            <label for="name"  class="font-weight-bold">Name</label>
            <input type="text" id="name" class="form-control" placeholder="Name" name="name">
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address1" class="font-weight-bold" >Address Line 1</label>
                <input class="form-control" type="text" name="address1" id="address" placeholder="House No. 123">
            </div>

            <div class="form-group col-md-6">
                <label for="address2"  class="font-weight-bold">Address Line 2 <small>(optional)</small> </label>
                <input  class="form-control" type="text" name="address2" id="address2" placeholder="Railway colony">
            </div>
        </div>

         <div class="form-row">
            <div class="form-group col-md-4">
                <label for="city"  class="font-weight-bold">City</label>
                <input class="form-control" type="text" name="city" id="city" placeholder="Jeshore">
            </div>

            <div class="form-group col-md-4">
                <label for="road" class="font-weight-bold" >Road <small> (optional)</small></label>
                <input  class="form-control" type="text" name="road" id="road" placeholder="123 RN-Road">
            </div>
            <div class="form-group col-md-4">
                <label for="zip"  class="font-weight-bold">Zip</label>
                <input  class="form-control" type="text" name="zip" id="zip" placeholder="jehsore-7400">
            </div>
        </div>

         <div class="form-row">
            <div class="form-group col-md-4">
                <label for="phone" class="font-weight-bold" >Phone</label>
                <input class="form-control" type="text" onkeypress="isNumber(event)" name="phone" id="phone" placeholder="">
            </div>

            <div class="form-group col-md-4">
                <label for="email"  class="font-weight-bold">Email</label>
                <input  class="form-control" type="email" name="email" id="email" placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="address2" class="font-weight-bold" >Date</label>
                <input  class="form-control" type="date" name="date" id="address2" placeholder="">
            </div>

        </div>
        
            <button type="sumbit" class="btn btn-success">submit</button>
            <button type="reset" class="btn btn-danger">Reset</button> 
            <?php if(isset($msg)){ echo $msg;} ;?>
        
    </form>

</div>



<script>

    function isNumber(evt){
        var ch = String.formCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
</script>
<?php include "lib/footer.php";?>






