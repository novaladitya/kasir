<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
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
			'jam' => [
				'type'           => 'VARCHAR',
				'constraint'     => 10
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
			'metode_pembayaran' => [
				'type'           => 'CHAR',
				'constraint'     => 50
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('transaksi');
	}

	public function down()
	{
		$this->forge->dropTable('transaksi');
	}
}
