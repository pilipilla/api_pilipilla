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
class Admin extends REST_Controller {

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

    public function index_get()
    {
        $query = $this->db->query("SELECT admin.id, admin.username, admin.last_login, admin.password, admin.nama, admin.telp, admin.email , kategori_admin.nama_kat, kategori_admin.id as id_kat 
            FROM admin 
            JOIN kategori_admin ON admin.id_kat = kategori_admin.id");
        if($query)
        {
            $this->set_response(["status" => 200, "data" => $query->result(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(["status" => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function login_post() {
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
            $token = array(
                'id' => $query->id,
                'name' => $query->nama,
                'username' => $query->username,
                'id_kategori' => $query->id_kat
            );
            $output['id_token'] = JWT::encode($token, "login");
            $this->set_response(["status" => 200, "data" => $token], REST_Controller::HTTP_OK);
        }
        else
        {
            $this->set_response(["status" => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function add_post()
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

    public function id_get($id)
    {
        $query = $this->db->query("SELECT admin.id, admin.username, admin.last_login, admin.password, admin.nama, admin.telp, admin.email , kategori_admin.nama_kat, kategori_admin.id as id_kat 
            FROM admin 
            JOIN kategori_admin ON admin.id_kat = kategori_admin.id 
            WHERE admin.id = ?", array($id));
        if($query)
        {
            $this->set_response(["status" => 200, "data" => $query->row(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(["status" => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function edit_post($id)
    {
        $data = array(
            'id_kat' => $this->post('id_kat'),
            'username' => $this->post('username'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'telp' => $this->post('telp')
        );
        $this->db->where('id', $id);
        $sukses = $this->db->update('admin', $data);
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

    public function edit_password_post($id)
    {
        $password = $this->bcrypt->hash_password($this->post('password'));
        $data = array(
            'password' => $password
        );
        $this->db->where('id', $id);
        $sukses = $this->db->update('admin', $data);
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

    public function kategori_get()
    {
        $query = $this->db->query("SELECT * FROM kategori_admin");
        if($query)
        {
            $this->set_response(["status" => 200, "data" => $query->result(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(["status" => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function delete_get($id)
    {
        $this->db->where('id', $id);
        $sukses = $this->db->delete('villa');
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

    public function transaksi_get($status)
    {
        $query = $this->db->query("SELECT transaksi.kode_transaksi, transaksi.id, transaksi.nama, transaksi.no_telp, transaksi.email, transaksi.total_harga, transaksi.check_in, transaksi.check_out, transaksi.tgl_transaksi, transaksi.tgl_bayar, transaksi.status, transaksi.a_n, transaksi.from_bank, transaksi.norek, villa.kode_villa, bank.nama_bank 
        FROM transaksi 
        JOIN villa ON villa.id = transaksi.id_villa
        LEFT JOIN bank ON bank.id = transaksi.id_bank
        WHERE transaksi.status = ? ", array($status))->result();
        $this->set_response(["status" => 200, "data" => $query, "message" => true], REST_Controller::HTTP_OK);
    }

    public function change_transaksi_get($id)
    {
        $status = $this->get('status');
        $query = $this->db->get_where('transaksi', ['id' => $id])->row();
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        $sukses = $this->db->update('transaksi', $data);
        if($sukses)
        {
            $this->set_response(['status' => 200, "data" => $query,'message' => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response([
                'status' => 400,
                'message' => falses
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function change_harga_post()
    {
        $data = array(
            'total_harga' => $this->post('total_harga'),
            'status' => 1
        );
        $this->db->where('id', $this->post('id'));
        $sukses = $this->db->update('transaksi', $data);
        if($sukses)
        {
            $query = $this->db->get_where('transaksi', ['id' => $this->post('id')])->row();
            $this->set_response(['status' => 200, 'data' => $query,'message' => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Tambah villa gagal'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function slider_get()
    {
        $query = $this->db->get('slider')->result();
        if($query)
        {
            $this->set_response(['status' => 200, "data" => $query->result(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(['status' => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function slider_id_get($id)
    {
        $query = $this->db->get_where('slider', ['id' => $id]);
        if($query)
        {
            $this->set_response(['status' => 200, 'data' => $query->row(), 'message' => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response('Tidak ada', REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function add_slider_post()
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

    public function edit_slider_post()
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

    public function change_status_slider_get($status)
    {
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

    public function delete_slider_get($id)
    {
        $this->db->where('id', $id);
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

	public function not_found() {
        $this->set_response([
        'status' => FALSE,
        'message' => 'not found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    }
}