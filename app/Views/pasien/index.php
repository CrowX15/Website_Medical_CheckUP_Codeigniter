<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pasien</h1>
        <?php if(hasMenuAccess('pasien', 'create')): ?>
        <a href="<?= base_url('pasien/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <a href="<?= base_url('pasien/detail/'.$p['no_rm']) ?>" 
                                       class="btn btn-info btn-sm" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <?php if(hasMenuAccess('pasien', 'edit')): ?>
                                    <a href="<?= base_url('pasien/edit/'.$p['no_rm']) ?>" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php endif; ?>
                                    <?php if(hasMenuAccess('pasien', 'delete')): ?>
                                    <form action="<?= base_url('pasien/delete/'.$p['no_rm']) ?>" 
                                          method="post" class="d-inline" 
                                          onsubmit="return confirm('Yakin hapus data ini?')">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
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
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>
<?= $this->endSection() ?>
