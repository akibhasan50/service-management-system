<?php 
 define('TITLE',"Technician");
 define('TEXT',"TechnicianMENU");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>
       
<div class="col-sm-8 col-md-10">      
 <div class="mx-5 mt-5 text-center ">
            <p class="bg-dark text-white p-2">List of Technicians</p>
            <table class="table">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">City</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
            <tbody>
            <?php 
                
                $sql = "SELECT * FROM tbl_technician ORDER BY id DESC";
                $data= $db->conn->prepare($sql);
                $data->execute();
                $variable= $data->fetchAll();
                    foreach ($variable as $key) {
            ?>
                <tr>
                    <td><?php echo $key['id'] ;?></td>
                    <td ><?php echo $key['name'] ;?></td>
                    <td ><?php echo $key['city'] ;?></td>
                     <td ><?php echo $key['phone'] ;?></td>
                    <td ><?php echo $key['email'] ;?></td>
                      <td>
                        <form action="edittechnician.php?id=<?php echo $key['id'] ;?>" method="post" class="d-inline">
                       
                        <button class="btn btn-info" name="edit" value="edit" type="submit"><i class="fas fa-pen"></i></button>
                        </form>
                     
                      <form action="?delid=<?php echo $key['id'] ;?>" method="post" class="d-inline">
 
                        <button class="btn btn-secondary" name="delete" value="delete" type="submit"><i class="far fa-trash-alt"></i></button>
                     </form>

                    </td>
                </tr>
                    <?php } ;?>
            </tbody>
            </table>
        </div>

</div>
  <?php 
       if(isset($_GET['delid'])){

        $id = $_GET['delid'];
        
        $sql = "DELETE FROM tbl_technician where id='$id'";
        $data= $db->conn->prepare($sql);
        $data->execute();
        if($data == true){
           echo '<meta http-equiv="refresh" content="0;URL=?deleted">';
          

        }
       }
       ?>  
           

</div>
<div class="float-right mb-5">
<a href="addnewtech.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a>
</div>
<!--javascript-->
<script src="../js/jquery.min.js"></script>
<script src="../js/pooper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</body>
</html>
