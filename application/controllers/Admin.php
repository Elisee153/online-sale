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
        $this->check_connexion();

        $product = $this->Crud->join_data('produit','categorie','produit.idcategorie = categorie.id','produit.id','DESC',[]);

        $d = [
            'product'=>$product
        ];

        $this->load->view('admin/all_product',$d);
        $this->load->view('layout/admin/js');
    }

    public function new_product()
    {
        $this->check_connexion();

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
                if ($_FILES['img'.$j]['name'] != null) 
                {
                    $fichier = 'fichier'.md5(time())."_".$_FILES['img'.$j]['name'];

                    $t = [
                        'image' => $fichier,
                        'main' => $j==1? 1 : 0,
                        'idproduit' => $this->Crud->get_data_desc('produit')[0]->id,
                    ];

                    move_uploaded_file($_FILES['img'.$j]['tmp_name'], './assets/img/produit/'.$fichier);
                }

                $this->Crud->add_data('image',$t);
            }
            $this->db->trans_complete();

            $session_flash = array("produit_ajoute" => true);
            $this->session->set_flashdata($session_flash);

            redirect('admin/all_product');
        }
    }

    public function product_detail()
    {
        $idproduit =  $this->input->post('idproduit');
        $product = $this->Crud->join_data('produit','categorie','produit.idcategorie = categorie.id','produit.id','DESC',['produit.id'=>$idproduit]);
        
        $product[0]->image = $this->Crud->get_data('image',['idproduit'=>$product[0]->id]);
         
        $d['product'] = $product;

        $this->load->view('admin/product_detail',$d);
        $this->load->view('layout/admin/js');
    }
    //==============================================================
//les categories

    public function all_categorie()
    {
        $this->check_connexion();

        $d['categorie'] = $this->Crud->get_data_desc('categorie');
        $this->load->view('admin/all_categorie',$d);
        $this->load->view('layout/admin/js');
    }

    public function new_categorie()
    {
        $this->check_connexion();

        $d['nom'] = $this->input->post('categorie');
        $this->Crud->add_data('categorie',$d);

        $session_flash = array("categorie_ajoute" => true);
        $this->session->set_flashdata($session_flash);

        redirect('admin/all_categorie');
    }

    public function all_mails()
    {
        $this->check_connexion();

        $d['mail'] = $this->Crud->get_data_desc('message');
        $this->load->view('admin/message',$d);
        $this->load->view('layout/admin/js');
    }

    public function mail_detail()
    {
        $this->check_connexion();

        $m_id = $this->input->get('id');

        $d['message'] = $this->Crud->get_data('message',['id'=>$m_id]);
        
        if($d['message'][0]->etat == 0)
        {
            $this->Crud->update_data('message',['id'=>$d['message'][0]->id],['etat'=>1]);
        }

        $this->load->view('admin/mail_detail',$d);
        $this->load->view('layout/admin/js');
    }

    public function send_mail()
    {
        $this->check_connexion();
        $this->load->library('email');
        $this->load->config('email');

        $this->email->set_newline("\r\n");
        $this->email->from($this->config->item('smtp_user'), 'Jesus');
        $this->email->to($this->input->post('email'));

        $this->email->subject($this->input->post('subject'));
        $this->email->message($this->input->post('message'));

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
            redirect('admin/mail_detail?id='.$this->input->post('id'));
        } else {
            show_error($this->email->print_debugger());
        }
        
    }
    //====================================================================

    public function all_comments()
    {
        $this->check_connexion();

        $d['comment'] = $this->Crud->join_data('commentaire','produit','commentaire.idproduit = produit.id','commentaire.id','DESC',[]);
        
        $this->load->view('admin/comment',$d);
        $this->load->view('layout/admin/js');
    }

    public function comment_detail()
    {
        $this->check_connexion();

        $c_id = $this->input->get('id');
        $d['comment'] = $this->Crud->join_data('commentaire','produit','commentaire.idproduit = produit.id','commentaire.id','DESC',['commentaire.id'=>$c_id]);
        
        if($d['comment'][0]->etat == 0)
        {
            $this->Crud->update_data('commentaire',['id'=>$d['comment'][0]->id],['etat'=>1]);
        }
        
        $this->load->view('admin/comment_detail',$d);
        $this->load->view('layout/admin/js');
    }

    public function delete()
    {
        $idproduit = $this->input->post('idproduit');

        $this->Crud->delete_data('produit',['id'=>$idproduit]);

        redirect('admin/all_product');
    }
}
