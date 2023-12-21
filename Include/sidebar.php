<!--**********************************
            Sidebar start
***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <!--**********************************
            Main Profile Start
        ***********************************-->
        <div class="main-profile">
            <div class="image-bx">
                <img src="images/logo1.png" alt="">
                <!-- <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a> -->
            </div>
            <h6 class="name"><span class="font-w400">Hello,</span> <?= strtoupper($_SESSION['username']) ?></h6>
        </div>
        <!--**********************************
            Main Profile END
        ***********************************-->
        <!--**********************************
           Menu Start
        ***********************************-->


        <!-- FOR SUPER ADMIN ACCESS ROLE -->
        <?php
        $emp_id = $_SESSION["id"];
        $prot = " SELECT * FROM accrole_tbl WHERE employeeid='$emp_id' AND status='1'";
        $exe = mysqli_query($conn, $prot);

        while ($h2w = mysqli_fetch_array($exe)) {

            // echo $h2w['usertype'];
            $condtiones = $h2w['usertype'];
            if ($condtiones == 1) { ?>
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="superadmin.php" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-144-layout"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-label">Employees</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-077-menu-1"></i>
                            <span class="nav-text">Manage Employees</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a>Employees</a>
                            <ul aria-expanded="false">
                                    <li><a href="fmc_employee.php">FMC</a></li>
                                    <li><a href="msc_employee.php">MSC</a></li>
                                    <li><a href="mbi_employee.php">MBI</a></li>
                                    <li><a href="everfirst_employee.php">EVERFIRST</a></li>
                                </ul>
                        </li>
                            <li><a href="department.php">Department</a></li>
                            <li><a href="position.php">Position</a></li>
                            <li><a href="location.php">Location</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Asset</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-077-menu-1"></i>
                            <span class="nav-text">Asset List</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="assignedlist_admin.php">Assigned List</a></li>
                            <li><a href="damage.php">Damage List</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Inventory</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-077-menu-1"></i>
                            <span class="nav-text">View Count</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="stockdata.php">Asset Count</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">View</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-077-menu-1"></i>
                            <span class="nav-text">Manage View</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="view_assigned.php">Assigned View</a></li>
                        </ul>
                    </li>
                </ul>
            <!-- FOR EMPLOYEE ACCESS ROLE ONLY -->
            <?php } else if ($condtiones == 6) { ?>
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="employee.php" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-144-layout"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-label">Assigned for User</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-077-menu-1"></i>
                            <span class="nav-text">Assigned View</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="view_assigned.php">Assigned Asset (Employee)</a></li>
                        </ul>
                    </li>
                </ul>
            <?php } ?>
        <?php
        }
        ?>
        <!-- END FOR SUPER ADMIN AND EMPLOYEE ACCESS ROLE -->



        <!-- FOR ACCOUNTING ACCESS ROLE ONLY -->
                    <?php
                    $emp_id = $_SESSION["id"];
                    $prot = " SELECT * FROM accrole_tbl WHERE employeeid='$emp_id' AND status='1'";
                    $exe = mysqli_query($conn, $prot);
                    while ($h2w = mysqli_fetch_array($exe)) {
                        $condtiones = $h2w['usertype'];

                    if ($condtiones !=1 && $condtiones !=6  ) { ?>

        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a href="user.php" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-label">ASSET</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">Manage Asset</span>
                </a>
                <ul aria-expanded="false">

                    <!-- TO CONTROL THE COMPANY ADD ASSET -->

                    <?php
                    $emp_id = $_SESSION["id"];
                    $prot = " SELECT * FROM accrole_tbl WHERE employeeid='$emp_id'AND status='1'";
                    $exe = mysqli_query($conn, $prot);
                    while ($h2w = mysqli_fetch_array($exe)) {
                        // echo $h2w['usertype'];
                        $condtiones = $h2w['usertype'];
                        if ($condtiones == 2) { ?>
                            <li><a href="fmc.php">FMC</a></li>
                    <?php } else if ($condtiones == 3) { ?>
                        <li?><a href="hkak.php">MSC</a></li>
                        <?php } ?>
                    <?php
                                }
                    ?>
                <!-- END HERE -->
                    <li><a href="assignedlist.php">Assigned List</a></li>
                    <li><a href="damage.php">Damage List</a></li>
        </ul>
        </li>
            <li class="nav-label">Inventory</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-003-diamond"></i>
                    <span class="nav-text">Manage Inventory</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="stockdata.php">Asset Count (Department)</a></li>
                    <li><a href="barcode.php">Barcode</a></li>
                    <li><a href="scanningbr.php">Scanner</a></li>
                </ul>
            </li>
            <li class="nav-label">Reports</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-044-file"></i>
                    <span class="nav-text">Manage Report</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="asset_report.php">Asset Report</a></li>
                    <li><a href="assigned_report.php">Assigned Report</a></li>
                    <li><a href="count_report.php">Count Report</a></li>
                    <li><a href="damage_report.php">Damage Report</a></li>
                </ul>
            </li>
            <li class="nav-label">Assigned Asset for User</li>
            <li><a href="view_assigned.php" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-053-heart"></i>
                    <span class="nav-text">Assigned View</span>
                </a>
            </li>

        </ul>        
        <?php } ?>
        <?php
        }
        ?>

        <!-- END ACCOUNTING ACCESS ROLE -->
        <div class="copyright">
            <p><strong>FILIPINAS MULTI-LINE CORP.</strong></p>
            <p>"To Server More Customers Better Faster and At Less Cost <?php echo $_SESSION['id']; ?>"</p>
        </div>
        <!--**********************************
           Menu END
        ***********************************-->
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->