<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Tipe Pemeriksaan Radiologi</h1>
        <a href="<?= base_url('radiologi/masterrad') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('radiologi/masterrad/edit/' . $tipe_periksa['id_tipeperiksa_rad']) ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>Tipe Pemeriksaan</label>
                    <input type="text" name="tipeperiksa_rad" class="form-control <?= (isset($validation) && $validation->hasError('tipeperiksa_rad')) ? 'is-invalid' : '' ?>" value="<?= esc($tipe_periksa['tipeperiksa_rad']) ?>">
                    <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('tipeperiksa_rad') : '' ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
