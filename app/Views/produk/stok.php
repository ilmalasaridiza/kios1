<?= $this->extend('layout/main') ?>

<?= $this->section('judul') ?>
Produk
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="container">
    <h2>Manajemen Stok</h2>
    <div class="table-responsive"> <!-- Tambahkan kelas table-responsive di sini -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jumlah Stok</th>

                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>