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
				redirect('user_man');
			}elseif ($role_id == '3') {
				redirect('user_peg');
			}
		}
		else{
			redirect('auth');
		}
}
}
?>
