<?php

class Model_Kpdua_c extends CI_Model{

	public function getPembimbing($No_identitas)
	{
		$this->db->from('tbl_kpdua_c c');
		$this->db->join('tbl_proposal p', 'p.NIM = c.NIM');
		$this->db->where('c.No_identitas', $No_identitas);
		$this->db->order_by('c.Id_duaC', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyNIM($NIM)
	{
		$this->db->from('tbl_kpdua_c c');
		$this->db->join('tbl_proposal p', 'p.NIM = c.NIM');
		$this->db->where('c.NIM', $NIM);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAll()
	{
		$this->db->from('tbl_kpdua_c c');
		$this->db->join('tbl_proposal p', 'p.NIM = c.NIM');
		$this->db->order_by('Id_duaC', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambahData($No_identitas, $NIM, $Nilai_satu, $Nilai_dua, $Nilai_tiga, $Nilai_empat, $Nilai_lima, $Tanggal)
	{
		$data = array(
			'No_identitas' => $No_identitas,
			'NIM'			=> $NIM,
			'Nilai_satu'	=> $Nilai_satu,
			'Nilai_dua'		=> $Nilai_dua,
			'Nilai_tiga'	=> $Nilai_tiga,
			'Nilai_empat'	=> $Nilai_empat,
			'Nilai_lima'	=> $Nilai_lima,
			'Tanggal'		=> $Tanggal
		);

		$this->db->insert('tbl_kpdua_c', $data);
	}

	public function getbyId($Id_duaC)
	{
		return $this->db->get_where('tbl_kpdua_c', ['Id_duaC' => $Id_duaC])->result();
	}

	public function ubahData($Id_duaC, $No_identitas, $NIM, $Nilai_satu, $Nilai_dua, $Nilai_tiga, $Nilai_empat, $Nilai_lima, $Tanggal)
	{
		$data = array(
			'No_identitas' => $No_identitas,
			'NIM'			=> $NIM,
			'Nilai_satu'	=> $Nilai_satu,
			'Nilai_dua'		=> $Nilai_dua,
			'Nilai_tiga'	=> $Nilai_tiga,
			'Nilai_empat'	=> $Nilai_empat,
			'Nilai_lima'	=> $Nilai_lima,
			'Tanggal'		=> $Tanggal
		);
		
		$this->db->where('Id_duaC', $Id_duaC);
		$this->db->update('tbl_kpdua_c', $data);
	}
}