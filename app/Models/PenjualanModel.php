<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'ID_Penjualan';
    protected $allowedFields = [
        'Tanggal_Penjualan', 
        'ID_Pelanggan', 
        'ID_Produk', 
        'Jumlah', 
        'Harga_Satuan', 
        'Total_Harga',
        'status_pembayaran'
    ];

    // Mengambil data lengkap dengan join tabel pelanggan dan produk
    public function getPenjualanWithDetails()
    {
        return $this->select('penjualan.*, pelanggan.Nama as Nama_Pelanggan, produk.Nama as Nama_Produk, produk.Harga as Harga_Satuan')
            ->join('pelanggan', 'pelanggan.ID_Pelanggan = penjualan.ID_Pelanggan')
            ->join('produk', 'produk.ID_Produk = penjualan.ID_Produk')
            ->findAll();
    }
}
