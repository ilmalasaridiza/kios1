<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelangganModel;
use CodeIgniter\HTTP\ResponseInterface;

class Pelanggan extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $data['pelanggan'] = $this->pelangganModel->findAll();
        return view('pelanggan/index', $data);
    }

    public function create()
    {
        $data = [
            'Nama' => $this->request->getPost('nama'),
            'Email' => $this->request->getPost('email'),
            'Alamat' => $this->request->getPost('alamat'),
            'No_tlp' => $this->request->getPost('no_tlp')
        ];

        $this->pelangganModel->insert($data);
        return redirect()->to('/pelanggan')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data['pelanggan'] = $this->pelangganModel->find($id);
        return view('pelanggan/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'Nama' => $this->request->getPost('nama'),
            'Email' => $this->request->getPost('email'),
            'Alamat' => $this->request->getPost('alamat'),
            'No_tlp' => $this->request->getPost('no_tlp')
        ];

        $this->pelangganModel->update($id, $data);
        return redirect()->to('/pelanggan')->with('success', 'Pelanggan berhasil diupdate!');
    }

    public function delete($id)
    {
        $this->pelangganModel->delete($id);
        return redirect()->to('/pelanggan')->with('success', 'Pelanggan berhasil dihapus!');
    }
}
