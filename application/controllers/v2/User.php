<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/JWT.php';
use \Firebase\JWT\JWT;
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
class User extends REST_Controller {

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

    public function login_post()
    {
        $password = $this->post('password');
        $username = $this->post('email');
        $query = $this->db->get_where("user", array($username))->row();
        if($this->bcrypt->check_password($password, $query->password))
        {
            $data = array(
                'last_login' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', $query->id);
            $this->db->update('user', $data);
            $token = array(
                'id' => $query->id,
                'name' => $query->nama,
                'email' => $query->email
            );
            $output['token'] = JWT::encode($token, "login");
            $this->set_response(["status" => 200, "data" => $output], REST_Controller::HTTP_OK);
        }else{
            $this->set_response([
                        'status' => 400,
                        'message' => false
                    ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function register_post()
    {
        $query = $this->db->get_where("user", ['email' => $this->post('email')]);
        if($query->num_rows() > 0)
        {
            $this->set_response([
                    'status' => 400,
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
                $this->set_response(['status' => 200, 'message' => 'Register success'], REST_Controller::HTTP_OK);
            }else
            {
                $this->set_response([
                        'status' => 400,
                        'message' => 'Register gagal'
                    ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function id_get()
    {
        $token = $this->input->get_request_header('token');
        if($token == null)
        {
            $this->set_response(['status' => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $id1 = JWT::decode($token, 'login', array('HS256'));
            $query = $this->db->get_where("user", ['id' => $id1->id]);
            if($query)
            {
                //$output['token'] = JWT::encode($query->row(), "login");
                $this->set_response(["status" => 200, "data" => $query->row()], REST_Controller::HTTP_OK);
            }else
            {
                $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function transaksi_get()
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
            $this->set_response(["status" => 200, "data" => $query->result(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(["status" => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function villa_get()
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
            $this->set_response(['status' => 200, "data" => $query, "message" => true], REST_Controller::HTTP_OK);
        }else{
            $this->not_found();
        }
    }

    public function villa_date_get()
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
            $this->set_response(['status' => 200, "data" => $query->result(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(['status' => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function transaksi_post()
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
            $this->set_response(['status' => 200, 'message' => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response([
                    'status' => 400,
                    'message' => false
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function villa_id_get($id)
    {
        $qLihat = $this->db->get_where("villa", ['id' => $id])->row();
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
        $queryUlasan = $this->db->query("SELECT ulasan.id as id_ulasan, ulasan.ulasan, ulasan.id_villa, villa.id as id_villa, user.nama_user, ulasan.tgl
        FROM ulasan
        JOIN villa ON villa.id = ulasan.id_villa
        JOIN user ON user.id = ulasan.id_user
        WHERE villa.kode_villa = ?
        ORDER BY ulasan.id DESC", array($id));
        if($query)
        {
            $this->set_response(['status' => 200, "data" => $query->row(), "ulasan" => $queryUlasan->row(),"message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(['status' => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function alamat_get()
    {
        $query = $this->db->query("SELECT villa.id, villa.alamat_umum, provinsi.namaprov, kabkota.kabkota
            FROM villa
            JOIN provinsi ON provinsi.id = villa.provinsi
            JOIN kabkota ON kabkota.id = villa.kabkota
            GROUP BY villa.alamat_umum");
        if($query)
        {
            $this->set_response(['status' => 200, "data" => $query->result(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(['status' => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function update_post()
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
            $this->set_response(['status' => 200, 'message' => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response([
                'status' => 400,
                'message' => false
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function password_post()
    {
        $old_password = $this->post('old_password');
        $new_password = $this->post('new_password');
        $query = $this->db->get_where('user', ['id' => $this->post('id')])->row();
        if($this->bcrypt->check_password($old_password, $query->password))
        {
            $data = array(
                'password' => $this->bcrypt->hash_password($new_password)
            );
            $this->db->where('id', $this->post('id'));
            $sukses = $this->db->update('user', $data);
            if($sukses)
            {
                $this->set_response(['status' => 200, 'message' => true], REST_Controller::HTTP_OK);
            }else
            {
                $this->set_response([
                    'status' => 400,
                    'message' => false
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }else{
            $this->set_response([
                    'status' => 400,
                    'message' => false
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function transaksi_reject_get()
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
            $this->set_response(["status" => 200, "data" => $query->result(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(["status" => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function konfirmasi_post()
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
            $this->set_response(['status' => 200, 'message' => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response([
                'status' => 400,
                'message' => false
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function transaksi_id_get($id)
    {
        $query = $this->db->get_where('transaksi', ['id' => $id]);
        if($query)
        {
            $this->set_response(["status" => 200, "data" => $query->row(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(["status" => 400, "message" => true], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function ulasan_get($id)
    {
        $query = $this->db->query("SELECT ulasan.id as id_ulasan, ulasan.ulasan, ulasan.id_villa, villa.id as id_villa, user.nama_user, ulasan.tgl
        FROM ulasan
        JOIN villa ON villa.id = ulasan.id_villa
        JOIN user ON user.id = ulasan.id_user
        WHERE villa.kode_villa = ?
        ORDER BY ulasan.id DESC", array($id));
        if($query)
        {
            $this->set_response(["status" => 200, "data" => $query->result(), "count" => $query->num_rows(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(["status" => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // public function render_post()
    // {
    //     $token = $this->post('token');
    //     $output = JWT::decode($token, 'login', array('HS256'));
    //     $this->set_response(["status" => 200, "data" => $output], REST_Controller::HTTP_OK);
    // }

	public function not_found() {
        $this->set_response([
        'status' => FALSE,
        'message' => 'not found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    }
}