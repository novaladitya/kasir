<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'kode_barang'  => 'IC',
				'nama_barang'  => 'ID Card',
				'satuan'	   => 'pcs',
				'harga_barang' => '5000'
			],
			[
				'kode_barang'  => 'ND',
				'nama_barang'  => 'Nama Dada Peniti',
				'satuan'	   => 'pcs',
				'harga_barang' => '20000'
			],
			[
				'kode_barang'  => 'FC',
				'nama_barang'  => 'Frame Card Amica',
				'satuan'	   => 'pcs',
				'harga_barang' => '2000'
			],
			[
				'kode_barang'  => 'CS',
				'nama_barang'  => 'Cetakan/Setting',
				'satuan'	   => 'pcs',
				'harga_barang' => '1000'
			],
			[
				'kode_barang'  => 'NT',
				'nama_barang'  => 'Name Tag',
				'satuan'	   => 'pcs',
				'harga_barang' => '10000'
			],
			[
				'kode_barang'  => 'TN',
				'nama_barang'  => 'Tali Name Tag',
				'satuan'	   => 'pcs',
				'harga_barang' => '5000'
			],
			[
				'kode_barang'  => 'KK',
				'nama_barang'  => 'Kertas Karton',
				'satuan'	   => 'pcs',
				'harga_barang' => '3000'
			],
			[
				'kode_barang'  => 'PL',
				'nama_barang'  => 'Plastik Laminating',
				'satuan'	   => 'pcs',
				'harga_barang' => '8000'
			],
			[
				'kode_barang'  => 'KB',
				'nama_barang'  => 'Kertas Bufallo',
				'satuan'	   => 'pcs',
				'harga_barang' => '3000'
			],
			[
				'kode_barang'  => 'SG',
				'nama_barang'  => 'Sticker Gloss',
				'satuan'	   => 'pcs',
				'harga_barang' => '1000'
			],
		];

		$this->db->table('barang')->insertBatch($data);
	}
}
