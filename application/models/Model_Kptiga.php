<?php

class Model_Kptiga extends CI_Model
{
	public function getbyNIM($NIM)
	{
		$this->db->from('tbl_kptiga r');
		$this->db->join('tbl_proposal p', 'p.NIM = r.NIM');
		$this->db->join('tbl_status s', 's.Id = r.Status');
		$this->db->where(['r.NIM' => $NIM]);
		$this->db->order_by('r.Id_Kptiga', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyNIP($NIP)
	{
		$this->db->from('tbl_kptiga r');
		$this->db->join('tbl_proposal p', 'p.NIM = r.NIM');
		$this->db->join('tbl_status s', 's.Id = r.Status');
		$this->db->where(['r.NIP' => $NIP]);
		$this->db->order_by('r.Id_Kptiga', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_tanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->from('tbl_kptiga');
        $this->db->where('Tanggal >=', $tgl_awal);
        $this->db->where('Tanggal <=', $tgl_akhir);
        $this->db->where(['Status ' => 2 ]);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function cek_status()
    {
    	$this->db->from('tbl_kptiga');
    	$this->db->where('Status', 2);
    	$query = $this->db->get();
        return $query->num_rows();

    }

     public function cek_statusDosen($NIP)
    {
    	$this->db->from('tbl_kptiga');
    	$this->db->where('Status', 1);
    	$this->db->where(['NIP' => $NIP]);
    	$query = $this->db->get();
        return $query->num_rows();

    }

	public function getAdmin()
	{
		$this->db->from('tbl_kptiga b');
		$this->db->join('tbl_status s', 's.Id = b.Status');
		$this->db->join('tbl_proposal p', 'p.NIM = b.NIM');
		// $this->db->join('tbl_tawaranjudul t', 't.NIP = b.NIP');
		$this->db->where(['b.Status ' => 2 ]);
		$this->db->order_by('b.Id_Kptiga', 'DESC');
		$query = $this->db->get();
          return $query->result();
	}

	public function cekStatus($NIM)
	{
		$this->db->from('tbl_kptiga a');
		$this->db->join('tbl_status s', 's.Id = a.Status');
		$this->db->where(['a.NIM ' => $NIM, 'a.Status' => '2' ]);
		return $this->db->count_all_results();
	}

	public function tambahData($NIM, $NIP, $Status, $Tanggal)
	{
		 $data  = array
		 (
		 	'NIM' 		=> $NIM,
		 	'NIP'		=> $NIP,
		 	'Status'	=> $Status,
		 	'Tanggal'	=> $Tanggal
		  );

		 $this->db->insert('tbl_kptiga', $data);
	}

	public function pilihData($Id_Kptiga, $Status)
	{
		$data = array('Status' => $Status, );
		$this->db->where('Id_Kptiga', $Id_Kptiga);
		$this->db->update('tbl_kptiga', $data);
	}

	public function terima($Id_Kptiga, $Status)
    {
        $data = array (
            'Status'            => $Status,
            );        
        $this->db->where('Id_Kptiga', $Id_Kptiga);
        $this->db->update('tbl_kptiga', $data);
    }

    public function tolak($Id_Kptiga, $Status)
    {
        $data = array (
            'Status'            => $Status,
            );        
        $this->db->where('Id_Kptiga', $Id_Kptiga);
        $this->db->update('tbl_kptiga', $data);
    }

	public function hapusData($Id_Kptiga)
	{	
		$data = array
		(
			'Id_Kptiga' => $Id_Kptiga,
		 );
		$this->db->delete('tbl_kptiga', $data);
	}

}

