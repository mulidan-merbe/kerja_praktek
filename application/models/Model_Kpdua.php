<?php

class Model_kpdua extends CI_Model {

    public function save_batch($data)
    {
    	return $this->db->insert_batch('tbl_kpdua', $data);
 	}

 	public function getAll() 
 	{

        $this->db->from('tbl_kpdua d');
        $this->db->join('tbl_proposal p', 'p.NIM = d.NIM');
        $this->db->order_by('Id_Kpdua', 'DESC');
        $query = $this->db->get();
          return $query->result();
 		
 	}

 	public function getbyNIM($NIM)
 	{
 		return $this->db->get_where('tbl_kpdua', ['NIM' => $NIM])->result();
 	}

    public function cek_status($NIM)
    {
        $this->db->from('tbl_kpdua '); 
        $this->db->where('NIM', $NIM);
        $query = $this->db->get();
        return $query->num_rows(); 
    }

 	public function getbyNIP($NIP)
 	{
 		// return $this->db->get_where('tbl_kpdua', ['NIP' => $NIP])->result();

 		$this->db->from('tbl_kpdua a');
 		$this->db->join('tbl_proposal b', 'b.NIM = a.NIM');
 		$this->db->where('a.NIP', $NIP);
 		$query = $this->db->get();
 		return $query->result();
 	}

 	public function tambahData($NIM,  $File, $Tanggal)
 	{
 		$Data = array(
 			'NIM' 		=> $NIM,
 			'File' 		=> $File,
 			'Tanggal' 	=> $Tanggal
 		 );

 		$this->db->insert('tbl_kpdua', $Data);
 	}

    public function getbyId($Id_Kpdua) 
    {
        $this->db->from('tbl_kpdua k');
        $this->db->join('tbl_proposal p', 'p.NIM = k.NIM');
        $this->db->where(['Id_Kpdua' => $Id_Kpdua]);
        $query = $this->db->get();
        return $query->result();

    }

 	public function getDatabyId($Id_Kpdua) 
    {
        $this->db->where(['Id_Kpdua' => $Id_Kpdua]);
        return $this->db->get('tbl_kpdua')->row();

    }

    public function ubahData($Id_Kpdua, $NIM,  $File, $Tanggal)
    {
        $data = array(
            'NIM'       => $NIM,
            'File'      => $File,
            'Tanggal'   => $Tanggal
        );

        $this->db->where('Id_Kpdua', $Id_Kpdua);
        $this->db->update('tbl_kpdua', $data);
    }

    public function hapusData($Id_Kpdua)
    {
    	$data = array ('Id_Kpdua' => $Id_Kpdua);
    	$this->db->delete('tbl_kpdua', $data);
    }

}