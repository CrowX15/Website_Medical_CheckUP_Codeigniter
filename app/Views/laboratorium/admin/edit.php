<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Tipe Pemeriksaan Laboratorium</h1>
        <a href="<?= base_url('MasterLab') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('MasterLab/update/' . $tipe_periksa['id_tipeperiksa_lab']) ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>Tipe Pemeriksaan</label>
                    <input type="text" name="tipeperiksa_lab" class="form-control <?= (isset($validation) && $validation->hasError('tipeperiksa_lab')) ? 'is-invalid' : '' ?>" value="<?= esc($tipe_periksa['tipeperiksa_lab']) ?>">
                    <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('tipeperiksa_lab') : '' ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
