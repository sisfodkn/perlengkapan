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
            $this->table.id,
            $this->table.nopol,
            $this->table.tahun_pengadaan,
            $this->table.merk_kendaraan,
            $this->table.tipe_kendaraan,
            jenis_operasional.jenis_operasional,
            $this->table.keterangan
        FROM $this->table
        JOIN jenis_operasional ON $this->table.id_jenis_operasional = jenis_operasional.id
        ORDER BY $this->table.id");
        return $query->getResult();
    }

    public function getAllNoDist()
    {
        $query = $this->db->query("SELECT
            $this->table.id,
            $this->table.nopol,
            $this->table.merk_kendaraan
        FROM $this->table
        JOIN jenis_operasional ON $this->table.id_jenis_operasional = jenis_operasional.id
        WHERE $this->table.id NOT IN (SELECT id_kendaraan_dinas FROM distribusi_randis)
        AND $this->table.id_jenis_operasional != 1
        ORDER BY $this->table.id");
        return $query->getResult();
    }

    public function getCurrentAndNoDist($currentId)
    {
        $query = $this->db->query("SELECT
            $this->table.id,
            $this->table.nopol,
            $this->table.merk_kendaraan
        FROM $this->table
        JOIN jenis_operasional ON $this->table.id_jenis_operasional = jenis_operasional.id
        WHERE $this->table.id NOT IN (SELECT id_kendaraan_dinas FROM distribusi_randis)
        OR $this->table.id = '$currentId'
        AND $this->table.id_jenis_operasional != 1
        ORDER BY $this->table.id");
        return $query->getResult();
    }

    public function findRandisPerkantoran()
    {
        $query = $this->db->query("SELECT
            $this->table.id,
            $this->table.nopol,
            $this->table.merk_kendaraan
        FROM $this->table
        JOIN jenis_operasional ON $this->table.id_jenis_operasional = jenis_operasional.id
        WHERE $this->table.id NOT IN (SELECT id_kendaraan_dinas FROM distribusi_randis)
        AND $this->table.id_jenis_operasional = 1
        ORDER BY $this->table.id");
        return $query->getResult();
    }
}
