<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganPOModel extends Model
{
    protected $table = 'pelanggan_po';
    protected $allowedFields = ['id_transaksi_po', 'nama_pelanggan', 'no_telepon'];

    public function insertPelangganPO($data)
    {
        $idTransaksiPO = $data['id_transaksi_po'];
        $namaPelanggan = $data['nama_pelanggan'];
        $noTelepon = $data['no_telepon'];

        return $this->db->query("INSERT INTO $this->table(id_transaksi_po, nama_pelanggan, no_telepon) VALUES('$idTransaksiPO', '$namaPelanggan', '$noTelepon');");
    }

    public function getPelangganPOByID($id)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE id_transaksi_po='$id';")->getRowArray();
    }
}
