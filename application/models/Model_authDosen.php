<?php

class Model_authDosen extends CI_Model
{
	public function getDosen($NIP)
	{
		return $this->db->get_where('tbl_dosen', ['NIP' => $NIP])->row_array();
	}


}