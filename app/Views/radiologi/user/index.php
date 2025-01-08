<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= esc($title) ?></h1>
        <?php if (hasMenuAccess('radiologi', 'create')): ?>
            <a href="<?= base_url('radiologi/create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Hasil Radiologi
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

    <form action="<?= base_url('radiologi') ?>" method="get" class="mb-3">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Cari hasil radiologi..." value="<?= esc($keyword) ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                <?php if (!empty($keyword)): ?>
                    <a href="<?= base_url('radiologi') ?>" class="btn btn-secondary">
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
                            <th>No RM</th>
                            <th>Nama Pasien</th>
                            <th>Tipe Pemeriksaan</th>
                            <th>Hasil Radiologi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hasil_rad as $item): ?>
                            <tr>
                                <td><?= esc($item['no_rm']) ?></td>
                                <td><?= esc($item['nama']) ?></td>
                                <td><?= esc($item['tipeperiksa_rad']) ?></td>
                                <td><?= esc($item['hasil_rad']) ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <?php if (hasMenuAccess('radiologi', 'update')): ?>
                                            <a href="<?= base_url('radiologi/edit/' . $item['no_rm']) ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        <?php endif; ?>
                                        <?php if (hasMenuAccess('radiologi', 'delete')): ?>
                                            <form action="<?= base_url('radiologi/delete/' . $item['no_rm']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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
                                <a class="page-link" href="<?= base_url('radiologi?keyword=' . esc($keyword) . '&page=' . $page) ?>">
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
