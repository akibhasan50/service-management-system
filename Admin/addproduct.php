<?php 
 define('TITLE',"Assets");
 define('TEXT',"AssetsMENU");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>

 <div class="col-sm-5 mx-5 mt-5 jumbotron">

 <?php 
 if(isset($_POST['insert'])){
     $name         = $_POST['name']; 
     $dop          = $_POST['dop']; 
     $avlproduct   = $_POST['avlproduct']; 
     $totproduct   = $_POST['totproduct']; 
     $orgprice     = $_POST['orgprice']; 
     $sellprice    = $_POST['sellprice']; 

     if($name == "" ||  $dop == "" ||   $avlproduct == "" || $orgprice == "" ||  $sellprice == ""){
         $msg = "<div class='alert alert-warning mt-2' roll='alert'>Field must not be empty</div>";
    }else{
 
            $sql ="INSERT INTO tbl_assets (name,date,proavail,totalpro,orgiprice,sellingprice) value('$name','$dop','$avlproduct','$totproduct','$orgprice','$sellprice')"; 
            
            $value= $db->conn->prepare($sql);
            $value->execute();
                if($value == true){
                    
                    $msg ="<div class='alert alert-success mt-2' roll='alert'>Product Added successfull</div>";
     
            }else{
                    $msg ="<div class='alert alert-danger mt-2' roll='alert'>Product not Added</div>";
            }
        }
 }
 ?>
  <form action="" method="post" class="mb-5">
        <h5 class="text-center">Add New Product</h5>
        
        <div class="form-group">
            <label for="name" class="font-weight-bold">Product Name</label>
            <input  type="text" id="name" class="form-control"  name="name">
        </div>
        <div class="form-group">
            <label for="dop" class="font-weight-bold">DOP</label>
            <input  type="date" id="dop" class="form-control"  name="dop">
        </div>
        <div class="form-group">
            <label for="avlproduct" class="font-weight-bold">Available Product</label>
            <input  type="text" id="avlproduct" class="form-control"  name="avlproduct">
        </div>

        <div class="form-group">
            <label for="totproduct" class="font-weight-bold">Total Product</label>
            <input type="text" id="totproduct" class="form-control"   name="totproduct">
        </div>

        <div class="form-group">
            <label for="orgprice"  class="font-weight-bold">Orginal Price</label>
            <input type="text" id="orgprice" class="form-control"  name="orgprice">
        </div>
        <div class="form-group">
            <label for="sellprice"  class="font-weight-bold">Selling Price</label>
            <input type="text" id="sellprice" class="form-control"  name="sellprice">
        </div>

 
        <div class="text-right">
            <button type="sumbit" name="insert" class="btn btn-success">Insert</button>
            <a href="assets.php"  class="btn btn-secondary">Close</a> 

        </div>
       
    </form>
    <?php if(isset($msg)){
        echo $msg;
    } ?>

 </div>

<?php include "lib/footer.php";?>
