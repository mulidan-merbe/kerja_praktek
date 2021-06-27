<?php 

class Model_auth_admin extends CI_Model
{


	public function getAdmin($No_identitas)
	{
		return $this->db->get_where('tbl_admin', ['No_identitas' => $No_identitas])->row_array();
	}
}