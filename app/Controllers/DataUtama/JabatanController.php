<?php

namespace App\Controllers\DataUtama;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use App\Models\PegawaiModel;

class JabatanController extends BaseController
{
    function __construct()
    {
        $this->jabatanModel = new JabatanModel();
        $this->pegawaiModel = new PegawaiModel();
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

    public function delete($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataJabatan = $this->jabatanModel->find($idDecryption);
        $dataPegawai = $this->pegawaiModel->findByJabatan($dataJabatan['id']);
        $jabatan = $dataJabatan['nama_jabatan'];
        if (empty($dataPegawai)) {
            $this->jabatanModel->delete($idDecryption);
            session()->setFlashData("success", "Jabatan $jabatan berhasil dihapus.");
        } else {
            $nama = "";
            foreach ($dataPegawai as $data) :
                $nama = $nama . "- <b>" . $data->nama_pegawai . "</b><br/>";
            endforeach;
            session()->setFlashData("info", "Gagal dihapus!! <br/> Jabatan <b>$jabatan</b> masih digunakan oleh <br/>" . $nama);
        }

        return redirect()->to(base_url("data-jabatan"));
    }
}
