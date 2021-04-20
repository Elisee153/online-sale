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
        $this->load->view('layout/user/header');
    }

    public function index()
    {
        $product = $this->Crud->get_data_desc('produit',[],8);
        
        foreach($product as $p)
        {
            $p->image = $this->Crud->get_data('image',['idproduit'=>$p->id])[0];
            $p->categorie = $this->Crud->get_data('categorie',['id'=>$p->idcategorie])[0]->nom;
        }
        
        $d['product'] = $product;
        $this->load->view('user/index',$d);
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
            'commentaire' => $this->input->post('commentaire'),
            'date' => date('d-m-Y',time()),
            'etat' => 0,
            'idproduit' => $idproduit,
            'iduser' => $this->session->iduser==null? null : $this->session->iduser
        ]);
        
        redirect('user/product_detail?id='.$idproduit);
        
    }

    // public function comment_by_produit()
    // {
    //     $idproduit = $this->input->post('idproduit');

    //     $comment = $this->Crud->get_data('commentaire'); 
    // }

    // public function detail_produit()
    // {
    //     $idproduit = $this->input->post('idproduit');

    //     $product = $this->Crud->join_data('produit','categorie','produit.idcategorie = categorie.id',
    //                                                 'produit.id','DESC',['id'=>$idproduit],null);

    //     $product[0]->image = $this->Crud->get_data('image',['idproduit'=>$product[0]->id]);

    //     $d['product'] = $product;

    //     $this->load->view('user/product_detail',$d);
    //     $this->load->view('layout/user/js');
    // }
}
