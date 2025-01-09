<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Hasil Radiologi</h1>
        <a href="<?= base_url('Radiologi') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('Radiologi/edit/' . $hasil_rad['no_rm']) ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>No RM</label>
                    <input type="text" class="form-control" value="<?= esc($hasil_rad['no_rm']) ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Tipe Pemeriksaan</label>
                    <input type="text" class="form-control" value="<?= esc($hasil_rad['id_tipeperiksa_rad']) ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Hasil Radiologi</label>
                    <textarea name="hasil_rad" class="form-control <?= (isset($validation) && $validation->hasError('hasil_rad')) ? 'is-invalid' : '' ?>"><?= esc($hasil_rad['hasil_rad']) ?></textarea>
                    <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('hasil_rad') : '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Kesimpulan</label>
                    <textarea name="kesimpulan" class="form-control"><?= esc($hasil_rad['kesimpulan']) ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
