<?php

namespace App\Controllers\DataUtama;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;
use App\Models\PermintaanPengadaanModel;

class KegiatanController extends BaseController
{
    function __construct()
    {
        $this->kegiatanModel = new KegiatanModel();
        $this->permintaanPengadaanModel = new PermintaanPengadaanModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'utama-kegiatan-data',
            'kegiatan'       => $this->kegiatanModel->findAll()
        ];
        return view("dataUtama/dataKegiatan", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'utama-kegiatan-tambah';
        return view("dataUtama/inputKegiatan", $data);
    }

    public function edit($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataKegiatan = $this->kegiatanModel->find($idDecryption);

        if (empty($dataKegiatan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kegiatan Tidak ditemukan !');
        }
        $data = [
            'kegiatan'     => $dataKegiatan,
            'activeMenu'    => 'utama-kegiatan-ubah'
        ];

        return view('dataUtama/inputKegiatan', $data);
    }

    public function save($id)
    {
        $jenisKegiatan = $this->request->getVar('jenisKegiatan');
        if ($id == NULL) {
            $this->kegiatanModel->insert([
                'jenis_kegiatan' => $jenisKegiatan
            ]);
        } else {
            $this->kegiatanModel->update($id, [
                'jenis_kegiatan' => $jenisKegiatan
            ]);
        }
        return redirect()->to(base_url("data-kegiatan"));
    }

    public function delete($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataKegiatan = $this->kegiatanModel->find($idDecryption);
        $jenis = $dataKegiatan['jenis_kegiatan'];
        $dataPengadaan = $this->permintaanPengadaanModel->findByKegiatan($jenis);
        if (empty($dataPengadaan)) {
            $this->kegiatanModel->delete($idDecryption);
            session()->setFlashData("success", "Kegiatan $jenis berhasil dihapus.");
        } else {
            session()->setFlashData("info", "Gagal dihapus!! <br/> Kegiatan <b>$jenis</b> masih digunakan di Permintaan ATK/Cetakan");
        }

        return redirect()->to(base_url("data-kegiatan"));
    }
}
