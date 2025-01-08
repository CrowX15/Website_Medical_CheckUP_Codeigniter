<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Kesimpulan Pemeriksaan</h1>
        <a href="<?= base_url('kesimpulan') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('kesimpulan/edit/' . $kesimpulan['no_rm']) ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="form-group">
                    <label>No. RM</label>
                    <input type="text" name="no_rm" class="form-control" 
                           value="<?= esc($kesimpulan['no_rm']) ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Pemeriksaan Fisik</label>
                    <input type="text" name="pemeriksaan_fisik" class="form-control <?= (isset($validation) && $validation->hasError('pemeriksaan_fisik')) ? 'is-invalid' : '' ?>" 
                           value="<?= esc($kesimpulan['pemeriksaan_fisik']) ?>">
                    <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('pemeriksaan_fisik') : '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Thorax</label>
                    <input type="text" name="thorax" class="form-control <?= (isset($validation) && $validation->hasError('thorax')) ? 'is-invalid' : '' ?>" 
                           value="<?= esc($kesimpulan['thorax']) ?>">
                    <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('thorax') : '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Laboratorium</label>
                    <input type="text" name="laboratorium" class="form-control <?= (isset($validation) && $validation->hasError('laboratorium')) ? 'is-invalid' : '' ?>" 
                           value="<?= esc($kesimpulan['laboratorium']) ?>">
                    <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('laboratorium') : '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Saran</label>
                    <input type="text" name="saran" class="form-control" 
                           value="<?= esc($kesimpulan['saran']) ?>">
                </div>

                <div class="form-group">
                    <label>IMT</label>
                    <input type="text" name="imt" class="form-control" 
                           value="<?= esc($kesimpulan['imt']) ?>">
                </div>

                <div class="form-group">
                    <label>Tatalaksana</label>
                    <input type="text" name="tatalaksana" class="form-control" 
                           value="<?= esc($kesimpulan['tatalaksana']) ?>">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
