<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
          //les models
        $this->load->model('Crud');	

        $this->load->view('layout/admin/css');  
        $this->load->view('layout/admin/head');

        if($this->session->connected)
        {
            $mes_non_lu = $this->Crud->get_data('message',['etat'=>0]);
            $this->load->view('layout/admin/topbar',['mes_non_lu'=>$mes_non_lu]);
            $this->load->view('layout/admin/sidebar');
        }
    }

    public function check_connexion()
    {
        if(!$this->session->connected)
        {
            redirect('admin/login');
        }
    }

    public function index()
    {
        $this->check_connexion();

        $product = $this->Crud->join_data('produit','categorie','produit.idcategorie = categorie.id','produit.id','DESC',[],5);
        $cat = $this->Crud->get_data('categorie');
        $mes_non_lu = $this->Crud->get_data('message',['etat'=>0]);
        $mes= $this->Crud->get_data_desc('message',[],5);
        $com_join = $this->Crud->join_data('commentaire','produit','commentaire.idproduit = produit.id','commentaire.id','DESC',[],5);
        $com_non_lu = $this->Crud->get_data('commentaire',['etat'=>0]);
        $com = $this->Crud->get_data('commentaire');

        $d = [
            'produit' => $product,
            'categorie' => $cat,
            'mes_non_lu' => $mes_non_lu,
            'mes' => $mes,
            'com_non_lu' => $com_non_lu,
            'com' => $com,
            'com_join' => $com_join
        ];

        $this->load->view('admin/index',$d);
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

            $r = $this->Crud->get_data('user',$data);
              
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

    //============================================================
    public function all_product()
    {
        $product = $this->Crud->join_data('produit','categorie','produit.idcategorie = categorie.id','produit.id','DESC',[]);

        $d = [
            'product'=>$product
        ];

        $this->load->view('admin/all_product',$d);
        $this->load->view('layout/admin/js');
    }

    public function new_product()
    {
        if(count($_POST) <= 0)
        {
            $d['categ'] = $this->Crud->get_data('categorie');

            $this->load->view('admin/new_product',$d);
            $this->load->view('layout/admin/js');
        }else{
            $this->db->trans_start();
            $d = [
                'designation' => $this->input->post('designation'),
                'prix' => $this->input->post('prix'),
                'description' => $this->input->post('description'),
                'idcategorie' => $this->input->post('categorie')
            ];

            //ajout d'un produit
            $this->Crud->add_data('produit',$d);

            //les images
            $nbimg = $this->input->post('nbimg');

            for($j = 1;$j <= $nbimg;$j++)
            {
                $t = [
                    'image' => $this->input->post('img'.$j),
                    'main' => $j==1? 1 : 0,
                    'idproduit' => $this->Crud->get_data_desc('produit')[0]->id,
                ];

                $this->Crud->add_data('image',$t);
            }
            $this->db->trans_complete();
            
            $session_flash = array("produit_ajoute" => true);
            $this->session->set_flashdata($session_flash);

            redirect('admin/all_product');
            $this->load->view('layout/admin/js');
        }
    }
    //==============================================================
}
