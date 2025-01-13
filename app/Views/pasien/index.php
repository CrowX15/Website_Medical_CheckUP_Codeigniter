<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pasien</h1>
        <?php if(hasMenuAccess('Pasien', 'create')): ?>
        <a href="<?= base_url('Pasien/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pasien
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

    <!-- Search Form -->
    <form action="<?= base_url('Pasien') ?>" method="get" class="mb-3">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Cari pasien..." 
                   value="<?= $keyword ?? '' ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
                <?php if(!empty($keyword)): ?>
                    <a href="<?= base_url('Pasien') ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. RM</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Perusahaan</th>
                            <th>Departemen</th>
                            <th>Bagian</th>
                            <th>Usia</th>
                            <th>Tanggal MCU</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pasien as $p): ?>
                        <tr>
                            
                            <td><?= $p['no_rm'] ?></td>
                            <td><?= $p['nama'] ?></td>
                            <td><?= $p['nik'] ?></td>
                            <td><?= $p['perusahaan'] ?></td>
                            <td><?= $p['departemen'] ?></td>
                            <td><?= $p['bagian'] ?></td>
                            <td><?= $p['usia'] ?></td>
                            <td><?= date('d/m/Y', strtotime($p['tgl_mcu'])) ?></td>

                            <td>
                                <div class="btn-group" role="group">
                                    <?php if(hasMenuAccess('Pasien', 'edit')): ?>
                                    <a href="<?= base_url('Pasien/edit/'.$p['no_rm']) ?>" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php endif; ?>
                                    <?php if(hasMenuAccess('Pasien', 'delete')): ?>
                                    <form action="<?= base_url('Pasien/delete/'.$p['no_rm']) ?>" 
                                          method="post" class="d-inline" 
                                          onsubmit="return confirm('Yakin hapus data ini?')">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
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
            <?php if($totalPages > 1): ?>
            <nav>
                <ul class="pagination justify-content-center">
                    <?php for($page = 1; $page <= $totalPages; $page++): ?>
                        <li class="page-item <?= ($currentPage == $page) ? 'active' : '' ?>">
                            <a class="page-link" 
                               href="<?= base_url('Pasien?keyword='.$keyword.'&page='.$page) ?>">
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
