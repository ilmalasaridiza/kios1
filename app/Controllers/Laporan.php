<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use App\Models\PenjualanModel;
use CodeIgniter\Controller;

class Laporan extends Controller
{
    protected $laporanModel;
    protected $penjualanModel;

    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
        $this->penjualanModel = new PenjualanModel();
    }

    // Menampilkan semua laporan
    public function index()
    {
        // Ambil semua laporan beserta data penjualannya
        $laporan = $this->laporanModel->getLaporanWithPenjualan();

        // Data untuk view
        $data = [
            'judul' => 'Daftar Laporan Penjualan',
            'laporan' => $laporan
        ];

        return view('laporan/index', $data);
    }

    // Menampilkan form untuk membuat laporan baru
    public function create($idPenjualan)
    {
        // Ambil data penjualan untuk ID_Penjualan tertentu
        $penjualan = $this->penjualanModel->find($idPenjualan);

        // Pastikan penjualan ditemukan
        if (!$penjualan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Penjualan tidak ditemukan.');
        }

        $data = [
            'judul' => 'Buat Laporan Penjualan',
            'penjualan' => $penjualan,
        ];

        return view('laporan/create', $data);
    }

    // Menyimpan laporan baru
    public function store()
    {
        $idPenjualan = $this->request->getPost('ID_Penjualan');
        $tanggalLaporan = $this->request->getPost('Tanggal_Laporan');
        $isiLaporan = $this->request->getPost('Isi_Laporan');

        // Data yang akan disimpan ke tabel laporan
        $data = [
            'ID_Penjualan' => $idPenjualan,
            'Tanggal_Laporan' => $tanggalLaporan,
            'Isi_Laporan' => $isiLaporan,
        ];

        // Simpan laporan
        $this->laporanModel->addLaporan($data);

        return redirect()->to(base_url('/penjualan'));
    }

    // Menampilkan laporan berdasarkan ID_Penjualan
    public function show($idPenjualan)
    {
        $laporan = $this->laporanModel->getLaporanWithPenjualan($idPenjualan);

        // Pastikan laporan ditemukan
        if (!$laporan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Laporan tidak ditemukan.');
        }

        $data = [
            'judul' => 'Detail Laporan Penjualan',
            'laporan' => $laporan,
        ];

        return view('laporan/show', $data);
    }
}
