<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buyer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('buyer/IndexBuyer_model', 'ibm');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_banner'] = $this->ibm->data_banner();
        $data['data_product'] = $this->ibm->data_tanaman();

        //config
        $config['base_url'] = 'http://localhost/aglonema/Buyer/index';
        $config['total_rows'] = $this->ibm->countAllProduk();
        $config['per_page'] = 6;

        //styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //initilize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['data_produk'] = $this->ibm->getProduk($config['per_page'], $data['start']);

        $this->load->view('templates/buyer/header', $data);
        $this->load->view('templates/buyer/navbar', $data);
        $this->load->view('buyer/index', $data);
        $this->load->view('templates/buyer/footer', $data);
    }

    public function penanaman()
    {
        $data['title'] = 'Penanaman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_banner'] = $this->ibm->data_banner();
        $data['data_tanam'] = $this->ibm->data_penanaman();
        $data['data_product'] = $this->ibm->data_tanaman();
        $this->load->view('templates/buyer/header', $data);
        $this->load->view('templates/buyer/navbar', $data);
        $this->load->view('buyer/penanaman', $data);
        $this->load->view('templates/buyer/footer', $data);
    }

    public function perawatan()
    {
        $data['title'] = 'Perawatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_banner'] = $this->ibm->data_banner();
        $data['data_rawat'] = $this->ibm->data_perawatan();
        $data['data_product'] = $this->ibm->data_tanaman();
        $this->load->view('templates/buyer/header', $data);
        $this->load->view('templates/buyer/navbar', $data);
        $this->load->view('buyer/perawatan', $data);
        $this->load->view('templates/buyer/footer', $data);
    }

    // fungsi membuat kode pemesanan sesuai tanggal
    public function kodeDataTanaman()
    {
        $tahun = date('Y');
        $date = date('d/m/');
        $this->db->like('kode', $date);
        $this->db->like('kode', $tahun);
        $this->db->select('RIGHT(transaksi.kode,2) as kode', FALSE);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('transaksi');  //cek dulu apakah ada sudah ada kode di tabel.
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = $date . $tahun . ' -PSN- ' . $batas;  //format kode
        // echo '<pre>';
        // print_r($kodetampil);
        // die;
        // echo '</pre>';
        return $kodetampil;
    }


    public function add_cart($id)
    {
        $cart = $this->ibm->data_cart($id);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'id' => $cart->id,
            'qty' => $this->input->post('jumlah'),
            'price' => $cart->harga,
            'name' => $cart->nama,
            'image' => $cart->image,
            'seller_id' => $cart->user_id,
            'buyer_id' => $data['user']['id'],
            'buyer_email' => $data['user']['email'],
            'buyer_name' => $data['user']['name'],
        ];

        // echo '<pre>';
        // print_r($data);
        // die;
        // echo '</pre>';

        $insertmin = array(
            'data_tanaman_id' => $cart->id,
            'name' => $cart->nama,
            'jumlah' => $this->input->post('jumlah'),
        );

        if ($cart->jumlah < $data['qty']) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">
                    Pemesanan anda melebihi stok tersedia !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
            );
            redirect('Buyer');
        } else {
            $query = $this->cart->insert($data);
            if ($query) {
                $query1 = $this->db->insert('barang_keluar', $insertmin);
                if ($query1) {
                    $query2 = $this->db->get_where('barang_keluar', ['data_tanaman_id' => $insertmin['data_tanaman_id']])->row_array();
                    $this->db->where('id', $query2['id']);
                    $this->db->delete('barang_keluar', $insertmin);
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">
                            Produk gagal tertambah !
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
                    );
                    redirect('Buyer');
                }
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                        Produk berhasil dikeranjang !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('Buyer');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                        Produk gagal dikeranjang !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('Buyer');
            }
        }
    }

    public function detail_cart()
    {
        $data['title'] = "Detail Keranjang";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_banner'] = $this->ibm->data_banner();
        $data['kode'] = $this->kodeDataTanaman();

        $this->load->view('templates/buyer/header', $data);
        $this->load->view('templates/buyer/navbar', $data);
        $this->load->view('buyer/keranjang', $data);
        $this->load->view('templates/buyer/footer', $data);
    }

    public function delete_cart()
    {
        $rowid = $this->input->post('rowid');
        $this->cart->remove($rowid);

        $data = [
            'data_tanaman_id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'jumlah' => $this->input->post('qty'),
        ];
        $query = $this->db->insert('barang_masuk', $data);
        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk keranjang dihapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('Buyer/detail_cart');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Produk keranjang gagal dihapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('Buyer/detail_cart');
        }
    }

    public function checkout()
    {
        $data['title'] = 'Checkout';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_banner'] = $this->ibm->data_banner();
        $data['data_checkout'] = $this->ibm->data_checkout();

        $data['kode'] = $this->kodeDataTanaman();

        $this->form_validation->set_rules('kode', 'Kode', 'required|trim');
        $this->form_validation->set_rules('buyer_email', 'Email', 'required|trim');
        $this->form_validation->set_rules('buyer_name', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/buyer/header', $data);
            $this->load->view('templates/buyer/navbar', $data);
            $this->load->view('buyer/checkout', $data);
            $this->load->view('templates/buyer/footer', $data);
        } else {
            $seller_id = $this->input->post('seller_id[]');
            for ($i = 0; $i < count($seller_id); $i++) {
                $data = [
                    'kode' => $this->input->post('kode'),
                    'buyer_id' => $this->input->post('buyer_id'),
                    'buyer_email' => $this->input->post('buyer_email'),
                    'buyer_name' => $this->input->post('buyer_name'),
                    'seller_id' => $this->input->post('seller_id'),
                    'total' => preg_replace('/,.*|[^0-9]/', '', $this->input->post('total')),
                    'seller_id' => $seller_id[$i],
                ];
                // echo '<pre>';
                // print_r($data);
                // die;
                // echo '</pre>';
                $query = $this->db->insert('transaksi', $data);
                $transaksi_id[$i] = $this->db->insert_id();
            }
            if ($query) {
                $id = $this->input->post('id');
                $name = $this->input->post('name');
                $price = $this->input->post('price');
                $qty = $this->input->post('qty');
                for ($i = 0; $i < count($id); $i++) {
                    $data = [
                        'product_id' => $id[$i],
                        'nama' => $name[$i],
                        'harga' => $price[$i],
                        'jumlah' => $qty[$i],
                        'transaksi_id' => $transaksi_id[$i],
                    ];
                    $query1 = $this->db->insert('detail_transaksi', $data);
                    $this->cart->destroy();
                }
                if ($query1) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil checkout
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('Buyer/checkout');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Produk gagal checkout
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('Buyer/checkout');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Produk gagal dicheckout
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('Buyer/checkout');
            }
        }
    }

























    public function my_profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/buyer/header', $data);
        $this->load->view('templates/buyer/navbar', $data);
        $this->load->view('buyer/my_profile', $data);
        $this->load->view('templates/buyer/footer', $data);
    }
    public function edit_profile()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Profile';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/buyer/header', $data);
            $this->load->view('templates/buyer/navbar', $data);
            $this->load->view('buyer/edit_profile', $data);
            $this->load->view('templates/buyer/footer', $data);
        } else {
            $where = $this->input->post('email');
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            // cek jika ada gambar
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/user/img/profile/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';  //2MB max
                $config['max_width'] = '500'; // pixel
                $config['max_height'] = '500'; // pixel

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    //get gambar yang lama
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        @unlink(FCPATH . 'assets/user/img/profile/' . $old_image);
                    }

                    //dengan foto
                    $data = [
                        'name' => $this->input->post('name'),
                        'no_telp' => $this->input->post('no_telp'),
                        //get gambar yang baru
                        'image' => $this->upload->data('file_name')
                    ];
                    $this->ibm->updateUserBuyer($where, $data);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">
                        Profile berhasil diedit !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                    );
                    redirect('buyer/edit_profile');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Ukuran melebihi batas. Maksimal 500px x 500px
                    <button type="button" class="close" data-dismiss="alert"   aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('buyer/edit_profile');
                }
            }

            //tanpa foto
            $data = [
                'name' => $this->input->post('name'),
                'no_telp' => $this->input->post('no_telp'),
            ];
            $this->ibm->updateUserBuyer($where, $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
                Profile anda sudah terupdate !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
            );
            redirect('buyer/edit_profile');
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
            $this->load->view('templates/buyer/header', $data);
            $this->load->view('templates/buyer/navbar', $data);
            $this->load->view('buyer/change_password', $data);
            $this->load->view('templates/buyer/footer', $data);
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
                redirect('buyer/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New Password tidak boleh sama dengan Current Password ! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('buyer/change_password');
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
                    redirect('buyer/change_password');
                }
            }
        }
    }
}
