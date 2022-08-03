<?php

namespace App\Controllers\DataBMN;

use App\Controllers\BaseController;
use App\Models\GedungModel;
use App\Models\RuanganModel;

class RuanganController extends BaseController
{
    function __construct()
    {
        $this->ruanganModel = new RuanganModel();
        $this->gedungModel = new GedungModel();
    }
    public function index()
    {
        $data['activeMenu'] = 'bmn-ruangan-data';
        $data['ruangan'] = $this->ruanganModel->getData();

        return view("dataBMN/dataRuangan", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'bmn-ruangan-tambah';
        $data['listGedung'] = $this->gedungModel->findAll();
        return view("dataBMN/inputRuangan", $data);
    }

    public function save($id)
    {
        $kodeRuangan = $this->request->getVar('kodeRuangan');
        $namaRuangan = $this->request->getVar("namaRuangan");
        $idGedung = $this->request->getVar("idGedung");

        $data['kode_ruangan'] = $kodeRuangan;
        $data['nama_ruangan'] = $namaRuangan;
        $data['id_gedung'] = $idGedung;

        if ($id == NULL) {
            $this->ruanganModel->insert($data);
        } else {
            $this->gedungModel->update($id, [
                $data
            ]);
        }
        return redirect()->to(base_url("data-ruangan"));
    }

    public function edit($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataRuangan = $this->ruanganModel->find($idDecryption);
        $dataGedung = $this->gedungModel->findAll();

        if (empty($dataRuangan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Ruangan Tidak ditemukan !');
        }
        $data = [
            'ruangan'       => $dataRuangan,
            'listGedung'    => $dataGedung,
            'activeMenu'    => 'bmn-ruangan-ubah'
        ];

        return view('dataBMN/inputRuangan', $data);
    }
}
