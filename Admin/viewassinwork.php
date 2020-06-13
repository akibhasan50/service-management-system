<?php 
 define('TITLE',"Work Request");
 define('TEXT',"WorkMENU");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>



<div class="col-sm-9 mt-5 mx-5">
    <h3 class="text-center mt-5">Assign Work Details</h3>
<?php 
if(isset($_GET['rid'])){

        $id = $_GET['rid'];
        
        $sql = "SELECT * FROM assign_work where rqst_id='$id'";
        $data= $db->conn->prepare($sql);
        $data->execute();
        $key= $data->fetch();
       
            if ($data->rowCount() >0) {  

?>
    <table class="table table-border">
        <tbody>
            <tr>
                <td>Request ID</td>
                <td><?php echo $key['rqst_id'];?></td>
            </tr>
           
                <tr>
                    <td>Request Description</td>
                    <td><?php echo $key['description'];?></td>
                </tr>
            
                <tr>
                    <td>Name</td>
                    <td><?php echo $key['name'];?></td>
                </tr>
            
            <tr>
                <td>address1</td>
                <td><?php echo $key['address1'];?></td>
            </tr>
            <tr>
                <td>address2</td>
                <td><?php echo $key['address2'];?></td>
            </tr>
            <tr>
                <td>City</td>
                <td><?php echo $key['city'];?></td>
            </tr>

            <tr>
                <td>road</td>
                <td><?php echo $key['road'];?></td>
            </tr>
            <tr>
                <td>zip</td>
                <td><?php echo $key['zip'];?></td>
            </tr>
             <tr>
                <td>phone</td>
                <td><?php echo $key['phone'];?></td>
            </tr>
             <tr>
                <td>email</td>
                <td><?php echo $key['email'];?></td>
            </tr>
             <tr>
                <td>Technician</td>
                <td><?php echo $key['technician'];?></td>
            </tr>
             <tr>
                <td>Cuatomer signature</td>
                <td></td>
            </tr>
             <tr>
                <td>Technician signature</td>
                <td></td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
    <div class="text-right mb-5">
        <form action="" method="post" class="d-print-none mb-3 ">
            <input type="submit" class="btn btn-danger " value="print" onClick="window.print()">
            
        </form>
        
        <form action="work.php" method="post" class="d-print-none ">
           
            <input type="submit" class="btn btn-secondary" value="close">
        </form>
    </div>
       <?php }?>
       
</div>





<?php include "lib/footer.php";?>
