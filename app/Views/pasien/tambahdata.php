<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Pasien</h1>
        <a href="<?= base_url('pasien') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('pasien/create') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="form-group">
                    <label>No. RM</label>
                    <input type="text" name="no_rm" class="form-control <?= ($validation->hasError('no_rm')) ? 'is-invalid' : '' ?>" 
                           value="<?= old('no_rm') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_rm') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Pasien</label>
                    <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>"
                           value="<?= old('nama') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '' ?>"
                           value="<?= old('nik') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nik') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Perusahaan</label>
                    <input type="text" name="perusahaan" class="form-control" value="<?= old('perusahaan') ?>">
                </div>

                <div class="form-group">
                    <label>Departemen</label>
                    <input type="text" name="departemen" class="form-control" value="<?= old('departemen') ?>">
                </div>

                <div class="form-group">
                    <label>Bagian</label>
                    <input type="text" name="bagian" class="form-control" value="<?= old('bagian') ?>">
                </div>

                <div class="form-group">
                    <label>Usia</label>
                    <input type="number" name="usia" class="form-control" value="<?= old('usia') ?>">
                </div>

                <div class="form-group">
                    <label>Tanggal MCU</label>
                    <input type="date" name="tgl_mcu" class="form-control" value="<?= old('tgl_mcu') ?>">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
