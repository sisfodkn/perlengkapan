<?php

namespace App\Controllers\DataUtama;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\UnitModel;

class UnitController extends BaseController
{
    function __construct()
    {
        $this->unitModel = new UnitModel();
        $this->pegawaiModel = new PegawaiModel();
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
        $data = [
            'activeMenu'    => 'utama-unit-tambah',
            'prop'          => new \Config\Properties()
        ];
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

    public function delete($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataUnit = $this->unitModel->find($idDecryption);
        $dataPegawai = $this->pegawaiModel->findByUnit($dataUnit['id']);
        $unit = $dataUnit['nama_unit'];
        if (empty($dataPegawai)) {
            $this->unitModel->delete($idDecryption);
            session()->setFlashData("success", "Unit Kerja $unit berhasil dihapus.");
        } else {
            $nama = "";
            foreach ($dataPegawai as $data) :
                $nama = $nama . "- <b>" . $data->nama_pegawai . "</b><br/>";
            endforeach;
            session()->setFlashData("info", "Gagal dihapus!! <br/> Unit Kerja <b>$unit</b> masih digunakan oleh <br/>" . $nama);
        }

        return redirect()->to(base_url("data-unit"));
    }
}
