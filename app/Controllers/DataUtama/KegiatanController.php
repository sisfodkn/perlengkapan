<?php

namespace App\Controllers\DataUtama;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;

class KegiatanController extends BaseController
{
    function __construct()
    {
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'utama-kegiatan-data',
            'kegiatan'       => $this->kegiatanModel->findAll()
        ];
        return view("dataUtama/dataKegiatan", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'utama-kegiatan-tambah';
        return view("dataUtama/inputKegiatan", $data);
    }

    public function edit($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataKegiatan = $this->kegiatanModel->find($idDecryption);

        if (empty($dataKegiatan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kegiatan Tidak ditemukan !');
        }
        $data = [
            'kegiatan'     => $dataKegiatan,
            'activeMenu'    => 'utama-kegiatan-ubah'
        ];

        return view('dataUtama/inputKegiatan', $data);
    }

    public function save($id)
    {
        $jenisKegiatan = $this->request->getVar('jenisKegiatan');
        if ($id == NULL) {
            $this->kegiatanModel->insert([
                'jenis_kegiatan' => $jenisKegiatan
            ]);
        } else {
            $this->kegiatanModel->update($id, [
                'jenis_kegiatan' => $jenisKegiatan
            ]);
        }
        return redirect()->to(base_url("data-kegiatan"));
    }
}
