<?php


class M_user_m extends CI_Model
{

	public function tampil_data_p()
	{
		return $this->db->get('pegawai');
	}
	public function tampil_data_m($id)
	{
		return $this->db->get_where('manager',$id);
	}
	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function edit_data($where)
	{
		return $this->db->get_where('manager',$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
