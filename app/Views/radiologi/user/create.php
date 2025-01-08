<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Hasil Radiologi</h1>
        <a href="<?= base_url('radiologi') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('radiologi/create') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>No RM</label>
                    <select name="no_rm" class="form-control <?= ($validation->hasError('no_rm')) ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Pasien</option>
                        <?php foreach ($pasien as $p): ?>
                            <option value="<?= esc($p['no_rm']) ?>" <?= old('no_rm') == esc($p['no_rm']) ? 'selected' : '' ?>><?= esc($p['nama']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_rm') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Tipe Pemeriksaan</label>
                    <select name="id_tipeperiksa_rad" class="form-control <?= ($validation->hasError('id_tipeperiksa_rad')) ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Tipe Pemeriksaan</option>
                        <?php foreach ($tipe_periksa as $tp): ?>
                            <option value="<?= esc($tp['id_tipeperiksa_rad']) ?>" <?= old('id_tipeperiksa_rad') == esc($tp['id_tipeperiksa_rad']) ? 'selected' : '' ?>><?= esc($tp['tipeperiksa_rad']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('id_tipeperiksa_rad') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Hasil Radiologi</label>
                    <textarea name="hasil_rad" class="form-control <?= ($validation->hasError('hasil_rad')) ? 'is-invalid' : '' ?>"><?= old('hasil_rad') ?></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('hasil_rad') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Kesimpulan</label>
                    <textarea name="kesimpulan" class="form-control"><?= old('kesimpulan') ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
