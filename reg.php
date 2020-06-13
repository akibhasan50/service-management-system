<div class="container pt-5" id="Registration"></div>
    <h2 class="text-center">Create Account</h2>
    <div class="row mt-4 mb-4">
    <div class="col-md-6 offset-md-3">

    <?php 
        if(isset($_POST['signup'])){

            $name = $fm->validate($_POST['name']);
            $email = $fm->validate($_POST['email']);
            $password = $fm->validate($_POST['password']);

            if( $name == "" || $email == "" || $password == ""){
              $msg = "<div class='alert alert-warning mt-2' roll='alert'>Field must not be empty</div>";
            }else{
                if(filter_var($email,FILTER_VALIDATE_EMAIL) == FALSE){
                $msg ="<div class='alert alert-warning mt-2' roll='alert'>Enter valid email</div>";
                }

                $sql = "SELECT * FROM tbl_user where email='$email'";
                $data= $db->conn->prepare($sql);
                $data->execute();
                $data->fetchAll();

                if($data->rowCount() > 0){
                    
                     $msg ="<div class='alert alert-warning mt-2' roll='alert'>Email already exist</div>";
                }else{
                    $sql = "INSERT INTO  tbl_user (name,email,password) VALUE('$name','$email','$password')";
                    $value= $db->conn->prepare($sql);
                    $value->execute();
                   
                      if($value == true){
                           $msg ="<div class='alert alert-success mt-2' roll='alert'>Registration successfull</div>";
                            
                    }else{
                           $msg ="<div class='alert alert-danger mt-2' roll='alert'>Registration not successfull</div>";
                        }
                }
            }
            
        }
    
    ?>
<form action="" method="post" class="shadow-lg p-4">

        <div class="form-group">
        <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2" >Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name">
        </div>

        <div class="form-group">

        <i class="fas fa-envelope"></i><label for="" class="font-weight-bold pl-2" >Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email">
        </div>

        <div class="form-group">
        <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2" >Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
        </div>

        <button name="signup" type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold">Sign up</button>
        <em  style="font-size:12px">Note - By clicking sign up, you are agree to our terms,data policy and cookies policy</em>
        <?php if(isset($msg)){ echo $msg;} ;?>
</form>
</div>
</div>
<!--Reg form end-->