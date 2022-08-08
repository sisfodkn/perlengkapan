<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanRandisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'peminjaman_randis';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pegawai',
        'id_randis',
        'tgl_pengajuan',
        'tgl_peminjaman',
        'tgl_pengembalian',
        'keperluan',
        'tgl_persetujuan_subbag',
        'tgl_persetujuan_bag',
        'tgl_persetujuan_karo',
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

    public function getAllListPendingRequest()
    {
        switch (session()->get('role')) {
            case session()->get('props')->roleSubBMN:
                $where = "WHERE $this->table.tgl_persetujuan_subbag IS NULL";
                break;
            case session()->get('props')->roleKabag:
                $where = "WHERE $this->table.tgl_persetujuan_bag IS NULL";
                break;
            case session()->get('props')->roleKaro:
                $where = "WHERE $this->table.tgl_persetujuan_karo IS NULL";
                break;
        }
        $sql = "SELECT
            $this->table.id,
            $this->table.tgl_pengajuan,
            pegawai.nama_pegawai,
            kendaraan_dinas.nopol,
            kendaraan_dinas.merk_kendaraan,
            $this->table.tgl_pengajuan,
            $this->table.tgl_peminjaman,
            $this->table.tgl_pengembalian,
            $this->table.keperluan,
            $this->table.tgl_persetujuan_subbag,
            $this->table.tgl_persetujuan_bag,
            $this->table.tgl_persetujuan_karo,
            $this->table.status,
            (CASE $this->table.status
                WHEN 0 THEN
                    'Belum Disetujui'
                WHEN 1 THEN
                    'Disetujui Subbag'
                WHEN 2 THEN
                    'Disetujui Kabag'
                WHEN 3 THEN
                    'Disetujui Karoum'
            END) AS keterangan
        FROM $this->table 
        LEFT JOIN pegawai ON $this->table.id_pegawai = pegawai.id
        LEFT JOIN kendaraan_dinas ON $this->table.id_randis = kendaraan_dinas.id " . $where;
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function getTotalPendingRequest()
    {
        switch (session()->get('role')) {
            case session()->get('props')->roleSubBMN:
                $where = "WHERE $this->table.tgl_persetujuan_subbag IS NULL";
                break;
            case session()->get('props')->roleKabag:
                $where = "WHERE $this->table.tgl_persetujuan_subbag IS NULL
                OR $this->table.tgl_persetujuan_bag IS NULL";
                break;
            case session()->get('props')->roleKaro:
                $where = "WHERE $this->table.tgl_persetujuan_subbag IS NULL
                    OR $this->table.tgl_persetujuan_bag IS NULL
                    OR $this->table.tgl_persetujuan_karo IS NULL";
                break;
        }
        $sql = "SELECT count(*) AS total 
            FROM $this->table " . $where;
        $query = $this->db->query("$sql");
        return $query->getFirstRow();
    }

    public function getListPendingRequest($id)
    {
        $query = $this->db->query("SELECT
            pegawai.nama_pegawai,
            kendaraan_dinas.nopol,
            kendaraan_dinas.merk_kendaraan,
            $this->table.tgl_pengajuan,
            $this->table.tgl_peminjaman,
            $this->table.tgl_pengembalian,
            $this->table.keperluan,
            $this->table.tgl_persetujuan_subbag,
            $this->table.tgl_persetujuan_bag,
            $this->table.tgl_persetujuan_karo,
            $this->table.status,
            (CASE $this->table.status
                WHEN 0 THEN
                    'Belum Disetujui'
                WHEN 1 THEN
                    'Disetujui Subbag'
                WHEN 2 THEN
                    'Disetujui Kabag'
                WHEN 3 THEN
                    'Disetujui Karoum'
            END) AS keterangan
        FROM $this->table 
        LEFT JOIN pegawai ON $this->table.id_pegawai = pegawai.id
        LEFT JOIN kendaraan_dinas ON $this->table.id_randis = kendaraan_dinas.id
        WHERE $this->table.id_pegawai = '$id'
        AND ($this->table.tgl_persetujuan_subbag IS NULL
        OR $this->table.tgl_persetujuan_bag IS NULL
        OR $this->table.tgl_persetujuan_karo IS NULL)");
        return $query->getResult();
    }

    public function getTotalPendingUser($id)
    {
        $query = $this->db->query("SELECT count(*) AS total 
        FROM $this->table 
        WHERE id_pegawai = '$id'
        AND ($this->table.tgl_persetujuan_subbag IS NULL
        OR $this->table.tgl_persetujuan_bag IS NULL
        OR $this->table.tgl_persetujuan_karo IS NULL)");
        return $query->getFirstRow();
    }

    public function getListCompleteRequest($id)
    {
        $query = $this->db->query("SELECT
            pegawai.nama_pegawai,
            kendaraan_dinas.nopol,
            kendaraan_dinas.merk_kendaraan,
            $this->table.tgl_pengajuan,
            $this->table.tgl_peminjaman,
            $this->table.tgl_pengembalian,
            $this->table.keperluan,
            $this->table.tgl_persetujuan_karo,
            $this->table.status,
            (CASE $this->table.status
                WHEN 0 THEN
                    'Belum Disetujui'
                WHEN 1 THEN
                    'Disetujui Subbag'
                WHEN 2 THEN
                    'Disetujui Kabag'
                WHEN 3 THEN
                    'Disetujui Karoum'
            END) AS keterangan
        FROM $this->table 
        LEFT JOIN pegawai ON $this->table.id_pegawai = pegawai.id
        LEFT JOIN kendaraan_dinas ON $this->table.id_randis = kendaraan_dinas.id
        WHERE $this->table.id_pegawai = '$id'
        AND ($this->table.tgl_persetujuan_subbag IS NOT NULL
        OR $this->table.tgl_persetujuan_bag IS NOT NULL
        OR $this->table.tgl_persetujuan_karo IS NOT NULL)
        ORDER BY $this->table.tgl_pengajuan DESC");
        return $query->getResult();
    }

    public function getTotalCompleteRequest($id)
    {
        $query = $this->db->query("SELECT count(*) AS total 
        FROM $this->table 
        WHERE id_pegawai = '$id'
        AND $this->table.tgl_persetujuan_subbag IS NOT NULL
        AND $this->table.tgl_persetujuan_bag IS NOT NULL
        AND $this->table.tgl_persetujuan_karo IS NOT NULL");
        return $query->getFirstRow();
    }
}
