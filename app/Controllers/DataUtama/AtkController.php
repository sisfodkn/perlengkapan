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

    public function delete($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataAtk = $this->atkModel->find($idDecryption);
        $namaAtk = $dataAtk['nama_atk'];
        $this->atkModel->delete($idDecryption);
        session()->setFlashData("success", "ATK <b>$namaAtk</b> berhasil dihapus.");

        return redirect()->to(base_url("data-atk"));
    }
}
