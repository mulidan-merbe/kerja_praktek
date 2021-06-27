<?php

use GuzzleHttp\Client;

class Model_tawaranTopik extends CI_Model {

    // public function getAll()
    // {

    //     $this->db->select('a.Id_tawaranjudul, a.Username, a.Instansi, a.topik, a.Jumlah, a.Alamat, a.NIP, Periode, a.Tanggal, Tanggal_selesai, COUNT(r.Id_tawaranjudul) AS total ');
    //     $this->db->from('tbl_tawaranjudul a');
    //     $this->db->join('tbl_rencanajudul r', 'r.Id_tawaranjudul = a.Id_tawaranjudul');
    //     $this->db->join('tbl_pelaksanaan p', 'p.Id_pelaksanaan = a.Id_pelaksanaan');
    //     $this->db->group_by('r.NIM');
    //     $this->db->order_by('total', 'desc');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function getAll() {
        
        $this->db->from('tbl_tawaranjudul t');
        $this->db->join('tbl_pelaksanaan p', 'p.Id_pelaksanaan = t.Id_pelaksanaan');
        $this->db->order_by('Id_tawaranjudul', 'DESC');
        $query = $this->db->get();
        return $query->result();   
    }
    
    public function getAllTopik($NIP) {
        $this->db->select('*');
        $this->db->from('tbl_tawaranjudul t');
        $this->db->join('tbl_pelaksanaan p', 'p.Id_pelaksanaan = t.Id_pelaksanaan');
        $this->db->where('t.NIP', $NIP);
        $this->db->order_by('Id_tawaranjudul', 'DESC');
        $query = $this->db->get();
		return $query->result();   
    }

    public function getbyId($Id_tawaranjudul)
    {
        $this->db->from('tbl_tawaranjudul t');
        $this->db->join('tbl_pelaksanaan p', 'p.Id_pelaksanaan = t.Id_pelaksanaan');
        $this->db->where('t.Id_tawaranjudul', $Id_tawaranjudul);
        $query = $this->db->get();
        return $query->result();  
    }

    


    public function tambahData( $NIP, $topik, $Alamat, $Jumlah, $No_hp, $Instansi, $Username, $Id_pelaksanaan, $Tanggal) {
        $data = array(
            'NIP'               => $NIP,
            'topik'             => $topik,
            'Alamat'            => $Alamat,
            'Jumlah'            => $Jumlah,
            'No_Hp'             => $No_hp,
            'Instansi'          => $Instansi,
            'Username'          => $Username,
            'Id_pelaksanaan'    => $Id_pelaksanaan,
            'Tanggal'           => $Tanggal
           
        );

        $this->db->insert('tbl_tawaranjudul', $data);
    }


    public function ubahData($Id_tawaranjudul, $topik, $Alamat, $Jumlah, $No_hp, $Instansi, $NIP,  $Tanggal) {
        $data = array(
            'topik'             => $topik,
            'Alamat'            => $Alamat,
            'Jumlah'            => $Jumlah,
            'No_Hp'             => $No_hp,
            'Instansi'          => $Instansi,
            'NIP'               => $NIP,
            'Tanggal'           => $Tanggal
           
        );

        $this->db->where('Id_tawaranjudul', $Id_tawaranjudul);
        $this->db->update('tbl_tawaranjudul', $data);
    }

    public function hapusDataJudul($Id_tawaranjudul)
    {
        $data = array (
                'Id_tawaranjudul' => $Id_tawaranjudul,
        );

        $this->db->delete('tbl_tawaranjudul', $data);
    }


}
