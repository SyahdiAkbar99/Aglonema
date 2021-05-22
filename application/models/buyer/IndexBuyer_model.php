<?php

class IndexBuyer_model extends CI_Model
{
    public function updateUserBuyer($where, $data)
    {
        $this->db->where('email', $where);
        $this->db->update('user', $data);
    }

    //Data Banner
    public function data_banner()
    {
        $query = "SELECT * FROM data_banner ORDER BY data_banner.id ASC";
        return $this->db->query($query)->result_array();
    }

    //Data Penanaman
    public function data_penanaman()
    {
        $query = "SELECT * FROM data_penanaman ORDER BY data_penanaman.urutan ASC";
        return $this->db->query($query)->result_array();
    }

    //Data Penanaman
    public function data_perawatan()
    {
        $query = "SELECT * FROM data_perawatan ORDER BY data_perawatan.urutan ASC";
        return $this->db->query($query)->result_array();
    }
}
