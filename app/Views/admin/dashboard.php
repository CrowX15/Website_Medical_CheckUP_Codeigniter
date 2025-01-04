<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div style="width: 1000px; margin: 0 auto;">
    <div style="margin-bottom: 20px;">
        <div class="card">
            <div class="card-body">
                <h5>Selamat datang <?= $nama_lengkap ?> di Aplikasi Medical Check Up.</h5>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>