<?php

namespace App\Controllers\DataUtama;

use App\Controllers\BaseController;
use App\Models\AtkModel;

class AtkController extends BaseController
{
    function __construct()
    {
        $this->atkModel = new AtkModel();
    }

    public function index()
    {
        $data = [
            'activeMenu'    => 'utama-atk-data',
            'atk'          => $this->atkModel->findAll()
        ];
        return view("dataUtama/dataAtk", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'utama-atk-tambah';
        return view('dataUtama/inputAtk', $data);
    }

    public function edit($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataAtk = $this->atkModel->find($idDecryption);

        if (empty($dataAtk)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ATK Tidak ditemukan !');
        }
        $data = [
            'atk'     => $dataAtk,
            'activeMenu'    => 'utama-atk-ubah'
        ];

        return view('dataUtama/inputAtk', $data);
    }

    public function save($id)
    {
        $namaAtk = $this->request->getVar('namaAtk');
        $kategoriAtk = $this->request->getVar('kategoriAtk');
        if ($id == NULL) {
            $this->atkModel->insert([
                'nama_atk' => $namaAtk,
                'kategori_atk' => $kategoriAtk
            ]);
        } else {
            $this->atkModel->update($id, [
                'nama_atk' => $namaAtk,
                'kategori_atk' => $kategoriAtk
            ]);
        }
        return redirect()->to(base_url("data-atk"));
    }
}
