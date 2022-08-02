<?php

namespace App\Controllers\DataRandis;

use App\Controllers\BaseController;
use App\Models\JenisOperasionalModel;

class JenisOpsController extends BaseController
{
    function __construct()
    {
        $this->jenisOpsModel = new JenisOperasionalModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'randis-jenisops-data',
            'jenisOps'       => $this->jenisOpsModel->findAll()
        ];
        return view("dataRandis/dataJenisOps", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'randis-jenisops-tambah';
        return view("dataRandis/inputJenisOps", $data);
    }

    public function edit($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataJenisOps = $this->jenisOpsModel->find($idDecryption);

        if (empty($dataJenisOps)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Jenis Operasional Tidak ditemukan !');
        }
        $data = [
            'jenisOps'     => $dataJenisOps,
            'activeMenu'    => 'randis-jenisops-ubah'
        ];

        return view('dataRandis/inputJenisOps', $data);
    }

    public function save($id)
    {
        $jenisOps = $this->request->getVar('jenisOps');
        if ($id == NULL) {
            $this->jenisOpsModel->insert([
                'jenis_operasional' => $jenisOps
            ]);
        } else {
            $this->jenisOpsModel->update($id, [
                'jenis_operasional' => $jenisOps
            ]);
        }
        return redirect()->to(base_url("data-jenisops"));
    }
}
