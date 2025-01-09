<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kesimpulan Pemeriksaan</h1>
        <a href="<?= base_url('Kesimpulan') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('Kesimpulan/store') ?>" method="post">
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
                    <label>Pemeriksaan Fisik</label>
                    <input type="text" name="pemeriksaan_fisik" class="form-control <?= ($validation->hasError('pemeriksaan_fisik')) ? 'is-invalid' : '' ?>" 
                           value="<?= old('pemeriksaan_fisik') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('pemeriksaan_fisik') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Thorax</label>
                    <input type="text" name="thorax" class="form-control <?= ($validation->hasError('thorax')) ? 'is-invalid' : '' ?>" 
                           value="<?= old('thorax') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('thorax') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Laboratorium</label>
                    <input type="text" name="laboratorium" class="form-control <?= ($validation->hasError('laboratorium')) ? 'is-invalid' : '' ?>" 
                           value="<?= old('laboratorium') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('laboratorium') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Saran</label>
                    <input type="text" name="saran" class="form-control" 
                           value="<?= old('saran') ?>">
                </div>

                <div class="form-group">
                    <label>IMT</label>
                    <input type="text" name="imt" class="form-control" 
                           value="<?= old('imt') ?>">
                </div>

                <div class="form-group">
                    <label>Tatalaksana</label>
                    <input type="text" name="tatalaksana" class="form-control" 
                           value="<?= old('tatalaksana') ?>">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
