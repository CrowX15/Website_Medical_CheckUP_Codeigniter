<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->include('layouts/header') ?>
</head>
<body id="page-top">
    <div id="wrapper">
        <?= $this->include('layouts/sidebar') ?>
        
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?= $this->include('layouts/topbar') ?>
                
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?= $this->include('layouts/logout_modal') ?>
    <?= $this->include('layouts/scripts') ?>
</body>
</html>
