<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Dashboard 
            <?php
            switch($role_id) {
                case 1: echo "Admin SIRS"; break;
                case 2: echo "Loket"; break;
                case 3: echo "Dokter"; break;
                case 4: echo "User Laboratorium"; break;
                case 5: echo "Admin Laboratorium"; break;
                case 6: echo "User Radiologi"; break;
                case 7: echo "Admin Radiologi"; break;
                default: echo "User";
            }
            ?>
        </h1>
    </div>

<!-- Welcome Card -->
<div class="row">
        <div class="col-xl-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Selamat Datang, <?= $nama_lengkap ?>!
                            </div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <?= $username ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Role-specific Content -->
    <?php if($role_id == 1): // Admin SIRS ?>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Pasien</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">215</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tambahkan card statistik lainnya untuk Admin -->
        </div>
    <?php endif; ?>

    <?php if($role_id == 2): // Loket ?>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Pendaftaran Hari Ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>