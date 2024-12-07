<?= $this->extend('layout/main') ?>

<?= $this->section('judul') ?>
Daftar Laporan Penjualan
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="container mt-5">
    <h1 class="mb-4">Daftar Laporan Penjualan</h1>
    <a href="<?= base_url('/laporan/create') ?>" class="btn btn-primary mb-3">Buat Laporan Baru</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Penjualan</th>
                <th>Tanggal Laporan</th>
                <th>Isi Laporan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($laporan as $i => $l): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($l['ID_Penjualan']) ?></td>
                    <td><?= esc($l['Tanggal_Laporan']) ?></td>
                    <td><?= esc($l['Isi_Laporan']) ?></td>
                    <td>
                        <!-- Tautan untuk melihat detail laporan -->
                        <a href="<?= base_url('/laporan/show/' . esc($l['ID_Penjualan'])) ?>" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
