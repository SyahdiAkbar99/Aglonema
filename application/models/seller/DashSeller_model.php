<?php

class DashSeller_model extends CI_Model
{
    //Only User Seller
    public function updateUserSeller($where, $data)
    {
        $this->db->where('email', $where);
        $this->db->update('user', $data);
    }

    public function count_transaksi($id)
    {
        $query = "SELECT COUNT(detail_transaksi.status) AS sumTrans, DATE_FORMAT(detail_transaksi.tanggal, '%M %Y') AS bulan
        FROM detail_transaksi
          WHERE
            detail_transaksi.status = 2 AND detail_transaksi.seller_id = $id
              
             ";

        $getCountTransaksi = $this->db->query($query)->result_array();

        return $getCountTransaksi;
    }

    public function count_tanaman($id)
    {
        $query = "SELECT COUNT(data_tanaman.kode) AS kode, DATE_FORMAT(data_tanaman.tanggal_post, '%M %Y') AS bulan
        FROM data_tanaman
          WHERE
            data_tanaman.user_id = $id
              
            ";

        $getCountTanaman = $this->db->query($query)->result_array();

        return $getCountTanaman;
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
