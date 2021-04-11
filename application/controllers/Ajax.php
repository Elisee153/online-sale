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
}