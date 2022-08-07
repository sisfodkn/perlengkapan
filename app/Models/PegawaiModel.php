<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nip_nrp',
        'nama_pegawai',
        'pangkat',
        'id_jabatan',
        'id_unit',
        'id_subunit'
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

    public function findByJabatan($id)
    {
        $query = $this->db->query("SELECT 
            nama_pegawai
        FROM $this->table
        WHERE id_jabatan = '$id'");
        return $query->getResult();
    }

    public function findByUnit($id)
    {
        $query = $this->db->query("SELECT 
            nama_pegawai
        FROM $this->table
        WHERE id_unit = '$id'");
        return $query->getResult();
    }

    public function findBySubUnit($id)
    {
        $query = $this->db->query("SELECT 
            nama_pegawai
        FROM $this->table
        WHERE id_subunit = '$id'");
        return $query->getResult();
    }

    public function getAll()
    {
        $query = $this->db->query("SELECT
            $this->table.id,
            $this->table.nip_nrp,
            $this->table.nama_pegawai,
            $this->table.pangkat,
            jabatan.nama_jabatan,
            unit.nama_unit,
            sub_unit.nama_subunit
        FROM $this->table
        JOIN jabatan ON $this->table.id_jabatan = jabatan.id
        JOIN unit ON $this->table.id_unit = unit.id
        LEFT JOIN sub_unit ON $this->table.id_subunit = sub_unit.id
        ORDER BY $this->table.id_unit");
        return $query->getResult();
    }

    public function getPegawaiNoUsers()
    {
        $query = $this->db->query("SELECT *
        FROM $this->table
        WHERE id NOT IN (
            SELECT users.id_pegawai
            FROM users )");
        return $query->getResult();
    }

    public function getCountAll()
    {
        $query = $this->db->query("SELECT
            count(*) AS total
        FROM $this->table");
        return $query->getFirstRow();
    }

    public function getAllNoDist()
    {
        $query = $this->db->query("SELECT
            $this->table.id,
            $this->table.nama_pegawai,
            jabatan.nama_jabatan,
            unit.nama_unit
        FROM $this->table
        JOIN jabatan ON $this->table.id_jabatan = jabatan.id
        JOIN unit ON $this->table.id_unit = unit.id
        WHERE $this->table.id NOT IN (SELECT id_pegawai FROM distribusi_randis)
        ORDER BY $this->table.nama_pegawai");
        return $query->getResult();
    }

    public function getCurrentAndNoDist($currentId)
    {
        $query = $this->db->query("SELECT
            $this->table.id,
            $this->table.nama_pegawai,
            jabatan.nama_jabatan,
            unit.nama_unit
        FROM $this->table
        JOIN jabatan ON $this->table.id_jabatan = jabatan.id
        JOIN unit ON $this->table.id_unit = unit.id
        WHERE $this->table.id NOT IN (SELECT id_pegawai FROM distribusi_randis)
        OR $this->table.id = '$currentId'
        ORDER BY $this->table.nama_pegawai");
        return $query->getResult();
    }
}
