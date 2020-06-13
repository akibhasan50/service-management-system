<?php 
define('TITLE',"User Message");
 define('TEXT',"usermsg");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>

 <div class="col-sm-5 mx-5 mt-5 jumbotron">

 <?php 
 if(isset($_POST['send'])){
     
     $to = $_POST['toemail'];
     $from = $_POST['formemail'];
     $subject = $_POST['subject'];
     $message = $_POST['message'];
    

     $sendmail = mail($to,$subject,$message,$from);

        if($sendmail ){
                    
            $msg ="<div class='alert alert-success mt-2' roll='alert'>Reply sent successfully!!!</div>";
        }else{
        
            $msg ="<div class='alert alert-success mt-2' roll='alert'>Reply not sent !!! </div>";
        }
 }
 
 ?>


  <form action="" method="post" class="mb-5">
        <h5 class="text-center">Reply User Messages</h5>
 <?php 
          if(isset($_GET['id'])){
              $id= $_GET['id'] ;
              
                $sql = "SELECT * FROM tbl_contact WHERE id='$id'";
                $data= $db->conn->prepare($sql);
                $data->execute();
                $variable= $data->fetchAll();
                    foreach ($variable as $key) {
?>
        <div class="form-group">
            <label for="email"  class="font-weight-bold">To</label>
            <input type="text" readonly id="toemail" class="form-control"  value="<?php  echo $key['email'] ;?>" name="toemail">
        </div>
        <div class="form-group">
            <label for="formemail"  class="font-weight-bold">From</label>
            <input type="text"  id="formemail" class="form-control"  placeholder="Type your email " name="formemail">
        </div>
           <div class="form-group">
            <label for="subject"  class="font-weight-bold">Subject</label>
            <input type="text"  id="subject" class="form-control"  placeholder="Type your Subject " name="subject">
        </div>             
        <div class="form-group">
            <label for="message" class="font-weight-bold">Message</label>
            <textarea class="form-control" name="message" style="height:150px" placeholder="Type your message here"></textarea>
        </div>

        

 
        <div class="text-right">
            <button type="sumbit" name="send" class="btn btn-success">Send</button>
            <a href="requester.php"  class="btn btn-secondary">Close</a> 

        </div>
        <?php }};?>
    </form>
    <?php if(isset($msg)){
        echo $msg;
    } ?>

 </div>

<?php include "lib/footer.php";?>
