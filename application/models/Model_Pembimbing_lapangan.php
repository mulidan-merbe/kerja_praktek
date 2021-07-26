<?php

class Model_Pembimbing_lapangan extends CI_Model {

    public function getAdmin()
    {
        return $this->db->get('tbl_pembimbing_lapangan')->result();
    }

    public function getbyNIM($NIM)
    {
        return $this->db->get_where('tbl_pembimbing_lapangan ', ['NIM' => $NIM])->result();
    }

    public function getDataNIMLimit($NIM)
    {
        $this->db->from('tbl_pembimbing_lapangan');
        $this->db->where('NIM', $NIM);
        $this->db->limit(1);
        $this->db->order_by('Id','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getbyId($Id) 
    {
         return $this->db->get_where('tbl_pembimbing_lapangan', ['Id' => $Id])->result();
    }

    public function get_tanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->from('tbl_pembimbing_lapangan');
        $this->db->where('Tanggal >=', $tgl_awal);
        $this->db->where('Tanggal <=', $tgl_akhir);
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function tambahData($Id_pelaksanaan, $NIM, $File, $Username, $No_identitas, $Password, $Jabatan, $Alamat_kantor, $No_hp, $Tanggal) 
    {

    	$data = array (
                'Id_pelaksanaan'     => $Id_pelaksanaan,
    			'NIM'                => $NIM,
    			'File'			     => $File,
    			'Nama'		         => $Username,
    			'No_identitas'       => $No_identitas,
                'Password'           => $Password,
    			'Jabatan'		     => $Jabatan,
    			'Alamat_kantor'      => $Alamat_kantor,
    			'No_hp'			     => $No_hp,
                'Tanggal'            => $Tanggal

    	);

    	$this->db->insert('tbl_pembimbing_lapangan', $data);

    }

    public function ubahData($NIM, $File, $Username, $No_identitas, $Password, $Jabatan, $Alamat_kantor, $No_hp, $Tanggal) 
    {

        $data = array (
            
                'File'          => $File,
                'Nama'          => $Username,
                'No_identitas'  => $No_identitas,
                'Password'      => $Password,
                'Jabatan'       => $Jabatan,
                'Alamat_kantor' => $Alamat_kantor,
                'No_hp'         => $No_hp,
                'Tanggal'       => $Tanggal

        );
        $this->db->where('NIM', $NIM);
        $this->db->update('tbl_pembimbing_lapangan', $data);

    }


    public function getDatabyNIM($NIM) 
    {
        $this->db->where(['NIM' => $NIM]);
        return $this->db->get('tbl_pembimbing_lapangan')->row();

    }
    public function hapusData($Id)
    {
        $data = array(
                'Id' => $Id
        );
           
        $this->db->delete('tbl_pembimbing_lapangan',$data); 
    }
}