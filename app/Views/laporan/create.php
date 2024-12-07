<?= $this->extend('layout/main') ?>

<?= $this->section('judul') ?>
Buat Laporan Penjualan
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="container mt-5">
    <h1 class="mb-4">Buat Laporan untuk Penjualan</h1>

    <!-- Form untuk membuat laporan baru -->
    <form action="<?= base_url('/laporan/store') ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="ID_Penjualan" value="<?= esc($penjualan['ID_Penjualan']) ?>">

        <div class="mb-3">
            <label for="Tanggal_Laporan" class="form-label">Tanggal Laporan</label>
            <input type="date" name="Tanggal_Laporan" id="Tanggal_Laporan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Isi_Laporan" class="form-label">Isi Laporan</label>
            <textarea name="Isi_Laporan" id="Isi_Laporan" rows="4" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Laporan</button>
    </form>
</div>
<?= $this->endSection() ?>
