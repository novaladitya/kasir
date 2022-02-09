<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PelangganPo extends Migration
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
			'id_transaksi_po' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'constraint'     => 255
			],
			'nama_pelanggan' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'no_telepon' => [
				'type'           => 'VARCHAR',
				'constraint'     => 15
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_transaksi_po', 'transaksi_po', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('pelanggan_po');
	}

	public function down()
	{
		$this->forge->dropTable('pelanggan_po');
	}
}
