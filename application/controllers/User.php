<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->view('layout/user/css');
        $navbar = $this->load->view('layout/user/navbar',[],true);
        $this->load->view('layout/user/header',['navbar'=>$navbar]);
    }

    public function index()
    {
        $this->load->view('user/index');
        $this->load->view('layout/user/footer');
        $this->load->view('layout/user/js');
    }
}
