<?php
namespace App\Controllers;

use App\Models\PenjualanModel;
use App\Models\PelangganModel;
use App\Models\ProdukModel;

class Penjualan extends BaseController
{
    protected $penjualanModel;
    protected $pelangganModel;
    protected $produkModel;

    public function __construct()
    {
        $this->penjualanModel = new PenjualanModel();
        $this->pelangganModel = new PelangganModel();  // Model untuk mengambil data pelanggan
        $this->produkModel = new ProdukModel();  // Model untuk mengambil data produk
    }

    // Menampilkan semua data penjualan
    public function index()
    {
        // Ambil semua data penjualan
        $penjualan = $this->penjualanModel->findAll();

        // Tambahkan nama pelanggan dan produk ke dalam data penjualan
        foreach ($penjualan as &$p) {
            // Ambil nama pelanggan berdasarkan ID
            $pelanggan = $this->pelangganModel->find($p['ID_Pelanggan']);
            $p['Nama'] = $pelanggan ? $pelanggan['Nama'] : 'Tidak Ditemukan';

            // Ambil nama produk berdasarkan ID
            $produk = $this->produkModel->find($p['ID_Produk']);
            $p['Nama_Produk'] = $produk ? $produk['Nama_Produk'] : 'Tidak Ditemukan';
        }

        // Kirim data ke view
        $data = ['penjualan' => $penjualan];

        return view('penjualan/index', $data);
    }
    // Menambahkan data baru
    public function create()
    {
        $data = [
            'pelanggan' => $this->pelangganModel->findAll(),  // Ambil semua data pelanggan
            'produk' => $this->produkModel->findAll()  // Ambil semua data produk
        ];
        return view('penjualan/create', $data);
    }

    // Menyimpan data penjualan baru
    public function store()
    {
        $this->penjualanModel->save([
            'Tanggal_Penjualan' => $this->request->getPost('Tanggal_Penjualan'),
            'ID_Pelanggan' => $this->request->getPost('ID_Pelanggan'),
            'ID_Produk' => $this->request->getPost('ID_Produk'),
            'Jumlah' => $this->request->getPost('Jumlah'),
            'Harga_Satuan' => $this->request->getPost('Harga_Satuan'),
            'Total_Harga' => $this->request->getPost('Total_Harga'),
        ]);

        return redirect()->to('/penjualan');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $penjualan = $this->penjualanModel->find($id);
        
        if (!$penjualan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data penjualan tidak ditemukan');
        }

        $data = [
            'penjualan' => $penjualan,
            'pelanggan' => $this->pelangganModel->findAll(),  // Ambil data pelanggan untuk pilihan
            'produk' => $this->produkModel->findAll()  // Ambil data produk untuk pilihan
        ];

        return view('penjualan/edit', $data);
    }

    // Memperbarui data penjualan
    public function update($id)
    {
        $this->penjualanModel->update($id, [
            'Tanggal_Penjualan' => $this->request->getPost('Tanggal_Penjualan'),
            'ID_Pelanggan' => $this->request->getPost('ID_Pelanggan'),
            'ID_Produk' => $this->request->getPost('ID_Produk'),
            'Jumlah' => $this->request->getPost('Jumlah'),
            'Harga_Satuan' => $this->request->getPost('Harga_Satuan'),
            'Total_Harga' => $this->request->getPost('Total_Harga'),
        ]);

        return redirect()->to('/penjualan');
    }

    // Menghapus data penjualan
    public function delete($id)
    {
        $this->penjualanModel->delete($id);
        return redirect()->to('/penjualan');
    }

    public function bayar($id)
{
    // Ambil data penjualan berdasarkan ID
    $penjualan = $this->penjualanModel->find($id);

    // Pastikan data ditemukan
    if (!$penjualan) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Penjualan dengan ID $id tidak ditemukan.");
    }

    // Ambil data pelanggan dan produk terkait
    $pelanggan = $this->pelangganModel->find($penjualan['ID_Pelanggan']);
    $produk = $this->produkModel->find($penjualan['ID_Produk']);

    // Gabungkan data penjualan dengan nama pelanggan dan produk
    $penjualan['Nama'] = $pelanggan ? $pelanggan['Nama'] : 'Tidak Ditemukan';
    $penjualan['Nama_Produk'] = $produk ? $produk['Nama_Produk'] : 'Tidak Ditemukan';

    // Kirim data ke view untuk tampilan pembayaran
    $data = [
        'penjualan' => $penjualan
    ];

    return view('penjualan/bayar', $data);
}

public function proses_pembayaran($id)
{
    // Ambil data penjualan berdasarkan ID
    $penjualan = $this->penjualanModel->find($id);

    // Pastikan data ditemukan
    if (!$penjualan) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Penjualan dengan ID $id tidak ditemukan.");
    }

    // Simulasikan pemrosesan pembayaran (contohnya simpan status pembayaran)
    $this->penjualanModel->update($id, ['status_pembayaran' => 'Lunas']);

    // Redirect ke daftar penjualan setelah pembayaran berhasil
    return redirect()->to('/penjualan');
}

}
