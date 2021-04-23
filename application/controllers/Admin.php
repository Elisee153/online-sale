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
            $tree_last_mes = $this->Crud->get_data_desc('message',[],3);
            $this->load->view('layout/admin/topbar',['mes_non_lu'=>$mes_non_lu,'tree_last_mes'=>$tree_last_mes]);
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
        $active_option = "acceuil";

        
        $d = [
            'produit' => $product,
            'categorie' => $cat,
            'mes_non_lu' => $mes_non_lu,
            'mes' => $mes,
            'com_non_lu' => $com_non_lu,
            'com' => $com,
            'com_join' => $com_join,
            'active_option' => $active_option,
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
        $active_option = "produit";

        $d = [
            'product'=>$product,
            'active_option' => $active_option,
        ];

        $this->load->view('admin/all_product',$d);
        $this->load->view('layout/admin/js');
        $this->load->view('layout/admin/footer');
    }

    public function new_product()
    {
        $this->check_connexion();

        if(count($_POST) <= 0)
        {
            $active_option = "produit";
            $d['active_option'] = $active_option;

            $d['categ'] = $this->Crud->get_data('categorie');

            $this->load->view('admin/new_product',$d);
            $this->load->view('layout/admin/js');
            $this->load->view('layout/admin/footer');
        }else{
            $this->db->trans_start();

            $prix = $this->input->post('prix').' '.$this->input->post('devise');
            

            $d = [
                'designation' => $this->input->post('designation'),
                'prix' => $prix,
                'description' => $this->input->post('description'),
                'idcategorie' => $this->input->post('categorie'),                
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
        $active_option = 'produit';

        $d['product'] = $product;
        $d['active_option'] = $active_option;

        $this->load->view('admin/product_detail',$d);
        $this->load->view('layout/admin/js');
        $this->load->view('layout/admin/footer');
    }
    //==============================================================
//les categories

    public function all_categorie()
    {
        $this->check_connexion();

        $active_option = 'categorie';

        $d['categorie'] = $this->Crud->get_data_desc('categorie');
        $d['active_option'] = $active_option;

        $this->load->view('admin/all_categorie',$d);
        $this->load->view('layout/admin/js');
        $this->load->view('layout/admin/footer');
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

    public function delete_cat()
    {
        $idcat = $this->input->post('id');

        $this->Crud->delete_data('categorie',['id'=>$idcat]);

        redirect('admin/all_categorie');
        
    }

    public function all_mails()
    {
        $this->check_connexion();
        $active_option = "mail";

        $d['mail'] = $this->Crud->get_data_desc('message');
        $d['active_option'] = $active_option;

        $this->load->view('admin/message',$d);
        $this->load->view('layout/admin/js');
        $this->load->view('layout/admin/footer');
    }

    public function mail_detail()
    {
        $this->check_connexion();

        $m_id = $this->input->get('id');
        $active_option = "mail"; 

        $d['message'] = $this->Crud->get_data('message',['id'=>$m_id]);
        $d['active_option'] = $active_option;
        
        if($d['message'][0]->etat == 0)
        {
            $this->Crud->update_data('message',['id'=>$d['message'][0]->id],['etat'=>1]);
        }

        $this->load->view('admin/mail_detail',$d);
        $this->load->view('layout/admin/js');
        $this->load->view('layout/admin/footer');
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

        $active_option = 'comment';
        $d['active_option'] = $active_option;

        $d['comment'] = $this->Crud->join_data('commentaire','produit','commentaire.idproduit = produit.id','commentaire.id','DESC',[]);
        $d['active_option'] = $active_option;

        $this->load->view('admin/comment',$d);
        $this->load->view('layout/admin/js');
        $this->load->view('layout/admin/footer');
    }

    public function comment_detail()
    {
        $this->check_connexion();

        $c_id = $this->input->get('id');
        $active_option = 'comment';
        $d['active_option'] = $active_option;
        $d['comment'] = $this->Crud->join_data('commentaire','produit','commentaire.idproduit = produit.id','commentaire.id','DESC',['commentaire.id'=>$c_id]);
        
        if($d['comment'][0]->etat == 0)
        {
            $this->Crud->update_data('commentaire',['id'=>$d['comment'][0]->id],['etat'=>1]);
        }
        
        $this->load->view('admin/comment_detail',$d);
        $this->load->view('layout/admin/js');
        $this->load->view('layout/admin/footer');
    }

    public function delete()
    {
        $idproduit = $this->input->post('idproduit');

        $this->Crud->delete_data('produit',['id'=>$idproduit]);

        redirect('admin/all_product');
    }

    public function profile()
    {
        if(count($_POST) <= 0)
        {
            $user = $this->Crud->get_data('user',['id'=>$this->session->id]);

            $this->load->view('admin/profile',['user'=>$user]);
            $this->load->view('layout/admin/js');
        }else
        {
            $iduser = $this->input->post('id');

            $this->Crud->update_data('user',['id'=>$iduser],[
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'mdp' => $this->input->post('mdp'),
                'email' => $this->input->post('mdp'),
                'type' => 'admin'
            ]);

            $this->session->set_flashdata(['user_update'=>true]);

            redirect('admin/index');
        }
    }
}
