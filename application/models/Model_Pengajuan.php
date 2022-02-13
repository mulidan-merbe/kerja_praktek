<?php

class Model_Pengajuan extends CI_Model
{

    public function simpanData($Topik, $Abstrak, $Jumlah, $Instansi, $Alamat, $Narahubung, $Email, $Konfirmasi, $Tanggal)
    {
        $data = [
            'Topik' => $Topik,
            'Abstrak' => $Abstrak,
            'Jumlah'   => $Jumlah,
            'Instansi'  => $Instansi,
            'Alamat'    => $Alamat,
            'Narahubung'    => $Narahubung,
            'Email' => $Email,
            'Konfirmasi' => $Konfirmasi,
            'Status' => $Konfirmasi,
            'Tanggal' => $Tanggal
        ];

        $this->db->insert('tbl_pengajuan', $data);
        return $this->db->insert_id();
    }

    public function getPengajuan($id)
    {
        $query = $this->db->get_where('tbl_pengajuan', array('id' => $id));
        return $query->row_array();
    }



    public function getAll()
    {
        $this->db->from('tbl_pengajuan p');
        $this->db->join('tbl_status t', 't.Id = p.Status');
        $this->db->order_by('p.Id_pengajuan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getbyId($Id)
    {
        $this->db->from('tbl_pengajuan');
        $this->db->where('Id_pengajuan', $Id);
        $query = $this->db->get();
        return $query->result();
    }

    public function status($Id, $Status)
    {
        $data = array(
            'Status' => $Status

        );
        $this->db->where('Id_Pengajuan', $Id);
        $this->db->update('tbl_pengajuan', $data);
    }

    public function konfirmasi($id, $nilai)
    {
        $data = [
            'Konfirmasi' => $nilai
        ];
        $this->db->where('Id_pengajuan', $id);
        $this->db->update('tbl_pengajuan', $data);
    }
}
