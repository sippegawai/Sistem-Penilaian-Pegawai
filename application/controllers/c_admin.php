<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class C_admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') !== '1') {
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->load->model('m_admin');
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/v_admin');
		$this->load->view('layout/footer');
	}

	public function index_manager()
	{
		$data['manager'] = $this->m_admin->tampil_data_man()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/v_manager', $data);
		$this->load->view('layout/footer');
	}

	public function index_pegawai()
	{
		$data['pegawai'] = $this->m_admin->tampil_data_peg()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/v_pegawai', $data);
		$this->load->view('layout/footer');
	}

	public function tambah_man(){
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/tambah_man');
		$this->load->view('layout/footer');
	}

	public function tambah_peg(){
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/tambah_peg');
		$this->load->view('layout/footer');
	}

	public function tambah_manager()
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
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar');
			$this->load->view('admin/tambah_man');
			$this->load->view('layout/footer');
	  	} else {
	  		$data = [
	  			'name' => $this->input->post('name'),
	  			'email' => $this->input->post('email'),
	  			'password' => md5($this->input->post('password1')),
	  			'role_id' => 2
	  		];
	  		$data2 = [
	  			'name' => $this->input->post('name'),
	  			'email' => $this->input->post('email'),
	  			'role' => $this->input->post('role'),
	  		];

	  		$this->db->insert('user', $data);
	  		$this->db->insert('manager', $data2);
	  		$this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert"> Akun Manager Telah Ditambahkan</div>');
	  		redirect('c_admin/index_manager');
	  	}
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
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar');
			$this->load->view('tambah_peg');
			$this->load->view('layout/footer');
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
	  		$this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert"> Akun Pegawai Telah Di Tambahkan</div>');
	  		redirect('c_admin/index_pegawai');
	  	}
	}


	public function hapus_man($id)
	{
		$where = array('email' => $id);
		$this->m_admin->hapus_data($where,'manager');
		$this->m_admin->hapus_data($where,'user');
		redirect('c_admin/index_manager');
	}

	public function hapus_peg($id)
	{
		$where = array('email' => $id);
		$this->m_admin->hapus_data($where,'pegawai');
		$this->m_admin->hapus_data($where,'user');
		redirect('c_admin/index_pegawai');
	}


	public function edit_man($id)
	{
		$where = array('id_manager' => $id );
		$data['manager'] = $this->m_admin->edit_data($where,'manager')->result();
		$data['agama'] = $this->m_admin->tampil_data_ag()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/edit_m', $data);
		$this->load->view('layout/footer');
	}

	public function update_man()
	{
		$data['agama'] = $this->m_admin->tampil_data_ag()->result();

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
		$this->m_admin->update_data($where,$data,'manager');
		redirect('c_admin/index_manager');
	}

	public function edit_peg($id)
	{
		$where = array('id_pegawai' => $id );
		$data['pegawai'] = $this->m_admin->edit_data($where,'pegawai')->result();
		$data['agama'] = $this->m_admin->tampil_data_ag()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/edit_p', $data);
		$this->load->view('layout/footer');
	}

	public function update_peg()
	{
		$id = $this->input->post('id_pegawai');
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

		$where = array('id_pegawai' => $id);
		$this->m_admin->update_data($where,$data,'pegawai');
		redirect('c_admin/index_pegawai');
	}

	public function logout()
	{
		$this->session->sess_destroy();
	    redirect('');
	}
}
