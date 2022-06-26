<?php

namespace App\Controllers;

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
