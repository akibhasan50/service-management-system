<?php 
 define('TITLE',"Success");
 define('TEXT',"SuccessMENU");
 ?>
<?php include "lib/header.php";?>
<?php include "lib/sidebar.php";?>

<?php 
          
           if(isset($_GET['id'])){
               $id = $_GET['id'];
           }

        $sql = "SELECT * FROM tbl_service WHERE id='$id'"; 
        $data= $db->conn->prepare($sql);
        $data->execute();
         $value = $data->fetch();
        if($data->rowCount() == 1){
            
             echo "<div class='mt-5 m5-5'>
             
             <table class='table'>
                <tbody>
                    <tr>
                        <th>Request Id</th>
                        <td>".$value['id']."</td>
                    </tr>

                     <tr>
                        <th>Name</th>
                        <td>".$value['name']."</td>
                    </tr>

                     <tr>
                        <th>Emali Id</th>
                        <td>".$value['email']."</td>
                    </tr>

                    <tr>
                        <th>Request Info</th>
                        <td>".$value['rqst_info']."</td>
                    </tr>

                    <tr>
                        <th>Request Description</th>
                        <td>".$value['description']."</td>
                    </tr>

                    
                    <tr>
                        
                        <td>
                            <form class='d-print-none'>
                                <input class='btn btn-danger' type='submit' value='print'onClick='window.print()'>
                            </form> 
                          </td>
                    </tr>
                </tbody>

                   
            </table>
             
             
             </div>";

        }
       


?>





<?php include "lib/footer.php";?>