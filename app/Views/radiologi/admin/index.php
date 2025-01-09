<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= esc($title) ?></h1>
        <?php if (hasMenuAccess('MasterRad', 'create')): ?>
            <a href="<?= base_url('MasterRad/create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Tipe Pemeriksaan
            </a>
        <?php endif; ?>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('MasterRad') ?>" method="get" class="mb-3">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Cari tipe pemeriksaan..." value="<?= esc($keyword) ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                <?php if (!empty($keyword)): ?>
                    <a href="<?= base_url('MasterRad') ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipe Pemeriksaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tipe_periksa as $item): ?>
                            <tr>
                                <td><?= esc($item['id_tipeperiksa_rad']) ?></td>
                                <td><?= esc($item['tipeperiksa_rad']) ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <?php if (hasMenuAccess('MasterRad', 'edit')): ?>
                                            <a href="<?= base_url('MasterRad/edit/' . $item['id_tipeperiksa_rad']) ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        <?php endif; ?>
                                        <?php if (hasMenuAccess('MasterRad', 'delete')): ?>
                                            <form action="<?= base_url('MasterRad/delete/' . $item['id_tipeperiksa_rad']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
                <nav>
                    <ul class="pagination justify-content-center">
                        <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                            <li class="page-item <?= ($currentPage == $page) ? 'active' : '' ?>">
                                <a class="page-link" href="<?= base_url('MasterRad?keyword=' . esc($keyword) . '&page=' . $page) ?>">
                                    <?= $page ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
