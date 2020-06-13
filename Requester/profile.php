 <?php 
 define('TITLE',"POFILE");
 define('TEXT',"POFILEMENU");
 
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>

       
<?php 
                
                $id = session::get('id');

                if($_SERVER['REQUEST_METHOD'] =="POST"){
				$email= $fm->validate($_POST['email']);
				$name= $fm->validate($_POST['name']);
			
                if($email =="" || $name == ""){
                    $msg = "<div class='alert alert-warning mt-2' roll='alert'>Field must not be empty</div>";
                }else{
                        $sql = "UPDATE tbl_user SET name='$name' WHERE id='$id'"; 
                        $data= $db->conn->prepare($sql);
                        $value = $data->execute();
                        
                        if($value == true){
                             $msg = "<div class='alert alert-success mt-2' roll='alert'>Data updated successfully</div>";
                        }else {
                            $msg = "<div class='alert alert-danger mt-2' roll='alert'>Data updated successfully</div>";
                        }
                }
        }
?>
        <div class="col-sm-6 mt-5">

            <form action="" method="post" class="mx-5">
                <div class="form-group">
     <?php 
       $sql = "SELECT * FROM tbl_user WHERE id='$id'"; 
        $data= $db->conn->prepare($sql);
        $data->execute();
        $value = $data->fetchAll();
         
        foreach ($value as $key ) {
 ?>
                    <i class="fas fa-envelope"></i><label for="" class="font-weight-bold pl-2" >Email</label>
                    <input  type="text" class="form-control" value="<?php echo $key['email']?>" name="email">
                    </div>
                    
                    <div class="form-group">
                    <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2" >Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>

                    <button name="submit" type="submit" class="btn btn-danger shadow-sm font-weight-bold">Update</button>
                   
                    <?php if(isset($msg)){ echo $msg;} ;?>
                    
            </form>
    <?php } ;?>
            </div>

        </div>


<?php include "lib/footer.php";?>