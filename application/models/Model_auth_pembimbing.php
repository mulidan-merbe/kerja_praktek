<?php

class Model_auth_pembimbing extends CI_Model
{
	public function getPembimbing($No_identitas)
	{
		return $this->db->get_where('tbl_pembimbing_lapangan', ['No_identitas' => $No_identitas])->row_array();
	}
}
