<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>


<style>
    .card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }
</style>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pemeriksaan Fisik</h1>
        <?php if(hasMenuAccess('pemeriksaan', 'create')): ?>
        <a href="<?= base_url('periksa/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pemeriksaan
        </a>
        <?php endif; ?>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('periksa') ?>" method="get" class="mb-3">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Cari pemeriksaan..." 
                   value="<?= $keyword ?? '' ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
                <?php if(!empty($keyword)): ?>
                    <a href="<?= base_url('periksa') ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <div class="row">
        <?php foreach($periksa as $p): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">No. RM: <?= esc($p['no_rm']) ?></h5>
                    <p class="card-text"><strong>Nama Pasien:</strong> <?= esc($p['nama']) ?></p>
                    <p class="card-text"><strong>Tinggi Badan:</strong> <?= esc($p['tinggi_badan']) ?> cm</p>
                    <p class="card-text"><strong>Berat Badan:</strong> <?= esc($p['berat_badan']) ?> kg</p>
                    <p class="card-text"><strong>Nadi:</strong> <?= esc($p['nadi']) ?></p>
                    <p class="card-text"><strong>Tekanan Darah:</strong> <?= esc($p['tekanan_darah']) ?></p>
                    <div class="btn-group" role="group">
                        <a href="<?= base_url('periksa/edit/'.$p['no_rm']) ?>" class="btn btn-warning btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?= $p['no_rm'] ?>">
                            Detail
                        </button>
                        <form action="<?= base_url('periksa/delete/'.$p['no_rm']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal untuk detail -->
        <div class="modal fade" id="detailModal<?= $p['no_rm'] ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?= $p['no_rm'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel<?= $p['no_rm'] ?>">Detail Pemeriksaan - No. RM <?= esc($p['no_rm']) ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Nama Pasien:</strong> <?= esc($p['nama']) ?></p>
                        <p><strong>Batuk Darah:</strong> <?= esc($p['batuk_darah']) ?></p>
                        <p><strong>Kencing Batu:</strong> <?= esc($p['kencing_batu']) ?></p>
                        <p><strong>Hepatitis:</strong> <?= esc($p['hepatitis']) ?></p>
                        <p><strong>Hernia:</strong> <?= esc($p['hernia']) ?></p>
                        <p><strong>Hipertensi:</strong> <?= esc($p['hipertensi']) ?></p>
                        <p><strong>Hemoroid:</strong> <?= esc($p['hemoroid']) ?></p>
                        <p><strong>Diabetes:</strong> <?= esc($p['diabetes']) ?></p>
                        <p><strong>Visus:</strong> <?= esc($p['visus']) ?></p>
                        <p><strong>Buta Warna:</strong> <?= esc($p['buta_warna']) ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <?php if($totalPages > 1): ?>
    <nav>
        <ul class="pagination justify-content-center">
            <?php for($page = 1; $page <= $totalPages; $page++): ?>
                <li class="page-item <?= ($currentPage == $page) ? 'active' : '' ?>">
                    <a class="page-link" 
                       href="<?= base_url('periksa?keyword='.$keyword.'&page='.$page) ?>">
                       <?= $page ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
