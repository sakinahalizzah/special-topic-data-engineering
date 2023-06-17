<?php 
include ('dbconnect.php');

if(isset($_GET['id']))
{
    $mid=$_GET['id'];
}

$sql="SELECT * FROM tb_month 
    LEFT JOIN tb_product ON tb_month.m_product = tb_product.p_id
    LEFT JOIN tb_activity ON tb_month.m_activity = tb_activity.a_id
    LEFT JOIN tb_unit ON tb_month.m_unit = tb_unit.t_id	
    WHERE m_id = '$mid'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>STATICIP</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-plug"></i>
                </div>
                <div class="sidebar-brand-text mx-3">STATICIP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Table
            </div>

            <li class="nav-item">
                <a class="nav-link" href="activity.php">
                    <i class="fas fa-atom"></i>
                    <span>Activity</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="product.php">
                    <i class="fas fa-database"></i>
                    <span>Product</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="month.php">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Monthly</span></a>
            </li>
            
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="year.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Yearly</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar title -->
                    <div style="text-align: center;">
                        <span> Malaysia Energy Consumption Analysis </span>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Monthly Data</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit</h6>
                        </div>
                        <div class="card-body">

                        <div class="form-group col-lg-12">
                        <form action="m_editprocess.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
								<label for="inputmid" class="form-label">ID</label>
								<?php
                                echo '<input class="form-control" type="text" name="mid" id="inputmid" value="'.$row['m_id'].'" readonly>'; 
                                ?>
							</div>

                            <div class="form-group">
                                <label for="inputmperiod" class="form-label">Period</label>
                                <?php
                                echo '<input class="form-control" type="text" name="mperiod" id="inputmperiod" value="'.$row['m_period'].'">'; 
                                ?>
                            </div>

                            <div class="form-group">
								<label for="inputpname" class="form-label">Product</label>
								<?php
                                echo '<input class="form-control" type="text" name="pname" id="inputpname" value="'.$row['p_name'].'" readonly>'; 
                                ?>
							</div>

                            <div class="form-group">
								<label for="inputaname" class="form-label">Activity</label>
								<?php
                                echo '<input class="form-control" type="text" name="aname" id="inputaname" value="'.$row['a_name'].'" readonly>'; 
                                ?>
							</div>

                            <div class="form-group">
                                <label for="inputvmodel" class="form-label">Value</label>
                                <?php
                                echo '<input class="form-control" type="text" name="mvalue" id="inputmvalue" value="'.$row['m_value'].'">'; 
                                ?>
                            </div>

                            <div class="form-group">
								<label for="inputtdesc" class="form-label">Unit</label>
								<?php
                                echo '<input class="form-control" type="text" name="tdesc" id="inputtdesc" value="'.$row['t_desc'].'" readonly>'; 
                                ?>
							</div>

                            <div class="col-md-12">
                                <div class="form-group"><br>
                                    <button class="btn btn-primary" name="submit" type="submit">Edit</button>&nbsp&nbsp&nbsp
                                    <button class="btn btn-danger" href="month.php">Cancel</button>
								</div>
							</div>
                        </form>
                        </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; StaticIP 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>