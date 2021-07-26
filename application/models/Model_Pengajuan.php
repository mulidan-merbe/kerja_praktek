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

    public function konfirmasi($nilai, $id)
    {
    }

    public function getAll()
    {
        $this->db->from('tbl_pengajuan t');
        // $this->db->join('tbl_pelaksanaan p', 'p.Id_pelaksanaan = t.Id_pelaksanaan');
        $this->db->order_by('Id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
