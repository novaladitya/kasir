<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'SMALLINT',
				'unsigned'       => true,
				'constraint'     => 255,
				'auto_increment' => true
			],
			'kode_barang' => [
				'type'           => 'VARCHAR',
				'constraint'     => 10
			],
			'nama_barang' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'satuan' => [
				'type'           => 'VARCHAR',
				'constraint'     => 10
			],
			'harga_barang' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('barang');
	}

	public function down()
	{
		$this->forge->dropTable('barang');
	}
}
