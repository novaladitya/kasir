<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiPo extends Migration
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
			'no_transaksi' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'tanggal' => [
				'type' 			 => 'DATE'
			],
			'subtotal' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'constraint'     => 255
			],
			'diskon' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'constraint'     => 255
			],
			'total' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'constraint'     => 255
			],
			'total_dp' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'constraint'     => 255
			],
			'nama_petugas' => [
				'type'           => 'VARCHAR',
				'constraint'     => 15
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('transaksi_po');
	}

	public function down()
	{
		$this->forge->dropTable('transaksi_po');
	}
}
