<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    public function nb_image()
    {
        $nbimg = $this->input->post('nbimg');

        $html ='<p><small>La premiere image doit etre l\'image principale</small></p><br/>';
        for($i = 0; $i < $nbimg; $i++)
        {
            $j = $i + 1;

            $html .= '<div class="col-md-8"  style="margin-top:-33px">            
                        <div class="form-group form-group--float">
                            <input type="file" class="form-control " name="img'.$j.'" id="img-'.$j.'" hidden>
                            <button class="btn btn-info btn-image" id="btn-img-'.$j.'">Image '.$j.'</button>
                            <small id="small-img'.$j.'">Aucun fichier choisi</small> 
                            <i class="form-group__bar"></i>
                        </div>      
                    </div><br/>                       
                    ';
        }   
        echo $html;
    }

    public function search_product()
    {
        $item = $this->input->post('item');

        $this->load->model('Crud');

        $matched_product = $this->Crud->join_data('produit','categorie','produit.idcategorie = categorie.id','produit.id','DESC',['designation'=>$item],null);
        $html = '<tr>
                <th>Designation</th>
                <th>Prix</th>
                <th>Categorie</th>
                <th>Action</th>
            </tr>';

        if(count($matched_product) > 0)
        {
            foreach($matched_product as $p){
                $html.=' <tr>
                    <td>'.$p->designation.'</td>
                    <td>'.$p->prix.'</td>
                    <td>'.$p->nom.'</td>
                    <form action='.site_url("admin/product_detail").' method="post">
                        <input type="text" name="idproduit" value="'.$p->id.'" hidden>
                        <td><button type="submit" class="btn btn-outline-primary">Detail</button></td>
                    </form>
                </tr>';
            }
        }else{
            $html.= '<tr><td>No Item found</td></tr>';
        }
        

        echo $html;

    }

    public function all_product()
    {
        $this->load->model('Crud');

        $product = $this->Crud->join_data('produit','categorie','produit.idcategorie = categorie.id','produit.id','DESC',[],null);

        $html = '<tr>
                <th>Designation</th>
                <th>Prix</th>
                <th>Categorie</th>
                <th>Action</th>
            </tr>';

        foreach($product as $p){
            $html.=' <tr>
                <td>'.$p->designation.'</td>
                <td>'.$p->prix.'</td>
                <td>'.$p->nom.'</td>
                <form action='.site_url("admin/product_detail").' method="post">
                    <input type="text" name="idproduit" value="'.$p->id.'" hidden>
                    <td><button type="submit" class="btn btn-outline-primary">Detail</button></td>
                </form>
            </tr>';
        }

        echo $html;
    }
}