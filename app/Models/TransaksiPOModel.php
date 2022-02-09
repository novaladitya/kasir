<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiPOModel extends Model
{
    protected $table = 'transaksi_po';
    protected $allowedFields = ['no_transaksi_po', 'tanggal', 'subtotal', 'diskon', 'total', 'total_dp', 'nama_petugas'];

    public function insertTransaksiPO($data)
    {
        $noTransaksiPO = $data['no_transaksi_po'];
        $tanggal = $data['tanggal'];
        $subtotal = $data['subtotal'];
        $diskon = $data['diskon'];
        $total = $data['total'];
        $totalDp = $data['total_dp'];
        $namaPetugas = $data['nama_petugas'];

        return $this->db->query("INSERT INTO $this->table(no_transaksi_po, tanggal, subtotal, diskon, total, total_dp, nama_petugas) VALUES ('$noTransaksiPO', STR_TO_DATE('$tanggal','%Y-%m-%d'), '$subtotal', '$diskon', '$total', '$totalDp', '$namaPetugas');");
    }

    public function getAllTransaksiPO()
    {
        return $this->db->query("SELECT transaksi_po.id, pelanggan_po.nama_pelanggan, detail_transaksi_po.nama_barang, transaksi_po.total, transaksi_po.total_dp, transaksi_po.nama_petugas FROM transaksi_po JOIN pelanggan_po ON transaksi_po.id=pelanggan_po.id_transaksi_po JOIN detail_transaksi_po ON transaksi_po.id=detail_transaksi_po.id_transaksi_po GROUP BY transaksi_po.id;")->getResultArray();
    }

    public function getTransaksiPOByID($id)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE id='$id';")->getRowArray();
    }

    public function deleteTransaksiPO($id)
    {
        return $this->db->query("DELETE FROM $this->table WHERE id='$id';");
    }

    public function getLastTransaksiPO()
    {
        return $this->db->query("SELECT * FROM $this->table ORDER BY id DESC LIMIT 1")->getRowArray();
    }
}
