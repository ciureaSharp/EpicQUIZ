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
        $pass = md5($_POST['pass'].SALT);
        $this->load->model('Users_model');
        $ret = $this->Users_model->register($nume,$prenume,$email,$pass);
        var_dump($ret);
    }
}
