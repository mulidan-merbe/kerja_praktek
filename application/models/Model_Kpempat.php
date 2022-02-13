<?php

class Model_Kpempat extends CI_Model
{

	public function getbyNIM($NIM)
	{
		$this->db->from('tbl_kpempat e');
		$this->db->join('tbl_proposal p', 'p.NIM = e.NIM');
		$this->db->where('e.NIM', $NIM);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAdmin()
	{
		$this->db->from('tbl_kpempat e');
		$this->db->join('tbl_proposal p', 'p.NIM = e.NIM');
		$this->db->order_by('Id_Kpempat', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyNIP($NIP)
	{
		$this->db->from('tbl_kpempat e');
		$this->db->join('tbl_proposal p', 'p.NIM = e.NIM');
		$this->db->where('e.NIP', $NIP);
		$this->db->order_by('Id_Kpempat', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyNIP2($NIP)
	{
		$this->db->from('tbl_kpempat e');
		$this->db->join('tbl_proposal p', 'p.NIM = e.NIM');
		$this->db->where('e.NIP', $NIP);
		$this->db->order_by('Id_Kpempat', 'DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getbyNo_identitas($No_identitas)
	{
		$this->db->from('tbl_kpempat e');
		$this->db->join('tbl_proposal p', 'p.NIM = e.NIM');
		$this->db->where('e.No_identitas', $No_identitas);
		$this->db->order_by('Id_Kpempat', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyNo_identitas2($No_identitas)
	{
		$this->db->from('tbl_kpempat e');
		$this->db->join('tbl_proposal p', 'p.NIM = e.NIM');
		$this->db->where('e.No_identitas', $No_identitas);
		$this->db->order_by('Id_Kpempat', 'DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getbyNIM2($NIM)
	{
		$this->db->from('tbl_kpempat e');
		$this->db->where('NIM', $NIM);
		$this->db->order_by('Id_Kpempat', 'DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_tanggal($tgl_awal, $tgl_akhir)
	{
		$this->db->from('tbl_kpempat');
		$this->db->where('Tanggal >=', $tgl_awal);
		$this->db->where('Tanggal <=', $tgl_akhir);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getPembimbing($No_identitas)
	{
		$this->db->from('tbl_kpempat e');
		$this->db->join('tbl_proposal p', 'p.NIM = e.NIM');
		$this->db->where('e.No_identitas', $No_identitas);
		$this->db->order_by('Id_Kpempat', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// public function getbyId($Id_Kpempat)
	// {
	// 	$this->db->from('tbl_kpempat e');
	// 	$this->db->join('tbl_proposal p', 'p.NIM = e.NIM');
	// 	$this->db->where('e.Id_Kpempat', $Id_Kpempat);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	public function getbyId($Id_Kpempat)
	{
		return $this->db->get_where('tbl_kpempat', ['Id_Kpempat' => $Id_Kpempat])->result();
	}

	public function cekStatus($NIM)
	{
		$this->db->from('tbl_kpempat e');
		$this->db->join('tbl_status s', 's.Id = e.Status');
		$this->db->where(['e.Status' => '2']);
		$this->db->order_by('a.Id_Kpempat', 'DESC');
		return $this->db->count_all_results();
	}

	public function simpanData($NIM, $NIP, $No_identitas, $Hari, $Tanggal_seminar, $Waktu, $Ruangan, $Tanggal)
	{
		$data = array(
			'NIM' 				=> $NIM,
			'NIP' 				=> $NIP,
			'No_identitas'		=> $No_identitas,
			'Hari'				=> $Hari,
			'Tanggal_seminar'	=> $Tanggal_seminar,
			'Waktu'				=> $Waktu,
			'Ruangan'			=> $Ruangan,
			'Tanggal'			=> $Tanggal
		);

		$this->db->insert('tbl_kpempat', $data);
	}

	public function ubahData($Id_Kpempat, $NIM, $NIP, $No_identitas, $Hari, $Tanggal_seminar, $Waktu, $Ruangan, $Tanggal)
	{
		$data = array(
			'NIM' 				=> $NIM,
			'NIP' 				=> $NIP,
			'No_identitas'		=> $No_identitas,
			'Hari'				=> $Hari,
			'Tanggal_seminar'	=> $Tanggal_seminar,
			'Waktu'				=> $Waktu,
			'Ruangan'			=> $Ruangan,
			'Tanggal'			=> $Tanggal
		);
		$this->db->where('Id_Kpempat', $Id_Kpempat);
		$this->db->update('tbl_kpempat', $data);
	}

	public function hapusData($Id_Kpempat)
	{
		$data = array('Id_Kpempat' => $Id_Kpempat,);
		$this->db->delete('tbl_kpempat', $data);
	}
}
