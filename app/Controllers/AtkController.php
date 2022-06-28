<?php

namespace App\Controllers;

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
        if ($id == NULL) {
            $this->atkModel->insert([
                'nama_atk' => $namaAtk
            ]);
        } else {
            $this->atkModel->update($id, [
                'nama_atk' => $namaAtk
            ]);
        }
        return redirect()->to(base_url("data-atk"));
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
