<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //les models
        $this->load->model('Crud');
        //===================================
        //===les composants du design===
        $this->load->view('layout/user/css');

        $d['categorie'] = $this->Crud->get_data('categorie');

        $this->load->view('layout/user/header',$d);
    }

    public function index()
    {
        $product = $this->Crud->get_data_desc('produit',[],8);
        
        foreach($product as $p)
        {
            $p->image = $this->Crud->get_data('image',['idproduit'=>$p->id])[0];
            $p->categorie = $this->Crud->get_data('categorie',['id'=>$p->idcategorie])[0]->nom;
        }

        $active_option = "home";

        $d['active_option'] = $active_option;
        $d['product'] = $product;

        $this->load->view('user/index',$d);
        $this->load->view('layout/user/footer');
        $this->load->view('layout/user/js');
    }

    public function all_product()
    {
        $product = $this->Crud->get_data_desc('produit',[],null);
        
        foreach($product as $p)
        {
            $p->image = $this->Crud->get_data('image',['idproduit'=>$p->id])[0];
            $p->categorie = $this->Crud->get_data('categorie',['id'=>$p->idcategorie])[0]->nom;
        }

        $active_option = "product";

        $d['active_option'] = $active_option;
        $d['product'] = $product;
        $this->load->view('user/all_product',$d);
        $this->load->view('layout/user/footer');
        $this->load->view('layout/user/js');
    }

    public function prod_by_cat()
    {
        $idcat = $this->input->get('id');

        $product = $this->Crud->get_data_desc('produit',['idcategorie'=>$idcat],null);
        $categorie = $this->Crud->get_data('categorie',['id'=>$idcat])[0]->nom;

        foreach($product as $p)
        {
            $p->image = $this->Crud->get_data('image',['idproduit'=>$p->id])[0];
            $p->categorie = $this->Crud->get_data('categorie',['id'=>$p->idcategorie])[0]->nom;
        }
        
        $active_option = "categorie";

        $d['active_option'] = $active_option;
        $d['product'] = $product;
        $d['categorie'] = $categorie;

        $this->load->view('user/prod_by_cat',$d);
        $this->load->view('layout/user/footer');
        $this->load->view('layout/user/js');
    }

    public function product_detail()
    {
        $idproduit = $this->input->get('id');        
        $product = $product = $this->Crud->get_data_desc('produit',['id'=>$idproduit]);

        $product[0]->image = $this->Crud->get_data('image',['idproduit'=>$product[0]->id]);
        $product[0]->categorie = $this->Crud->get_data('categorie',['id'=>$product[0]->idcategorie])[0]->nom;
        $comment = $this->Crud->get_data('commentaire',['idproduit'=>$idproduit]);
        $active_option = "product";

        $d['active_option'] = $active_option;
        $d['product'] = $product;
        $d['comment'] = $comment;

        $this->load->view('user/product_detail',$d);
        $this->load->view('layout/user/footer');
        $this->load->view('layout/user/js');
    }

    public function new_comment()
    {
        $idproduit = $this->input->post('idproduit');

        $this->Crud->add_data('commentaire',[
            'nom' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'commentaire' => $this->input->post('comment'),
            'date' => date('d-m-Y',time()),
            'etat' => 0,
            'idproduit' => $idproduit,
            'iduser' => $this->session->iduser==null? null : $this->session->iduser
        ]);
        
        $this->session->set_flashdata(['comment_sent'=>true]);

        redirect('user/product_detail?id='.$idproduit);
        
    }

    public function contact()
    {
        if(count($_POST) <= 0)
        {
            $active_option = "contact";
            $d['active_option'] = $active_option;

            $this->load->view('user/contact',$d);
            $this->load->view('layout/user/footer');
            $this->load->view('layout/user/js');
        }else
        {
            $this->Crud->add_data('message',[
                'sender' => $this->input->post('sender'),
                'email' => $this->input->post('email'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'date' => date('d-m-Y',time()),
                'etat' => 0,
                'iduser' => $this->session->iduser==null? null : $this->session->iduser
            ]);
            
            $this->session->set_flashdata(['message_sent'=>true]);

            redirect('user/contact');
        }
    }

    public function about()
    {
        $active_option = "about";
        $d['active_option'] = $active_option;

        $this->load->view('user/about',$d);
        $this->load->view('layout/user/footer');
        $this->load->view('layout/user/js');
    }

    public function newslater()
    {
        $email = $this->input->post('email');

        $this->Crud->add_data('email',[
            'email'=>$email,
            'iduser'=> $this->session->iduser==null? null : $this->session->iduser
        ]);

        $this->session->set_flashdata(['email_saved'=>true]);

        redirect("user/index");
    }
}
