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

    public function getAll()
    {
        $query = $this->db->query("SELECT
            pegawai.id,
            pegawai.nip_nrp,
            pegawai.nama_pegawai,
            pegawai.pangkat,
            jabatan.nama_jabatan,
            unit.nama_unit,
            sub_unit.nama_subunit
        FROM pegawai
        JOIN jabatan ON pegawai.id_jabatan = jabatan.id
        JOIN unit ON pegawai.id_unit = unit.id
        LEFT JOIN sub_unit ON pegawai.id_subunit = sub_unit.id
        ORDER BY pegawai.id_unit");
        return $query->getResult();
    }

    public function getCountAll()
    {
        $query = $this->db->query("SELECT
            count(*) AS total
        FROM pegawai");
        return $query->getFirstRow();
    }
}
