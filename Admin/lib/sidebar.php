
<!--sidebar-->
<?php 
// define('TEXT',"POFILEMENU");

?>
<div class="container-fluid" style="margin-top:50px; ">

        <div class="row">
            <nav class="col-sm-2 bg-light sidebar ">
                <div class="sidebar-sticky d-print-none">
                    <ul class="nav nav-pills flex-column  py-5 ">
                        <li class="nav-item ">
                        <a class="nav-link <?PHP if(TEXT == 'DashboardMENU'){echo 'active';}?>" href="dashboard.php"> <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link <?PHP if(TEXT == 'WorkMENU'){echo 'active';}?>" href="work.php"> <i class="fab fa-accessible-icon"></i>Work Request</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link <?PHP if(TEXT == 'RequestMENU'){echo 'active';}?>" href="request.php"> <i class="fas fa-align-center"></i>Request</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link <?PHP if(TEXT == 'AssetsMENU'){echo 'active';}?>" href="assets.php"> <i class="fas fa-database"></i>Assets</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link <?PHP if(TEXT == 'TechnicianMENU'){echo 'active';} ?>" href="technician.php"> <i class="fab fa-teamspeak"></i>Technichan</a>
                        </li>


                        <li class="nav-item">
                        <a class="nav-link <?PHP if(TEXT == 'RequesterMENU'){echo 'active';}?>" href="requester.php"> <i class="fas fa-user"></i>Requester</a>
                        </li>


                        <li class="nav-item">
                        <a class="nav-link <?PHP if(TEXT == 'SellReportMENU'){echo 'active';}?>" href="sellreport.php"> <i class="fas fa-align-center"></i>Sell Report</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link <?PHP if(TEXT == 'WorkReport'){echo 'active';} ?>" href="workreport.php"> <i class="fas fa-table"></i>Work Report</a>
                        </li>
                         <li class="nav-item">
                        <a class="nav-link <?PHP if(TEXT == 'usermsg'){echo 'active';}?>" href="usermsg.php"> <i class="fa fa-user-circle"></i>User Message</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link  <?PHP if(TEXT == 'cngpassMENU'){echo 'active';} ?>" href="cngpass.php"> <i class="fas fa-key "></i>Change Password</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt "></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
