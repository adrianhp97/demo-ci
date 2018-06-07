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
		return $this->restclient->get($this->API);
  }
    
  public function getUserById($id)
  {
		return $this->restclient->get($this->API, array('id' => $id));
  }
    
	public function insert($data)
	{
		return $this->restclient->post($this->API, $data);
  }
    
	public function update($data)
	{
		return $this->restclient->put($this->API, $data);
  }
    
	public function delete($id)
	{
		return $this->restclient->delete($this->API, array('id' => $id));
	}
}
?>