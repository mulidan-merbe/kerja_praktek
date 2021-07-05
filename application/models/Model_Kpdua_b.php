<?php 

class Model_Kpdua_b extends CI_Model 
{

	public function getbyNIM($NIM)
	{
		$this->db->from('tbl_kpdua_b b');
		$this->db->join('tbl_status s', 's.Id = b.Status');
		$this->db->join('tbl_proposal p', 'p.NIM = b.NIM');
		$this->db->where([' b.NIM ' => $NIM ]);
		// $this->db->limit(1);
		$this->db->order_by('b.Id_duaB', 'DESC');
		$query = $this->db->get();
        return $query->result();
	}

	public function getDatabyNIM($NIM)
	{
		$this->db->from('tbl_kpdua_b b');
		$this->db->join('tbl_status s', 's.Id = b.Status');
		$this->db->join('tbl_proposal l', 'l.NIM = b.NIM');
		$this->db->join('tbl_pembimbing_lapangan p', 'p.Id = b.Id_pembimbing');
		$this->db->limit(1);
		$this->db->where([' b.NIM ' => $NIM ]);
		$this->db->order_by('b.Id_duaB', 'DESC');
		$query = $this->db->get();
        return $query->result();
	}

	public function getbyNo_identitas($No_identitas)
	{
		// $this->db->from('tbl_kpdua_b b');
		// $this->db->join('tbl_status s', 's.Id = b.Status');
		// $this->db->join('tbl_proposal p', 'p.NIM = b.NIM');
		// $this->db->where('b.No_identitas', $No_identitas);
		// $this->db->order_by('b.Id_duaB', 'DESC');
		// $query = $this->db->get();
  //       return $query->result();

        $this->db->select('a.Id_duaB, a.NIM, p.nama,  COUNT(a.NIM) AS total ');
		$this->db->from('tbl_kpdua_b a');
		$this->db->join('tbl_proposal p', 'p.NIM = a.NIM');
		$this->db->group_by('a.NIM');
		$this->db->where('a.No_identitas ', $No_identitas );
		$this->db->order_by('total', 'desc');
		$query = $this->db->get();
        return $query->result();
	}

	public function getAll()
	{
        $this->db->select('a.Id_duaB, a.NIM, p.nama,  COUNT(a.NIM) AS total ');
		$this->db->from('tbl_kpdua_b a');
		$this->db->join('tbl_proposal p', 'p.NIM = a.NIM');
		$this->db->group_by('a.NIM');
		$this->db->order_by('total', 'desc');
		$query = $this->db->get();
        return $query->result();
	}

	 public function cek_status($No_identitas)
    {
        $this->db->from('tbl_kpdua_b '); 
        $this->db->where('Status', '1');
        $this->db->where('No_identitas', $No_identitas);
        $query = $this->db->get();
        return $query->num_rows(); 
    }

	public function getAdmin()
	{
		$this->db->from('tbl_kpdua_b b');
		$this->db->join('tbl_status s', 's.Id = b.Status');
		$this->db->join('tbl_proposal p', 'p.NIM = b.NIM');
		$this->db->where(['b.Status ' => 2 ]);
		$this->db->order_by('b.Id_duaB', 'DESC');
		$query = $this->db->get();
         return $query->result();
	}

	public function getPembimbing($No_identitas)
	{
		$this->db->from('tbl_kpdua_b b');
		$this->db->join('tbl_proposal p', 'p.NIM = b.NIM');
		$this->db->where('b.No_identitas ', $No_identitas );
		$this->db->order_by('Id_duaB', 'DESC');
		$query = $this->db->get();
         return $query->result();
	}

	public function getNIM()
	{
		$this->db->select('NIM');
		$this->db->distinct();
		$query = $this->db->get('tbl_kpdua_b');
		return $query->result();
	}

	public function status($Id_duaB, $Status)
    {
        $data = array (
            'Status'            => $Status,
            );        
        $this->db->where('Id_duaB', $Id_duaB);
        $this->db->update('tbl_kpdua_b', $data);
    }

	public function getDistincPembimbing($No_identitas)
	{
		$this->db->distinct();
		$this->db->select('NIM');
		$this->db->where('No_identitas', $No_identitas);
		$query = $this->db->get('tbl_kpdua_b');
		return $query->result();
		// $query = $this->db->distinct()->select('NIM')->get_where('tbl_kpdua_b', array('No_identitas' => $No_identitas));
  //       return $query;
	}

	public function lihatbyId($Id_duaB) 
	{
		return $this->db->get_where('tbl_kpdua_b', ['Id_duaB' => $Id_duaB])->result();
	}

	public function tambahData($Id, $NIM, $Tema, $Uraian, $No_identitas, $Status, $File, $Tanggal) 
	{
		$data = array (
			'Id_pembimbing'			=> $Id,
			'NIM' 					=> $NIM,
			'Tema'		 			=> $Tema,
			'Uraian'	 			=> $Uraian,
			'No_identitas'		 	=> $No_identitas,
			'Status'				=> $Status,
			'File'     				=> $File,
			'Tanggal'	 			=> $Tanggal
		);

	$this->db->insert('tbl_kpdua_b', $data);
	}


	public function masukkanData($Id_duaB, $Status)
	{
		$Data = array(
			'Status'   => $Status
		 );
		$this->db->where('Id_duaB', $Id_duaB);
		$this->db->update('tbl_kpdua_b', $Data);
	}

	public function countStatus($Id_mahasiswa)
	{

		// return $this->db->get_where('tbl_kpdua_b', ['Id_mahasiswa'=> $Id_mahasiswa, 'Status' => 'B'])->count_all_results();
		$this->db->where(['Id_mahasiswa' => $Id_mahasiswa, 'Status' => 'A']);
   		$this->db->from('tbl_kpdua_b');
  		 return $this->db->count_all_results();

	}

	public function countStatusB($No_identitas)
	{
   		$this->db->from('tbl_kpdua_b');
   		$this->db->where(['No_identitas' => $No_identitas]);
  		return $this->db->count_all_results();

	}

	public function getMahasiswa()
	{
		$this->db->from('tbl_kpdua_b');
		$this->db->limit(1);
		$this->db->order_by('Id_duaB', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getDatabyId($Id_duaB) 
    {
        $this->db->where(['Id_duaB' => $Id_duaB]);
        return $this->db->get('tbl_kpdua_b')->row();

    }

    public function getbyId($Id_duaB) 
    {
        return $this->db->get_where('tbl_kpdua_b', ['Id_duaB' => $Id_duaB])->result();
    }

    public function ubahData($Id_duaB, $Tema, $Uraian, $File, $Tanggal )
    {
        $data = array ( 
            'Tema'       => $Tema,
            'Uraian'	 => $Uraian,
            'File'       => $File,
            'Tanggal'    => $Tanggal
           
        );
        
       $this->db->where('Id_duaB', $Id_duaB);
       $this->db->update('tbl_kpdua_b', $data);
        
    }

	public function hapusData($Id_duaB)
    {
        $data = array(
                'Id_duaB' => $Id_duaB
        );
           
        $this->db->delete('tbl_kpdua_b',$data); 
    }
	
}