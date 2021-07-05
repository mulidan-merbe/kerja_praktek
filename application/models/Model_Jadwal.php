<?php

class Model_Jadwal extends CI_Model 
{
	public function getbyId($Id_pelaksanaan)
	{
		return $this->db->get_where('tbl_pelaksanaan', ['Id_pelaksanaan' => $Id_pelaksanaan])->result();
	}

	public function get()
	{
		 $this->db->from('tbl_pelaksanaan');
		 $this->db->order_by('Id_pelaksanaan', 'DESC');
		 $query = $this->db->get();
		 return $query->result();
	}

	public function getAll()
	{
		 $this->db->from('tbl_pelaksanaan');
		 $this->db->limit(1);
		 $this->db->order_by('Id_pelaksanaan', 'DESC');
		 $query = $this->db->get();
		 return $query->result();
	}

	public function getAll2()
	{
		 $this->db->from('tbl_pelaksanaan');
		 $query = $this->db->get();
		 return $query->result();
	}

	public function Tahun()
	{
		$this->db->from('tbl_pelaksanaan');
		$query = $this->db->get();
		return $query->result();
	}

	public function getAdmin()
	{
		$this->db->from('tbl_pelaksanaan p');
		// $this->db->join('tbl_tahun_pelaksanaan t', 't.Id = p.Id_tahun_pelaksanaan');
		$this->db->order_by('Id_pelaksanaan', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function insertJadwal($Tahun, $Periode, $Tanggal_mulai, $Tanggal_selesai, $Pengajuan_seminar, $Pelaksanaan_seminar, $Revisi, $Tanggal) 
	{
		$data = array (
			'Tahun'					=> $Tahun,
			'Periode'  				=> $Periode,
			'Tanggal_mulai' 		=> $Tanggal_mulai,
			'Tanggal_selesai'		=> $Tanggal_selesai,
			'Pengajuan_seminar' 	=> $Pengajuan_seminar,
			'Pelaksanaan_seminar' 	=> $Pelaksanaan_seminar,
			'RevisiDpengumpulan' 	=> $Revisi,
			'Tanggal_upload'		=> $Tanggal
		);


		$this->db->insert('tbl_pelaksanaan', $data);
	}

	public function ubahJadwal($Id_pelaksanaan, $Tahun, $Periode, $Tanggal_mulai, $Tanggal_selesai, $Pengajuan_seminar, $Pelaksanaan_seminar, $Revisi, $Tanggal) 
	{
		$data = array (
			'Tahun'					=> $Tahun,
			'Periode'  				=> $Periode,
			'Tanggal_mulai' 		=> $Tanggal_mulai,
			'Tanggal_selesai'		=> $Tanggal_selesai,
			'Pengajuan_seminar' 	=> $Pengajuan_seminar,
			'Pelaksanaan_seminar' 	=> $Pelaksanaan_seminar,
			'RevisiDpengumpulan' 	=> $Revisi,
			'Tanggal_upload'		=> $Tanggal
		);

		$this->db->where('Id_pelaksanaan', $Id_pelaksanaan);
		$this->db->update('tbl_pelaksanaan', $data);
	}

	public function hapusData($Id_pelaksanaan)
    {
        $data = array(
                'Id_pelaksanaan' => $Id_pelaksanaan
        );
           
        $this->db->delete('tbl_pelaksanaan',$data); 
    }
}