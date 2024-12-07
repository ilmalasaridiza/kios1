<?= $this->extend('layout/main') ?>

<?= $this->section('judul') ?>
Produk
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="container">
    <h2>Manajemen Produk</h2>
    <div class="table-responsive"> <!-- Tambahkan kelas table-responsive di sini -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>