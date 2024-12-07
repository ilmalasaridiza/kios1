<?= $this->extend('layout/main') ?>

<?= $this->section('judul') ?>
Kategori
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="container">
    <h2>Manajemen Kategori</h2>
    <div class="table-responsive"> <!-- Tambahkan kelas table-responsive di sini -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>