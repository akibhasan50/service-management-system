
<!--start contact  us-->
<div class="container " id="Contact">
<h2 class="text-center mb-4">Contact Us</h2>
<div class="row">

        <div class="col-md-8">
        <?php 
            if(isset($_POST['submit'])){
                $name     = $_POST['name'];
                $subject  = $_POST['subject'];
                $email    = $_POST['email'];
                $message  = $_POST['message'];

                if($name == "" || $subject == "" || $email == "" || $message  == "" ){
                    $msg = "<div class='alert alert-warning mt-2' roll='alert'>Field must not be empty</div>";
                }else{

                $sql = "INSERT INTO  tbl_contact (name,subject,email,message) VALUE('$name','$subject','$email','$message')";
                $value= $db->conn->prepare($sql);
                $value->execute();
                if($value == true){
                    
                    $msg ="<div class='alert alert-success mt-2' roll='alert'>Messagge sent successfull</div>";
        
                }else{
                        $msg ="<div class='alert alert-danger mt-2' roll='alert'>Messagge not sent</div>";
                }

            }
        
            }
        ?>
            <form action="" method="post">
                <input type="text" name="name" class="form-control" placeholder="Name"> <br>
                 <input type="text" name="subject" class="form-control" placeholder="Subject"> <br>
                <input type="text" name="email" class="form-control" placeholder="Email"> <br>
                <textarea class="form-control" name="message" style="height:150px" placeholder="How can we help you"></textarea><br>
                  <input type="submit" name="submit" class="btn btn-info" value="SEND"> 
            </form>
              <?php if(isset($msg)){ echo $msg;} ;?>
        </div>

        <div class="col-md-4 text-center">
            <strong>Headquarter:</strong><br>
            E-SERVICE PVT LTD<br>
            sadar,Jeshore<br>
            Jeshore-7400<br>
            phone:01849487474<br>
            <a href="#" target="_blank">www.e-service.com</a><br>

            <br><br>

            <strong>Branches:</strong><br>
            E-SERVICE PVT LTD<br>
            Maijdee,Noakhali<br>
            Noakhali-3800<br>
            phone:01849487474<br>
            <a href="#" target="_blank">www.e-service.com</a><br>
        </div>
</div>


</div>

<!--end contact  us-->

