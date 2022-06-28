<?php

namespace App\Controllers\DataUtama;

use App\Controllers\BaseController;
use App\Models\JabatanModel;

class JabatanController extends BaseController
{
    function __construct()
    {
        $this->jabatanModel = new JabatanModel();
    }

    public function index()
    {
        $data = [
            'activeMenu'    => 'utama-jabatan-data',
            'jabatan'       => $this->jabatanModel->findAll()
        ];
        return view("dataUtama/dataJabatan", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'utama-jabatan-tambah';
        return view('dataUtama/inputJabatan', $data);
    }

    public function edit($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataJabatan = $this->jabatanModel->find($idDecryption);

        if (empty($dataJabatan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Jabatan Tidak ditemukan !');
        }
        $data = [
            'jabatan'     => $dataJabatan,
            'activeMenu'    => 'utama-jabatan-ubah'
        ];

        return view('dataUtama/inputJabatan', $data);
    }

    public function save($id)
    {
        $namaJabatan = $this->request->getVar('namaJabatan');
        if ($id == NULL) {
            $this->jabatanModel->insert([
                'nama_jabatan' => $namaJabatan
            ]);
        } else {
            $this->jabatanModel->update($id, [
                'nama_jabatan' => $namaJabatan
            ]);
        }
        return redirect()->to(base_url("data-jabatan"));
    }
}
