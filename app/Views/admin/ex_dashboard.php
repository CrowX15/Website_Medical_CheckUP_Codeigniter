<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Medical Check Up </title>

    <!-- Custom fonts for this template-->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="<?php echo base_url('tamplate/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url('tamplate/css/sb-admin-2.min.css'); ?>" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <img src="<?php echo base_url('asset/img/mini_logo_fakultas.png'); ?>" alt="Logo Medical" 
                        style="width: 50px; height: 50px;  ">
                </div>
                <div class="sidebar-brand-text mx-3">Medical Check Up</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pasien
            </div>
             <!-- Nav Item - Charts -->
             <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Pasien</span></a>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-stethoscope"></i>
                    <span>Periksa</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Kesimpulan</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                LABORATOTIUM
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-flask   "></i>
                    <span>Laboratorium</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-microscope"></i>
                    <span>Master Laboratorium</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                RADIOLOGI
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-scroll  "></i>
                    <span>Radiologi</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-bone"></i>
                    <span>Master Radiologi</span></a>
            </li>
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


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> (nama user ketika login akan di tampilkan) </span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url('tamplate/img/undraw_profile_2.svg'); ?>" >
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                    <!-- Content Row -->
                    <div style="width: 1000px; margin: 0 auto;">
                        <!-- Content Column -->
                        <div style="margin-bottom: 20px;">
                            <!-- Approach -->
                            <div class="card">
                                <div class="card-body">
                                    <h5>
                                        Selamat datang (nama user) di Aplikasi Medical Check Up.
                                    </h5>
                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika Anda ingin mengakhiri sesi ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->    
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="<?php echo base_url('tamplate/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('tamplate/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->
    <script src="<?php echo base_url('tamplate/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <!-- <script src="js/sb-admin-2.min.js"></script> -->
    <script src="<?php echo base_url('tamplate/js/sb-admin-2.min.js'); ?>"></script>

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->
    <script src="<?php echo base_url('tamplate/vendor/chart.js/Chart.min.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->
    <script src="<?php echo base_url('tamplate/js/demo/chart-area-demo.js'); ?>"></script>
    <script src="<?php echo base_url('tamplate/js/demo/chart-pie-demo.js'); ?>"></script>

</body>

</html>