<?php

Class Users_model extends CI_Model
{

// Insert registration data in database
    public function register($email, $pass)
    {
// Query to check whether username already exist or not
        $condition = "email =" . "'" . $email . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            $data = array(
                'email' => $email,
                'pass' => $pass
            );
// Query to insert data in database
            $this->db->insert('users', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

// Read data using username and password
    public function login($email, $pass) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('pass', $pass);
        $this->db->limit(1);
        $query = $this->db->get();
        $status = $query->row();
        var_dump($status);die();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function validate_register($email){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }
//
//// Read data from database to show data in admin page
//    public function read_user_information($username) {
//
//        $condition = "email=" . "'" . $username . "'";
//        $this->db->select('*');
//        $this->db->from('operatori');
//        $this->db->where($condition);
//        $this->db->limit(1);
//        $query = $this->db->get();
//
//        if ($query->num_rows() == 1) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }

}



