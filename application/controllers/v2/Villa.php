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
class Villa extends REST_Controller {

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
        $query = $this->db->get('villa');
        if($query)
        {
            $this->set_response(['status' => 200, "data" => $query->result(), "count" => $query->num_rows(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(['status' => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_post()
    {
        $query = $this->db->query("SELECT kode_villa FROM villa WHERE kode_villa = ?", array($this->post('kode_villa')));
        if($query->num_rows() > 0)
        {
            $this->set_response([
                    'status' => 400,
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
                $this->set_response(['status' => 200, 'message' => true], REST_Controller::HTTP_OK);
            }else
            {
                $this->set_response([
                        'status' => 400,
                        'message' => false
                    ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function id_get($id)
    {
        $query =$this->db->query("SELECT villa.id, villa.kode_villa, villa.alamat_umum, villa.kolam_renang, villa.wifi, villa.tv, villa.kamar, villa.bangunan, villa.karaoke, villa.parkir, villa.nama_villa, villa.no_telp, villa.email, villa.alamat, villa.desc_id, villa.harga_min, villa.harga_max, villa.provinsi, villa.kabkota as kota, villa.kapasitas, provinsi.namaprov, kabkota.kabkota
            FROM villa
            JOIN provinsi ON provinsi.id = villa.provinsi
            JOIN kabkota ON kabkota.id = villa.kabkota
            WHERE villa.id = ?", array($id));
        if($query)
        {
            $this->set_response(["status" => 200, "data" => $query->row(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(['status' => 400, 'message' => false], REST_Controller::HTTP_BAD_REQUEST);
        }   
    }

    public function edit_post($id)
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
        $this->db->where('id', $id);
        $sukses = $this->db->update('villa', $data);
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

    public function edit_picture_post($id)
    {
        $data = array(
            'gambar' => $this->post('gambar')
        );
        $this->db->where('id', $id);
        $sukses = $this->db->update('villa', $data);
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

	public function not_found() {
        $this->set_response([
        'status' => FALSE,
        'message' => 'not found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    }
}