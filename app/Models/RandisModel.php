<?php

namespace App\Models;

use CodeIgniter\Model;

class RandisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kendaraan_dinas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nopol',
        'tahun_pengadaan',
        'merk_kendaraan',
        'tipe_kendaraan',
        'id_jenis_operasional',
        'keterangan'
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

    public function getAll()
    {
        $query = $this->db->query("SELECT
            kendaraan_dinas.id,
            kendaraan_dinas.nopol,
            kendaraan_dinas.tahun_pengadaan,
            kendaraan_dinas.merk_kendaraan,
            kendaraan_dinas.tipe_kendaraan,
            jenis_operasional.jenis_operasional,
            kendaraan_dinas.keterangan
        FROM kendaraan_dinas
        JOIN jenis_operasional ON kendaraan_dinas.id_jenis_operasional = jenis_operasional.id
        ORDER BY kendaraan_dinas.id");
        return $query->getResult();
    }

    public function getAllNoDist()
    {
        $query = $this->db->query("SELECT
            kendaraan_dinas.id,
            kendaraan_dinas.nopol,
            kendaraan_dinas.merk_kendaraan
        FROM kendaraan_dinas
        JOIN jenis_operasional ON kendaraan_dinas.id_jenis_operasional = jenis_operasional.id
        WHERE kendaraan_dinas.id NOT IN (SELECT id_kendaraan_dinas FROM distribusi_randis)
        AND kendaraan_dinas.id_jenis_operasional != 1
        ORDER BY kendaraan_dinas.id");
        return $query->getResult();
    }

    public function getCurrentAndNoDist($currentId)
    {
        $query = $this->db->query("SELECT
            kendaraan_dinas.id,
            kendaraan_dinas.nopol,
            kendaraan_dinas.merk_kendaraan
        FROM kendaraan_dinas
        JOIN jenis_operasional ON kendaraan_dinas.id_jenis_operasional = jenis_operasional.id
        WHERE kendaraan_dinas.id NOT IN (SELECT id_kendaraan_dinas FROM distribusi_randis)
        OR kendaraan_dinas.id = '$currentId'
        AND kendaraan_dinas.id_jenis_operasional != 1
        ORDER BY kendaraan_dinas.id");
        return $query->getResult();
    }
}
