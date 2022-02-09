<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
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
		$this->forge->addForeignKey('id_transaksi', 'transaksi', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('pelanggan');
	}

	public function down()
	{
		$this->forge->dropTable('pelanggan');
	}
}
