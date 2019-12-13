<?php
class model_userLog extends CI_Model{

	public function ver($email,$password)
	{
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query=$this->db->get('user');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$sar= array('email' => $row->email,
					'password' => $row->password,
					'role_id' => $row->role_id,
					'login' => 1);
			}

			$this->session->set_userdata($sar);
			$role_id=$this->session->userdata('role_id');
			if ($role_id == '1') {
				redirect('c_admin');
			}
			elseif ($role_id == '2')  {
				$this->db->where('email',$email);
				$query=$this->db->get('manager');
				if ($query->num_rows()>0) {
					foreach ($query->result() as $rows) {
						$cek_id= array('id_manager' => $rows->id_manager,
							'email' => $row->email,
							'cek' => 1);
					}
				}
				$id = $this->session->set_userdata($cek_id);
				redirect('user_man/index'.$id);
			}elseif ($role_id == '3') {
				$this->db->where('email',$email);
				$query=$this->db->get('pegawai');
				if ($query->num_rows()>0) {
					foreach ($query->result() as $rows) {
						$cek_id= array('id_pegawai' => $rows->id_pegawai,
							'email' => $row->email,
							'cek' => 1);
					}
				}
				$id = $this->session->set_userdata($cek_id);
				redirect('user_peg'.$id);
			}
		}
		else{
			redirect('auth');
		}
}
}
?>
