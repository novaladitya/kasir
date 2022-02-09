<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\PelangganModel;
use App\Models\TransaksiPOModel;
use App\Models\DetailTransaksiPOModel;
use App\Models\PelangganPOModel;
use App\Models\UserModel;
use \Mpdf\Mpdf;


class Home extends BaseController
{
	protected $barangModel,
		$transaksiModel,
		$detailTransaksiModel,
		$pelangganModel,
		$transaksiPOModel,
		$detailTransaksiPOModel,
		$pelangganPOModel,
		$userModel;
	public function __construct()
	{
		$this->barangModel = new BarangModel();
		$this->transaksiModel = new TransaksiModel();
		$this->detailTransaksiModel = new DetailTransaksiModel();
		$this->pelangganModel = new PelangganModel();
		$this->transaksiPOModel = new TransaksiPOModel();
		$this->detailTransaksiPOModel = new DetailTransaksiPOModel();
		$this->pelangganPOModel = new PelangganPOModel();
		$this->userModel = new UserModel();
	}

	public function login()
	{
		if (session()->get('logged_in')) {
			return redirect()->to('/info');
		} else {
			return view('page/login');
		}
	}

	public function auth()
	{
		$inputPassword = $this->request->getVar('password');
		$user = $this->userModel->getUser($inputPassword);
		if ($user) {
			$dataUser = [
				'nama_user' => $user['nama_user'],
				'role'      => $user['role'],
				'logged_in' => TRUE
			];
			session()->set($dataUser);
			return redirect()->to('/info');
		} else {
			session()->setFlashdata('error', 'User tidak ditemukan.');
			return redirect()->to('/login');
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/login');
	}

	public function info()
	{
		$data = [
			'kas' => $this->transaksiModel->getKas()['kas']
		];

		if (session()->get('logged_in')) {
			return view('page/info', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function index()
	{
		$data = [
			'halaman' => 'index',
			'barang'  => $this->barangModel->getBarang(),
			'po'	  => $this->request->getVar('po') ? TRUE : FALSE
		];

		session()->set('dataTrx');

		if (session()->get('logged_in')) {
			return view('page/kasir', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function fixItem()
	{
		$kode_barang = $this->request->getVar('kode_barang');
		$nama_barang = $this->request->getVar('nama_barang');
		$harga_barang = $this->request->getVar('harga_barang');
		$quantity = $this->request->getVar('quantity');
		$satuan = $this->request->getVar('satuan');
		$dataTrx = session()->get('dataTrx');

		for ($i = 0; $i < count($kode_barang); $i++) {
			if ($quantity[$i] != '0') {
				$temp = [
					'nama_barang'  => $nama_barang[$i],
					'harga_barang' => $harga_barang[$i],
					'quantity'	   => $quantity[$i],
					'satuan'	   => $satuan[$i]
				];
				$dataTrx[$kode_barang[$i]] = $temp;
			} else {
				unset($dataTrx[$kode_barang[$i]]);
			}
		}

		if (empty($dataTrx) && ($this->request->getVar('po') != null))
			return redirect()->to('/?po=TRUE');
		elseif (empty($dataTrx) && ($this->request->getVar('po') == null))
			return redirect()->to('/');

		session()->set('dataTrx', $dataTrx);
		if ($this->request->getVar('po') != null)
			return redirect()->to('/process?po=TRUE');
		else
			return redirect()->to('/process');
	}

	public function process()
	{
		$data = [
			'halaman' 	  => 'index',
			'barang'  	  => $this->barangModel->getBarang(),
			'dataTrx'	  => session()->get('dataTrx'),
			'po'		  => $this->request->getVar('po') != null ? TRUE : FALSE
		];

		if (session()->get('logged_in')) {
			return view('page/kasir', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function fixBayar()
	{
		$transaksi = [
			'subtotal' => $this->request->getVar('subtotal'),
			'diskon'   => $this->request->getVar('diskon'),
			'total_dp' => 0
		];

		$pelanggan = [
			'nama_pelanggan' => $this->request->getVar('nama_pelanggan'),
			'no_telepon'	 => $this->request->getVar('no_telepon')
		];

		session()->set('transaksi', $transaksi);
		session()->set('pelanggan', $pelanggan);
		return redirect()->to('/metodepembayaran');
	}

	public function metodePembayaran()
	{
		$data = [
			'halaman' => 'metode_pembayaran',
			'total'   => (int)session()->get('transaksi')['subtotal'] - (int)session()->get('transaksi')['diskon'],
			'po'      => NULL
		];

		if (session()->get('logged_in')) {
			return view('page/metode_pembayaran', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function inputSukses()
	{
		$curDate = date("Y-m-d");
		$lastTrx = $this->transaksiModel->getLastTransaksi();
		if (!empty($lastTrx)) {
			$lastDate = $lastTrx['tanggal'];
			if ($lastDate == $curDate) {
				$lastNoTrx = (int)explode("-", $lastTrx['no_transaksi'])[1];
				$noTrx = $lastNoTrx + 1;
			} else {
				$noTrx = 1;
			}
		} else {
			$noTrx = 1;
		}
		$this->transaksiModel->insertTransaksi([
			'no_transaksi'		=> 'TRX-' . sprintf('%04d', $noTrx) . '-' . date("jny"),
			'tanggal' 			=> $curDate,
			'jam'	 			=> date("H:i"),
			'subtotal'  		=> session()->get('transaksi')['subtotal'],
			'diskon' 			=> session()->get('transaksi')['diskon'],
			'total' 			=> (int)session()->get('transaksi')['subtotal'] - (int)session()->get('transaksi')['diskon'],
			'total_dp' 			=> session()->get('transaksi')['total_dp'],
			'metode_pembayaran' => $this->request->getVar('metode_pembayaran')
		]);

		$lastId = $this->transaksiModel->getLastTransaksi()['id'];
		foreach (session()->get('dataTrx') as $trx) {
			$this->detailTransaksiModel->insertDetailTransaksi([
				'id_transaksi' => $lastId,
				'nama_barang'  => $trx['nama_barang'],
				'harga_barang' => $trx['harga_barang'],
				'quantity' 	   => $trx['quantity'],
				'satuan' 	   => $trx['satuan'],
				'jumlah' 	   => (int)$trx['harga_barang'] * (int)$trx['quantity'],
				'tanggal' 	   => $curDate
			]);
		}

		$this->pelangganModel->insertPelanggan([
			'id_transaksi'	 => $lastId,
			'nama_pelanggan' => session()->get('pelanggan')['nama_pelanggan'],
			'no_telepon'	 => session()->get('pelanggan')['no_telepon']
		]);

		session()->set('uang', $this->request->getVar('uang'));
		return redirect()->to('/sukses');
	}

	public function trxSukses()
	{
		$trx = $this->transaksiModel->getLastTransaksi();
		$data = [
			'halaman' 		  => 'sukses',
			'uang' 		  	  => session()->get('uang'),
			'kembalian' 	  => (int)session()->get('uang') - ((int)$trx['total'] - (int)$trx['total_dp']),
			'transaksi' 	  => $trx,
			'detailTransaksi' => $this->detailTransaksiModel->getDetailTransaksiByID($trx['id']),
			'pelanggan'       => $this->pelangganModel->getPelangganByID($trx['id'])
		];

		if (session()->get('logged_in')) {
			return view('page/transaksi_sukses', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function daftarBarang()
	{
		$data = [
			'halaman' => 'daftar_barang',
			'barang'  => $this->barangModel->getBarang()
		];

		if (session()->get('logged_in')) {
			return view('page/daftar_barang', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function updateBarang()
	{
		$id = $this->request->getVar('id');
		$hargaBarang = $this->request->getVar('harga_barang');
		$data = [];

		for ($i = 0; $i < count($id); $i++) {
			$data[] = [
				'id' => $id[$i],
				'harga_barang' => $hargaBarang[$i]
			];
		}
		$this->barangModel->updateBarang($data);

		return redirect()->to('/produk');
	}

	public function insertBarang()
	{
		if (!$this->validate([
			'kode_barang' => [
				'rules'  => 'is_unique[barang.kode_barang]',
				'errors' => [
					'is_unique' => "Kode barang sudah ada."
				]
			]
		])) {
			$validation = \Config\Services::validation();
			session()->setFlashdata('error', $validation->getError('kode_barang'));
			return redirect()->to('/produk')->withInput();
		}

		$this->barangModel->insertBarang([
			'kode_barang' => strtoupper($this->request->getVar('kode_barang')),
			'nama_barang' => ucwords($this->request->getVar('nama_barang')),
			'satuan' => $this->request->getVar('satuan'),
			'harga_barang' => $this->request->getVar('harga_barang')
		]);

		session()->setFlashdata('success', 'Barang berhasil ditambah.');
		return redirect()->to('/produk');
	}

	public function deleteBarang($id)
	{
		$this->barangModel->deleteBarang($id);

		session()->setFlashdata('success', 'Barang berhasil dihapus.');
		return redirect()->to('/produk');
	}

	public function manualHarga()
	{
		$data = [
			'halaman' => 'manual_harga',
			'po'	  => $this->request->getVar('po') != null ? TRUE : FALSE
		];

		if (session()->get('logged_in')) {
			return view('page/manual_harga', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function setHargaManual()
	{
		session()->set('harga_manual', $this->request->getVar('harga_manual'));

		if ($this->request->getVar('po') != null)
			return redirect()->to('/manualbarang?po=TRUE');
		else
			return redirect()->to('/manualbarang');
	}

	public function manualBarang()
	{
		$data = [
			'halaman' => 'manual_barang',
			'po'	  => $this->request->getVar('po') != null ? TRUE : FALSE
		];

		if (session()->get('logged_in')) {
			return view('page/manual_barang', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function manualFixItem()
	{
		$transaksi = [
			'subtotal' => (int)session()->get('harga_manual') *  $this->request->getVar('quantity'),
			'diskon'   => 0,
			'total_dp' => 0
		];

		$dataTrx = [
			[
				'nama_barang'  => $this->request->getVar('nama_barang'),
				'harga_barang' => session()->get('harga_manual'),
				'quantity'	   => $this->request->getVar('quantity'),
				'satuan'	   => $this->request->getVar('satuan')
			]
		];

		$pelanggan = [
			'nama_pelanggan' => $this->request->getVar('nama_pelanggan'),
			'no_telepon'	 => $this->request->getVar('no_telepon')
		];

		session()->set('transaksi', $transaksi);
		session()->set('dataTrx', $dataTrx);
		session()->set('pelanggan', $pelanggan);

		return redirect()->to('/metodepembayaran');
	}

	public function daftarPO()
	{
		$data = [
			'halaman' => 'daftar_po',
			'po'      => $this->transaksiPOModel->getAllTransaksiPO()
		];

		if (session()->get('logged_in')) {
			return view('page/daftar_po', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function simpanPO()
	{
		$curDate = date("Y-m-d");
		$lastPO = $this->transaksiPOModel->getLastTransaksiPO();
		if (!empty($lastPO)) {
			$lastDate = $lastPO['tanggal'];
			if ($lastDate == $curDate) {
				$lastNoPO = (int)explode("-", $lastPO['no_transaksi_po'])[1];
				$noPO = $lastNoPO + 1;
			} else {
				$noPO = 1;
			}
		} else {
			$noPO = 1;
		}
		$subTotal = $this->request->getVar('subtotal') != null ? $this->request->getVar('subtotal') : ((int)session()->get('harga_manual') * (int)$this->request->getVar('quantity'));
		$this->transaksiPOModel->insertTransaksiPO([
			'no_transaksi_po' => 'PO-' . sprintf('%04d', $noPO) . '-' . date("jny"),
			'tanggal' 	      => $curDate,
			'subtotal' 		  => $subTotal,
			'diskon' 		  => $this->request->getVar('diskon'),
			'total' 	      => (int)$subTotal - (int)$this->request->getVar('diskon'),
			'total_dp' 		  => $this->request->getVar('total_dp'),
			'nama_petugas'	  => 'PO ' . session()->get('nama_user')
		]);

		if ($this->request->getVar('manual') != null) {
			$dataTrx = [
				[
					'nama_barang'  => $this->request->getVar('nama_barang'),
					'harga_barang' => session()->get('harga_manual'),
					'quantity'	   => $this->request->getVar('quantity'),
					'satuan'	   => $this->request->getVar('satuan')
				]
			];
			session()->set('dataTrx', $dataTrx);
		}

		$lastId = $this->transaksiPOModel->getLastTransaksiPO()['id'];
		foreach (session()->get('dataTrx') as $trx) {
			$this->detailTransaksiPOModel->insertDetailTransaksiPO([
				'id_transaksi_po' => $lastId,
				'nama_barang'  	  => $trx['nama_barang'],
				'harga_barang' 	  => $trx['harga_barang'],
				'quantity' 	   	  => $trx['quantity'],
				'satuan' 	   	  => $trx['satuan'],
				'jumlah' 	   	  => (int)$trx['harga_barang'] * (int)$trx['quantity'],
				'tanggal' 	   	  => $curDate
			]);
		}

		$this->pelangganPOModel->insertPelangganPO([
			'id_transaksi_po' => $lastId,
			'nama_pelanggan'  => $this->request->getVar('nama_pelanggan'),
			'no_telepon'	  => $this->request->getVar('no_telepon')
		]);

		return redirect()->to('/po');
	}

	public function detailPO($idTransaksiPO)
	{
		$data = [
			'halaman'  	  		=> 'detail_po',
			'pelangganPO' 		=> $this->pelangganPOModel->getPelangganPOByID($idTransaksiPO),
			'transaksiPO' 		=> $this->transaksiPOModel->getTransaksiPOByID($idTransaksiPO),
			'detailTransaksiPO' => $this->detailTransaksiPOModel->getDetailTransaksiPOByID($idTransaksiPO)
		];

		if (session()->get('logged_in')) {
			return view('page/detail_po', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function metodePembayaranPO($idTransaksiPO)
	{
		$trxPO = $this->transaksiPOModel->getTransaksiPOByID($idTransaksiPO);
		$data = [
			'halaman' => 'metode_pembayaran',
			'total'   => (int)$trxPO['total'] - (int)$trxPO['total_dp'],
			'po'	  => $idTransaksiPO
		];

		if (session()->get('logged_in')) {
			return view('page/metode_pembayaran', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function inputSuksesPO($idTransaksiPO)
	{
		$trxPO = $this->transaksiPOModel->getTransaksiPOByID($idTransaksiPO);
		$detailTrxPO = $this->detailTransaksiPOModel->getDetailTransaksiPOByID($idTransaksiPO);
		$pelangganPO = $this->pelangganPOModel->getPelangganPOByID($idTransaksiPO);

		$curDate = date("Y-m-d");
		$lastTrx = $this->transaksiModel->getLastTransaksi();
		if (!empty($lastTrx)) {
			$lastDate = $lastTrx['tanggal'];
			if ($lastDate == $curDate) {
				$lastNoTrx = (int)explode("-", $lastTrx['no_transaksi'])[1];
				$noTrx = $lastNoTrx + 1;
			} else {
				$noTrx = 1;
			}
		} else {
			$noTrx = 1;
		}
		$this->transaksiModel->insertTransaksi([
			'no_transaksi'		=> 'TRX-' . sprintf('%04d', $noTrx) . '-' . date("jny"),
			'tanggal' 			=> $curDate,
			'jam'	 			=> date("H:i"),
			'subtotal'  		=> $trxPO['subtotal'],
			'diskon' 			=> $trxPO['diskon'],
			'total' 			=> (int)$trxPO['subtotal'] - (int)$trxPO['diskon'],
			'total_dp' 			=> $trxPO['total_dp'],
			'metode_pembayaran' => $this->request->getVar('metode_pembayaran')
		]);

		$lastId = $this->transaksiModel->getLastTransaksi()['id'];
		foreach ($detailTrxPO as $trx) {
			$this->detailTransaksiModel->insertDetailTransaksi([
				'id_transaksi' => $lastId,
				'nama_barang'  => $trx['nama_barang'],
				'harga_barang' => $trx['harga_barang'],
				'quantity' 	   => $trx['quantity'],
				'satuan' 	   => $trx['satuan'],
				'jumlah' 	   => (int)$trx['harga_barang'] * (int)$trx['quantity'],
				'tanggal' 	   => $curDate
			]);
		}

		$this->pelangganModel->insertPelanggan([
			'id_transaksi'	 => $lastId,
			'nama_pelanggan' => $pelangganPO['nama_pelanggan'],
			'no_telepon'	 => $pelangganPO['no_telepon']
		]);

		session()->set('uang', $this->request->getVar('uang'));
		$this->transaksiPOModel->deleteTransaksiPO($idTransaksiPO);
		return redirect()->to('/sukses');
	}

	public function deletePO($id)
	{
		$this->transaksiPOModel->deleteTransaksiPO($id);

		return redirect()->to('/po');
	}

	public function riwayatTransaksi()
	{
		if ($this->request->getVar('inputTanggal')) {
			$tanggal = $this->request->getVar('inputTanggal');
			$tanggal = explode('|', $tanggal);
			$from = $tanggal[0];
			$to = $tanggal[1];
		} else {
			$from = date('Y-m-d');
			$to = date('Y-m-d');
		}

		$transaksi = $this->transaksiModel->getTransaksiByDate($from, $to);
		$allTransaksi = [];
		if (!empty($transaksi)) {
			$sum = 0;
			$grupTgl = $transaksi[0]['tanggal'];
			foreach ($transaksi as $trx) {
				if ($trx['tanggal'] != $grupTgl) {
					$sum = 0;
					$grupTgl = $trx['tanggal'];
				}
				$sum += $trx['total'];
				$tgl = date('l, j F Y', strtotime($trx['tanggal']));
				$allTransaksi[$trx['tanggal']]['tanggal'] = $tgl;
				$allTransaksi[$trx['tanggal']]['jumlah'] = $sum;
				$allTransaksi[$trx['tanggal']]['trx'][] = $trx;
			}
		}

		$data = [
			'halaman' => 'riwayat_transaksi',
			'tanggal' => date('j F Y', strtotime($from)) . ' - ' . date('j F Y', strtotime($to)),
			'list' => $allTransaksi
		];

		if (session()->get('logged_in')) {
			return view('page/riwayat_transaksi', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function deleteTransaksi($id)
	{
		$this->transaksiModel->deleteTransaksi($id);
	}

	public function laporan()
	{
		if ($this->request->getVar('inputTanggal')) {
			$tanggal = $this->request->getVar('inputTanggal');
			$tanggal = explode('|', $tanggal);
			$from = $tanggal[0];
			$to = $tanggal[1];
		} else {
			$from = date('Y-m-d');
			$to = date('Y-m-d');
		}

		$data = [
			'halaman'     => 'laporan',
			'tanggal'     => date('j F Y', strtotime($from)) . ' - ' . date('j F Y', strtotime($to)),
			'pureTanggal' => $from . '|' . $to,
			'laporan'     => $this->transaksiModel->getLaporanTransaksi($from, $to)
		];

		if (session()->get('logged_in') && (session()->get('role') == 'supervisor')) {
			return view('page/laporan', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function penjualanProduk()
	{
		$tanggal = $this->request->getVar('inputTanggal');
		$tanggal = explode('|', $tanggal);
		$from = $tanggal[0];
		$to = $tanggal[1];

		$data = [
			'halaman'         => 'penjualan_produk',
			'tanggal'         => date('j F Y', strtotime($from)) . ' - ' . date('j F Y', strtotime($to)),
			'pureTanggal'     => $this->request->getVar('inputTanggal'),
			'detailTransaksi' => $this->detailTransaksiModel->getLaporanPenjualan($from, $to)
		];

		if (session()->get('logged_in') && (session()->get('role') == 'supervisor')) {
			return view('page/penjualan_produk', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function kelolaUser()
	{
		$data = [
			'halaman' => 'akun',
			'user' => $this->userModel->getAllUser()
		];

		if (session()->get('logged_in') && (session()->get('role') == 'supervisor')) {
			return view('page/kelola_akun', $data);
		} else {
			return redirect()->to('/login');
		}
	}

	public function insertUser()
	{
		if (!$this->validate([
			'password' => [
				'rules'  => 'is_unique[user.password]',
				'errors' => [
					'is_unique' => "Password sudah dipakai."
				]
			]
		])) {
			$validation = \Config\Services::validation();
			session()->setFlashdata('error', $validation->getError('password'));
			return redirect()->to('/akun')->withInput();
		}

		$this->userModel->insertUser([
			'password' => $this->request->getVar('password'),
			'nama_user' => $this->request->getVar('nama_user'),
			'role' => $this->request->getVar('role')
		]);

		session()->setFlashdata('success', 'Akun berhasil ditambah.');
		return redirect()->to('/akun');
	}

	public function deleteUser($id)
	{
		$this->userModel->deleteUser($id);

		session()->setFlashdata('success', 'Akun berhasil dihapus.');
		return redirect()->to('/akun');
	}

	public function test()
	{
		$file = $this->request->getFile('pdf');
		$namaFile = $this->request->getVar('namapdf');
		$file->move('assets/temppdf', $namaFile);
	}
}
