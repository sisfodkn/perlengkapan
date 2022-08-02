<?php

namespace App\Controllers\Pengadaan;

use App\Controllers\BaseController;
use App\Models\PermintaanPengadaanModel;
use App\Models\KegiatanModel;

class AtkController extends BaseController
{
    function __construct()
    {
        $this->permintaanPengadaanModel = new PermintaanPengadaanModel;
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'pengadaan-atk',
            'listKegiatan' => $this->kegiatanModel->findAll(),
            'tgl' => date('m/d/Y'),
        ];
        return view("pengadaan/inputPengadaanATK", $data);
    }

    public function save()
    {
        $idPegawai = session()->get('id_pegawai');
        $idUnit = session()->get('id_unit');
        $idSubunit = session()->get('id_subunit');
        $kegiatan = $this->request->getVar('kegiatan');
        $isiPermintaan = $this->request->getVar('daftarPermintaan');
        $tglPengajuan = date_create($this->request->getVar('tglPengajuan'));
        $this->permintaanPengadaanModel->insert([
            'id_pegawai' => $idPegawai,
            'id_unit' => $idUnit,
            'id_subunit' => $idSubunit,
            'tipe_pengadaan' => 'ATK',
            'jenis_kegiatan' => $kegiatan,
            'isi_permintaan' => $isiPermintaan,
            'tgl_pengajuan' => date_format($tglPengajuan, "Y/m/d H:i:s"),
            'status' => 'Belum Disetujui'
        ]);
        return redirect()->to(base_url("/"));
    }
}
