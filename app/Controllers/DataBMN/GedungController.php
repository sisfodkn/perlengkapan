<?php

namespace App\Controllers\DataBMN;

use App\Controllers\BaseController;
use App\Models\GedungModel;

class GedungController extends BaseController
{

    function __construct()
    {
        $this->gedungModel = new GedungModel();
    }

    public function index()
    {
        $data = [
            'activeMenu'    => 'bmn-gedung-data',
            'gedung'        => $this->gedungModel->findAll()
        ];
        return view("dataBMN/dataGedung", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'bmn-gedung-tambah';
        return view("dataBMN/inputGedung", $data);
    }

    public function save($id)
    {
        $namaGedung = $this->request->getVar('namaGedung');
        if ($id == NULL) {
            $this->gedungModel->insert([
                'nama_gedung' => $namaGedung
            ]);
        } else {
            $this->gedungModel->update($id, [
                'nama_gedung' => $namaGedung
            ]);
        }
        return redirect()->to(base_url("data-gedung"));
    }

    public function edit($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataGedung = $this->gedungModel->find($idDecryption);

        if (empty($dataGedung)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Gedung Tidak ditemukan !');
        }
        $data = [
            'gedung'     => $dataGedung,
            'activeMenu'    => 'bmn-gedung-ubah'
        ];

        return view('dataBMN/inputGedung', $data);
    }
}
