<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Tipe Pemeriksaan Laboratorium</h1>
        <a href="<?= base_url('laboratorium/masterlab') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('laboratorium/masterlab/create') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>Tipe Pemeriksaan</label>
                    <input type="text" name="tipeperiksa_lab" class="form-control <?= ($validation->hasError('tipeperiksa_lab')) ? 'is-invalid' : '' ?>" value="<?= old('tipeperiksa_lab') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tipeperiksa_lab') ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
