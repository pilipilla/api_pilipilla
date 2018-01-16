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
class Client extends REST_Controller {

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
			case "getVilla" :
			$this->getVilla();
			break;
            case "getVillaById" :
            $this->getVillaById();
            break;
            case "getSliderActive" :
            $this->getSliderActive();
            break;
            case "getSuggestAlamat" :
            $this->getSuggestAlamat();
            break;
            case "getProfileById" :
            $this->getProfileById();
            break;
            case "getTransaksiByEmail" :
            $this->getTransaksiByEmail();
            break;
            case "getCountTransaksiByEmail" :
            $this->getCountTransaksiByEmail();
            break;
            case "getTransaksiRejectedByEmail" :
            $this->getTransaksiRejectedByEmail();
            break;
            case "getCountTransaksiRejectedByEmail" :
            $this->getCountTransaksiRejectedByEmail();
            break;
            case "getHistoryTransaksiByEmail" :
            $this->getHistoryTransaksiByEmail();
            break;
            case "getCountHistoryByEmail" :
            $this->getCountHistoryByEmail();
            break;
            case "getTransaksiById" :
            $this->getTransaksiById();
            break;
            case "getUlasanByKodeVilla" :
            $this->getUlasanByKodeVilla();
            break;
            case "getCountUlasanByKodeVilla" :
            $this->getCountUlasanByKodeVilla();
            break;
            case "getVillaByDate" :
            $this->getVillaByDate();
            break;
            case "getFilterHargaVilla" :
            $this->getFilterHargaVilla();
            break;
		}
    }

    public function index_post() {
        $action = $this->post('action');
        switch($action){
            case "postRegistUser" :
            $this->postRegistUser();
            break;
            case "postLogin" :
            $this->postLogin();
            break;
            case "postUpdateUser" :
            $this->postUpdateUser();
            break;
            case "postUpdatePassword" :
            $this->postUpdatePassword();
            break;
            case "postTransaksi" :
            $this->postTransaksi();
            break;
            case "postKonfirmasiPembayaran" :
            $this->postKonfirmasiPembayaran();
            break;
            case "postUlasan" :
            $this->postUlasan();
            break;
            case "postUtmMarketing" :
            $this->postUtmMarketing();
            break;
            case "postKonfirmasiPembayaranHome" :
            $this->postKonfirmasiPembayaranHome();
            break;
        }
    }

    public function getSliderActive()
    {
        $query = $this->db->query("SELECT * FROM slider WHERE status = 1");
        if($query)
        {
            $this->set_response($query->result(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function getVilla()
    {
		$pagenumber = $this->get('pagenumber');
        $pagesize = $this->get('pagesize');
		$offset = ($pagenumber * $pagesize) - $pagesize;
		$this->db->limit($pagesize, $offset);
		$this->db->from('villa');
        $this->db->join('kabkota', 'kabkota.id = villa.kabkota');
        $this->db->order_by('villa.dilihat', 'DESC');
        $query = $this->db->get()->result();
		if($query)
		{
			$this->set_response($query, REST_Controller::HTTP_OK);
		}else{
			$this->not_found();
		}
    }

    public function postTransaksi()
    {
        $query = $this->db->query("SELECT MAX(id) as jml FROM transaksi")->row();
        $qVilla = $this->db->query("SELECT * FROM villa WHERE id = ?", array($this->post('id_villa')))->row();
        $jml = $query->jml + 1;
        $years = date("y");
        $month = date("m");
        $day = date("d");
        $kode_villa = $qVilla->kode_villa;
        $kode_transaksi = $years.$month.$day.$kode_villa.$jml;
        $data = array(
            'kode_transaksi' => $kode_transaksi,
            'nama' => $this->post('nama'),
            'no_telp' => $this->post('no_telp'),
            'email' => $this->post('email'),
            'guest' => $this->post('guest'),
            'check_in' => $this->post('checkin'),
            'check_out' => $this->post('checkout'),
            'tgl_transaksi' => date('Y-m-d H:i:s'),
            'status' => 0,
            'id_villa' => $this->post('id_villa'),
            'id_user' => $this->post('id_user'),
            'titik_jemput' => $this->post('titik_jemput')
        );
        $sukses = $this->db->insert('transaksi', $data);
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
        $id = $this->get('id');
        $qLihat = $this->db->query("SELECT * FROM villa WHERE kode_villa = ? ", array($id))->row();
        $data = array(
            'dilihat' => $qLihat->dilihat + 1
        );
        $this->db->where('kode_villa', $id);
        $this->db->update('villa', $data);
        $query = $this->db->query("SELECT villa.id, villa.kode_villa, villa.parkir, villa.karaoke, villa.kolam_renang, villa.wifi, villa.tv, villa.kamar, villa.bangunan, villa.nama_villa, villa.no_telp, villa.email, villa.alamat, villa.desc_id, villa.harga_min, villa.harga_max, villa.provinsi, villa.gambar, villa.kabkota as kota, villa.kapasitas, provinsi.namaprov, kabkota.kabkota
            FROM villa
            JOIN provinsi ON provinsi.id = villa.provinsi
            JOIN kabkota ON kabkota.id = villa.kabkota
            WHERE villa.kode_villa = ?", array($id));
        if($query)
        {
            $this->set_response($query->row(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function getSuggestAlamat()
    {
        $query = $this->db->query("SELECT villa.id, villa.alamat_umum, provinsi.namaprov, kabkota.kabkota
            FROM villa
            JOIN provinsi ON provinsi.id = villa.provinsi
            JOIN kabkota ON kabkota.id = villa.kabkota
            GROUP BY villa.alamat_umum");
        if($query)
        {
            $this->set_response($query->result(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function postRegistUser()
    {
        $query = $this->db->query("SELECT * FROM user WHERE email = ?", array($this->post('email')));
        if($query->num_rows() > 0)
        {
            $this->set_response([
                    'status' => FALSE,
                    'message' => 'Email sudah ada'
                ], REST_Controller::HTTP_NOT_FOUND);   
        }else{
            $password = $this->bcrypt->hash_password($this->post('password'));
            $data = array(
                'nama_user' => $this->post('nama_user'),
                'no_hp' => $this->post('no_hp'),
                'email' => $this->post('email'),
                'password' => $password,
                'devsid' => $this->post('devsid'),
                'tgl_join' => date('Y-m-d')
            );
            $sukses = $this->db->insert('user', $data);
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
    }

    public function postLogin()
    {
        $password = $this->post('password');
        $username = $this->post('email');
        $query = $this->db->query("SELECT user.id, user.email, user.nama_user, user.no_hp, user.password FROM user WHERE email = ?", array($username))->row();
        if ($this->bcrypt->check_password($password, $query->password))
        {
            $data = array(
                'last_login' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', $query->id);
            $this->db->update('user', $data);
            $this->set_response($query, REST_Controller::HTTP_OK);
        }
    }

    public function getProfileById()
    {
        $id = $this->get('id');
        $query = $this->db->query("SELECT user.id, user.email, user.no_hp, user.nama_user FROM user WHERE user.id = ?", array($id));
        if($query)
        {
            $this->set_response($query->row(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function postUpdateUser()
    {
        $data = array(
            'nama_user' => $this->post('nama_user'),
            'no_hp' => $this->post('no_hp'),
            'email' => $this->post('email')
        );
        $this->db->where('id', $this->post('id'));
        $sukses = $this->db->update('user', $data);
        if($sukses)
        {
            $this->set_response(['status' => TRUE, 'message' => 'Edit Profile success'], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Edit Profile gagal'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function postUpdatePassword()
    {
        $old_password = $this->post('old_password');
        $new_password = $this->post('new_password');
        $query = $this->db->query("SELECT * FROM user WHERE id = ?", array($this->post('id')))->row();
        if ($this->bcrypt->check_password($old_password, $query->password))
        {
            $data = array(
                'password' => $this->bcrypt->hash_password($new_password)
            );
            $this->db->where('id', $this->post('id'));
            $sukses = $this->db->update('user', $data);
            if($sukses)
            {
                $this->set_response(['status' => TRUE, 'message' => 'Edit Password success'], REST_Controller::HTTP_OK);
            }else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Edit Password gagal'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }else{
            $this->set_response([
                    'status' => FALSE,
                    'message' => 'Edit Password gagal'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function getTransaksiByEmail()
    {
        $email = $this->get('email');
        $status = $this->get('status');
        $pagenumber = $this->get('pagenumber');
        $pagesize = $this->get('pagesize');
        $offset = ($pagenumber * $pagesize) - $pagesize;
        $this->db->limit($pagesize, $offset);
        $this->db->select("transaksi.kode_transaksi, transaksi.total_harga, transaksi.id, transaksi.email, transaksi.no_telp, transaksi.status, 
            transaksi.tgl_transaksi, transaksi.titik_jemput, transaksi.check_in, transaksi.check_out, villa.kode_villa, villa.alamat_umum
            ");
        $this->db->from('transaksi');
        $this->db->join('villa', 'villa.id = transaksi.id_villa');
        $this->db->where('transaksi.status', '0');
        $this->db->or_where('transaksi.status', '1');
        $this->db->or_where('transaksi.status', '3');
        $this->db->where('transaksi.email', $email);
        $query = $this->db->get();
        if($query)
        {
            $this->set_response($query->result(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function getCountTransaksiByEmail()
    {
        $email = $this->get('email');
        $query = $this->db->query("SELECT COUNT(id) as jumlah FROM transaksi WHERE transaksi.status = 0 OR transaksi.status = 1 OR transaksi.status = 3 AND transaksi.email = ?", array($email));
        if($query)
        {
            $this->set_response($query->row(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function getTransaksiRejectedByEmail()
    {
        $email = $this->get('email');
        $status = $this->get('status');
        $pagenumber = $this->get('pagenumber');
        $pagesize = $this->get('pagesize');
        $offset = ($pagenumber * $pagesize) - $pagesize;
        $this->db->limit($pagesize, $offset);
        $this->db->select("transaksi.kode_transaksi, transaksi.id, transaksi.total_harga, transaksi.email, transaksi.no_telp, transaksi.status, 
            transaksi.tgl_transaksi, transaksi.titik_jemput, transaksi.check_in, transaksi.check_out, villa.kode_villa, villa.alamat_umum
            ");
        $this->db->from('transaksi');
        $this->db->join('villa', 'villa.id = transaksi.id_villa');
        $this->db->where('transaksi.status', '2');
        $this->db->where('transaksi.email', $email);
        $query = $this->db->get();
        if($query)
        {
            $this->set_response($query->result(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function getCountTransaksiRejectedByEmail()
    {
        $email = $this->get('email');
        $query = $this->db->query("SELECT COUNT(id) as jumlah FROM transaksi WHERE transaksi.status = 2 AND transaksi.email = ?", array($email));
        if($query)
        {
            $this->set_response($query->row(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function postKonfirmasiPembayaran()
    {
        $data = array(
            'from_bank' => $this->post('from_bank'),
            'norek' => $this->post('norek'),
            'a_n' => $this->post('a_n'),
            'id_bank' => $this->post('id_bank'),
            'tgl_bayar' => date('Y-m-d'),
            'status' => 3
        );
        $this->db->where('id', $this->post('id'));
        $sukses = $this->db->update('transaksi', $data);
        if($sukses)
        {
            $this->set_response(['status' => TRUE, 'message' => 'Konfirmasi success'], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Konfirmasi gagal'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function getHistoryTransaksiByEmail()
    {
        $email = $this->get('email');
        $status = $this->get('status');
        $pagenumber = $this->get('pagenumber');
        $pagesize = $this->get('pagesize');
        $offset = ($pagenumber * $pagesize) - $pagesize;
        $this->db->limit($pagesize, $offset);
        $this->db->select("transaksi.kode_transaksi, transaksi.total_harga, transaksi.id_villa, transaksi.id, transaksi.email, transaksi.no_telp, transaksi.status, 
            transaksi.tgl_transaksi, transaksi.titik_jemput, transaksi.check_in, transaksi.check_out, villa.kode_villa, villa.alamat_umum
            ");
        $this->db->from('transaksi');
        $this->db->join('villa', 'villa.id = transaksi.id_villa');
        $this->db->where('transaksi.status', '4');
        $this->db->where('transaksi.email', $email);
        $this->db->order_by('transaksi.id', 'DESC');
        $query = $this->db->get();
        if($query)
        {
            $this->set_response($query->result(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function getCountHistoryByEmail()
    {
        $email = $this->get('email');
        $query = $this->db->query("SELECT COUNT(id) as jumlah FROM transaksi WHERE transaksi.status = 4 AND transaksi.email = ?", array($email));
        if($query)
        {
            $this->set_response($query->row(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function getTransaksiById()
    {
        $id = $this->get('id');
        $query = $this->db->get_where('transaksi', ['id' => $id]);
        if($query)
        {
            $this->set_response($query->row(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function postUlasan()
    {
        $data = array(
            'id_villa' => $this->post('id_villa'),
            'id_user' => $this->post('id_user'),
            'ulasan' => $this->post('ulasan'),
            'tgl' => date('Y-m-d')
        );
        $sukses = $this->db->insert('ulasan', $data);
        if($sukses)
        {
            $this->set_response(['status' => TRUE, 'message' => 'Ulasan success'], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Ulasan gagal'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function getUlasanByKodeVilla()
    {
        $id_villa = $this->get('kode_villa');
        $query = $this->db->query("SELECT ulasan.id as id_ulasan, ulasan.ulasan, ulasan.id_villa, villa.id as id_villa, user.nama_user, ulasan.tgl
        FROM ulasan
        JOIN villa ON villa.id = ulasan.id_villa
        JOIN user ON user.id = ulasan.id_user
        WHERE villa.kode_villa = ?
        ORDER BY ulasan.id DESC", array($id_villa));
        if($query)
        {
            $this->set_response($query->result(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function getCountUlasanByKodeVilla()
    {
        $id_villa = $this->get('kode_villa');
        $query = $this->db->query("SELECT COUNT(ulasan.id) as jumlah 
        FROM ulasan
        JOIN villa ON villa.id = ulasan.id_villa
        WHERE villa.kode_villa = ?", array($id_villa));
        if($query)
        {
            $this->set_response($query->row(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function getVillaByDate()
    {
        $alamat_umum = $this->get('alamat_umum');
        $checkout = $this->get('checkout');
        $checkin = $this->get('checkin');
        $query = $this->db->query("SELECT villa.id, villa.kode_villa, villa.alamat_umum, villa.gambar, villa.harga_min, villa.harga_max, kabkota.kabkota 
        FROM villa
        JOIN kabkota ON kabkota.id = villa.kabkota 
        WHERE villa.alamat_umum = ? 
        AND 
        villa.id not in ( SELECT transaksi.id_villa FROM transaksi WHERE (transaksi.check_out <= ? AND transaksi.check_in >= ?) OR (transaksi.check_out < ? and transaksi.check_in >= ? ) OR (transaksi.check_out >= ? and transaksi.check_in < ? ) )", array($alamat_umum, $checkout, $checkin, $checkout, $checkin, $checkout, $checkin));
        if($query)
        {
            $this->set_response($query->result(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function postUtmMarketing()
    {
        $data = array(
            'utm_source' => $this->post('utm_source'),
            'utm_medium' => $this->post('utm_medium'),
            'tgl' => date('Y-m-d')
        );
        $sukses = $this->db->insert('marketing_utm', $data);
        if($sukses)
        {
            $this->set_response(['status' => TRUE, 'message' => 'Ulasana success'], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Ulasan gagal'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function postKonfirmasiPembayaranHome()
    {
        $query = $this->db->query("SELECT * FROM transaksi WHERE kode_transaksi = ? AND email = ? AND status = 1", array($this->post('kode_transaksi'), $this->post('email')));
        if($query->num_rows() > 0)
        {
            $da = $query->row();
            $data = array(
                'from_bank' => $this->post('from_bank'),
                'a_n' => $this->post('a_n'),
                'norek' => $this->post('norek'),
                'id_bank' => $this->post('id_bank'),
                'tgl_bayar' => date('Y-m-d'),
                'status' => 2
            );
            $this->db->where('id', $da->id);
            $this->db->update('transaksi', $data);
            $this->set_response('Konfirmasi pembayaran success', REST_Controller::HTTP_OK);
        }else{
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function getFilterHargaVilla()
    {
        $alamat_umum = $this->get('alamat');
        $harga_min = $this->get('harga_min');
        $harga_max = $this->get('harga_max');
        $query = "";
        if($alamat_umum != null)
        {
            $query = $this->db->query("SELECT villa.id, villa.kode_villa, villa.harga_min, villa.harga_max, villa.gambar, villa.alamat_umum, kabkota.kabkota
            FROM villa
            JOIN kabkota ON kabkota.id = villa.kabkota
            WHERE villa.alamat_umum = ? AND villa.harga_min >= ? AND villa.harga_max <= ?", array($alamat_umum, $harga_min, $harga_max));
        }else{
            $query = $this->db->query("SELECT villa.id, villa.kode_villa, villa.harga_min, villa.harga_max, villa.gambar, villa.alamat_umum, kabkota.kabkota
            FROM villa
            JOIN kabkota ON kabkota.id = villa.kabkota
            WHERE villa.harga_min >= ? AND villa.harga_max <= ?", array($harga_min, $harga_max));
        }

        if($query)
        {
            $this->set_response($query->result(), REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

	public function not_found() {
        $this->set_response([
        'status' => FALSE,
        'message' => 'not found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    }
}