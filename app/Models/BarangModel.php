<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $allowedFields = ['kode_barang', 'nama_barang', 'satuan', 'harga_barang'];

    public function getBarang()
    {
        return $this->db->query("SELECT * FROM $this->table")->getResultArray();
    }

    public function insertBarang($data)
    {
        $kodeBarang = $data['kode_barang'];
        $namaBarang = $data['nama_barang'];
        $satuan = $data['satuan'];
        $hargaBarang = $data['harga_barang'];

        return $this->db->query("INSERT INTO $this->table(kode_barang, nama_barang, satuan, harga_barang) VALUES('$kodeBarang', '$namaBarang', '$satuan', '$hargaBarang');");
    }

    public function updateBarang($data)
    {
        return $this->updateBatch($data, 'id');
    }

    public function deleteBarang($id)
    {
        return $this->db->query("DELETE FROM $this->table WHERE id='$id';");
    }
}
