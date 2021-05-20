<?php

class IndexBuyer_model extends CI_Model
{
    public function updateUserBuyer($where, $data)
    {
        $this->db->where('email', $where);
        $this->db->update('user', $data);
    }
}
