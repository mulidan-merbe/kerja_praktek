<?php

class Model_Kpempat_b extends CI_Model{

	public function getPembimbing($No_identitas)
	{
		$this->db->from('tbl_kpempat_b b');
		$this->db->join('tbl_proposal p', 'p.NIM = b.NIM');
		$this->db->where('b.No_identitas', $No_identitas);
		$this->db->order_by('Id_empatB', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyNIP($NIP)
	{
		$this->db->from('tbl_kpempat_b b');
		$this->db->join('tbl_proposal p', 'p.NIM = b.NIM');
		$this->db->where('b.No_identitas', $No_identitas);
		$this->db->order_by('Id_empatB', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyNIM($NIM)
	{
		$this->db->from('tbl_kpempat_b b');
		$this->db->join('tbl_proposal p', 'p.NIM = b.NIM');
		$this->db->where('b.NIM', $NIM);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAdmin()
	{
		$this->db->from('tbl_kpempat_b b');
		$this->db->join('tbl_proposal p', 'p.NIM = b.NIM');
		$this->db->order_by('Id_empatB', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambahData($No_identitas, $NIM, $Nilai_satu, $Nilai_dua, $Nilai_tiga, $Nilai_empat, $Nilai_lima, $Catatan,  $Tanggal)
	{
		$data = array(
			'No_identitas' 	=> $No_identitas,
			'NIM'			=> $NIM,
			'Nilai_satu'	=> $Nilai_satu,
			'Nilai_dua'		=> $Nilai_dua,
			'Nilai_tiga'	=> $Nilai_tiga,
			'Nilai_empat'	=> $Nilai_empat,
			'Nilai_lima'	=> $Nilai_lima,
			'Catatan'		=> $Catatan,
			'Tanggal'		=> $Tanggal 
		);

		$this->db->insert('tbl_kpempat_b', $data);
	}

	public function getbyId($Id_empatB)
	{
		return $this->db->get_where('tbl_kpempat_b', ['Id_empatB' => $Id_empatB])->result();
	}

	public function ubahData($Id_empatB, $Nilai_satu, $Nilai_dua, $Nilai_tiga, $Nilai_empat, $Nilai_lima,$Catatan,  $Tanggal)
	{
		$data = array(
			'Nilai_satu'	=> $Nilai_satu,
			'Nilai_dua'		=> $Nilai_dua,
			'Nilai_tiga'	=> $Nilai_tiga,
			'Nilai_empat'	=> $Nilai_empat,
			'Nilai_lima'	=> $Nilai_lima,
			'Catatan'		=> $Catatan,
			'Tanggal'		=> $Tanggal 
		);

		$this->db->where('Id_empatB', $Id_empatB);
		$this->db->update('tbl_kpempat_b', $data);
	}
}