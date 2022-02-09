<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields = ['tanggal', 'jam', 'subtotal', 'diskon', 'total', 'total_dp', 'metode_pembayaran'];

    public function insertTransaksi($data)
    {
        $noTransaksi = $data['no_transaksi'];
        $tanggal = $data['tanggal'];
        $jam = $data['jam'];
        $subtotal = $data['subtotal'];
        $diskon = $data['diskon'];
        $total = $data['total'];
        $totalDp = $data['total_dp'];
        $metodePembayaran = $data['metode_pembayaran'];

        return $this->db->query("INSERT INTO $this->table(no_transaksi, tanggal, jam, subtotal, diskon, total, total_dp, metode_pembayaran) VALUES ('$noTransaksi', STR_TO_DATE('$tanggal','%Y-%m-%d'), '$jam' , '$subtotal', '$diskon', '$total', '$totalDp', '$metodePembayaran');");
    }

    public function getKas()
    {
        return $this->db->query("SELECT SUM(total) AS kas FROM $this->table;")->getRowArray();
    }

    public function getTransaksiByDate($from, $to)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE tanggal BETWEEN '$from' AND '$to';")->getResultArray();
    }

    public function getLaporanTransaksi($from, $to)
    {
        return $this->db->query("SELECT SUM(subtotal) AS 'penjualan_kotor', SUM(CASE WHEN metode_pembayaran='tunai' THEN total END) AS 'tunai', SUM(CASE WHEN metode_pembayaran='nontunai' THEN total END) AS 'nontunai', SUM(diskon) AS 'diskon', COUNT(id) AS 'jumlah_transaksi' FROM $this->table WHERE tanggal BETWEEN '$from' AND '$to';")->getRowArray();
    }

    public function getLastTransaksi()
    {
        return $this->db->query("SELECT * FROM $this->table ORDER BY id DESC LIMIT 1")->getRowArray();
    }

    public function deleteTransaksi($id)
    {
        return $this->db->query("DELETE FROM $this->table WHERE id='$id';");
    }
}
