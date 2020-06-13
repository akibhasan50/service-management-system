<?php 
 define('TITLE',"Assets");
 define('TEXT',"AssetsMENU");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>

 <div class="col-sm-5 mx-5 mt-5 jumbotron">
<?php 
        if(isset($_GET['id'])){
            $id= $_GET['id'] ;
        }

?>
 <?php 
 if(isset($_POST['update'])){
   
     $name         = $_POST['name']; 
     $dop          = $_POST['dop']; 
     $avlproduct   = $_POST['avlproduct']; 
     $totproduct   = $_POST['totproduct']; 
     $orgprice     = $_POST['orgprice']; 
     $sellprice    = $_POST['sellprice']; 

     if($name == "" ||  $dop == "" ||   $avlproduct == "" || $orgprice == "" ||  $sellprice == ""){
         $msg = "<div class='alert alert-warning mt-2' roll='alert'>Field must not be empty</div>";
    }else{
 
            $sql ="UPDATE tbl_assets SET 
            
            name        = '$name',
            date        =   '$dop',
            proavail    ='$avlproduct',
            totalpro    ='$totproduct',
            orgiprice   ='$orgprice',
            sellingprice ='$sellprice'
             WHERE id='$id'"; 
            
            $value= $db->conn->prepare($sql);
            $value->execute();
                if($value == true){
                    
                    $msg ="<div class='alert alert-success mt-2' roll='alert'>Product Updated successfull</div>";
     
            }else{
                    $msg ="<div class='alert alert-danger mt-2' roll='alert'>Product not Updated</div>";
            }
        }
 }
 ?>
  <form action="" method="post" class="mb-5">
        <h5 class="text-center">Update Product Details</h5>
 <?php 
          
              
                $sql = "SELECT * FROM tbl_assets WHERE id='$id'";
                $data= $db->conn->prepare($sql);
                $data->execute();
                $variable= $data->fetchAll();
                    foreach ($variable as $key) {
?>
     
        <div class="form-group">
            <label for="name" class="font-weight-bold">Product Name</label>
            <input  type="text" id="name" class="form-control" value="<?php echo $key['name'] ;?>"  name="name">
        </div>
        <div class="form-group">
            <label for="dop" class="font-weight-bold">DOP</label>
            <input  type="date" id="dop" class="form-control" value="<?php echo $key['date'] ;?>"   name="dop">
        </div>
        <div class="form-group">
            <label for="avlproduct" class="font-weight-bold">Available Product</label>
            <input  type="text" id="avlproduct" class="form-control" value="<?php echo $key['proavail'] ;?>"   name="avlproduct">
        </div>

        <div class="form-group">
            <label for="totproduct" class="font-weight-bold">Total Product</label>
            <input type="text" id="totproduct" class="form-control"  value="<?php echo $key['totalpro'] ;?>"   name="totproduct">
        </div>

        <div class="form-group">
            <label for="orgprice"  class="font-weight-bold">Orginal Price</label>
            <input type="text" id="orgprice" class="form-control"  value="<?php echo $key['orgiprice'] ;?>"  name="orgprice">
        </div>
        <div class="form-group">
            <label for="sellprice"  class="font-weight-bold">Selling Price</label>
            <input type="text" id="sellprice" class="form-control"  value="<?php echo $key['sellingprice'] ;?>"  name="sellprice">
        </div>

 
        <div class="text-right">
            <button type="sumbit" name="update" class="btn btn-success">Update</button>
            <a href="assets.php"  class="btn btn-secondary">Close</a> 

        </div>
     <?php } ;?> 
    </form>
    <?php if(isset($msg)){
        echo $msg;
    } ?>

 </div>

<?php include "lib/footer.php";?>
