<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model
{
    public function get_data($data)
    {
        return $this->db->get_where('user',$data)->result();      
    }
}  
