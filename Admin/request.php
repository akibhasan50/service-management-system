
<?php 
 define('TITLE',"Request");
 define('TEXT',"RequestMENU");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>
       
<div class="col-sm-4 mt-5">

<?php 
        $sql = "SELECT * FROM tbl_service";
        $data= $db->conn->prepare($sql);
        $data->execute();
        $variable= $data->fetchAll();
       foreach ($variable as $key) {                  
?>
    <div class="card   mt-5 mx-5"  style="max-width:20rem">
        <div class="card-header">Requesrer Id:<?php echo $key['id'] ;?></div>
                <div class="card-body">
                        <h5 class="card-title">Requesrer Info: <?php echo $key['rqst_info'] ;?></h5>
                        <p class="card-text"><?php echo $key['description'];?></p>
                        <p class="card-text">Requesrer date:<?php echo $key['date'] ;?></p>
                        <div class="float-right">
                                <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $key['id'] ;?>">
                                        <input type="submit"   class="btn btn-danger text-right" value="view" name="view"/>
                                        <input type="submit"  class="btn btn-secondary text-right " value="clear" name="clear"/>
                                </form>
                        </div>
                
                </div>
        </div>
         <?php } ;?>
    </div>
      
<?php 
 if(isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
       }
   if(isset($_REQUEST['clear'])) {

        $sql = "DELETE FROM tbl_service where id='$id'";
        $data= $db->conn->prepare($sql);
        $data->execute();

        if($data == true){
             echo   '<meta http-equiv="refresh" content="0;URL=?closed"/>';
        }
   }
?>

<?php include "form.php";?>
<?php include "lib/footer.php";?>
