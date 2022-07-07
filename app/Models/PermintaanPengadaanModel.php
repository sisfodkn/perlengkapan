<?php

namespace App\Models;

use CodeIgniter\Model;

class PermintaanPengadaanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'permintaan_pengadaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pegawai',
        'id_unit',
        'id_subunit',
        'tipe_pengadaan',
        'jenis_kegiatan',
        'isi_permintaan',
        'tgl_pengajuan',
        'tgl_persetujuan',
        'status_sub',
        'status'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getPendingRequest($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT count(*) AS total 
        FROM permintaan_pengadaan 
        WHERE id_unit = '$id_unit'
        AND id_subunit = '$id_subunit'
        AND status_sub = 0
        AND status = 0");
        return $query->getFirstRow();
    }

    public function getListPendingRequest($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT
            pegawai.nama_pegawai,
            permintaan_pengadaan.tipe_pengadaan,
            permintaan_pengadaan.jenis_kegiatan,
            permintaan_pengadaan.isi_permintaan,
            permintaan_pengadaan.tgl_pengajuan
        FROM permintaan_pengadaan 
        LEFT JOIN pegawai ON permintaan_pengadaan.id_pegawai = pegawai.id
        LEFT JOIN unit ON permintaan_pengadaan.id_unit = unit.id
        LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id
        WHERE permintaan_pengadaan.id_unit = '$id_unit'
        AND permintaan_pengadaan.id_subunit = '$id_subunit'
        AND permintaan_pengadaan.status_sub = 0
        AND permintaan_pengadaan.status = 0");
        return $query->getResult();
    }


    public function getCompleteRequest($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT count(*) AS total 
        FROM permintaan_pengadaan 
        WHERE id_unit = '$id_unit'
        AND id_subunit = '$id_subunit'
        AND status_sub = 1
        AND status = 1");
        return $query->getFirstRow();
    }

    public function getListCompleteRequest($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT
            pegawai.nama_pegawai,
            permintaan_pengadaan.tipe_pengadaan,
            permintaan_pengadaan.jenis_kegiatan,
            permintaan_pengadaan.isi_permintaan,
            permintaan_pengadaan.tgl_persetujuan
        FROM permintaan_pengadaan 
        LEFT JOIN pegawai ON permintaan_pengadaan.id_pegawai = pegawai.id
        LEFT JOIN unit ON permintaan_pengadaan.id_unit = unit.id
        LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id
        WHERE permintaan_pengadaan.id_unit = '$id_unit'
        AND permintaan_pengadaan.id_subunit = '$id_subunit'
        AND permintaan_pengadaan.status_sub = 1
        AND permintaan_pengadaan.status = 1");
        return $query->getResult();
    }
}
