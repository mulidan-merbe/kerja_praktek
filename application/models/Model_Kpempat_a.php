<?php 

class Model_Kpempat_a extends CI_Model 
{

	public function getbyNIM($NIM)
	{
		$this->db->from('tbl_kpempat_a a');
		$this->db->join('tbl_proposal p', 'p.NIM = a.NIM');
		$this->db->where('a.NIM', $NIM);
		$this->db->order_by('Id_empatA', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getAdmin()
	{
		$this->db->from('tbl_kpempat_a a');
		$this->db->join('tbl_proposal p', 'p.NIM = a.NIM');
		$this->db->order_by('Id_empatA', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyNIP($NIP)
	{
		$this->db->from('tbl_kpempat_a e');
		$this->db->join('tbl_proposal p', 'p.NIM = e.NIM');
		$this->db->where('e.NIP', $NIP);
		$this->db->order_by('Id_empatA', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyId($Id_empatA)
	{
		return $this->db->get_where('tbl_kpempat_a', ['Id_empatA' => $Id_empatA])->result();
	}

	public function tambahData($NIP, $NIM, $Nilai_satu, $Nilai_dua, $Nilai_tiga, $Nilai_empat, $Nilai_lima, $Catatan, $Tanggal)
	{
		$data = array(
			'NIP' 			=> $NIP,
			'NIM'			=> $NIM,
			'Nilai_satu'	=> $Nilai_satu,
			'Nilai_dua'		=> $Nilai_dua,
			'Nilai_tiga'	=> $Nilai_tiga,
			'Nilai_empat'	=> $Nilai_empat,
			'Nilai_lima'	=> $Nilai_lima,
			'Catatan'		=> $Catatan,
			'Tanggal'		=> $Tanggal 
		);

		$this->db->insert('tbl_kpempat_a', $data);
	}

	public function ubahData($Id_empatA, $Nilai_satu, $Nilai_dua, $Nilai_tiga, $Nilai_empat, $Nilai_lima, $Catatan, $Tanggal)
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

		$this->db->where('Id_empatA', $Id_empatA);
		$this->db->update('tbl_kpempat_a', $data);
	}
	


}