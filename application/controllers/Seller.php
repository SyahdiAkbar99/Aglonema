<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('seller/DashSeller_model', 'dsm');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $data['title'] = 'Dashboard Seller';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/seller/header', $data);
        $this->load->view('templates/seller/navbar', $data);
        $this->load->view('templates/seller/sidebar', $data);
        $this->load->view('seller/index', $data);
        $this->load->view('templates/seller/footer', $data);
    }

    // fungsi membuat kode pemesanan sesuai tanggal
    public function kodeDataTanaman()
    {
        $tahun = date('Y');
        $date = date('d/m/');
        $this->db->like('kode', $date);
        $this->db->like('kode', $tahun);
        $this->db->select('RIGHT(data_tanaman.kode,2) as kode', FALSE);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('data_tanaman');  //cek dulu apakah ada sudah ada kode di tabel.
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = $date . $tahun . ' -DT- ' . $batas;  //format kode
        // echo '<pre>';
        // print_r($kodetampil);
        // die;
        // echo '</pre>';
        return $kodetampil;
    }



    //Data Tanaman
    public function data_tanaman()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required|trim|is_unique[data_tanaman.kode]', [
            'is_unique' => '%s sudah ada'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        $this->form_validation->set_rules('berat', 'Berat', 'required|trim|numeric');
        $this->form_validation->set_rules('warna', 'Warna', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Tanaman';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['kode'] = $this->kodeDataTanaman();

            //tampilkan data tanaman sesuai user
            $data['data_tanaman'] = $this->dsm->data_tanaman($data['user']['id']);
            $this->load->view('templates/seller/header', $data);
            $this->load->view('templates/seller/navbar', $data);
            $this->load->view('templates/seller/sidebar', $data);
            $this->load->view('seller/data_tanaman', $data);
            $this->load->view('templates/seller/footer', $data);
        } else {
            // cek jika ada gambar
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/admin/img/data/seller/tanaman/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';  //2MB max
                $config['max_width'] = '1024'; // pixel
                $config['max_height'] = '1024'; // pixel

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    //get gambar yang baru
                    $data = [
                        'kode' => $this->input->post('kode'),
                        'nama' => $this->input->post('nama'),
                        'jenis' => $this->input->post('jenis'),
                        'berat' => $this->input->post('berat'),
                        'warna' => $this->input->post('warna'),
                        'jumlah' => $this->input->post('jumlah'),
                        'harga' => $this->input->post('harga'),
                        'user_id' => $this->session->userdata('id'),
                        'image' => $this->upload->data('file_name'),
                    ];
                    $this->dsm->insert_data_tanaman($data);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">
                        Data Tanaman berhasil ditambahkan !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                    );
                    redirect('Seller/data_tanaman');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Ukuran melebihi batas. Maksimal 1000px x 1000px
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('Seller/data_tanaman');
                }
            }

            $data = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis'),
                'berat' => $this->input->post('berat'),
                'warna' => $this->input->post('warna'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga'),
                'user_id' => $this->session->userdata('id'),
            ];

            $this->dsm->insert_data_tanaman($data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
                Data Tanaman berhasil ditambahkan !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
            );
            redirect('Seller/data_tanaman');
        }
    }

    public function update_data_tanaman()
    {

        $this->form_validation->set_rules('kode', 'Kode', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        $this->form_validation->set_rules('berat', 'Berat', 'required|trim|numeric');
        $this->form_validation->set_rules('warna', 'Warna', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Tanaman';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['kode'] = $this->kodeDataTanaman();

            //tampilkan data tanaman sesuai user
            $data['data_tanaman'] = $this->dsm->data_tanaman($data['user']['id']);

            // print_r($data['data_tanem']);
            // die;
            $this->load->view('templates/seller/header', $data);
            $this->load->view('templates/seller/navbar', $data);
            $this->load->view('templates/seller/sidebar', $data);
            $this->load->view('seller/data_tanaman', $data);
            $this->load->view('templates/seller/footer', $data);
        } else {
            $where = $this->input->post('id');
            $tb['data_tanem'] = $this->db->get_where('data_tanaman', ['id' => $this->input->post('id')])->row_array();

            $data = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis'),
                'berat' => $this->input->post('berat'),
                'warna' => $this->input->post('warna'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga'),
                'user_id' => $this->session->userdata('id'),
            ];

            // cek jika ada gambar
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/admin/img/data/seller/tanaman';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';  //2MB max
                $config['max_width'] = '1024'; // pixel
                $config['max_height'] = '1024'; // pixel

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    //get gambar yang lama
                    $old_image = $tb['data_tanem']['image'];
                    if ($old_image != 'default.png') {
                        @unlink(FCPATH . 'assets/admin/img/data/seller/tanaman/' . $old_image);
                    }
                    //get gambar yang baru

                    $data = [
                        'kode' => $this->input->post('kode'),
                        'nama' => $this->input->post('nama'),
                        'jenis' => $this->input->post('jenis'),
                        'berat' => $this->input->post('berat'),
                        'warna' => $this->input->post('warna'),
                        'jumlah' => $this->input->post('jumlah'),
                        'harga' => $this->input->post('harga'),
                        'user_id' => $this->session->userdata('id'),
                        'image' => $this->upload->data('file_name')
                    ];
                    $this->dsm->update_data_tanaman($where, $data);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">
                        Data Tanaman berhasil diedit !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                    );
                    redirect('Seller/data_tanaman');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Ukuran melebihi batas. Maksimal 1000x x 1000px
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('Seller/data_tanaman');
                }
            }
            // echo '<pre>';
            // print_r($data);
            // die;
            // echo '</pre>';


            $this->dsm->update_data_tanaman($where, $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
                Data Tanaman berhasil diedit !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
            );
            redirect('Seller/data_tanaman');
        }
    }

    public function delete_data_tanaman()
    {
        $where = $this->input->get('id');
        $tb['data_tanem'] = $this->db->get_where('data_tanaman', ['id' => $this->input->get('id')])->row_array();

        //get gambar yang lama
        $old_image = $tb['data_tanem']['image'];
        if ($old_image != 'default.png') {
            @unlink(FCPATH . 'assets/admin/img/data/seller/tanaman/' . $old_image);
        }

        $result = $this->db->delete('data_tanaman', ['id' => $where]);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Deleted Sucessfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('Seller/data_tanaman');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Deleted Failure
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('Seller/data_tanaman');
        }
    }



    //Riwayat Penjualan
    public function riwayat_penjualan()
    {
        $data['title'] = 'Riwayat Penjualan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //tampilkan data tanaman sesuai user
        $data['data_tanaman'] = $this->dsm->data_tanaman($data['user']['id']);

        $this->load->view('templates/seller/header', $data);
        $this->load->view('templates/seller/navbar', $data);
        $this->load->view('templates/seller/sidebar', $data);
        $this->load->view('seller/index', $data);
        $this->load->view('templates/seller/footer', $data);
    }














    public function my_profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/seller/header', $data);
        $this->load->view('templates/seller/navbar', $data);
        $this->load->view('templates/seller/sidebar', $data);
        $this->load->view('seller/my_profile', $data);
        $this->load->view('templates/seller/footer', $data);
    }
    public function edit_profile()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Profile';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/seller/header', $data);
            $this->load->view('templates/seller/navbar', $data);
            $this->load->view('templates/seller/sidebar', $data);
            $this->load->view('seller/edit_profile', $data);
            $this->load->view('templates/seller/footer', $data);
        } else {
            $where = $this->input->post('email');
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            // cek jika ada gambar
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/admin/img/profile/seller/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';  //2MB max
                $config['max_width'] = '500'; // pixel
                $config['max_height'] = '500'; // pixel

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    //get gambar yang lama
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        @unlink(FCPATH . 'assets/admin/img/profile/seller/' . $old_image);
                    }

                    //dengan foto
                    $data = [
                        'name' => $this->input->post('name'),
                        'no_telp' => $this->input->post('no_telp'),
                        //get gambar yang baru
                        'image' => $this->upload->data('file_name')
                    ];
                    $this->dsm->updateUserSeller($where, $data);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">
                        Profile berhasil diedit !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                    );
                    redirect('Seller/edit_profile');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Ukuran melebihi batas. Maksimal 500px x 500px
                    <button type="button" class="close" data-dismiss="alert"   aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('Seller/edit_profile');
                }
            }

            //tanpa foto
            $data = [
                'name' => $this->input->post('name'),
                'no_telp' => $this->input->post('no_telp'),
            ];
            $this->dsm->updateUserSeller($where, $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
                Profile anda sudah terupdate !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
            );
            redirect('Seller/edit_profile');
        }
    }
    public function change_password()
    {
        $data['title'] = "Change Password";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim|min_length[6]', [
            'required' => '%s input tidak boleh kosong',
            'min_length' => '%s singkat minimal 6 karakter !',
        ]);
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]', [
            'required' => '%s input tidak boleh kosong',
            'min_length' => '%s singkat minimal 6 karakter !',
            'matches' => '%s tidak sama dengan Confirm New Password!',
        ]);
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]', [
            'required' => '%s input tidak boleh kosong',
            'min_length' => '%s singkat minimal 6 karakter !',
            'matches' => '%s tidak sama dengan New Password !',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/seller/header', $data);
            $this->load->view('templates/seller/navbar', $data);
            $this->load->view('templates/seller/sidebar', $data);
            $this->load->view('seller/change_password', $data);
            $this->load->view('templates/seller/footer', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                        Current Password Salah !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('Seller/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New Password tidak boleh sama dengan Current Password ! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('Seller/change_password');
                } else {
                    //password bener
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Ubah password berhasil ! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('Seller/change_password');
                }
            }
        }
    }
}
