<?php 
defined('BASEPATH') or exit('No Direct script access allowed');

class C_company extends CI_Model
{
  public function AllData()
  {
     return $this->db->get('company')->result_array();
  }
}
