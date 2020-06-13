
<!--sidebar-->
<?php 
// define('TEXT',"POFILEMENU");

?>
<div class="container-fluid " style="margin-top:50px; ">

        <div class="row">
            <nav class="col-sm-2 bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav nav-pills flex-column  py-5 d-print-none">
                        <li class="nav-item ">
                        <a class="nav-link <?PHP if(TEXT == 'POFILEMENU'){echo 'active';}?>" href="profile.php"> <i class="fas fa-user "></i>profile</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link <?PHP if(TEXT == 'SubmitRequest'){echo 'active';}?>" href="submitrequest.php"> <i class="fab fa-accessible-icon"></i>Submit Request</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link <?PHP if(TEXT == 'ServiceMENU'){echo 'active';}?>" href="servicestatus.php"> <i class="fas fa-align-center"></i>Service Status</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link  <?PHP if(TEXT == 'PASSMENU'){echo 'active';}?>" href="cngpass.php"> <i class="fas fa-key "></i>Change Password</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="../logout.php"> <i class="fas fa-sign-out-alt "></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
