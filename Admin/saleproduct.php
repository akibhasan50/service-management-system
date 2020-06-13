<?php 
 define('TITLE',"Sale Product");
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
     if(isset($_POST['submit'])){
     $cname        = $_POST['cname']; 
     $address      = $_POST['address']; 
     $pname        = $_POST['pname']; 
     $avlproduct   = $_POST['avlproduct']; 
     $quantity     = $_POST['quantity']; 
     $sellprice    = $_POST['sellprice']; 
     $tprice       = $_POST['tprice']; 
     $date         = $_POST['date']; 

     
     if($avlproduct == 0){
        $msg ="<div class='alert alert-warning mt-2' roll='alert'>No available product right now</div>";

     }else{
     

     if($cname == "" ||  $address == "" ||   $pname == "" ||  $quantity == "" ||  $sellprice == "" || $tprice == "" ||  $date == ""){
         $msg = "<div class='alert alert-warning mt-2' roll='alert'>Field must not be empty</div>";
    }else{
        $newavail = $_POST['avlproduct'] -  $_POST['quantity']; 
        
            $sql ="INSERT INTO tbl_sale (cname,	caddress,pname,quantity,price,totprice,date) value('$cname','$address','$pname','$quantity','$sellprice','$tprice','$date')"; 
            
            $value= $db->conn->prepare($sql);
            $value->execute();
            $cid =$db->conn->lastInsertId();
                if($value->rowCount() > 0){

                    header('Location:sellsuccess.php?cid='.$cid);
                
                        $usql ="UPDATE tbl_assets SET proavail='$newavail' WHERE id='$id'"; 
                        $data= $db->conn->prepare($usql);
                        $data->execute();

                }             

    }


}
 }
 ?>
  <form action="" method="post" class="mb-5">
        <h5 class="text-center">Sell product</h5>
 <?php 
          
              
        $sql = "SELECT * FROM tbl_assets WHERE id='$id'";
        $data= $db->conn->prepare($sql);
        $data->execute();
        $variable= $data->fetchAll();
            foreach ($variable as $key) {
?>
        <div class="form-group">
            <label for="cname" class="font-weight-bold">Customer Name</label>
            <input  type="text" id="name" class="form-control"   name="cname">
        </div>
        <div class="form-group">
            <label for="address" class="font-weight-bold">Customer Address</label>
            <input  type="text" id="address" class="form-control"   name="address">
        </div>
        <div class="form-group">
            <label for="pname" class="font-weight-bold">Product Name</label>
            <input  type="text" id="name" class="form-control" value="<?php echo $key['name'] ;?>" name="pname">
        </div>
       
        <div class="form-group">
            <label for="avlproduct" class="font-weight-bold">Available Product</label>
            <input  type="text" id="avlproduct" class="form-control" value="<?php echo $key['proavail'] ;?>"    name="avlproduct">
        </div>
        <div class="form-group">
            <label for="quantity" class="font-weight-bold">Selling Quantity</label>
            <input  type="text" id="quantity" class="form-control"    name="quantity">
        </div>

  

        <div class="form-group">
            <label for="sellprice"  class="font-weight-bold">Price Each Product</label>
            <input type="text" id="sellprice" class="form-control"   value="<?php echo $key['sellingprice'] ;?>"   name="sellprice">
        </div>
        <div class="form-group">
            <label for="tprice"  class="font-weight-bold">Total price</label>
            <input type="text" id="tprice" class="form-control"   name="tprice">
        </div>
        <div class="form-group">
            <label for="date"  class="font-weight-bold">Date</label>
            <input type="date" id="date" class="form-control"   name="date">
        </div>

 
        <div class="text-right">
            <button type="sumbit" name="submit" class="btn btn-success">submit</button>
            <a href="assets.php"  class="btn btn-secondary">Close</a> 

        </div>
            <?php } ;?>
    </form>
    <?php if(isset($msg)){
        echo $msg;
    } ?>

 </div>

<?php include "lib/footer.php";?>
