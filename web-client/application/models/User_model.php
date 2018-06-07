<?php 
class User_model extends CI_Model {

    var $API ="";
    
    public function __construct() 
    {
		parent::__construct();
        $this->load->library('Restclient');
        $this->API="http://localhost/demo-ci/web-server/api/user/";
    }
    
    public function get()
    {
		return json_decode($this->restclient->get());
    }
    
    public function getUserById($id)
    {
		return json_decode($this->restclient->get($id),true);
    }
    
	public function insert($data)
	{
		$this->restclient->post($data);
    }
    
	public function update($data)
	{
		$this->restclient->put($data);
    }
    
	public function delete($id)
	{
		$this->restclient->delete($id);
	}
}
?>