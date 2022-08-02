<?php

namespace App\Controllers\DataRandis;

use App\Controllers\BaseController;
use App\Models\DistribusiRandisModel;
use App\Models\PegawaiModel;
use App\Models\RandisModel;

class DistRandisController extends BaseController
{
    function __construct()
    {
        $this->distribusiRandisModel = new DistribusiRandisModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->randisModel = new RandisModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'randis-distrandis-data',
            'distRandis' => $this->distribusiRandisModel->getAll()
        ];
        return view("dataRandis/dataDistRandis", $data);
    }

    public function add()
    {
        $data = [
            'activeMenu'    => 'randis-distrandis-tambah',
            'listPegawai' => $this->pegawaiModel->getAllNoDist(),
            'listRandis' => $this->randisModel->getAllNoDist()
        ];
        return view('dataRandis/inputDistRandis', $data);
    }

    public function edit($id)
    {
        $idDecrypt = $this->decrypt($id);
        $dataDistRandis = $this->distribusiRandisModel->find($idDecrypt);

        if (empty($dataDistRandis)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Distribusi Kendaraan Dinas Tidak ditemukan !');
        }
        $data = [
            'activeMenu'    => 'randis-distrandis-ubah',
            'distRandis'     => $dataDistRandis,
            'listRandis' => $this->randisModel->getCurrentAndNoDist($dataDistRandis['id_kendaraan_dinas']),
            'listPegawai' => $this->pegawaiModel->getCurrentAndNoDist($dataDistRandis['id_pegawai'])
        ];

        return view('dataRandis/inputDistRandis', $data);
    }

    public function save($id)
    {
        $idPegawai = $this->request->getVar('idPegawai');
        $idRandis = $this->request->getVar('idRandis');
        if ($id == NULL) {
            $this->distribusiRandisModel->insert([
                'id_pegawai' => $idPegawai,
                'id_kendaraan_dinas' => $idRandis
            ]);
        } else {
            $this->distribusiRandisModel->update($id, [
                'id_pegawai' => $idPegawai,
                'id_kendaraan_dinas' => $idRandis
            ]);
        }
        return redirect()->to(base_url("data-dist-randis"));
    }
}
