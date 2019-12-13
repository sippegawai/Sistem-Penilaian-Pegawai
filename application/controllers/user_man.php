<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class User_man extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') !== '2') {
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->load->model('m_user_m');
	}
	public function index()
	{
		$idm = $this->session->userdata('id_manager');
		#$cek['manager'] = $this->m_user_m->cek_data_m($email);
		$data['pegawai'] = $this->m_user_m->tampil_data_p()->result();
		$data['manager'] = $this->m_user_m->tampil_data_m(['id_manager' => $idm])->row();
		$this->load->view('layout/header_user');
		$this->load->view('manager/user_m', $data);
		$this->load->view('layout/footer_user');
	}

	public function tambah_pegawai()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
	  	$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'Email telah digunakan'
			]);
	  	$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
	  		'matches' => 'password tidak sama',
	  		'min_length' => 'Password terlalu pendek!'
	  		]);
	  	$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password2]');

	  	if( $this->form_validation->run() == false) {
	  		$this->load->view('pegawai/tambah_pegawai');
	  	} else {
	  		$data = [
	  			'name' => $this->input->post('name'),
	  			'email' => $this->input->post('email'),
	  			'password' => md5($this->input->post('password1')),
	  			'role_id' => 3
	  		];
	  		$data2 = [
	  			'name' => $this->input->post('name'),
	  			'email' => $this->input->post('email'),
	  			'role' => $this->input->post('role'),
	  		];

	  		$this->db->insert('user', $data);
	  		$this->db->insert('pegawai', $data2);
	  		$this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert"> Selamat Akun Anda Berhasil Registrasi. Tolong Login</div>');
	  		redirect('user_man/index');
	  	}
	}

	public function hapus($id)
	{
		$where = array('email' => $id);
		$this->m_user_m->hapus_data($where,'pegawai');
		$this->m_user_m->hapus_data($where,'user');
		redirect('user_man/index#testimonials-section');
	}

	public function edit($id)
	{
		$where = array('id_manager' => $id );
		$data['manager'] = $this->m_user_m->edit_data($where)->row();
		$this->load->view('layout/header_user');
		$this->load->view('manager/edit_user_m', $data);
		$this->load->view('layout/footer_user');
	}

	public function update()
	{
		$id = $this->input->post('id_manager');
		$nik = $this->input->post('nik');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$jk = $this->input->post('jk');
		$agama = $this->input->post('agama');
		$tgl_lahir = $this->input->post('tgl_lahir');

		$data = array(
			'nik' => $nik,
			'name' => $name,
			'email' => $email,
			'jk' => $jk,
			'agama' => $agama,
			'tgl_lahir' => $tgl_lahir,
		);

		$where = array('id_manager' => $id);
		$this->m_user_m->update_data($where,$data,'manager');
		redirect('user_man/index#blog-section');
	}

	public function logout()
	{
		$this->session->sess_destroy();
	    redirect('');
	}

}
