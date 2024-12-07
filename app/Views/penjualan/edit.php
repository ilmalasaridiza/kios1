<?= $this->extend('layout/main') ?>

<?= $this->section('judul') ?>
Edit Data Penjualan
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="container mt-5">
    <h1 class="mb-4">Edit Data Penjualan</h1>

    <form action="<?= base_url('/penjualan/update/' . esc($penjualan['ID_Penjualan'])) ?>" method="post">
        <?= csrf_field() ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Penjualan</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- Nomor -->
                    <td>1</td>

                    <!-- Tanggal Penjualan -->
                    <td>
                        <input type="date" name="Tanggal_Penjualan" id="Tanggal_Penjualan" class="form-control" value="<?= esc($penjualan['Tanggal_Penjualan']) ?>" required>
                    </td>

                    <!-- Pilihan Nama Pelanggan -->
                    <td>
                        <select name="ID_Pelanggan" id="ID_Pelanggan" class="form-select" required>
                            <option value="" disabled>Pilih Pelanggan</option>
                            <?php foreach ($pelanggan as $pel): ?>
                                <option value="<?= esc($pel['ID_Pelanggan']) ?>" <?= $pel['ID_Pelanggan'] == $penjualan['ID_Pelanggan'] ? 'selected' : '' ?>>
                                    <?= esc($pel['Nama']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>

                    <!-- Pilihan Nama Produk -->
                    <td>
                        <select name="ID_Produk" id="ID_Produk" class="form-select" onchange="updateHargaSatuan()" required>
                            <option value="" disabled>Pilih Produk</option>
                            <?php foreach ($produk as $prod): ?>
                                <option value="<?= esc($prod['ID_Produk']) ?>" data-harga="<?= esc($prod['Harga_Produk']) ?>" <?= $prod['ID_Produk'] == $penjualan['ID_Produk'] ? 'selected' : '' ?>>
                                    <?= esc($prod['Nama_Produk']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>

                    <!-- Harga Satuan -->
                    <td>
                        <input type="text" id="Harga_Satuan" name="Harga_Satuan" class="form-control" value="<?= esc($penjualan['Harga_Satuan']) ?>" readonly>
                    </td>

                    <!-- Input Jumlah -->
                    <td>
                        <input type="number" name="Jumlah" id="Jumlah" class="form-control" value="<?= esc($penjualan['Jumlah']) ?>" min="1" oninput="updateTotalHarga()" required>
                    </td>

                    <!-- Total Harga -->
                    <td>
                        <input type="text" id="Total_Harga" name="Total_Harga" class="form-control" value="<?= esc($penjualan['Total_Harga']) ?>" readonly>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="<?= base_url('/penjualan') ?>" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>

<script>
    function updateHargaSatuan() {
        const produkSelect = document.getElementById('ID_Produk');
        const hargaSatuanInput = document.getElementById('Harga_Satuan');
        const selectedOption = produkSelect.options[produkSelect.selectedIndex];
        const harga = selectedOption.getAttribute('data-harga');

        hargaSatuanInput.value = harga || '';
        updateTotalHarga();
    }

    function updateTotalHarga() {
        const hargaSatuan = parseFloat(document.getElementById('Harga_Satuan').value) || 0;
        const jumlah = parseInt(document.getElementById('Jumlah').value) || 0;
        const totalHarga = hargaSatuan * jumlah;

        document.getElementById('Total_Harga').value = totalHarga.toFixed(2);
    }
</script>
<?= $this->endSection() ?>
