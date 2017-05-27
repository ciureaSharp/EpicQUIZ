<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Git extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function register()
    {
        var_dump($_POST);
    }
}
