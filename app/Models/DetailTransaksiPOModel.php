<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiPOModel extends Model
{
    protected $table = 'detail_transaksi_po';
    protected $allowedFields = ['id_transaksi_po', 'nama_barang', 'harga_barang', 'quantity', 'satuan', 'jumlah', 'tanggal'];

    public function insertDetailTransaksiPO($data)
    {
        $idTransaksiPO = $data['id_transaksi_po'];
        $namaBarang = $data['nama_barang'];
        $hargaBarang = $data['harga_barang'];
        $quantity = $data['quantity'];
        $satuan = $data['satuan'];
        $jumlah = $data['jumlah'];
        $tanggal = $data['tanggal'];

        return $this->db->query("INSERT INTO $this->table(id_transaksi_po, nama_barang, harga_barang, quantity, satuan, jumlah, tanggal) VALUES ('$idTransaksiPO', '$namaBarang', '$hargaBarang', '$quantity', '$satuan', '$jumlah', STR_TO_DATE('$tanggal','%Y-%m-%d'));");
    }

    public function getDetailTransaksiPOByID($idTransaksiPO)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE id_transaksi_po='$idTransaksiPO';")->getResultArray();
    }
}
