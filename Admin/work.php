<?php 
 define('TITLE',"Work Request");
 define('TEXT',"WorkMENU");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>


 <div class="col-sm-9 col-md-10 mt-5">      
 <table class="table table-border">
        <thead>
            <tr>
                    <th scope="col">Request ID</th>
                    <th scope="col">Request Description</th>
                    <th scope="col">Name</th>
                    <th scope="col">address1</th>
                     <th scope="col">address2</th>
                     <th scope="col">City</th>
                     <th scope="col">road</th>
                     <th scope="col">zip</th>
                     <th scope="col">phone</th>
                     <th scope="col">email</th>
                     <th scope="col">Technician</th>
                     <th scope="col">Action</th>
            </tr>
         </thead>
         <?php 
                
                $sql = "SELECT * FROM assign_work  order by id desc";
                $data= $db->conn->prepare($sql);
                $data->execute();
                $result= $data->fetchAll();
                foreach ($result as $key) {
            ?>
            <tbody>
                <tr>
                    <td><?php echo $key['rqst_id'];?></td>
                    <td><?php echo $key['description'];?></td>
                    <td><?php echo $key['name'];?></td>
                    
                    <td><?php echo $key['address1'];?></td>
                    <td><?php echo $key['address2'];?></td>
                    <td><?php echo $key['city'];?></td>
                    <td><?php echo $key['road'];?></td>

                    <td><?php echo $key['zip'];?></td>
                    <td><?php echo $key['phone'];?></td>

                    <td><?php echo $key['email'];?></td>
                    <td><?php echo $key['technician'];?></td>
                    <td>
                        <form action="viewassinwork.php?rid=<?php echo $key['rqst_id'];?>" method="post" class="d-inline">
                       
                        <button class="btn btn-warning" name="view" value="view" type="submit"><i class="far fa-eye"></i></button>
                        </form>
                     
                      <form action="work.php?delid=<?php echo $key['rqst_id'];?>" method="post" class="d-inline">
 
                        <button class="btn btn-secondary" name="delete" value="delete" type="submit"><i class="far fa-trash-alt"></i></button>
                     </form>

                    </td>
                     
             </tr>
                <?php } ;?>
            
         </tbody> 
         
       <?php 
       if(isset($_GET['delid'])){

        $id = $_GET['delid'];
        
        $sql = "DELETE FROM assign_work where rqst_id='$id'";
        $data= $db->conn->prepare($sql);
        $data->execute();
        if($data == true){
           echo '<meta http-equiv="refresh" content="0;URL=?deleted">';

        }
       }
       ?>  
            
     
    </table>
</div>



<?php include "lib/footer.php";?>
