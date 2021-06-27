<?php 

class Model_authUser extends CI_Model {

	public function get_login($No_identitas, $Password)
	{
		return $this->db->get_where('tbl_user', ['No_identitas' => $No_identitas], ['Password' => $Password])->row_array();

	}

	

}