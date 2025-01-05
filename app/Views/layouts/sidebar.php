<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('asset/img/mini_logo_fakultas.png') ?>" alt="Logo Medical" style="width: 50px; height: 50px;">
        </div>
        <div class="sidebar-brand-text mx-3">Medical Check Up</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard Sesuai Role -->
    <?php 
    $dashboardLink = '';
    switch (session()->get('role_id')) {
        case 1: $dashboardLink = 'admin/dashboard'; break;
        case 2: $dashboardLink = 'loket/dashboard'; break;
        case 3: $dashboardLink = 'dokter/dashboard'; break;
        case 4: $dashboardLink = 'laboratorium/dashboard'; break;
        case 5: $dashboardLink = 'admin-lab/dashboard'; break;
        case 6: $dashboardLink = 'radiologi/dashboard'; break;
        case 7: $dashboardLink = 'admin-rad/dashboard'; break;
        default: $dashboardLink = 'dashboard'; // Fallback untuk role tidak dikenali
    }
    ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url($dashboardLink) ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Menu Sesuai Role -->
    <?php switch (session()->get('role_id')): 
        case 1: // Admin SIRS ?>
            <div class="sidebar-heading">
                Pasien
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pasien') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pasien</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dokter/pemeriksaan') ?>">
                    <i class="fas fa-fw fa-stethoscope"></i>
                    <span>Pemeriksaan Fisik</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dokter/kesimpulan') ?>">
                    <i class="fas fa-fw fa-file-medical"></i>
                    <span>Kesimpulan Medis</span>
                </a>
            </li>
            <div class="sidebar-heading">
                Laboratorium
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('laboratorium/hasil') ?>">
                    <i class="fas fa-fw fa-flask"></i>
                    <span>Hasil Lab</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin-lab/master-lab') ?>">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Master Lab</span>
                </a>
            </li>
            <div class="sidebar-heading">
                Radiologi
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('radiologi/hasil') ?>">
                    <i class="fas fa-fw fa-x-ray"></i>
                    <span>Hasil Radiologi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin-rad/master-rad') ?>">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Master Radiologi</span>
                </a>
            </li>
            <div class="sidebar-heading">
                Admin Area
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/users') ?>">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Manajemen User</span>
                </a>
            </li>
            <?php break; 
        
        case 2: // Loket ?>
            <div class="sidebar-heading">
                Pasien
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('loket/pasien') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pasien</span>
                </a>
            </li>
            <?php break;

        case 3: // Dokter ?>
            <div class="sidebar-heading">
                Pasien
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dokter/pemeriksaan') ?>">
                    <i class="fas fa-fw fa-stethoscope"></i>
                    <span>Pemeriksaan Fisik</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dokter/kesimpulan') ?>">
                    <i class="fas fa-fw fa-file-medical"></i>
                    <span>Kesimpulan Medis</span>
                </a>
            </li>
            <?php break;

        case 4: // Laboratorium ?>
            <div class="sidebar-heading">
                Laboratorium
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('laboratorium/hasil') ?>">
                    <i class="fas fa-fw fa-flask"></i>
                    <span>Hasil Lab</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin-lab/master-lab') ?>">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Master Lab</span>
                </a>
            </li>
            <?php break;

        case 5: // Admin Lab ?>
            <div class="sidebar-heading">
                Laboratorium
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('laboratorium/hasil') ?>">
                    <i class="fas fa-fw fa-flask"></i>
                    <span>Hasil Lab</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin-lab/master-lab') ?>">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Master Lab</span>
                </a>
            </li>
            <?php break;

        case 6: // Radiologi ?>
            <div class="sidebar-heading">
                Radiologi
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('radiologi/hasil') ?>">
                    <i class="fas fa-fw fa-x-ray"></i>
                    <span>Hasil Radiologi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin-rad/master-rad') ?>">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Master Radiologi</span>
                </a>
            </li>
            <?php break;

        case 7: // Admin Radiologi ?>
            <div class="sidebar-heading">
                Radiologi
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('radiologi/hasil') ?>">
                    <i class="fas fa-fw fa-x-ray"></i>
                    <span>Hasil Radiologi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin-rad/master-rad') ?>">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Master Radiologi</span>
                </a>
            </li>
            <?php break;

        default: ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-exclamation-circle"></i>
                    <span>Akses Tidak Dikenali</span>
                </a>
            </li>
    <?php endswitch; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
