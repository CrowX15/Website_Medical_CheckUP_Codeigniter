<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= esc($title) ?></h1>
        <?php if (hasMenuAccess('Laboratorium', 'create')): ?>
            <a href="<?= base_url('Laboratorium/create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Hasil Laboratorium
            </a>
        <?php endif; ?>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Pencarian -->
    <form action="<?= base_url('Laboratorium') ?>" method="get" class="mb-3">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Cari hasil laboratorium..." value="<?= esc($keyword) ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Tabel Data Hasil Laboratorium -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No. RM</th>
                            <th>Nama Pasien</th>
                            <th>Tipe Pemeriksaan</th>
                            <th>Hasil Laboratorium</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hasil_lab as $item): ?>
                            <tr>
                                <td><?= esc($item['no_rm']) ?></td>
                                <td><?= esc($item['nama']) ?></td>
                                <td><?= esc($item['tipeperiksa_lab']) ?></td>
                                <td><?= esc($item['hasil_lab']) ?></td>
                                <td><?= esc($item['biaya']) ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <?php if (hasMenuAccess('Laboratorium', 'edit')): ?>
                                            <a href="<?= base_url('Laboratorium/edit/' . $item['no_rm']) ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit    
                                            </a>
                                        <?php endif; ?>
                                        <?php if (hasMenuAccess('Laboratorium', 'delete')): ?>
                                            <form action="<?= base_url('Laboratorium/delete/' . $item['no_rm']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= ($currentPage == $i) ? 'active' : '' ?>">
                                <a class="page-link" href="<?= base_url('Laboratorium?keyword=' . esc($keyword) . '&page=' . $i) ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
