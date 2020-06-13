<?php 
 define('TITLE',"Change  Password");
 define('TEXT',"PASSMENU");
 ?>

<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>
       
<?php 
                
                $id = session::get('id');

                if($_SERVER['REQUEST_METHOD'] =="POST"){
                $email= $fm->validate($_POST['email']);
                $oldpassword= $fm->validate($_POST['oldpassword']);
				$newpassword= $fm->validate($_POST['newpassword']);
			
                if($email =="" || $oldpassword == "" || $newpassword == ""){
                    $msg = "<div class='alert alert-warning mt-2' roll='alert'>Field must not be empty</div>";
                }else{
                         $sql = "SELECT * FROM tbl_user WHERE id='$id' and password='$oldpassword'"; 
                        $data= $db->conn->prepare($sql);
                        $data->execute();
                        $value = $data->fetchAll();

                         if($data->rowCount() > 0){
                    
                            $sql = "UPDATE tbl_user SET password='$newpassword' WHERE id='$id'"; 
                            $data= $db->conn->prepare($sql);
                            $value = $data->execute();
                            
                            if($value == true){
                                $msg = "<div class='alert alert-success mt-2' roll='alert'>password updated successfully</div>";
                            }else {
                                $msg = "<div class='alert alert-danger mt-2' roll='alert'>password not updated </div>";
                            }
                         }else{
                              $msg = "<div class='alert alert-success mt-2' roll='alert'>Old password not matchig</div>";
                         }
                    
                }

        }
?>
        <div class="col-sm-6 mt-5">

            <form action="" method="post" class="mx-5">
               
     <?php 
       $sql = "SELECT * FROM tbl_user WHERE id='$id'"; 
        $data= $db->conn->prepare($sql);
        $data->execute();
        $value = $data->fetchAll();
         
        foreach ($value as $key ) {
 ?>
                    <div class="form-group">
                    <i class="fas fa-envelope"></i><label for="email" class="font-weight-bold pl-2" >Email</label>
                    <input  type="text" class="form-control" value="<?php echo $key['email']?>" name="email">
                    </div>
                    <div class="form-group">
                    <i class="fas fa-key"></i><label for="oldpassword" class="font-weight-bold pl-2" >Old Password</label>
                    <input  type="password" class="form-control" placeholder=" Old password" name="oldpassword">
                    </div>
                    <div class="form-group">
                    <i class="fas fa-key"></i><label for="newpassword" class="font-weight-bold pl-2" >New Password</label>
                    <input type="password" class="form-control" placeholder=" New password" name="newpassword">
                    </div>

                    <button name="submit" type="submit" class="btn btn-danger shadow-sm font-weight-bold">Update</button>
                     <button type="reset" class="btn btn-secondary  shadow-sm font-weight-bold">Reset</button> 
                   
                    <?php if(isset($msg)){ echo $msg;} ;?>
                    
            </form>
    <?php } ;?>
            </div>

        </div>







<?php include "lib/footer.php";?>
