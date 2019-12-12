<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class User_peg extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') !== '3') {
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->load->model('m_user_p');
	}
	public function index()
	{
		$data['pegawai'] = $this->m_user_p->tampil_data()->result();
		$data['buruh'] = $this->m_user_p->tampil_data_b()->result();
		$this->load->view('layout/header_user');
		$this->load->view('pegawai/user_p', $data);
		$this->load->view('layout/footer_user');
	}

	public function tambah_buruh()
	{
		$nik = $this->input->post('nik');
		$name = $this->input->post('name');

		$data = array(
			'nik' => $nik,
			'nama' => $name,
		);

		$this->db->insert('buruh',$data);
		redirect('user_peg/index#testimonials-section');
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->m_user_p->hapus_data($where,'buruh');
		redirect('user_peg/index#testimonials-section');
	}

	public function edit($id)
	{
		$where = array('id_pegawai' => $id );
		$data['pegawai'] = $this->m_user_p->edit_data($where,'pegawai')->result();
		$this->load->view('layout/header_user');
		$this->load->view('edit_user_p', $data);
		$this->load->view('layout/footer_user');
	}

	public function update()
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
		$this->m_user_p->update_data($where,$data,'pegawai');
		redirect('user_peg/index#blog-section');
	}

	public function logout()
	{
		$this->session->sess_destroy();
	    redirect('');
	}

}
