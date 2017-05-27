<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
  
    }

    public function landing()
    {
        $page_title = 'EpicQUIZ | Acasa';
        $data['page_title'] = $page_title;
        $this->load->view("header", $data);
        $this->load->view("menus/main_menu", $data);
        $this->load->view("footer", $data);
    }
}
