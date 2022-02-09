<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'pelanggan';
    protected $allowedFields = ['id_transaksi', 'nama_pelanggan', 'no_telepon'];

    public function insertPelanggan($data)
    {
        $idTransaksi = $data['id_transaksi'];
        $namaPelanggan = $data['nama_pelanggan'];
        $noTelepon = $data['no_telepon'];

        return $this->db->query("INSERT INTO $this->table(id_transaksi, nama_pelanggan, no_telepon) VALUES('$idTransaksi', '$namaPelanggan', '$noTelepon');");
    }

    public function getPelangganByID($id)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE id_transaksi='$id';")->getRowArray();
    }
}
