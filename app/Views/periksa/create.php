<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Pemeriksaan Fisik</h1>
        <a href="<?= base_url('Periksa') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('Periksa/create') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="form-group">
                    <label>No. RM</label>
                    <select name="no_rm" class="form-control <?= ($validation->hasError('no_rm')) ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Pasien</option>
                        <?php foreach ($pasien as $p): ?>
                            <option value="<?= esc($p['no_rm']) ?>" <?= old('no_rm') == esc($p['no_rm']) ? 'selected' : '' ?>>
                                <?= esc($p['nama']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_rm') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Batuk Darah</label>
                    <input type="text" name="batuk_darah" class="form-control" value="<?= old('batuk_darah') ?>">
                </div>

                <div class="form-group">
                    <label>Kencing Batu</label>
                    <input type="text" name="kencing_batu" class="form-control" value="<?= old('kencing_batu') ?>">
                </div>

                <div class="form-group">
                    <label>Hepatitis</label>
                    <input type="text" name="hepatitis" class="form-control" value="<?= old('hepatitis') ?>">
                </div>

                <div class="form-group">
                    <label>Hernia</label>
                    <input type="text" name="hernia" class="form-control" value="<?= old('hernia') ?>">
                </div>

                <div class="form-group">
                    <label>Hipertensi</label>
                    <input type="text" name="hipertensi" class="form-control" value="<?= old('hipertensi') ?>">
                </div>

                <div class="form-group">
                    <label>Hemoroid</label>
                    <input type="text" name="hemoroid" class="form-control" value="<?= old('hemoroid') ?>">
                </div>

                <div class="form-group">
                    <label>Diabetes</label>
                    <input type="text" name="diabetes" class="form-control" value="<?= old('diabetes') ?>">
                </div>

                <div class="form-group">
                    <label>Tinggi Badan</label>
                    <input type="text" name="tinggi_badan" class="form-control <?= ($validation->hasError('tinggi_badan')) ? 'is-invalid' : '' ?>" 
                           value="<?= old('tinggi_badan') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tinggi_badan') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Berat Badan</label>
                    <input type="text" name="berat_badan" class="form-control <?= ($validation->hasError('berat_badan')) ? 'is-invalid' : '' ?>" 
                           value="<?= old('berat_badan') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('berat_badan') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nadi</label>
                    <input type="text" name="nadi" class="form-control <?= ($validation->hasError('nadi')) ? 'is-invalid' : '' ?>" 
                           value="<?= old('nadi') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nadi') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Tekanan Darah</label>
                    <input type="text" name="tekanan_darah" class="form-control <?= ($validation->hasError('tekanan_darah')) ? 'is-invalid' : '' ?>" 
                           value="<?= old('tekanan_darah') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tekanan_darah') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Visus</label>
                    <input type="text" name="visus" class="form-control" value="<?= old('visus') ?>">
                </div>

                <div class="form-group">
                    <label>Buta Warna</label>
                    <input type="text" name="buta_warna" class="form-control" value="<?= old('buta_warna') ?>">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
