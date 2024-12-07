<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan'; // Nama tabel laporan
    protected $primaryKey = 'ID_Laporan';
    protected $allowedFields = ['ID_Penjualan', 'Tanggal_Laporan', 'Isi_Laporan'];

    // Relasi dengan penjualan, mengambil data penjualan berdasarkan ID_Penjualan
    public function getLaporanWithPenjualan($idPenjualan = null)
    {
        if ($idPenjualan) {
            return $this->join('penjualan', 'penjualan.ID_Penjualan = laporan.ID_Penjualan')
                        ->where('laporan.ID_Penjualan', $idPenjualan)
                        ->first();
        }
        return $this->join('penjualan', 'penjualan.ID_Penjualan = laporan.ID_Penjualan')
                    ->findAll();
    }

    // Menambahkan laporan baru
    public function addLaporan($data)
    {
        return $this->insert($data);
    }
}
