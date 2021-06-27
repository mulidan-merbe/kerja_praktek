<?php

class Model_authMahasiswa extends CI_Model
{
	public function getMahasiswa($NIM)
	{
		return $this->db->get_where('tbl_mahasiswa', ['NIM' => $NIM])->row_array();
	}


}