<?php


class M_admin extends CI_Model
{

	public function tampil_data_man()
	{
		return $this->db->get('manager');
	}

	public function tampil_data_peg()
	{
		return $this->db->get('pegawai');
	}

	public function tampil_data_ag()
	{
		return $this->db->get('agama');
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
