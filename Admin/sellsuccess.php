<?php 
 define('TITLE',"Sale Product");
 define('TEXT',"AssetsMENU");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>



<div class="col-sm-9 mt-5 mx-5">
    <h3 class="text-center mt-5">Customer Bill</h3>
<?php 
if(isset($_GET['cid'])){

        $id = $_GET['cid'];
        
        $sql = "SELECT * FROM tbl_sale where id='$id'";  
        $data= $db->conn->prepare($sql);
        $data->execute();
        $key= $data->fetch();
       
            if ($data->rowCount() >0) {  

?>
    <table class="table table-border">
        <tbody>
            <tr>
                <td>Customer Name</td>
                <td><?php echo $key['cname'];?></td>
            </tr>
           
                <tr>
                    <td>Customer Address</td>
                    <td><?php echo $key['caddress'];?></td>
                </tr>
            
                <tr>
                    <td>Product Name</td>
                    <td><?php echo $key['pname'];?></td>
                </tr>
            
            <tr>
                <td>Selling Quantity</td>
                <td><?php echo $key['quantity'];?></td>
            </tr>
            <tr>
                <td>Price Each Product</td>
                <td><?php echo $key['price'];?></td>
            </tr>
            <tr>
                <td>Total price</td>
                <td><?php echo $key['totprice'];?></td>
            </tr>

            <tr>
                <td>Date</td>
                <td><?php echo $key['date'];?></td>
            </tr>
            <tr>
           
        </tbody>
        <?php } ?>
    </table>
    <div class="text-right mb-5">
        <form action="" method="post" class="d-print-none mb-3 d-inline">
            <input type="submit" class="btn btn-danger " value="print" onClick="window.print()">
            
        </form>
        
        <form action="assets.php" method="post" class="d-print-none d-inline">
           
            <input type="submit" class="btn btn-secondary" value="close">
        </form>
    </div>
       <?php }?>
       
</div>





<?php include "lib/footer.php";?>
