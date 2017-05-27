<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Git extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
  
    }

    public function index()
    {
        exec('git pull -u origin master 2>&1', $output);
        print_r($output);
    }
}
