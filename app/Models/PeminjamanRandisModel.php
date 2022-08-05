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

    public function getListPendingRequest($id)
    {
        $query = $this->db->query("SELECT
            pegawai.nama_pegawai,
            kendaraan_dinas.nopol,
            kendaraan_dinas.merk_kendaraan,
            peminjaman_randis.tgl_pengajuan,
            peminjaman_randis.tgl_peminjaman,
            peminjaman_randis.tgl_pengembalian,
            peminjaman_randis.keperluan,
            peminjaman_randis.status,
            (CASE peminjaman_randis.status
                WHEN 0 THEN
                    'Belum Disetujui'
                WHEN 1 THEN
                    'Disetujui Subbag'
                WHEN 2 THEN
                    'Disetujui Kabag'
                WHEN 3 THEN
                    'Disetujui Karoum'
            END) AS keterangan
        FROM peminjaman_randis 
        LEFT JOIN pegawai ON peminjaman_randis.id_pegawai = pegawai.id
        LEFT JOIN kendaraan_dinas ON peminjaman_randis.id_randis = kendaraan_dinas.id
        WHERE peminjaman_randis.id_pegawai = '$id'
        AND (peminjaman_randis.tgl_persetujuan_subbag IS NULL
        OR peminjaman_randis.tgl_persetujuan_bag IS NULL
        OR peminjaman_randis.tgl_persetujuan_karo IS NULL)");
        return $query->getResult();
    }

    public function getTotalPendingRequest($id)
    {
        $query = $this->db->query("SELECT count(*) AS total 
        FROM peminjaman_randis 
        WHERE id_pegawai = '$id'
        AND (peminjaman_randis.tgl_persetujuan_subbag IS NULL
        OR peminjaman_randis.tgl_persetujuan_bag IS NULL
        OR peminjaman_randis.tgl_persetujuan_karo IS NULL)");
        return $query->getFirstRow();
    }

    public function getListCompleteRequest($id)
    {
        $query = $this->db->query("SELECT
            pegawai.nama_pegawai,
            kendaraan_dinas.nopol,
            kendaraan_dinas.merk_kendaraan,
            peminjaman_randis.tgl_pengajuan,
            peminjaman_randis.tgl_peminjaman,
            peminjaman_randis.tgl_pengembalian,
            peminjaman_randis.keperluan,
            peminjaman_randis.tgl_persetujuan_karo,
            peminjaman_randis.status,
            (CASE peminjaman_randis.status
                WHEN 0 THEN
                    'Belum Disetujui'
                WHEN 1 THEN
                    'Disetujui Subbag'
                WHEN 2 THEN
                    'Disetujui Kabag'
                WHEN 3 THEN
                    'Disetujui Karoum'
            END) AS keterangan
        FROM peminjaman_randis 
        LEFT JOIN pegawai ON peminjaman_randis.id_pegawai = pegawai.id
        LEFT JOIN kendaraan_dinas ON peminjaman_randis.id_randis = kendaraan_dinas.id
        WHERE peminjaman_randis.id_pegawai = '$id'
        AND (peminjaman_randis.tgl_persetujuan_subbag IS NOT NULL
        OR peminjaman_randis.tgl_persetujuan_bag IS NOT NULL
        OR peminjaman_randis.tgl_persetujuan_karo IS NOT NULL)
        ORDER BY peminjaman_randis.tgl_pengajuan DESC");
        return $query->getResult();
    }

    public function getTotalCompleteRequest($id)
    {
        $query = $this->db->query("SELECT count(*) AS total 
        FROM peminjaman_randis 
        WHERE id_pegawai = '$id'
        AND peminjaman_randis.tgl_persetujuan_subbag IS NOT NULL
        AND peminjaman_randis.tgl_persetujuan_bag IS NOT NULL
        AND peminjaman_randis.tgl_persetujuan_karo IS NOT NULL");
        return $query->getFirstRow();
    }
}
