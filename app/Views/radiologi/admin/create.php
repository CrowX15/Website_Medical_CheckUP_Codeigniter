<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Tipe Pemeriksaan Radiologi</h1>
        <a href="<?= base_url('radiologi/masterrad') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('radiologi/masterrad/create') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>Tipe Pemeriksaan</label>
                    <input type="text" name="tipeperiksa_rad" class="form-control <?= ($validation->hasError('tipeperiksa_rad')) ? 'is-invalid' : '' ?>" value="<?= old('tipeperiksa_rad') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tipeperiksa_rad') ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
