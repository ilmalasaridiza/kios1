<?= $this->extend('layout/main') ?>

<?= $this->section('judul') ?>
Detail Laporan Penjualan
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="container mt-5">
    <h1 class="mb-4">Detail Laporan Penjualan</h1>

    <div class="mb-3">
        <label class="form-label">ID Penjualan</label>
        <p><?= esc($laporan['ID_Penjualan']) ?></p>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Laporan</label>
        <p><?= esc($laporan['Tanggal_Laporan']) ?></p>
    </div>

    <div class="mb-3">
        <label class="form-label">Isi Laporan</label>
        <p><?= esc($laporan['Isi_Laporan']) ?></p>
    </div>

    <a href="<?= base_url('/penjualan') ?>" class="btn btn-secondary">Kembali</a>
</div>
<?= $this->endSection() ?>
