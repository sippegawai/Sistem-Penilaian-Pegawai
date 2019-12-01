<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

  public function index()
  {
    $this->load->view('auth/login');
  }

  public function ceklog(){
    $email = $this->input->post('email');
    $password = md5($this->input->post('password'));
    $this->load->model('model_userLog');
    $this->model_userLog->ver($email,$password);
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('');
  }

}