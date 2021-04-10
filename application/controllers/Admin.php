<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->view('layout/admin/css');  
        $this->load->view('layout/admin/head');
        $this->load->model('Crud');
        if($this->session->connected)
        {                  
            $this->load->view('layout/admin/topbar.php');
            $this->load->view('layout/admin/sidebar.php');
        }       
    }

    public function index()
    {
        $this->load->view('admin/index');
        $this->load->view('layout/admin/footer');
        $this->load->view('layout/admin/js');
    }

    public function login()
    {
        if(count($_POST) <= 0){
            $this->load->view('admin/login');
            $this->load->view('layout/admin/js');
        }else{

            $data = array(
                'username' => $this->input->post('username'),
                'mdp' => $this->input->post('mdp'),
            );

            $r = $this->Crud->get_data($data);
              
            if(count($r) > 0)
            {
                $session = [
                    'id' => $r[0]->id,
                    'connected' => true,
                    'nom' => $r[0]->name,
                    'type' => $r[0]->type,
                ];

                $this->session->set_userdata($session);
                redirect('admin');
            }else{
                $session_flash = array("error_login" => "Login ou mot de passe incorrecte!! veuillez reesayer");
                $this->session->set_flashdata($session_flash);
                redirect('admin/login');
            }
        } 
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
