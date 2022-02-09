<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailTransaksi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'constraint'     => 255,
				'auto_increment' => true
			],
			'id_transaksi' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'constraint'     => 255
			],
			'nama_barang' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'harga_barang' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'constraint'     => 255
			],
			'quantity' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'constraint'     => 255
			],
			'satuan' => [
				'type'           => 'VARCHAR',
				'constraint'     => 10
			],
			'jumlah' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'constraint'     => 255
			],
			'tanggal' => [
				'type' => 'DATE',
				'null' => TRUE
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_transaksi', 'transaksi', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('detail_transaksi');
	}

	public function down()
	{
		$this->forge->dropTable('detail_transaksi');
	}
}
