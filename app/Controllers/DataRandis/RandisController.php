<?php

namespace App\Controllers\DataRandis;

use App\Controllers\BaseController;
use App\Models\JenisOperasionalModel;
use App\Models\RandisModel;

class RandisController extends BaseController
{
    function __construct()
    {
        $this->randisModel = new RandisModel();
        $this->jenisOpsModel = new JenisOperasionalModel();
    }

    public function index()
    {
        $data = [
            'activeMenu'    => 'randis-kendaraan-data',
            'randis'       => $this->randisModel->getAll()
        ];
        return view("dataRandis/dataRandis", $data);

        $data['activeMenu'] = 'randis-kendaraan-data';
        return view("blank", $data);
    }

    public function add()
    {
        $data = [
            'activeMenu'    => 'randis-kendaraan-tambah',
            'listJenisOps' => $this->jenisOpsModel->findAll()
        ];
        return view('dataRandis/inputRandis', $data);
    }

    public function edit($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataRandis = $this->randisModel->find($idDecryption);

        if (empty($dataRandis)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kendaraan Dinas Tidak ditemukan !');
        }
        $data = [
            'activeMenu'    => 'randis-kendaraan-ubah',
            'randis'     => $dataRandis,
            'listJenisOps' => $this->jenisOpsModel->findAll()
        ];

        return view('dataRandis/inputRandis', $data);
    }

    public function save($id)
    {
        $nopol = $this->request->getVar('nopol');
        $tahun = $this->request->getVar('tahun');
        $merk = $this->request->getVar('merk');
        $tipe = $this->request->getVar('tipe');
        $jenisOps = $this->request->getVar('jenisOps');
        $keterangan = $this->request->getVar('keterangan');
        if ($id == NULL) {
            $this->randisModel->insert([
                'nopol' => $nopol,
                'tahun_pengadaan' => $tahun,
                'merk_kendaraan' => $merk,
                'tipe_kendaraan' => $tipe,
                'id_jenis_operasional' => $jenisOps,
                'keterangan' => $keterangan
            ]);
        } else {
            $this->randisModel->update($id, [
                'nopol' => $nopol,
                'tahun_pengadaan' => $tahun,
                'merk_kendaraan' => $merk,
                'tipe_kendaraan' => $tipe,
                'id_jenis_operasional' => $jenisOps,
                'keterangan' => $keterangan
            ]);
        }
        return redirect()->to(base_url("data-randis"));
    }
}
