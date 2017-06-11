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
        if ($ret) {
            //create session, add session data
            echo 1;
        } else {
            echo 0;
        }
    }

    public function login()
    {
        $email = $_POST['email'];
        $pass = md5($_POST['pass'] . SALT);
        $this->load->model('Users_model');
        echo $this->Users_model->login($email, $pass);
    }
    
    public function verify_link($link){
        $this->load->model('Users_model');
        $ret = $this->Users_model->verify_link($link);
        if($ret){
            echo $ret;
        } else{
            echo 'error';
        }
    }
}
