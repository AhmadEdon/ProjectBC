<?php
defined('BASEPATH') or exit('No direct script access allowed');

class it_inventory extends CI_Controller
{

  public function index()
  {
    $data['title'] = 'Home';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/it_inventory', $data);
    $this->load->view('templates/footer');
  }
}