<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Hasil Laboratorium</h1>
        <a href="<?= base_url('laboratorium') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('laboratorium/create') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>No. RM</label>
                    <input type="text" name="no_rm" class="form-control <?= ($validation->hasError('no_rm')) ? 'is-invalid' : '' ?>" value="<?= old('no_rm') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_rm') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Tipe Pemeriksaan</label>
                    <select name="id_tipeperiksa_lab" class="form-control <?= ($validation->hasError('id_tipeperiksa_lab')) ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Tipe Pemeriksaan</option>
                        <?php foreach ($tipe_periksa as $tipe): ?>
                            <option value="<?= $tipe['id_tipeperiksa_lab'] ?>"><?= $tipe['tipeperiksa_lab'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('id_tipeperiksa_lab') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Hasil Laboratorium</label>
                    <input type="text" name="hasil_lab" class="form-control <?= ($validation->hasError('hasil_lab')) ? 'is-invalid' : '' ?>" value="<?= old('hasil_lab') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('hasil_lab') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Biaya</label>
                    <input type="text" name="biaya" class="form-control <?= ($validation->hasError('biaya')) ? 'is-invalid' : '' ?>" value="<?= old('biaya') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('biaya') ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
