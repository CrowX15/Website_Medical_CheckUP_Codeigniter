<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Hasil Laboratorium</h1>
        <a href="<?= base_url('laboratorium') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('laboratorium/edit/' . $hasil_lab['no_rm']) ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>No. RM</label>
                    <input type="text" name="no_rm" class="form-control" value="<?= esc($hasil_lab['no_rm']) ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Tipe Pemeriksaan</label>
                    <select name="id_tipeperiksa_lab" class="form-control">
                        <option value="<?= $hasil_lab['id_tipeperiksa_lab'] ?>"><?= $hasil_lab['tipeperiksa_lab'] ?></option>
                        <?php foreach ($tipe_periksa as $tipe): ?>
                            <option value="<?= $tipe['id_tipeperiksa_lab'] ?>"><?= $tipe['tipeperiksa_lab'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Hasil Laboratorium</label>
                    <input type="text" name="hasil_lab" class="form-control <?= (isset($validation) && $validation->hasError('hasil_lab')) ? 'is-invalid' : '' ?>" value="<?= esc($hasil_lab['hasil_lab']) ?>">
                    <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('hasil_lab') : '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Biaya</label>
                    <input type="text" name="biaya" class="form-control <?= (isset($validation) && $validation->hasError('biaya')) ? 'is-invalid' : '' ?>" value="<?= esc($hasil_lab['biaya']) ?>">
                    <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('biaya') : '' ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
