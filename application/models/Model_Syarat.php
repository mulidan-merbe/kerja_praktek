<?php

class Model_Syarat extends CI_Model
{
	public function tambahData($Id_pelaksanaan, $Jumlah, $Tanggal)
	{
		$data = array('Id_pelaksanaan' => $Id_pelaksanaan , 'Jumlah' => $Jumlah, 'Tanggal' => $Tanggal );

		$this->db->insert('tbl_syaratseminar', $data);

	}

    public function get()
    {
        $this->db->from('tbl_syaratseminar');
        $this->db->limit(1);
        $this->db->order_by('Id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

	public function getSyarat()
    {
    	$this->db->from('tbl_syaratseminar s');
    	$this->db->join('tbl_pelaksanaan p', 'p.Id_pelaksanaan = s.Id_pelaksanaan');
    	$this->db->order_by('Id', 'DESC' );
    	$query = $this->db->get();
    	return $query->result();
    }

    public function syaratbyId($Id)
    {
    	$this->db->from('tbl_syaratseminar s');
    	$this->db->join('tbl_pelaksanaan p', 'p.Id_pelaksanaan = s.Id_pelaksanaan');
    	$this->db->where('Id', $Id);
    	$query = $this->db->get();
    	return $query->result();
    }

    public function ubahData($Id, $Jumlah)
    {
    	$data = array('Jumlah' => $Jumlah );
    	$this->db->where('Id', $Id);
    	$this->db->update('tbl_syaratseminar', $data);
    }

    public function hapusData($Id)
    {
    	$data = array (
                'Id' => $Id,
        );
    	$this->db->delete('tbl_syaratseminar', $data);
    }
}