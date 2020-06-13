<?php 
 define('TITLE',"Dashboard");
 define('TEXT',"DashboardMENU");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>
       
<div class="col-sm-9 col-md-10">

        <div class="row text-center mx-5">
            <div class="col-sm-4 mt-5">
                <div class="card text-white bg-danger mb-3" style="max-width:18rem">
                    <div class="card-header font-weight-bold">Request Received</div>
                    <div class="card-body">
                    <h4 class="card-title">

                    <?php 
                        $sql = "SELECT * FROM tbl_service";
                        $data= $db->conn->prepare($sql);
                        $data->execute();
                        $variable= $data->fetchAll();
                        $total = $data->rowCount();
                        
                        echo "$total";
                    
                    ?>
                    
                    
                    </h4>
                    <a href="request.php" class="btn text-white">View</a>
                    
                    </div>
                    
                </div>
            
            </div>

             <div class="col-sm-4 mt-5">
                <div class="card text-white bg-success mb-3" style="max-width:18rem">
                    <div class="card-header font-weight-bold">Assigned Work</div>
                    <div class="card-body">
                        <h4 class="card-title">
                          <?php 
                        $sql = "SELECT * FROM assign_work";
                        $data= $db->conn->prepare($sql);
                        $data->execute();
                        $variable= $data->fetchAll();
                        $total = $data->rowCount();
                        
                        echo "$total";
                    
                    ?>
                        
                        
                        </h4>
                        <a href="work.php" class="btn text-white">View</a>
                    
                    </div>
                    
                </div>
            
            </div>


             <div class="col-sm-4 mt-5">
                <div class="card text-white bg-info mb-3" style="max-width:18rem">
                    <div class="card-header font-weight-bold">No of Technician</div>
                    <div class="card-body">
                        <h4 class="card-title">
                    <?php 
                        $sql = "SELECT * FROM tbl_technician";
                        $data= $db->conn->prepare($sql);
                        $data->execute();
                        $variable= $data->fetchAll();
                        $total = $data->rowCount();
                        
                        echo "$total";
                    
                    ?>
                        
                    </h4>
                        <a href="technician.php" class="btn text-white">View</a>
                    
                    </div>
                    
                </div>
            
          
        </div>
        <div class="mx-5 mt-5 text-center w-100">
            <p class="bg-dark text-white p-2">List of Requesters</p>
            <table class="table">
            <tr>
                <th scope="col">Requester Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
            <tbody>
            <?php 
                
                $sql = "SELECT * FROM tbl_service ORDER BY id DESC";
                $data= $db->conn->prepare($sql);
                $data->execute();
                $variable= $data->fetchAll();
                    foreach ($variable as $key) {
            ?>
                <tr>
                    <td><?php echo $key['id'] ;?></td>
                    <td ><?php echo $key['name'] ;?></td>
                    <td ><?php echo $key['email'] ;?></td>
                </tr>
                    <?php } ;?>
            </tbody>
            </table>
        </div>
        


        </div>
</div>










<?php include "lib/footer.php";?>
