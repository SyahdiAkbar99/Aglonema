<?php

class DashSeller_model extends CI_Model
{
    //Only User Seller
    public function updateUserSeller($where, $data)
    {
        $this->db->where('email', $where);
        $this->db->update('user', $data);
    }

    //Data Tanaman
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

    //Data Riwayat Penjualan
    public function riwayat_penjualan($id)
    {
        $query = "SELECT * FROM detail_transaksi
                    JOIN transaksi ON detail_transaksi.transaksi_id = transaksi.id WHERE detail_transaksi.seller_id = $id";
        return $this->db->query($query)->result_array();
    }
}
