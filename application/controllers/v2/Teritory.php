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
class Teritory extends REST_Controller {

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

    public function province_get()
    {
        $query = $this->db->get("provinsi");
        if($query)
        {
            $this->set_response(["status" => 200, "data" => $query->result(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(["status" => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function city_get($id)
    {
        $query = $this->db->get_where("kabkota", ['idprov' => $id]);
        if($query)
        {
            $this->set_response(["status" => 200, "data" => $query->result(), "message" => true], REST_Controller::HTTP_OK);
        }else
        {
            $this->set_response(["status" => 400, "message" => false], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

	public function not_found() {
        $this->set_response([
        'status' => FALSE,
        'message' => 'not found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    }
}