<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller {

    public function __construct() 
    { 
        parent::__construct();
        
        $this->load->model('Users_model');
    }
    
    public function index_get($id = 0) 
    {
        $users = $this->Users_model->get($id);
        
        if (!empty($users))
        {
            $this->response($users, REST_Controller::HTTP_OK);
        }
        else
        {
            $this->response([
                'status' => FALSE,
                'message' => 'User tidak ditemukan.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function index_post() 
    {
        $data = array();
        $data['username'] = $this->post('username');
        $data['fullname'] = $this->post('fullname');
        $data['email'] = $this->post('email');
        $data['password'] = $this->post('password');
        if (!empty($data['username']) && 
            !empty($data['fullname']) && 
            !empty($data['email']) && 
            !empty($data['password']))
        {
            if ($this->Users_model->insert($data))
            {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Berhasil melakukan insert user.'
                ], REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response("Gagal melakukan insert user.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }
        else
        {
            $this->response("Data tidak lengkap.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function index_put() 
    {
        $data = array();
        $id = $this->put('id');
        $data['username'] = $this->put('username');
        $data['fullname'] = $this->put('fullname');
        $data['email'] = $this->put('email');
        $data['password'] = $this->put('password');
        if (!empty($id) &&
            !empty($data['username']) && 
            !empty($data['fullname']) && 
            !empty($data['email']) && 
            !empty($data['password']))
        {
            if($this->Users_model->update($id, $data))
            {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Berhasil melakukan update user.'
                ], REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response("Gagal melakukan update user.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }
        else
        {
            $this->response("Data tidak lengkap.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function index_delete($id)
    {
        if($id)
        {
            if($this->Users_model->delete($id))
            {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Berhasil melakukan delete user.'
                ], REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response("Gagal melakukan delete user.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }
        else
        {
            $this->response([
                'status' => FALSE,
                'message' => 'User tidak ditemukan.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }  
}

?>