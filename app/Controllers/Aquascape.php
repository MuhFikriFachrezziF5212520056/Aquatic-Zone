<?php

namespace App\Controllers;

use App\Models\AquascapeModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Aquascape extends BaseController
{
    protected $aquascapeModel;

    public function __construct()
    {
        $this->aquascapeModel = new AquascapeModel();
    }

    public function index()
    {
        $data = [
            'title'         => 'AquaticZone — Dashboard Ecosystem',
            'aquascape'     => $this->aquascapeModel->findAll(),
            'total_tank'    => $this->aquascapeModel->countAllResults(),
            'total_garansi' => $this->aquascapeModel->where('status_garansi', 'Aktif')->countAllResults()
        ];

        return view('aquascape/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Data Tank Baru'];
        return view('aquascape/create', $data);
    }

    public function save()
    {
        $this->aquascapeModel->save([
            'nama_klien'        => $this->request->getPost('nama_klien'),
            'lokasi'            => $this->request->getPost('lokasi'),
            'ukuran_tank'       => $this->request->getPost('ukuran_tank'),
            'tema_design'       => $this->request->getPost('tema_design'),
            'tgl_pemasangan'    => $this->request->getPost('tgl_pemasangan'),
            'status_garansi'    => $this->request->getPost('status_garansi'),
            'biaya_maintenance' => $this->request->getPost('biaya_maintenance'),
        ]);

        return redirect()->to(site_url('aquascape'));
    }

    public function edit($id)
    {
        $row = $this->aquascapeModel->find($id);

        // ID tidak ditemukan -> 404, bukan passing null ke view
        if ($row === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'     => 'Edit Data Ekosistem',
            'aquascape' => $row
        ];

        return view('aquascape/edit', $data);
    }

    public function update($id)
    {
        if ($this->aquascapeModel->find($id) === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->aquascapeModel->update($id, [
            'nama_klien'        => $this->request->getPost('nama_klien'),
            'lokasi'            => $this->request->getPost('lokasi'),
            'ukuran_tank'       => $this->request->getPost('ukuran_tank'),
            'tema_design'       => $this->request->getPost('tema_design'),
            'tgl_pemasangan'    => $this->request->getPost('tgl_pemasangan'),
            'status_garansi'    => $this->request->getPost('status_garansi'),
            'biaya_maintenance' => $this->request->getPost('biaya_maintenance'),
        ]);

        return redirect()->to(site_url('aquascape'));
    }

    public function delete($id)
    {
        if ($this->aquascapeModel->find($id) === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->aquascapeModel->delete($id);
        return redirect()->to(site_url('aquascape'));
    }
}