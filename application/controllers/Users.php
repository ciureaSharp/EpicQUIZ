<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function register()
    {
        $nume = $_POST['nume'];
        $prenume = $_POST['prenume'];
        $email = $_POST['email'];
        $pass = md5($_POST['pass'] . SALT);
        $this->load->model('Users_model');
        $ret = $this->Users_model->register($email, $pass);
        if ($ret == '1') {
            //create session, add session data
            echo 1;
        } elseif ($ret == 0) {
            echo 0;
        } elseif ($ret == 'neactivat') {
            echo 3;
        }
    }

    public function login()
    {
        $email = $_POST['email'];
        $pass = md5($_POST['pass'] . SALT);
        $this->load->model('Users_model');
        if ($this->Users_model->login($email, $pass)) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
