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
        <h1 class="h3 mb-0 text-gray-800">Data Kesimpulan Pemeriksaan</h1>
        <?php if(hasMenuAccess('kesimpulan', 'create')): ?>
        <a href="<?= base_url('kesimpulan/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kesimpulan
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

    <form action="<?= base_url('kesimpulan') ?>" method="get" class="mb-3">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Cari kesimpulan..." 
                   value="<?= $keyword ?? '' ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
                <?php if(!empty($keyword)): ?>
                    <a href="<?= base_url('kesimpulan') ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <div class="row">
        <?php foreach($kesimpulan as $k): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">No. RM: <?= esc($k['no_rm']) ?></h5>
                    <p class="card-text"><strong>Nama Pasien:</strong> <?= esc($k['nama']) ?></p>
                    <p class="card-text"><strong>Pemeriksaan Fisik:</strong> <?= esc($k['pemeriksaan_fisik']) ?></p>
                    <p class="card-text"><strong>Thorax:</strong> <?= esc($k['thorax']) ?></p>
                    <div class="btn-group" role="group">
                        <?php if(hasMenuAccess('kesimpulan', 'edit')): ?>
                        <a href="<?= base_url('kesimpulan/edit/'.$k['no_rm']) ?>" class="btn btn-warning btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?= $k['no_rm'] ?>">
                            Detail
                        </button>
                        <?php if(hasMenuAccess('kesimpulan', 'delete')): ?>
                        <form action="<?= base_url('kesimpulan/delete/'.$k['no_rm']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal untuk detail -->
        <div class="modal fade" id="detailModal<?= $k['no_rm'] ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?= $k['no_rm'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel<?= $k['no_rm'] ?>">Detail Kesimpulan - No. RM <?= esc($k['no_rm']) ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Pemeriksaan Fisik:</strong> <?= esc($k['pemeriksaan_fisik']) ?></p>
                        <p><strong>Thorax:</strong> <?= esc($k['thorax']) ?></p>
                        <p><strong>Laboratorium:</strong> <?= esc($k['laboratorium']) ?></p>
                        <p><strong>Saran:</strong> <?= esc($k['saran']) ?></p>
                        <p><strong>IMT:</strong> <?= esc($k['imt']) ?></p>
                        <p><strong>Tatalaksana:</strong> <?= esc($k['tatalaksana']) ?></p>
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
                       href="<?= base_url('kesimpulan?keyword='.$keyword.'&page='.$page) ?>">
                       <?= $page ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
