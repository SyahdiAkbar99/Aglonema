<?php

class DashSeller_model extends CI_Model
{
    public function updateUserSeller($where, $data)
    {
        $this->db->where('email', $where);
        $this->db->update('user', $data);
    }
    public function data_tanaman($user_id)
    {
        $query = "SELECT * FROM data_tanaman WHERE data_tanaman.user_id = $user_id";
        return $this->db->query($query)->result_array();
    }
    public function insert_data_tanaman($data)
    {
        $this->db->insert('data_tanaman', $data);
    }

    public function update_data_tanaman($where, $datas)
    {
        $this->db->where('id', $where);
        $this->db->update('data_tanaman', $datas);
    }
}
