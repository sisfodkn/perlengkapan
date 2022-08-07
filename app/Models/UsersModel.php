<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'username',
        'password',
        'role',
        'id_pegawai'
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
            $this->table.username,
            $this->table.role,
            pegawai.nama_pegawai
        FROM    $this->table
        JOIN    pegawai ON $this->table.id_pegawai = pegawai.id
        WHERE   $this->table.username != 'admin'");
        return $query->getResult();
    }

    public function findById($id)
    {
        $query = $this->db->query("SELECT
            $this->table.id,
            $this->table.username,
            $this->table.role,
            pegawai.nama_pegawai
        FROM    $this->table
        JOIN    pegawai ON $this->table.id_pegawai = pegawai.id
        WHERE   $this->table.id = '$id'");
        return $query->getFirstRow();
    }

    public function findByUsername($username)
    {
        $query = $this->db->query("SELECT 
            $this->table.id,
            $this->table.username,
            $this->table.role,
            $this->table.id_pegawai,
            pegawai.nip_nrp,
            pegawai.nama_pegawai,
            pegawai.id_jabatan,
            jabatan.nama_jabatan,
            pegawai.id_unit,
            unit.nama_unit,
            pegawai.id_subunit,
            sub_unit.nama_subunit
        FROM $this->table
        JOIN        pegawai     ON $this->table.id_pegawai = pegawai.id
        LEFT JOIN   jabatan     ON pegawai.id_jabatan = jabatan.id
        LEFT JOIN   unit        ON pegawai.id_unit = unit.id
        LEFT JOIN   sub_unit    ON pegawai.id_subunit = sub_unit.id
        WHERE $this->table.username = '$username'");
        return $query->getFirstRow();
    }

    public function findByIdPegawai($id)
    {
        $query = $this->db->query("SELECT
            $this->table.id
        FROM    $this->table
        WHERE   $this->table.id_pegawai = '$id'");
        return $query->getFirstRow();
    }
}
