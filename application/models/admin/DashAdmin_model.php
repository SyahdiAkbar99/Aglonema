<?php

class DashAdmin_model extends CI_Model
{
    //Data User
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

    public function count_transaksi()
    {
        $query = "SELECT COUNT(transaksi.status) AS sumTrans, DATE_FORMAT(transaksi.transaksi_tanggal, '%M %Y') AS bulan
        FROM transaksi
          WHERE
            transaksi.status = 1
              
              GROUP BY MONTH(transaksi.transaksi_tanggal)
              HAVING COUNT(transaksi.status)
              ORDER BY transaksi.transaksi_tanggal DESC";

        $getCountTransaksi = $this->db->query($query)->result_array();

        return $getCountTransaksi;
    }

    public function count_penjual()
    {
        $query = "SELECT COUNT(user.role_id) AS penjual, DATE_FORMAT(user.date_created, '%M %Y') AS bulan
        FROM user
          WHERE
            user.role_id = 2
              
              GROUP BY MONTH(user.date_created)
              HAVING COUNT(user.role_id)
              ORDER BY user.date_created DESC";

        $getCountPenjual = $this->db->query($query)->result_array();

        return $getCountPenjual;
    }

    public function count_pembeli()
    {
        $query = "SELECT COUNT(user.role_id) AS pembeli, DATE_FORMAT(user.date_created, '%M %Y') AS bulan
        FROM user
          WHERE
            user.role_id = 3
              
              GROUP BY MONTH(user.date_created)
              HAVING COUNT(user.role_id)
              ORDER BY user.date_created DESC";

        $getCountPembeli = $this->db->query($query)->result_array();

        return $getCountPembeli;
    }

    public function data_jasa_antar()
    {
        $query = "SELECT * FROM jasa_antar ORDER BY jasa_antar.id DESC";

        $getJasa = $this->db->query($query)->result_array();
        return $getJasa;
    }




    //Data Banner
    public function data_banner()
    {
        $query = "SELECT * FROM data_banner ORDER BY data_banner.id ASC";
        return $this->db->query($query)->result_array();
    }
    public function insert_data_banner($data)
    {
        $this->db->insert('data_banner', $data);
    }
    public function update_data_banner($where, $data)
    {
        $this->db->where('id', $where);
        $this->db->update('data_banner', $data);
    }
    public function delete_data_banner($where)
    {
        $this->db->where('id', $where);
        $this->db->delete('data_banner');
    }

    //Data Penanaman
    public function data_penanaman()
    {
        $query = "SELECT * FROM data_penanaman ORDER BY data_penanaman.urutan ASC";
        return $this->db->query($query)->result_array();
    }
    public function insert_data_penanaman($data)
    {
        $this->db->insert('data_penanaman', $data);
    }
    public function update_data_penanaman($where, $data)
    {
        $this->db->where('id', $where);
        $this->db->update('data_penanaman', $data);
    }
    public function delete_data_penanaman($where)
    {
        $this->db->where('id', $where);
        $this->db->delete('data_penanaman');
    }

    //Data Perawatan
    public function data_perawatan()
    {
        $query = "SELECT * FROM data_perawatan ORDER BY data_perawatan.urutan ASC";
        return $this->db->query($query)->result_array();
    }
    public function insert_data_perawatan($data)
    {
        $this->db->insert('data_perawatan', $data);
    }
    public function update_data_perawatan($where, $data)
    {
        $this->db->where('id', $where);
        $this->db->update('data_perawatan', $data);
    }
    public function delete_data_perawatan($where)
    {
        $this->db->where('id', $where);
        $this->db->delete('data_perawatan');
    }



    //Only Profile User Admin
    public function updateUserAdmin($where, $data)
    {
        $this->db->where('email', $where);
        $this->db->update('user', $data);
    }
}
