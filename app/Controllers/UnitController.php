<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitModel;

class UnitController extends BaseController
{
    function __construct()
    {
        $this->unitModel = new UnitModel();
    }

    public function index()
    {
        $data = [
            'activeMenu'    => 'utama-unit-data',
            'unit'          => $this->unitModel->findAll()
        ];
        return view("dataUtama/dataUnit", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'utama-unit-tambah';
        return view('dataUtama/inputUnit', $data);
    }

    public function edit($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataUnit = $this->unitModel->find($idDecryption);

        if (empty($dataUnit)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Unit Tidak ditemukan !');
        }
        $data = [
            'unit'     => $dataUnit,
            'activeMenu'    => 'utama-unit-ubah'
        ];

        return view('dataUtama/inputUnit', $data);
    }

    public function save($id)
    {
        $namaUnit = $this->request->getVar('namaUnit');
        if ($id == NULL) {
            $this->unitModel->insert([
                'nama_unit' => $namaUnit
            ]);
        } else {
            $this->unitModel->update($id, [
                'nama_unit' => $namaUnit
            ]);
        }
        return redirect()->to(base_url("data-unit"));
    }

    public function decrypt($id)
    {
        // Non-NULL Initialization Vector for decryption 
        $decryption_iv = '1234567891011121';
        // Storing the decryption key 
        $decryption_key = "SisfoDKN";
        // Storingthe cipher method 
        $ciphering = "AES-128-CTR";
        // Using OpenSSl Encryption method 
        $options   = 0;
        // Using openssl_decrypt() function to decrypt the data 
        return openssl_decrypt($id, $ciphering, $decryption_key, $options, $decryption_iv);
    }
}
