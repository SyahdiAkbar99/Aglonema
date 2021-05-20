<?php

class DashAdmin_model extends CI_Model
{
    public function getAllUser()
    {
        $query = "SELECT * FROM user ORDER BY user.id ASC";
        return $this->db->query($query)->result_array();
    }
    public function statusUser($where, $data)
    {
        $this->db->where('id', $where);
        $this->db->update('user', $data);
    }
    public function deleteUser($where)
    {
        $this->db->where('id', $where);
        $this->db->delete('user');
    }
    public function updateUserAdmin($where, $data)
    {
        $this->db->where('email', $where);
        $this->db->update('user', $data);
    }
}
