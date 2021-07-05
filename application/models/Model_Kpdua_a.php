<?php 

class Model_Kpdua_a extends CI_Model 
{

	public function getbyNIM($NIM)
	{
		$this->db->from('tbl_kpdua_a a');
		$this->db->join('tbl_status s', 's.Id = a.Status');
		$this->db->join('tbl_proposal p', 'p.NIM = a.NIM');
		$this->db->where('a.NIM ', $NIM );
		// $this->db->limit(1);
		$this->db->order_by('a.Id_duaA', 'DESC');
		$query = $this->db->get();
          return $query->result();
	}

	public function getAll()
	{
		$this->db->select('a.Id_duaA, a.NIM, nama,  COUNT(a.NIM) AS total ');
		$this->db->from('tbl_kpdua_a a');
		$this->db->join('tbl_proposal p', 'p.NIM = a.NIM');
		$this->db->group_by('a.NIM');
		$this->db->order_by('total', 'desc');
		$query = $this->db->get();
        return $query->result();
		
	}

	public function getbyNIP($NIP)
	{
		$this->db->select('a.Id_duaA, a.NIM, nama,  COUNT(a.NIM) AS total ');
		$this->db->from('tbl_kpdua_a a');
		$this->db->join('tbl_proposal p', 'p.NIM = a.NIM');
		$this->db->group_by('a.NIM');
		$this->db->where('a.NIP ', $NIP );
		$this->db->order_by('total', 'desc');
		$query = $this->db->get();
        return $query->result();
		
	}


	 public function cek_status($NIP)
    {
        $this->db->from('tbl_kpdua_a '); 
        $this->db->where('Status', '1');
        $this->db->where('NIP', $NIP);
        $query = $this->db->get();
        return $query->num_rows(); 
    }

	public function getAdmin()
	{
		$this->db->from('tbl_kpdua_a a');
		$this->db->join('tbl_status s', 's.Id = a.Status');
		$this->db->join('tbl_proposal p', 'p.NIM = a.NIM');
		$this->db->where(['a.Status ' => 2 ]);
		$this->db->order_by('a.Id_duaA', 'DESC');
		$query = $this->db->get();
          return $query->result();
	}

	public function getbyId($Id_duaA) 
    {
        return $this->db->get_where('tbl_kpdua_a', ['Id_duaA' => $Id_duaA])->result();
    }


	public function getDatabyId($Id_duaA) 
    {
        $this->db->where(['Id_duaA' => $Id_duaA]);
        return $this->db->get('tbl_kpdua_a')->row();

    }


    public function getDistinct($NIM)
    {
    	$this->db->select('COUNT(Id_proposal)');
	    $this->db->distinct('Id_proposal');
	    $this->db->group_by('Id_proposal');
	    $this->db->where('NIM', $NIM);
	    $this->db->where('Status', 2);
	    $query = $this->db->get('tbl_kpdua_a');
    	return count($query->result()); 
    }

	public function lihatbyId($Id) 
	{
		return $this->db->get_where('tbl_kpdua_a', ['Id' => $Id])->result();
	}

	public function tambahData($Id_proposal, $NIM, $Tema, $Uraian, $NIP, $Status, $File, $Tanggal) 
	{
		$data = array (
			'Id_proposal'	=> $Id_proposal,
			'NIM' 			=> $NIM,
			'Tema'		 	=> $Tema,
			'Uraian'	 	=> $Uraian,
			'NIP'		 	=> $NIP,
			'Status'		=> $Status,
			'File'     	    => $File,
			'Tanggal'	 	=> $Tanggal
		);

	$this->db->insert('tbl_kpdua_a', $data);
	}

	public function masukkanData($Id_duaA, $Status)
	{
		$Data = array(
			'Status'   => $Status
		 );
		$this->db->where('Id_duaA', $Id_duaA);
		$this->db->update('tbl_kpdua_a', $Data);
	}

	public function countStatus($NIM)
	{

		// return $this->db->get_where('tbl_kpdua_a', ['NIM' => $NIM] )->count_all_results();
		
   		$this->db->from('tbl_kpdua_a');
   		$this->db->where(['NIM' => $NIM]);
  		 return $this->db->count_all_results();

	}

	public function cekStatus($NIM)
	{
		$this->db->from('tbl_kpdua_a a');
		$this->db->join('tbl_status s', 's.Id = a.Status');
		$this->db->where(['a.NIM ' => $NIM, 'a.Status' => '2' ]);
		$this->db->order_by('a.Id_duaA', 'DESC');
		return $this->db->count_all_results();

	}

	public function getDataNIMLimit($NIM)
    {
        $this->db->from('tbl_kpdua_a');
        $this->db->where('NIM', $NIM);
        $this->db->limit(1);
        $this->db->order_by('Id_duaA','DESC');
        $query = $this->db->get();
        return $query->result();
    }

	public function ubahData($Id_duaA, $Tema, $Uraian, $File, $Tanggal )
    {
        $data = array ( 
            'Tema'       => $Tema,
            'Uraian'	 => $Uraian,
            'File'       => $File,
            'Tanggal'    => $Tanggal
           
        );
        
       $this->db->where('Id_duaA', $Id_duaA);
       $this->db->update('tbl_kpdua_a', $data);
        
    }

    public function status($Id_duaA, $Status)
    {
        $data = array (
            'Status'            => $Status,
            );        
        $this->db->where('Id_duaA', $Id_duaA);
        $this->db->update('tbl_kpdua_a', $data);
    }


	public function hapusData($Id_duaA)
    {
        $data = array(
                'Id_duaA' => $Id_duaA
        );
           
        $this->db->delete('tbl_kpdua_a',$data); 
    }
	
}