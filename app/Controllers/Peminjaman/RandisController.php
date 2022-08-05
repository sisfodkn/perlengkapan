<?php

namespace App\Controllers\Peminjaman;

use App\Controllers\BaseController;
use App\Models\PeminjamanRandisModel;
use App\Models\RandisModel;

class RandisController extends BaseController
{
    function __construct()
    {
        $this->peminjamanRandisModel = new PeminjamanRandisModel();
        $this->randisModel = new RandisModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'peminjaman-randis',
            'dataRandis' => $this->randisModel->findRandisPerkantoran(),
            'tgl' => date('m/d/Y'),
        ];
        return view("peminjaman/inputPeminjamanRandis", $data);
    }

    public function save()
    {
        $idPegawai = session()->get('id_pegawai');
        $idRandis = $this->request->getVar('randis');
        $tglPengajuan = date_create($this->request->getVar('tglPengajuan'));
        $tglPeminjaman = date_create($this->request->getVar('tglPeminjaman'));
        $tglPengembalian = date_create($this->request->getVar('tglPengembalian'));
        $keperluan = $this->request->getVar('keperluan');
        $this->peminjamanRandisModel->insert([
            'id_pegawai' => $idPegawai,
            'id_randis' => $idRandis,
            'tgl_pengajuan' => date_format($tglPengajuan, "Y/m/d H:i:s"),
            'tgl_peminjaman' => date_format($tglPeminjaman, "Y/m/d H:i:s"),
            'tgl_pengembalian' => date_format($tglPengembalian, "Y/m/d H:i:s"),
            'keperluan' => $keperluan,
            'status' => '0'
        ]);
        return redirect()->to(base_url("/"));
    }
}
