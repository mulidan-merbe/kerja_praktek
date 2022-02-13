<?php


class Model_Proposal extends CI_Model
{

    public function getbyNIM($NIM)
    {
        $this->db->from('tbl_proposal p');
        $this->db->join('tbl_status s', 's.Id = p.Status');
        $this->db->where('NIM', $NIM);
        $query = $this->db->get();
        return $query->result();
    }

    public function getbyNIM2($NIM)
    {
        $this->db->from('tbl_proposal p');
        $this->db->where('NIM', $NIM);
        $this->db->where('Status', 2);
        $query = $this->db->get();
        return $query->result();
    }

    public function getbyId($Id_proposal)
    {
        return $this->db->get_where('tbl_proposal', ['Id_proposal' => $Id_proposal])->result();
    }

    public function getDataNIMLimit($NIM)
    {
        $this->db->from('tbl_proposal');
        $this->db->where('NIM', $NIM);
        $this->db->limit(1);
        $this->db->order_by('Id_proposal', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function caribyId($Id_pelaksanaan)
    {
        return $this->db->get_where('tbl_proposal', ['Id_pelaksanaan' => $Id_pelaksanaan])->result();
    }

    public function lihatTahun($Tahun)
    {
        $this->db->from('tbl_proposal s');
        $this->db->join('tbl_pelaksanaan p', 'p.Id_pelaksanaan = s.Id_pelaksanaan');
        $this->db->join('tbl_status t', 't.Id = s.Status');
        $this->db->where('Tahun ', $Tahun);
        $query = $this->db->get();
        return $query->result();
    }

    public function lihatPeriode($Tahun, $Periode)
    {
        $this->db->from('tbl_proposal s');
        $this->db->join('tbl_pelaksanaan p', 'p.Id_pelaksanaan = s.Id_pelaksanaan');
        $this->db->join('tbl_status t', 't.Id = s.Status');
        $this->db->where(['Tahun ' => $Tahun, 'Periode' => $Periode]);
        $query = $this->db->get();
        return $query->result();
    }

    public function getbyNIP($NIP)
    {
        $this->db->from('tbl_proposal r');
        $this->db->join('tbl_status t', 't.Id = r.Status');
        $this->db->where('NIP', $NIP);
        $this->db->order_by('Id_proposal', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getbyNIP2($NIP)
    {
        $this->db->from('tbl_proposal r');
        $this->db->join('tbl_status t', 't.Id = r.Status');
        $this->db->where('NIP', $NIP);
        $this->db->order_by('Id_proposal', 'DESC');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getbydataNIP($NIP)
    {
        $this->db->from('tbl_proposal r');
        $this->db->join('tbl_pelaksanaan t', 't.Id_pelaksanaan = r.Id_pelaksanaan');
        $this->db->join('tbl_status s', 's.Id = r.Status');
        $this->db->where('NIP', $NIP);
        $this->db->order_by('Id_proposal', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllAdmin()
    {
        $this->db->from('tbl_proposal r');
        $this->db->join('tbl_pelaksanaan p', 'p.Id_pelaksanaan = r.Id_pelaksanaan');
        $this->db->join('tbl_status t', 't.Id = r.Status');
        $this->db->order_by('Id_proposal', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_terbaru($Id_pelaksanaan)
    {
        $this->db->from('tbl_proposal');
        $this->db->where('Id_pelaksanaan >=', $Id_pelaksanaan);
        $this->db->where('Status', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_periode($Id_pelaksanaan)
    {
        $this->db->from('tbl_proposal');
        $this->db->where('Id_pelaksanaan >=', $Id_pelaksanaan);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function cekdata($Id_mahasiswa)
    {
        $this->db->from('tbl_proposal');
        $this->db->where('Id_mahasiswa', $Id_mahasiswa);
        $query = $this->db->get();
        return $query->result();



        // return $this->db->get_where('tbl_proposal', ['Id_mahasiswa' => $Id_mahasiswa], ['Status' => '2'])->result();

    }



    public function inputProposal($Id_pelaksanaan, $topik, $Username, $NIP, $NamaDosen, $Berkas, $NIM,  $Tanggal)
    {
        $data = array(
            'Id_pelaksanaan'    => $Id_pelaksanaan,
            'topik'             => $topik,
            'nama'              => $Username,
            'NIP'               => $NIP,
            'NamaDosen'         => $NamaDosen,
            'Berkas'            => $Berkas,
            'NIM'               => $NIM,
            'Tanggal_upload'    => $Tanggal
        );

        $this->db->insert('tbl_proposal', $data);
    }

    public function ubahData($NIM,  $Berkas, $Tanggal)
    {
        $data = array(
            'Berkas'            => $Berkas,
            'Tanggal_upload'    => $Tanggal

        );

        $this->db->where('NIM', $NIM);
        $this->db->update('tbl_proposal', $data);
    }

    public function terima($Id_proposal, $Status, $Tanggal_Status)
    {
        $data = array(
            'Status'            => $Status,
            'Tanggal_Status'    => $Tanggal_Status
        );
        $this->db->where('Id_proposal', $Id_proposal);
        $this->db->update('tbl_proposal', $data);
    }

    public function tolak($Id_proposal, $Status, $Tanggal_Status)
    {
        $data = array(
            'Status'            => $Status,
            'Tanggal_Status'    => $Tanggal_Status
        );
        $this->db->where('Id_proposal', $Id_proposal);
        $this->db->update('tbl_proposal', $data);
    }

    public function getDatabyNIM($NIM)
    {
        return $this->db->get_where('tbl_proposal', ['NIM' => $NIM])->row();
    }

    public function getDatabyId($Id_proposal)
    {
        return $this->db->get_where('tbl_proposal', ['Id_proposal' => $Id_proposal])->row();
    }

    public function hapusDataProposal($Id_proposal)
    {
        $data = array(
            'Id_proposal' => $Id_proposal
        );

        $this->db->delete('tbl_proposal', $data);
    }
}
