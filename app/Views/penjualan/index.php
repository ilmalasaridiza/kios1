<?= $this->extend('layout/main') ?>

<?= $this->section('judul') ?>
Penjualan
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="container mt-5">
    <h1 class="mb-4">Daftar Penjualan</h1>
    <a href="<?= base_url('/penjualan/create') ?>" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Status Pembayaran</th> <!-- Kolom Status Pembayaran -->
                <th>Aksi</th> <!-- Kolom Aksi -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($penjualan as $i => $p): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($p['Tanggal_Penjualan']) ?></td>
                    <td><?= esc($p['Nama']) ?></td>
                    <td><?= esc($p['Nama_Produk']) ?></td>
                    <td><?= esc($p['Jumlah']) ?></td>
                    <td><?= number_format($p['Harga_Satuan'], 0, ',', '.') ?></td>
                    <td><?= number_format($p['Total_Harga'], 0, ',', '.') ?></td>
                    <td><?= esc($p['status_pembayaran']) ?></td> <!-- Menampilkan status pembayaran -->
                    <td>
                        <!-- Tautan Edit -->
                        <a href="<?= base_url('/penjualan/edit/' . esc($p['ID_Penjualan'])) ?>" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Form Delete -->
                        <form action="<?= base_url('/penjualan/delete/' . esc($p['ID_Penjualan'])) ?>" method="post" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                        <!-- Form Pembayaran -->
                        <?php if ($p['status_pembayaran'] == 'Belum Lunas'): ?>
                            <form action="<?= base_url('/penjualan/bayar/' . esc($p['ID_Penjualan'])) ?>" method="get" style="display:inline-block;" onsubmit="return confirm('Yakin ingin membayar?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-success btn-sm">Bayar</button>
                            </form>
                        <?php else: ?>
                            <button class="btn btn-success btn-sm" disabled>Lunas</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
