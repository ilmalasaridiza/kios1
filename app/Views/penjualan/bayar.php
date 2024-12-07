<?= $this->extend('layout/main') ?>

<?= $this->section('judul') ?>
Pembayaran Penjualan
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="container mt-5">
    <h1 class="mb-4">Pembayaran Penjualan</h1>

    <form action="<?= base_url('/penjualan/proses_pembayaran/' . esc($penjualan['ID_Penjualan'])) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="ID_Penjualan" class="form-label">ID Penjualan</label>
            <input type="text" class="form-control" id="ID_Penjualan" value="<?= esc($penjualan['ID_Penjualan']) ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="Nama_Pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="Nama_Pelanggan" value="<?= esc($penjualan['Nama']) ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="Nama_Produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="Nama_Produk" value="<?= esc($penjualan['Nama_Produk']) ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="Total_Harga" class="form-label">Total Harga</label>
            <input type="text" class="form-control" id="Total_Harga" value="<?= number_format($penjualan['Total_Harga'], 0, ',', '.') ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="Pembayaran" class="form-label">Jumlah Pembayaran</label>
            <input type="number" class="form-control" id="Pembayaran" name="Pembayaran" min="1" value="<?= esc($penjualan['Total_Harga']) ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
        <a href="<?= base_url('/penjualan') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>
