<?php 
 define('TITLE',"User Message");
 define('TEXT',"usermsg");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>
       
<div class="col-sm-8 col-md-10">      
 <div class="mx-5 mt-5 text-center ">
            <p class="bg-dark text-white p-2">List of Messages</p>
            <table class="table">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Subject</th>
               
                <th scope="col">Email</th>
                <th scope="col">Message</th>
            </tr>
            <tbody>
            <?php 
                
                $sql = "SELECT * FROM tbl_contact ORDER BY id DESC";
                $data= $db->conn->prepare($sql);
                $data->execute();
                $variable= $data->fetchAll();
                    foreach ($variable as $key) {
            ?>
                <tr>
                    <td><?php echo $key['id'] ;?></td>
                    <td ><?php echo $key['name'] ;?></td>
                    <td ><?php echo $key['subject'] ;?></td>
                     <td ><?php echo $key['email'] ;?></td>
                    <td ><?php echo $key['message'] ;?></td>
                      <td>
                        <form action="replymsg.php?id=<?php echo $key['id'] ;?>" method="post" class="d-inline">
                       
                        <button class="btn btn-info" name="edit" value="edit" type="submit"><i class="far fa-eye"></i></button>
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

<!--javascript-->
<script src="../js/jquery.min.js"></script>
<script src="../js/pooper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</body>
</html>
