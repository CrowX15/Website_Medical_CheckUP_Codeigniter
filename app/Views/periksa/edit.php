<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Pemeriksaan Fisik</h1>
        <a href="<?= base_url('periksa') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('periksa/edit/' . $periksa['no_rm']) ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="form-group">
                    <label>No. RM</label>
                    <input type="text" name="no_rm" class="form-control" 
                           value="<?= esc($periksa['no_rm']) ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Batuk Darah</label>
                    <input type="text" name="batuk_darah" class="form-control" value="<?= esc($periksa['batuk_darah']) ?>">
                </div>

                <div class="form-group">
                    <label>Kencing Batu</label>
                    <input type="text" name="kencing_batu" class="form-control" value="<?= esc($periksa['kencing_batu']) ?>">
                </div>

                <div class="form-group">
                    <label>Hepatitis</label>
                    <input type="text" name="hepatitis" class="form-control" value="<?= esc($periksa['hepatitis']) ?>">
                </div>

                <div class="form-group">
                    <label>Hernia</label>
                    <input type="text" name="hernia" class="form-control" value="<?= esc($periksa['hernia']) ?>">
                </div>

                <div class="form-group">
                    <label>Hipertensi</label>
                    <input type="text" name="hipertensi" class="form-control" value="<?= esc($periksa['hipertensi']) ?>">
                </div>

                <div class="form-group">
                    <label>Hemoroid</label>
                    <input type="text" name="hemoroid" class="form-control" value="<?= esc($periksa['hemoroid']) ?>">
                </div>

                <div class="form-group">
                    <label>Diabetes</label>
                    <input type="text" name="diabetes" class="form-control" value="<?= esc($periksa['diabetes']) ?>">
                </div>

                <div class="form-group">
                    <label>Tinggi Badan</label>
                    <input type="text" name="tinggi_badan" class="form-control <?= (isset($validation) && $validation->hasError('tinggi_badan')) ? 'is-invalid' : '' ?>" 
                           value="<?= esc($periksa['tinggi_badan']) ?>">
                    <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('tinggi_badan') : '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Berat Badan</label>
                    <input type="text" name="berat_badan" class="form-control <?= (isset($validation) && $validation->hasError('berat_badan')) ? 'is-invalid' : '' ?>" 
                           value="<?= esc($periksa['berat_badan']) ?>">
                    <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('berat_badan') : '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nadi</label>
                    <input type="text" name="nadi" class="form-control <?= (isset($validation) && $validation->hasError('nadi')) ? 'is-invalid' : '' ?>" 
                           value="<?= esc($periksa['nadi']) ?>">
                    <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('nadi') : '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Tekanan Darah</label>
                    <input type="text" name="tekanan_darah" class="form-control <?= (isset($validation) && $validation->hasError('tekanan_darah')) ? 'is-invalid' : '' ?>" 
                           value="<?= esc($periksa['tekanan_darah']) ?>">
                    <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('tekanan_darah') : '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Visus</label>
                    <input type="text" name="visus" class="form-control" value="<?= esc($periksa['visus']) ?>">
                </div>

                <div class="form-group">
                    <label>Buta Warna</label>
                    <input type="text" name="buta_warna" class="form-control" value="<?= esc($periksa['buta_warna']) ?>">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
