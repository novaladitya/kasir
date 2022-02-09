<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiModel extends Model
{
    protected $table = 'detail_transaksi';
    protected $allowedFields = ['id_transaksi', 'nama_barang', 'harga_barang', 'quantity', 'satuan', 'jumlah', 'tanggal'];

    public function insertDetailTransaksi($data)
    {
        $idTransaksi = $data['id_transaksi'];
        $namaBarang = $data['nama_barang'];
        $hargaBarang = $data['harga_barang'];
        $quantity = $data['quantity'];
        $satuan = $data['satuan'];
        $jumlah = $data['jumlah'];
        $tanggal = $data['tanggal'];

        return $this->db->query("INSERT INTO $this->table(id_transaksi, nama_barang, harga_barang, quantity, satuan, jumlah, tanggal) VALUES ('$idTransaksi', '$namaBarang', '$hargaBarang', '$quantity', '$satuan', '$jumlah', STR_TO_DATE('$tanggal','%Y-%m-%d'));");
    }

    public function getDetailTransaksiByID($idTransaksi)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE id_transaksi='$idTransaksi';")->getResultArray();
    }

    public function getLaporanPenjualan($from, $to)
    {
        return $this->db->query("SELECT nama_barang, SUM(quantity) AS quantity, SUM(jumlah) AS gross FROM $this->table WHERE tanggal BETWEEN '$from' AND '$to' GROUP BY nama_barang;")->getResultArray();
    }

    public function getDetailTransaksiByDate($from, $to)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE tanggal BETWEEN '$from' AND '$to';")->getResultArray();
    }
}
