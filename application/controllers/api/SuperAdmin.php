<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class SuperAdmin extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
       // $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
       // $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	public function index_get() {
		$action = $this->get('action');
        switch($action){
			case "getProvince" :
			$this->getProvince();
			break;
			case "getCity" :
			$this->getCity();
			break;
			case "getAdminByid" :
			$this->getAdminByid();
			break;
			case "getAdmin" :
			$this->getAdmin();
			break;
			case "getKategoriAdmin" :
			$this->getKategoriAdmin();
			break;
			case "getDeleteAdmin" :
			$this->getDeleteAdmin();
			break;
			case "getVilla" :
			$this->getVilla();
			break;
			case "getDeleteVilla" :
			$this->getDeleteVilla();
			break;
			case "getVillaById" :
			$this->getVillaById();
			break;
			case "getBank" :
			$this->getBank();
			break;
			case "getBankById" :
			$this->getBankById();
			break;
			case "getTransaksiStatus0" :
			$this->getTransaksiStatus0();
			break;
			case "getTransaksi" :
			$this->getTransaksi();
			break;
			case "getChangeStatusTransaksi" :
			$this->getChangeStatusTransaksi();
			break;
			case "getTransaksiPayment" :
			$this->getTransaksiPayment();
			break;
			case "getTransaksiByCode" :
			$this->getTransaksiByCode();
			break;
			case "getPemasukan" :
			$this->getPemasukan();
			break;
			case "getCountVilla" :
			$this->getCountVilla();
			break;
			case "getSlider" :
			$this->getSlider();
			break;
			case "getSliderById" :
			$this->getSliderById();
			break;
			case "getActiveSlider" :
			$this->getActiveSlider();
			break;
			case "getDeleteBank" :
			$this->getDeleteBank();
			break;
			case "getDeleteSlider" :
			$this->getDeleteSlider();
			break;
		}
    }
	
	public function index_post() {
		$action = $this->post('action');
        switch($action){
			case "postAddAdmin" :
			$this->postAddAdmin();
			break;
			case "postLoginAdmin" :
			$this->postLoginAdmin();
			break;
			case "postUpdateAdmin" :
			$this->postUpdateAdmin();
			break;
			case "postGantiPassword" :
			$this->postGantiPassword();
			break;
			case "postAddVilla" :
			$this->postAddVilla();
			break;
			case "postUpdateVilla" :
			$this->postUpdateVilla();
			break;
			case "postUpdateGambarVilla" :
			$this->postUpdateGambarVilla();
			break;
			case "postAddBank" :
			$this->postAddBank();
			break;
			case "postUpdateBank" :
			$this->postUpdateBank();
			break;
			case "postUpdateHargaTransaksi" :
			$this->postUpdateHargaTransaksi();
			break;
			case "postAddSlider" :
			$this->postAddSlider();
			break;
			case "postEditGambarSlider" :
			$this->postEditGambarSlider();
			break;
		}
    }

	public function getProvince()
	{
		$id = $this->get('id');
		if($id != null)
		{
			$query = $this->db->query("SELECT * FROM provinsi WHERE id = ?", array($id))->row();
			if($query)
			{
				$this->set_response($query, REST_Controller::HTTP_OK);
			}else
			{
				$this->not_found();
			}
		}else
		{
			$query = $this->db->query("SELECT * FROM provinsi")->result();
			if($query)
			{
				$this->set_response($query, REST_Controller::HTTP_OK);
			}else
			{
				$this->not_found();
			}	
		}
	}

	public function getCity()
	{
		$id = $this->get('id');
		$id_prov = $this->get('id_prov');
		if($id != null)
		{
			$query = $this->db->query("SELECT kabkota.id, kabkota.idprov, kabkota.kabkota, provinsi.namaprov
			FROM kabkota
			JOIN provinsi ON provinsi.id = kabkota.idprov
			WHERE kabkota.id = ?", array($id))->row();
			if($query)
			{
				$this->set_response($query, REST_Controller::HTTP_OK);
			}else
			{
				$this->not_found();
			}	
		}else if($id_prov != null)
		{
			$query = $this->db->query("SELECT kabkota.id, kabkota.idprov, kabkota.kabkota, provinsi.namaprov
			FROM kabkota
			JOIN provinsi ON provinsi.id = kabkota.idprov
			WHERE kabkota.idprov = ?", array($id_prov))->result();
			if($query)
			{
				$this->set_response($query, REST_Controller::HTTP_OK);
			}else
			{
				$this->not_found();
			}
		}
	}

	public function postAddAdmin()
	{
		$password = $this->bcrypt->hash_password($this->post('password'));
		$data = array(
			'id_kat' => $this->post('id_kat'),
			'username' => $this->post('username'),
			'password' => $password,
			'nama' => $this->post('nama'),
			'email' => $this->post('email'),
			'telp' => $this->post('telp'),
			'last_login' => date('Y-m-d H:i:s')
		);
		$sukses = $this->db->insert('admin', $data);
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Register success'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
					'status' => FALSE,
					'message' => 'Perubahan password gagal'
				], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function postLoginAdmin()
	{
		$password = $this->post('password');
		$username = $this->post('username');
		$query = $this->db->query("SELECT admin.id, admin.username, admin.id_kat, admin.last_login, admin.password, admin.nama, admin.telp, admin.email , kategori_admin.nama_kat FROM admin JOIN kategori_admin ON admin.id_kat = kategori_admin.id WHERE admin.username = ?", array($username))->row();
		if ($this->bcrypt->check_password($password, $query->password))
		{
			$data = array(
				'last_login' => date('Y-m-d H:i:s')
			);
			$this->db->where('id', $query->id);
			$this->db->update('admin', $data);
			$this->set_response($query, REST_Controller::HTTP_OK);
		}
		else
		{
			$this->set_response('Password dan username salah', REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function getAdminByid()
	{
		$id = $this->get('id');
		$query = $this->db->query("SELECT admin.id, admin.username, admin.last_login, admin.password, admin.nama, admin.telp, admin.email , kategori_admin.nama_kat, kategori_admin.id as id_kat 
			FROM admin 
			JOIN kategori_admin ON admin.id_kat = kategori_admin.id 
			WHERE admin.id = ?", array($id));
		if($query)
		{
			$this->set_response($query->row(), REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function getAdmin()
	{
		$query = $this->db->query("SELECT admin.id, admin.username, admin.last_login, admin.password, admin.nama, admin.telp, admin.email , kategori_admin.nama_kat, kategori_admin.id as id_kat 
			FROM admin 
			JOIN kategori_admin ON admin.id_kat = kategori_admin.id ORDER BY admin.id DESC");
		if($query)
		{
			$this->set_response($query->result(), REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function getKategoriAdmin()
	{
		$query = $this->db->query("SELECT * FROM kategori_admin");
		if($query)
		{
			$this->set_response($query->result(), REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function getDeleteAdmin()
	{
		$id = $this->get('id');
		$this->db->where('id', $id);
		$sukses = $this->db->delete('admin');
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Hapus admin sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
					'status' => FALSE,
					'message' => 'Hapus admin gagal'
				], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function postUpdateAdmin()
	{
		$data = array(
			'id_kat' => $this->post('id_kat'),
			'username' => $this->post('username'),
			'nama' => $this->post('nama'),
			'email' => $this->post('email'),
			'telp' => $this->post('telp')
		);
		$this->db->where('id', $this->post('id'));
		$sukses = $this->db->update('admin', $data);
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Update admin sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
					'status' => FALSE,
					'message' => 'Update admin gagal'
				], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function postGantiPassword()
	{
		$password = $this->bcrypt->hash_password($this->post('password'));
		$data = array(
			'password' => $password
		);
		$this->db->where('id', $this->post('id'));
		$sukses = $this->db->update('admin', $data);
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Update admin sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
					'status' => FALSE,
					'message' => 'Update admin gagal'
				], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function getVilla()
	{
		$query = $this->db->query("SELECT villa.id, villa.alamat, villa.harga_min, villa.harga_max, villa.kode_villa, villa.nama_villa, villa.no_telp, villa.kapasitas
		FROM villa");
		if($query)
		{
			$this->set_response($query->result(), REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function postAddVilla()
	{
		$query = $this->db->query("SELECT kode_villa FROM villa WHERE kode_villa = ?", array($this->post('kode_villa')));
		if($query->num_rows() > 0)
		{
			$this->set_response([
					'status' => FALSE,
					'message' => 'Kode Tersedia'
				], REST_Controller::HTTP_NOT_FOUND);
		}else{
			$data = array(
				'kode_villa' => $this->post('kode_villa'),
				'nama_villa' => $this->post('nama_villa'),
				'no_telp' => $this->post('no_telp'),
				'email' => $this->post('email'),
				'alamat' => $this->post('alamat'),
				'alamat_umum' => $this->post('alamat_umum'),
				'desc_id' => $this->post('desc_id'),
				'harga_min' => $this->post('harga_min'),
				'harga_max' => $this->post('harga_max'),
				'provinsi' => $this->post('provinsi'),
				'kabkota' => $this->post('kabkota'),
				'kapasitas' => $this->post('kapasitas'),
				'gambar' => $this->post('gambar'),
				'kolam_renang' => $this->post('kolam_renang'),
				'wifi' => $this->post('wifi'),
				'tv' => $this->post('tv'),
				'kamar' => $this->post('kamar'),
				'bangunan' => $this->post('bangunan'),
				'parkir' => $this->post('parkir'),
				'karaoke' => $this->post('karaoke')
			);
			$sukses = $this->db->insert('villa', $data);
			if($sukses)
			{
				$this->set_response(['status' => TRUE, 'message' => 'Tambah villa sukses'], REST_Controller::HTTP_OK);
			}else
			{
				$this->set_response([
						'status' => FALSE,
						'message' => 'Tambah villa gagal'
					], REST_Controller::HTTP_NOT_FOUND);
			}
		}
	}

	public function getDeleteVilla()
	{
		$id = $this->get('id');
		$this->db->where('id', $id);
		$sukses = $this->db->delete('villa');
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Tambah villa sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
					'status' => FALSE,
					'message' => 'Tambah villa gagal'
				], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function getVillaById()
	{
		$id = $this->get("id");
		$query =$this->db->query("SELECT villa.id, villa.kode_villa, villa.alamat_umum, villa.kolam_renang, villa.wifi, villa.tv, villa.kamar, villa.bangunan, villa.karaoke, villa.parkir, villa.nama_villa, villa.no_telp, villa.email, villa.alamat, villa.desc_id, villa.harga_min, villa.harga_max, villa.provinsi, villa.kabkota as kota, villa.kapasitas, provinsi.namaprov, kabkota.kabkota
			FROM villa
			JOIN provinsi ON provinsi.id = villa.provinsi
			JOIN kabkota ON kabkota.id = villa.kabkota
			WHERE villa.id = ?", array($id));
		if($query)
		{
			$this->set_response($query->row(), REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
		}	
	}

	public function postUpdateVilla()
	{
		$data = array(
			'kode_villa' => $this->post('kode_villa'),
			'nama_villa' => $this->post('nama_villa'),
			'no_telp' => $this->post('no_telp'),
			'email' => $this->post('email'),
			'alamat' => $this->post('alamat'),
			'alamat_umum' => $this->post('alamat_umum'),
			'desc_id' => $this->post('desc_id'),
			'harga_min' => $this->post('harga_min'),
			'harga_max' => $this->post('harga_max'),
			'provinsi' => $this->post('provinsi'),
			'kabkota' => $this->post('kabkota'),
			'kapasitas' => $this->post('kapasitas'),
			'kolam_renang' => $this->post('kolam_renang'),
			'wifi' => $this->post('wifi'),
			'tv' => $this->post('tv'),
			'kamar' => $this->post('kamar'),
			'bangunan' => $this->post('bangunan'),
			'parkir' => $this->post('parkir'),
			'karaoke' => $this->post('karaoke')
		);
		$this->db->where('id', $this->post('id'));
		$sukses = $this->db->update('villa', $data);
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Tambah villa sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
					'status' => FALSE,
					'message' => 'Tambah villa gagal'
				], REST_Controller::HTTP_NOT_FOUND);
		}		
	}

	public function postUpdateGambarVilla()
	{
		$data = array(
			'gambar' => $this->post('gambar')
		);
		$this->db->where('id', $this->post('id'));
		$sukses = $this->db->update('villa', $data);
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Tambah villa sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
					'status' => FALSE,
					'message' => 'Tambah villa gagal'
				], REST_Controller::HTTP_NOT_FOUND);
		}	
	}

	public function getBank()
	{
		$query = $this->db->query("SELECT * FROM bank");
		if($query)
		{
			$this->set_response($query->result(), REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
		}		
	}

	public function getBankById()
	{
		$id = $this->get('id');
		$query = $this->db->query("SELECT * FROM bank WHERE id = ?", array($id));
		if($query)
		{
			$this->set_response($query->row(), REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
		}		
	}

	public function postAddBank()
	{
		$data = array(
			'norek' => $this->post('norek'),
			'an' => $this->post('an'),
			'nama_bank' => $this->post('nama_bank')
		);
		$sukses = $this->db->insert('bank', $data);
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Tambah villa sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
					'status' => FALSE,
					'message' => 'Tambah villa gagal'
				], REST_Controller::HTTP_NOT_FOUND);
		}
	}	

	public function postUpdateBank()
	{
		$data = array(
			'norek' => $this->post('norek'),
			'an' => $this->post('an'),
			'nama_bank' => $this->post('nama_bank')
		);
		$this->db->where('id', $this->post('id'));
		$sukses = $this->db->update('bank', $data);
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Tambah villa sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
					'status' => FALSE,
					'message' => 'Tambah villa gagal'
				], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function getCountVilla()
	{
		$query = $this->db->query("SELECT * FROM villa");
		if($query)
		{
			$this->set_response($query->num_rows(), REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
		}	
	}


	public function getTransaksiStatus0()
	{
		$query = $this->db->query("SELECT transaksi.kode_transaksi, transaksi.id, transaksi.nama, transaksi.no_telp, transaksi.email, transaksi.total_harga, transaksi.check_in, transaksi.check_out, transaksi.tgl_transaksi, transaksi.tgl_bayar, transaksi.status, transaksi.a_n, transaksi.from_bank, villa.kode_villa 
		FROM transaksi 
		JOIN villa ON villa.id = transaksi.id_villa
		WHERE transaksi.status = 0")->result();
		$this->set_response($query, REST_Controller::HTTP_OK);
	}

	public function getTransaksi()
	{
		$status = $this->get('status');
		if($status != null)
		{
			$query = $this->db->query("SELECT transaksi.kode_transaksi, transaksi.id, transaksi.nama, transaksi.no_telp, transaksi.email, transaksi.total_harga, transaksi.check_in, transaksi.check_out, transaksi.tgl_transaksi, transaksi.tgl_bayar, transaksi.status, transaksi.a_n, transaksi.from_bank, villa.kode_villa 
			FROM transaksi 
			JOIN villa ON villa.id = transaksi.id_villa
			WHERE transaksi.status = ?", array($status))->result();
			$this->set_response($query, REST_Controller::HTTP_OK);
		}
	}

	public function getChangeStatusTransaksi()
	{
		$status = $this->get('status');
		$id = $this->get('id');
		$data = array(
			'status' => $status
		);
		$this->db->where('id', $id);
		$sukses = $this->db->update('transaksi', $data);
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Tambah villa sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
				'status' => FALSE,
				'message' => 'Tambah villa gagal'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function getTransaksiPayment()
	{
		$query = $this->db->query("SELECT transaksi.kode_transaksi, transaksi.id, transaksi.nama, transaksi.no_telp, transaksi.email, transaksi.total_harga, transaksi.check_in, transaksi.check_out, transaksi.tgl_transaksi, transaksi.tgl_bayar, transaksi.status, transaksi.a_n, transaksi.from_bank, transaksi.norek, villa.kode_villa, bank.nama_bank 
		FROM transaksi 
		JOIN villa ON villa.id = transaksi.id_villa
		JOIN bank ON bank.id = transaksi.id_bank
		WHERE transaksi.status = 3")->result();
		$this->set_response($query, REST_Controller::HTTP_OK);
	}

	public function getTransaksiByCode()
	{
		$kode = $this->get('kode_transaksi');
		$query = $this->db->query("SELECT * FROM transaksi WHERE id = ?", array($kode));
		if($query)
		{
			$this->set_response($query->row(), REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function postUpdateHargaTransaksi()
	{
		$data = array(
			'total_harga' => $this->post('total_harga'),
			'status' => 1
		);
		$this->db->where('id', $this->post('id'));
		$sukses = $this->db->update('transaksi', $data);
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Tambah villa sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
				'status' => FALSE,
				'message' => 'Tambah villa gagal'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function getPemasukan()
	{
		$query = $this->db->query("SELECT transaksi.kode_transaksi, transaksi.id, transaksi.nama, transaksi.no_telp, transaksi.email, transaksi.total_harga, transaksi.check_in, transaksi.check_out, transaksi.tgl_transaksi, transaksi.tgl_bayar, transaksi.status, transaksi.a_n, transaksi.from_bank, transaksi.norek, villa.kode_villa, bank.nama_bank 
		FROM transaksi 
		JOIN villa ON villa.id = transaksi.id_villa
		JOIN bank ON bank.id = transaksi.id_bank
		WHERE transaksi.status = 4");
		if($query)
		{
			$this->set_response($query->result(), REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function getSlider()
	{
		$query = $this->db->query("SELECT * FROM slider ORDER BY id DESC");
		if($query)
		{
			$this->set_response($query->result(), REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function getSliderById()
	{
		$id = $this->get('id');
		$query = $this->db->query("SELECT * FROM slider WHERE id = ?", array($id));
		if($query)
		{
			$this->set_response($query->row(), REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function postAddSlider()
	{
		$data = array(
			'image' => $this->post('image'),
			'status' => $this->post('status')
		);
		$sukses = $this->db->insert('slider', $data);
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Tambah villa sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
				'status' => FALSE,
				'message' => 'Tambah villa gagal'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function postEditGambarSlider()
	{
		$data = array(
			'image' => $this->post('image')
		);
		$this->db->where('id', $this->post('id'));
		$sukses = $this->db->update('slider', $data);
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Tambah villa sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
				'status' => FALSE,
				'message' => 'Tambah villa gagal'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function getActiveSlider()
	{
		$status = $this->get('status');
		$data = array(
			'status' => $status
		);
		$this->db->where('id', $this->get('id'));
		$sukses = $this->db->update('slider', $data);
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Tambah villa sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
				'status' => FALSE,
				'message' => 'Tambah villa gagal'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function getDeleteBank()
	{
		$this->db->where('id', $this->get('id'));
		$sukses = $this->db->delete('bank');
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Tambah villa sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
				'status' => FALSE,
				'message' => 'Tambah villa gagal'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function getDeleteSlider()
	{
		$this->db->where('id', $this->get('id'));
		$sukses = $this->db->delete('slider');
		if($sukses)
		{
			$this->set_response(['status' => TRUE, 'message' => 'Tambah villa sukses'], REST_Controller::HTTP_OK);
		}else
		{
			$this->set_response([
				'status' => FALSE,
				'message' => 'Tambah villa gagal'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function test()
	{
		echo "test";
	}

	public function not_found() {
        $this->set_response([
        'status' => FALSE,
        'message' => 'not found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    }
}