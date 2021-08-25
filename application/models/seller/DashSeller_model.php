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
        $query = "SELECT transaksi.id,transaksi.kode,transaksi.buyer_id,transaksi.buyer_email,transaksi.buyer_name,transaksi.buyer_bank,transaksi.buyer_rekening,transaksi.buyer_telp,transaksi.seller_id,transaksi.seller_name,transaksi.seller_bank,transaksi.seller_rekening,transaksi.transaksi_total,transaksi.transaksi_tanggal,
        detail_transaksi.detail_id, detail_transaksi.product_id,detail_transaksi.name,detail_transaksi.jumlah,detail_transaksi.harga,detail_transaksi.total,detail_transaksi.status,detail_transaksi.image,detail_transaksi.tanggal,detail_transaksi.seller_id,detail_transaksi.seller_id,detail_transaksi.antar_id,detail_transaksi.nama_antar,detail_transaksi.lokasi_antar,detail_transaksi.biaya_antar,detail_transaksi.biaya_admin,detail_transaksi.transaksi_id FROM detail_transaksi
                    JOIN transaksi ON detail_transaksi.transaksi_id = transaksi.id WHERE detail_transaksi.seller_id = $id";
        return $this->db->query($query)->result_array();
    }
}
