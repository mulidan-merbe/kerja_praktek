<?php

class Model_rencanaTopik extends CI_Model {
   
    public function cekbyStatus($NIM) 
    {
        $this->db->from('tbl_rencanajudul r');    
        $this->db->join('tbl_tawaranjudul t', 't.Id_tawaranjudul = r.Id_tawaranjudul', 'left');
        $this->db->where('NIM', $NIM);
        $this->db->where('Status', 2); 
        // $this->db->where(['Id_mahasiswa' => $Id_mahasiswa], ['Status' => '2']);
        $query = $this->db->get();
        return $query->result(); 
    }

    public function hitung()
    {
        $this->db->select('*, count(*) as hitung');
        $this->db->from('tbl_rencanajudul ');
        $this->db->group_by('Id_tawaranjudul');
        $query = $this->db->get();
        return $query->result(); 
    }

    public function getbyId($NIM, $Id_tawaranjudul)
    {
        $this->db->from('tbl_rencanajudul');
        $this->db->where('NIM', $NIM);
        $this->db->where('Id_tawaranjudul', $Id_tawaranjudul);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getJudulMHS($NIM)
    {
        return $this->db->get_where('tbl_rencanajudul', ['NIM' => $NIM])->num_rows();   
    }

    public function getRencanaJudulMHS($NIM)
    {
        $this->db->from('tbl_rencanajudul r');    
        $this->db->join('tbl_tawaranjudul t', 't.Id_tawaranjudul = r.Id_tawaranjudul', 'left'); 
        $this->db->join('tbl_status s', 's.Id = r.Status');
        $this->db->where('NIM', $NIM);
        $this->db->order_by('Id_rencanajudul', 'DESC');   
        $query = $this->db->get();
		return $query->result();   
    }

    //  public function getbyNIP($NIP)
    // {
    //     $this->db->from('tbl_tawaranjudul t');    
    //     $this->db->join('tbl_rencanajudul r', 't.Id_tawaranjudul = r.Id_tawaranjudul', 'left');
    //     // $this->db->join('tbl_proposal p', 'p.NIM = .NIM');
    //     $this->db->join('tbl_status s', 's.Id = r.Status');
    //     $this->db->where('t.NIP', $NIP);  
    //     $this->db->order_by('Id_rencanajudul', 'DESC');
    //     $query = $this->db->get();
    //     return $query->result();  

    // } 

    public function getbyNIP($NIP)
    {
        $this->db->select('a.Id_tawaranjudul, a.NIM, a.Username, s.Icon, b.NIP, b.topik, b.Instansi, b.Jumlah,  COUNT(a.Id_tawaranjudul) AS total ');
        $this->db->from('tbl_tawaranjudul b');
        $this->db->join('tbl_rencanajudul a', 'b.Id_tawaranjudul = a.Id_tawaranjudul');
        $this->db->join('tbl_status s', 's.Id = a.Status');
        // $this->db->join('tbl_tawaranjudul p', 'p.NIM = a.NIM');
        $this->db->group_by('a.Id_tawaranjudul');
        $this->db->where('b.NIP ', $NIP );
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $query->result();
        
    }

    

    public function getbyrencana($Id_tawaranjudul)
    {
        $this->db->from('tbl_rencanajudul r');
        $this->db->join('tbl_status s', 's.Id = r.Status');
        $this->db->where('Id_tawaranjudul', $Id_tawaranjudul);
        $query = $this->db->get();
        return $query->result();
    }

    public function cek_status($NIP)
    {
        $this->db->from('tbl_tawaranjudul t'); 
        $this->db->join('tbl_rencanajudul r', 't.Id_tawaranjudul = r.Id_tawaranjudul', 'left');
        $this->db->where('r.Status', '1');
        $this->db->where('NIP', $NIP);
        $query = $this->db->get();
        return $query->num_rows(); 
    }

    public function cek_statuss($NIM)
    {
        $this->db->from('tbl_tawaranjudul t'); 
        $this->db->join('tbl_rencanajudul r', 't.Id_tawaranjudul = r.Id_tawaranjudul', 'left');
        $this->db->where('r.Status', '2');
        $this->db->where('NIM', $NIM);
        $query = $this->db->get();
        return $query->num_rows(); 
    }

    public function get_count($NIP)
    {
         $this->db->from('tbl_tawaranjudul t');    
        $this->db->join('tbl_rencanajudul r', 't.Id_tawaranjudul = r.Id_tawaranjudul', 'left');
        // $this->db->join('tbl_proposal p', 'p.NIM = .NIM');
        $this->db->join('tbl_status s', 's.Id = r.Status');
        $this->db->where('t.NIP', $NIP);  
        $this->db->order_by('Id_rencanajudul', 'DESC');
        $query = $this->db->get();
        return $query->count_all_results(); 
    }

    public function getAlladmin()
    {
        $this->db->from('tbl_tawaranjudul t');    
        $this->db->join('tbl_rencanajudul r', 't.Id_tawaranjudul = r.Id_tawaranjudul', 'left');
        $this->db->join('tbl_status s', 's.Id = r.Status');
        $this->db->where('r.Status', 2);
        $this->db->order_by('Id_rencanajudul', 'DESC');
        $query = $this->db->get();
        return $query->result();  
    }



    public function inputRencanaJudul($Id_tawaranjudul,  $NIM, $Username, $Tanggal) {
        $data = array(
            'Id_tawaranjudul'  => $Id_tawaranjudul,
            'NIM'              => $NIM,
            'Username'         => $Username,
            'Tanggal'          => $Tanggal,
           
           
        );
            $this->db->insert('tbl_rencanajudul', $data);
    }


    public function updateJudul($Status, $Id_rencanajudul)
    {
        $data = array (
            'Status' => $Status,
            );
        // $Id_rencanajudul = array ( 
        $this->db->where('Id_rencanajudul', $Id_rencanajudul);
        $this->db->update('tbl_rencanajudul', $data);
    }

    public function setuju($Status, $Id_rencanajudul)
    {
        $data = array (
            'Status' => $Status,
            );
        // $Id_rencanajudul = array ( 
        $this->db->where('Id_rencanajudul', $Id_rencanajudul);
        $this->db->update('tbl_rencanajudul', $data);
    }

    public function tolak($Status, $Id_rencanajudul)
    {
        $data = array (
            'Status' => $Status,
            );
        // $Id_rencanajudul = array ( 
        $this->db->where('Id_rencanajudul', $Id_rencanajudul);
        $this->db->update('tbl_rencanajudul', $data);
    }

    public function hapusDataRencanaTopik($Id_rencanajudul)
    {
        $data = array (
                'Id_rencanajudul' => $Id_rencanajudul,
        );

        $this->db->delete('tbl_rencanajudul', $data);
    }


}
