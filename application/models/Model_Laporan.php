<?php

class Model_Laporan extends CI_Model
{

	public function getAll()
	{
		$this->db->from('tbl_laporan l');
		$this->db->join('tbl_proposal p', 'p.NIM = l.NIM');
		$this->db->join('tbl_pelaksanaan j', 'j.Id_pelaksanaan = l.Id_pelaksanaan');
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyNIM($NIM)
	{
		$this->db->from('tbl_laporan ');
		$this->db->where('NIM', $NIM);
		$this->db->order_by('Id_laporan', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyNIM2($NIM)
	{
		return $this->db->get_where('tbl_laporan', ['NIM' => $NIM])->num_rows();
	}

	public function getbyId($Id_laporan)
	{
		return $this->db->get_where('tbl_laporan', ['Id_laporan' => $Id_laporan])->result();
	}

	public function getbyNIMlimit($NIM)
	{
		$this->db->from('tbl_laporan ');
		$this->db->limit(1);
		$this->db->order_by('Id_laporan', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getPembimbing($No_identitas)
	{
		$this->db->from('tbl_laporan l');
		$this->db->join('tbl_proposal p', 'p.NIM = l.NIM');
		$this->db->join('tbl_pelaksanaan j', 'j.Id_pelaksanaan = l.Id_pelaksanaan');
		$this->db->where('No_identitas', $No_identitas);
		$query = $this->db->get();
		return $query->result();
	}

	public function getDosen($NIP)
	{
		$this->db->from('tbl_laporan l');
		$this->db->join('tbl_proposal p', 'p.NIM = l.NIM');
		$this->db->join('tbl_pelaksanaan j', 'j.Id_pelaksanaan = l.Id_pelaksanaan');
		$this->db->where('NIP', $NIP);
		$query = $this->db->get();
		return $query->result();
	}

	public function getbydataNIP($NIP)
	{
		$this->db->from('tbl_laporan r');
		$this->db->join('tbl_pelaksanaan t', 't.Id_pelaksanaan = r.Id_pelaksanaan');
		$this->db->join('tbl_proposal l', 'l.NIM = r.NIM');
		$this->db->where('r.NIP ', $NIP);

		$query = $this->db->get();
		return $query->result();
	}

	public function get_tanggal($tgl_awal, $tgl_akhir)
	{
		$this->db->from('tbl_laporan');
		$this->db->where('Tanggal >=', $tgl_awal);
		$this->db->where('Tanggal <=', $tgl_akhir);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function cek_status($NIP)
	{
		$this->db->from('tbl_laporan');
		$this->db->where('NIP', $NIP);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function lihatTahun($Tahun)
	{
		$this->db->from('tbl_laporan s');
		$this->db->join('tbl_pelaksanaan p', 'p.Id_pelaksanaan = s.Id_pelaksanaan');
		$this->db->join('tbl_proposal l', 'l.NIM = s.NIM');
		$this->db->where('Tahun ', $Tahun);
		$query = $this->db->get();
		return $query->result();
	}

	public function tambahData($Id_pelaksanaan, $NIM, $NIP, $No_identitas, $Keterangan, $Berkas, $Tanggal)
	{
		$data = array(
			'Id_pelaksanaan' => $Id_pelaksanaan,
			'NIM' 			 => $NIM,
			'NIP'			 => $NIP,
			'No_identitas'	 => $No_identitas,
			'Keterangan'	 => $Keterangan,
			'Berkas'		 => $Berkas,
			'Tanggal'		 => $Tanggal
		);

		$this->db->insert('tbl_laporan', $data);
	}

	public function ubahData($NIM, $Keterangan, $Berkas, $Tanggal)
	{
		$data = array(
			'Keterangan'	 => $Keterangan,
			'Berkas'		=> $Berkas,
			'Tanggal'		=> $Tanggal
		);

		$this->db->where('NIM', $NIM);
		$this->db->update('tbl_laporan', $data);
	}
}
