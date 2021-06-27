<?php


class Model_userPembimbing extends CI_Model
{
	public function getbyId($Id_user)
	{
		return $this->db->get_where('tbl_user', ['Id_user' => $Id_user])->result();
	}
	
	public function getData()
	{
		$this->db->from('tbl_user');
		$this->db->order_by('Id_user', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function get($No_identitas)
	{
		return $this->db->get_where('tbl_user', ['No_identitas' => $No_identitas])->num_rows();
	}

	public function getPembimbing($No_identitas)
	{
		return $this->db->get_where('tbl_user', ['No_identitas' => $No_identitas])->result();
	}

	public function getPembimbingubah($No_identitas)
	{
		return $this->db->get_where('tbl_user', ['No_identitas' => $No_identitas])->row_array();
	}

	public function tambahData($Nama, $No_identitas, $Password, $Status, $Tanggal)
	{
		$data = array(
			'Nama' 			=> $Nama,
			'No_identitas'	=> $No_identitas,
			'Password'		=> $Password,
			'Status'		=> $Status,
			'Tanggal'		=> $Tanggal
		 );

		$this->db->insert('tbl_user', $data);
	}

	public function ubahPassword($No_identitas, $password_hash)
	{
		$this->db->set('Password', $password_hash);
		$this->db->where('No_identitas', $No_identitas);
		$this->db->update('tbl_user');
	}

	public function hapusData($Id_user)
	{
		$data = array('Id_user' => $Id_user, );
		$this->db->delete('tbl_user', $data);
	}
}