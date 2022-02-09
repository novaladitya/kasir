<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'TINYINT',
				'unsigned'       => true,
				'constraint'     => 255,
				'auto_increment' => true
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'role' => [
				'type'           => 'VARCHAR',
				'constraint'     => 15
			],
			'nama_user' => [
				'type'           => 'VARCHAR',
				'constraint'     => 15
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
