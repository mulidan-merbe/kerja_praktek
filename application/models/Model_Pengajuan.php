<?php

class Model_Pengajuan extends CI_Model
{

    public function simpanData($Topik, $Abstrak, $Jumlah, $Instansi, $Alamat, $Narahubung, $Email, $Tanggal)
    {
        $data = [
            'Topik' => $Topik,
            'Abstrak' => $Abstrak,
            'Jumlah'   => $Jumlah,
            'Instansi'  => $Instansi,
            'Alamat'    => $Alamat,
            'Narahubung'    => $Narahubung,
            'Email' => $Email,
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
        $this->db->join('tbl_status t', 't.Id = p.Konfirmasi');
        $this->db->order_by('p.Id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getbyId($Id)
    {
        $this->db->from('tbl_pengajuan');
        $this->db->where('Id', $Id);
        $query = $this->db->get();
        return $query->result();
    }

    public function setuju($Id, $Status)
    {
        $data = [
            'Status' => $Status
        ];
        $this->db->update('tbl_pengajuan', $data);
        $this->db->where('Id', $Id);
    }

    public function konfirmasi($id, $nilai)
    {
        $data = [
            'Konfirmasi' => $nilai
        ];
        $this->db->update('tbl_pengajuan', $data);
        $this->db->where('Id', $id);
    }
}
