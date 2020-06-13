<?php 
 define('TITLE',"Sell Report");
 define('TEXT',"SellReportMENU");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>
       

<div class="col-sm-9 mx-5 mt-5 jumbotron">
 
  <form action="" method="post" class="mb-5 d-print-none">
  <div class="form-row">
  
        <div class="form-group col-md-3">
         
            <input type="date"  id="startdate" class="form-control"  name="startdate">
        </div> <span>To</span>
       <div class="form-group col-md-3">
         
            <input type="date"  id="enddate" class="form-control"  name="enddate">
        </div> 
                     

        <div class="text-right">
            <button type="sumbit" name="search" class="btn btn-secondary">Search</button>

        </div>
     </div>  
    </form>
<?php 
 if(isset($_POST['search'])){
    $startdate =$_POST['startdate'];
    $enddate =$_POST['enddate'];


    $sql="SELECT * FROM tbl_sale WHERE date BETWEEN '$startdate' AND '$enddate'";
    $data =$db->conn->prepare($sql);
   $data->execute();
   $value = $data->fetchAll();

  if($data->rowCount() >0){
           echo "<p class='bg-dark text-white p-2 text-center'>Sell Report</p>
            <table class='table'>
            <tr>
                <th scope='col'>Id</th>
                <th scope='col'>Customer Name</th>
                <th scope='col'>Customer Address</th>
                <th scope='col'>Product Name</th>
                <th scope='col'>Selling Quantity</th>
                <th scope='col'>Price Each Product</th>
                <th scope='col'>Total price</th>
                <th scope='col'>Date</th>
            </tr>";
           echo "<tbody>";
  foreach($value as $key){
               echo "<tr>";
                   echo  "<td>".$key['id']."</td>";
                   echo  "<td>".$key['cname']."</td>";
                   echo  "<td>".$key['caddress']."</td>";
                   echo  "<td>".$key['pname']."</td>";
                   echo  "<td>".$key['quantity']."</td>";
                   echo  "<td>".$key['price']."</td>";
                   echo  "<td>".$key['totprice']."</td>";
                   echo  "<td>".$key['date']."</td>";         
               echo" </tr>";
  }     
              
            echo "</tbody>";
            echo "</table>";
               echo "<form action='assets.php' method='post' class='d-print-none  text-right'>";
                 echo "<input type='submit' class='btn btn-danger d-right' value='print' onClick='window.print()'>";
            echo "</form>";
            
     
 }else{

     $msg ="<div class='alert alert-warning mt-2' roll='alert'>No sell available!!!</div>";
 }



}
 
 ?>

 

    <?php if(isset($msg)){
        echo $msg;
    } ?>

 </div>



<?php include "lib/footer.php";?>
