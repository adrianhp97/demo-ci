<?php
class User extends  CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        
		$this->load->model('User_model');

		$this->load->library('session');
		
        $this->load->helper('url');
    }
    
    public function index()
    {
		$data['user_list'] = $this->User_model->get();
		$this->load->view('user_list',$data);
    }
    
	public function create()
	{
		$this->load->view('user_form');
    }
    
	public function save()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'fullname' => $this->input->post('fullname'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
        );

        $response = $this->User_model->insert($data);
        $this->session->set_flashdata($response['message']);
		redirect('user');
    }
    
	public function save_edit()
	{
		$data = array(
			'id' => $this->input->post('id'),
			'username' => $this->input->post('username'),
			'fullname' => $this->input->post('fullname'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
        );
        
		$this->User_model->update($data);
		redirect('user');
    }
    
    public function edit()
    {
		$data['user'] = $this->User_model->getUserById($this->uri->segment(3))[0];
		$this->load->view('user_edit',$data);
    }
    
	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->User_model->delete($id);
		redirect('user');
	}
}