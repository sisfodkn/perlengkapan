<?php

namespace App\Models;

use CodeIgniter\Model;

class DistribusiPermintaanPengadaanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'distribusi_permintaan_pengadaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_permintaan_pengadaan',
        'status',
        'tgl_kirim',
        'tgl_terkirim',
        'tgl_terima'
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

    public function getTotalPendingStatus()
    {
        $query = $this->db->query("SELECT count(*) AS total
            FROM $this->table
            WHERE $this->table.status = 0");
        return $query->getFirstRow();
    }

    public function findPendingStatus()
    {
        $query = $this->db->query("SELECT $this->table.id,
            permintaan_pengadaan.tgl_pengajuan,
            sub_unit.nama_subunit,
            permintaan_pengadaan.tipe_pengadaan,
            permintaan_pengadaan.jenis_kegiatan,
            permintaan_pengadaan.isi_permintaan,
            $this->table.tgl_kirim,
            $this->table.status,
            (CASE $this->table.status
                WHEN 0 THEN
                    'Perlu Dikirim'
                WHEN 1 THEN
                    'Sedang Dikirim'
                WHEN 2 THEN
                    'Sudah Terkirim'
                WHEN 3 THEN
                    'Sudah Diterima'
            END) AS keterangan
            FROM $this->table
            JOIN permintaan_pengadaan ON permintaan_pengadaan.id = $this->table.id_permintaan_pengadaan
            LEFT JOIN pegawai ON permintaan_pengadaan.id_pegawai = pegawai.id
            LEFT JOIN unit ON permintaan_pengadaan.id_unit = unit.id
            LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id
            WHERE $this->table.status = 0
            OR $this->table.status = 1");
        return $query->getResult();
    }

    public function getRiwayatPengadaan()
    {
        $sql = "SELECT permintaan_pengadaan.tgl_pengajuan,
            sub_unit.nama_subunit,
            permintaan_pengadaan.tipe_pengadaan,
            permintaan_pengadaan.jenis_kegiatan,
            permintaan_pengadaan.isi_permintaan,
            permintaan_pengadaan.status AS status_persetujuan,
            (CASE permintaan_pengadaan.status
                WHEN 0 THEN
                    'Belum Disetujui'
                WHEN 1 THEN
                    'Disetujui Subbag'
                WHEN 2 THEN
                    'Disetujui Kabag'
                WHEN 3 THEN
                    'Disetujui Karoum'
            END) AS keterangan_persetujuan,
            distribusi_permintaan_pengadaan.tgl_kirim,
            distribusi_permintaan_pengadaan.tgl_terkirim,
            distribusi_permintaan_pengadaan.tgl_terima,
            distribusi_permintaan_pengadaan.status AS status_kirim,
            (CASE distribusi_permintaan_pengadaan.status
                WHEN 0 THEN
                    'Perlu Dikirim'
                WHEN 1 THEN
                    'Sedang Dikirim'
                WHEN 2 THEN
                    'Sudah Terkirim'
                WHEN 3 THEN
                    'Sudah Diterima'
            END) AS keterangan_kirim
        FROM distribusi_permintaan_pengadaan
        JOIN permintaan_pengadaan ON permintaan_pengadaan.id = distribusi_permintaan_pengadaan.id_permintaan_pengadaan
        LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id";
        $query = $this->db->query($sql);
        return $query->getResult();
    }
}
