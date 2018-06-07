<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

class Image extends REST_Controller {

    public function __construct() 
    { 
        parent::__construct();
        
        $this->load->model('Images_model');
    }
    
    public function index_get($id = 0) 
    {
        $images = $this->Images_model->get($id);
        
        if (!empty($images))
        {
            $this->response($images, REST_Controller::HTTP_OK);
        }
        else
        {
            $this->response([
                'status' => FALSE,
                'message' => 'image tidak ditemukan.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function index_post() 
    {
        $uploaddir = '../../uploads/image/';
        $config['file_name'] = $this->post('name');
        $file_name = underscore($_FILES['file']['name']);
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            $this->response([
                'status' => TRUE,
                'message' => 'Berhasil melakukan insert image.'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response("Gagal melakukan insert image.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

?>