<?php

namespace App\Controllers\DataUtama;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\JabatanModel;
use App\Models\UnitModel;
use App\Models\SubUnitModel;
use App\Models\UsersModel;

class PegawaiController extends BaseController
{
    function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
        $this->jabatanModel = new JabatanModel();
        $this->unitModel = new UnitModel();
        $this->subUnitModel = new SubUnitModel();
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $data = [
            'activeMenu'    => 'utama-pegawai-data',
            'pegawai'       => $this->pegawaiModel->getAll()
        ];
        return view("dataUtama/dataPegawai", $data);
    }

    public function add()
    {
        $data = [
            'activeMenu'    => 'utama-pegawai-tambah',
            'listJabatan' => $this->jabatanModel->findAll(),
            'listUnit' => $this->unitModel->findAll(),
            'listSubUnit' => $this->subUnitModel->findAll()
        ];
        return view('dataUtama/inputPegawai', $data);
    }

    public function edit($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataPegawai = $this->pegawaiModel->find($idDecryption);

        if (empty($dataPegawai)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $data = [
            'activeMenu'    => 'utama-pegawai-ubah',
            'pegawai'     => $dataPegawai,
            'listJabatan' => $this->jabatanModel->findAll(),
            'listUnit' => $this->unitModel->findAll(),
            'listSubUnit' => $this->subUnitModel->findAll()
        ];

        return view('dataUtama/inputPegawai', $data);
    }

    public function save($id)
    {
        $nip = $this->request->getVar('nip');
        $namaPegawai = $this->request->getVar('namaPegawai');
        $pangkat = $this->request->getVar('pangkat');
        $jabatan = $this->request->getVar('jabatan');
        $unit = $this->request->getVar('unit');
        $subUnit = $this->request->getVar('subUnit');
        if ($id == NULL) {
            $this->pegawaiModel->insert([
                'nip_nrp' => $nip,
                'nama_pegawai' => $namaPegawai,
                'pangkat' => $pangkat,
                'id_jabatan' => $jabatan,
                'id_unit' => $unit,
                'id_subunit' => $subUnit
            ]);
            return redirect()->to(base_url("input-pegawai"));
        } else {
            $this->pegawaiModel->update($id, [
                'nip_nrp' => $nip,
                'nama_pegawai' => $namaPegawai,
                'pangkat' => $pangkat,
                'id_jabatan' => $jabatan,
                'id_unit' => $unit,
                'id_subunit' => $subUnit
            ]);
            return redirect()->to(base_url("data-pegawai"));
        }
    }

    public function delete($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataPegawai = $this->pegawaiModel->find($idDecryption);
        $dataUsers = $this->usersModel->findByIdPegawai($idDecryption);

        $namaPegawai = $dataPegawai['nama_pegawai'];
        if (!empty($dataUsers)) {
            $this->usersModel->delete($dataUsers->id);
        }
        $this->pegawaiModel->delete($idDecryption);
        session()->setFlashData("success", "Pegawai <b>$namaPegawai</b> berhasil dihapus.");

        return redirect()->to(base_url("data-pegawai"));
    }
}
