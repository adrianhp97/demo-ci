<?php

    class UsersModel extends CI_Model
    {
        public $id;
        public $username;
        public $fullname;
        public $password;

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function get($id = "") 
        {
            if(!empty($id))
            {
                $query = $this->db->get_where('users', array('id' => $id));
                return $query->result();
            }
            else
            {
                $query = $this->db->get('users');
                return $query->result();
            }
        }
        
        public function insert($data = array()) 
        {
            $query = $this->db->insert('users', $data);
            return $query ? $this->db->insert_id() : false;
        }

        public function delete($id) 
        {
            $query = $this->db->delete('users', array( 'id' => $id ));
            return $query ? true : false;
        }

        public function update($id, $data) 
        {
            if(!empty($data) && !empty($id))
            {
                $query = $this->db->update('users', $data, array( 'id' => $id ));
                return $query ? true:false;
            }
            else
            {
                return false;
            }
        }

        public function getUserLogin()
        {
            $rows = $query = $this->db->get('users');
            $result = array(); 

            foreach ($rows as $row) { 
                $result[$row['username']] = $row['password']; 
            }
            return $result; 
        }
    }

?>