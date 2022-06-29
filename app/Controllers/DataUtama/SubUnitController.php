<?php

namespace App\Controllers\DataUtama;

use App\Controllers\BaseController;
use App\Models\SubUnitModel;

class SubUnitController extends BaseController
{
    function __construct()
    {
        $this->subUnitModel = new SubUnitModel();
    }

    public function index()
    {
        $data = [
            'activeMenu'    => 'utama-subunit-data',
            'subUnit'          => $this->subUnitModel->findAll()
        ];
        return view("dataUtama/dataSubUnit", $data);
    }

    public function add()
    {
        $data = [
            'activeMenu'    => 'utama-subunit-tambah',
            'prop'          => new \Config\Properties()
        ];
        return view('dataUtama/inputSubUnit', $data);
    }

    public function edit($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataSubUnit = $this->subUnitModel->find($idDecryption);

        if (empty($dataSubUnit)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Sub Unit Tidak ditemukan !');
        }
        $data = [
            'subUnit'     => $dataSubUnit,
            'activeMenu'    => 'utama-subunit-ubah'
        ];

        return view('dataUtama/inputSubUnit', $data);
    }

    public function save($id)
    {
        $namaSubUnit = $this->request->getVar('namaSubUnit');
        if ($id == NULL) {
            $this->subUnitModel->insert([
                'nama_subunit' => $namaSubUnit
            ]);
        } else {
            $this->subUnitModel->update($id, [
                'nama_subunit' => $namaSubUnit
            ]);
        }
        return redirect()->to(base_url("data-subunit"));
    }
}
