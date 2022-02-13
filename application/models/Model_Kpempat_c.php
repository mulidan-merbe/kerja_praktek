<?php

class Model_Kpempat_c extends CI_Model
{

	public function getbyNIM($NIM)
	{
		$this->db->from('tbl_kpempat_c c');
		$this->db->join('tbl_status a', 'a.Id = c.Status_kaprodi');
		$this->db->join('tbl_proposal p', 'p.NIM= c.NIM');
		$this->db->where('c.NIM', $NIM);
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyNIM2($NIM)
	{
		$this->db->from('tbl_kpempat_c ');
		$this->db->where('NIM', $NIM);
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyNIM3($NIM)
	{
		$this->db->from('tbl_kpempat_c ');
		$this->db->where('NIM', $NIM);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getbyPeriode($Periode)
	{
		$this->db->from('tbl_kpempat_c c');
		$this->db->join('tbl_status a', 'a.Id = c.Status_kaprodi');
		$this->db->join('tbl_proposal p', 'p.NIM= c.NIM');
		$this->db->where('Id_periode', $Periode);
		$query = $this->db->get();
		return $query->result();
	}


	public function cekStatusKajur($NIM)
	{
		$this->db->from('tbl_kpempat_c');
		$this->db->where('NIM', $NIM);
		$this->db->where('Status_kaprodi', 0);
		$query = $this->db->get();
		return $query->result();
	}

	public function cekStatus($NIM)
	{
		$this->db->from('tbl_kpempat_c');
		$this->db->where('NIM', $NIM);
		$this->db->where('Status_kaprodi', 1);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getbyNIMAdmin($NIM)
	{
		$this->db->from('tbl_kpempat_c c');
		$this->db->join('tbl_status a', 'a.Id = c.Status_kaprodi');
		// $this->db->join('tbl_status s', 's.Id= c.Status_kaprodi');
		$this->db->where('NIM', $NIM);
		$query = $this->db->get();
		return $query->result();
	}


	public function get_tanggal($tgl_awal, $tgl_akhir)
	{
		$this->db->from('tbl_kpempat_c');
		$this->db->where('Tanggal_dosen >=', $tgl_awal);
		$this->db->where('Tanggal_dosen <=', $tgl_akhir);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getRowNIM($NIM)
	{
		return $this->db->get_where('tbl_kpempat_c', ['NIM' => $NIM])->row_array();
	}

	public function getbyNIP($NIP)
	{
		$this->db->from('tbl_kpempat_c c');
		$this->db->join('tbl_proposal p', 'p.NIM = c.NIM');
		// $this->db->join('tbl_status t', 't.Id = c.Status_kaprodi');
		$this->db->join('tbl_status s', 's.Id = c.Status_dosen');
		$this->db->where('c.NIP', $NIP);
		$this->db->order_by('Id_empatC', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyNo_identitas($No_identitas)
	{
		$this->db->from('tbl_kpempat_c c');
		$this->db->join('tbl_proposal p', 'p.NIM = c.NIM');
		// $this->db->join('tbl_status t', 't.Id = c.Status_kaprodi');
		$this->db->join('tbl_status s', 's.Id = c.Status_dosen');
		$this->db->where('c.No_identitas', $No_identitas);
		$this->db->order_by('Id_empatC', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllAdmin()
	{
		$this->db->from('tbl_kpempat_c c');
		$this->db->join('tbl_proposal p', 'p.NIM = c.NIM');
		$this->db->join('tbl_status t', 't.Id = c.Status_kaprodi');
		$this->db->order_by('Id_empatC', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getStatusDosen()
	{
		$this->db->from('tbl_kpempat_c c');
		$this->db->join('tbl_proposal p', 'p.NIM = c.NIM');
		$this->db->join('tbl_status t', 't.Id = c.Status_kaprodi');
		$this->db->where('Status_dosen', 2);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAll()
	{
		$this->db->from('tbl_kpempat_c ');
		// $this->db->join('tbl_kpempat_a a', 'a.Id_empatA = c.Id_empatA');
		// $this->db->join('tbl_kpempat_b b', 'b.Id_empatB = c.Id_empatB');
		$this->db->where(['Status_dosen' => 2, 'Status_kaprodi' => 2]);
		$this->db->order_by('Id_empatC', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getPersentase()
	{
		$this->db->from('tbl_persentasenilai n');
		$this->db->join('tbl_pelaksanaan a', 'a.Id_pelaksanaan = n.Id_pelaksanaan');
		// $this->db->limit(1);
		// $this->db->order_by('Id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambahDataDosen($NIP, $NIM, $Id_duaC, $Id_empatA, $Id_empatB, $Status_dosen, $Status_kaprodi, $Tanggal_dosen)
	{
		$data = [
			'NIP' 			=> $NIP,
			'NIM'			=> $NIM,
			'Id_duaC'		=> $Id_duaC,
			'Id_empatA'		=> $Id_empatA,
			'Id_empatB'		=> $Id_empatB,
			'Status_dosen'	=> $Status_dosen,
			'Status_kaprodi' => $Status_kaprodi,
			'Tanggal_kaprodi' => $Tanggal_dosen,
			'Tanggal_dosen'	=> $Tanggal_dosen
		];

		$this->db->insert('tbl_kpempat_c', $data);
	}

	public function tambahDataPersentase($Id_pelaksanaan, $Nilai_lapangan, $Nilai_Seminar_lapangan, $Nilai_Seminar_dosen, $Tanggal)
	{
		$data = [
			'Id_pelaksanaan'				=> $Id_pelaksanaan,
			'Nilai_lapangan' 				=> $Nilai_lapangan,
			'Nilai_Seminar_lapangan'		=> $Nilai_Seminar_lapangan,
			'Nilai_Seminar_dosen'			=> $Nilai_Seminar_dosen,
			'Tanggal'						=> $Tanggal
		];
		$this->db->insert('tbl_persentasenilai', $data);
	}

	public function ubahDataPersentase($Id, $Nilai_lapangan, $Nilai_Seminar_lapangan, $Nilai_Seminar_dosen, $Tanggal)
	{
		$data = [
			'Nilai_lapangan' 				=> $Nilai_lapangan,
			'Nilai_Seminar_lapangan'		=> $Nilai_Seminar_lapangan,
			'Nilai_Seminar_dosen'			=> $Nilai_Seminar_dosen,
			'Tanggal'						=> $Tanggal
		];

		$this->db->where('Id', $Id);
		$this->db->update('tbl_persentasenilai', $data);
	}


	public function tambahDataKaprodi($Id_periode, $NIM, $No_identitas, $Status_kaprodi, $Tanggal_kaprodi)
	{
		$data = [
			'Id_periode'		=> $Id_periode,
			'No_identitas'		=> $No_identitas,
			'Status_kaprodi'	=> $Status_kaprodi,
			'Tanggal_kaprodi'	=> $Tanggal_kaprodi
		];
		$this->db->where('NIM', $NIM);
		$this->db->update('tbl_kpempat_c', $data);
	}

	public function ubahDataDosen($NIM, $NIP, $Status_dosen,  $Tanggal_dosen)
	{
		$data = [
			'NIP' 			=> $NIP,
			'Status_dosen'	=> $Status_dosen,
			'Tanggal_dosen'	=> $Tanggal_dosen
		];

		$this->db->where('NIM', $NIM);
		$this->db->update('tbl_kpempat_c', $data);
	}

	public function hapusData($Id)
	{
		$data = [
			'Id' => $Id
		];

		$this->db->delete('tbl_persentasenilai', $data);
	}
}
