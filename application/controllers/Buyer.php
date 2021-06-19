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
            'product_id' => $cart->id,
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
                    $query2 = $this->db->get_where('barang_keluar', ['product_id' => $insertmin['product_id']])->row_array();
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
            'product_id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'jumlah' => $this->input->post('qty'),
        ];
        $query = $this->db->insert('barang_masuk', $data);
        if ($query) {
            $query1 = $this->db->get_where('barang_masuk', ['product_id' => $data['product_id']])->row_array();
            $this->db->where('id', $query1['id']);
            $this->db->delete('barang_masuk', $data);
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

        // echo '<pre>';
        // print_r($data['data_checkout']);
        // die;
        // echo '</pre>';

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
            $data = [
                'kode' => $this->input->post('kode'),
                'buyer_id' => $this->input->post('buyer_id'),
                'buyer_email' => $this->input->post('buyer_email'),
                'buyer_name' => $this->input->post('buyer_name'),
                'transaksi_total' => preg_replace('/,.*|[^0-9]/', '', $this->input->post('total')),
            ];
            // echo '<pre>';
            // print_r($data);
            // die;
            // echo '</pre>';
            $query = $this->db->insert('transaksi', $data);
            $transaksi_id = $this->db->insert_id();
            if ($query) {
                $id = $this->input->post('id');
                $name = $this->input->post('name');
                $price = $this->input->post('price');
                $qty = $this->input->post('qty');
                $seller_id = $this->input->post('seller_id');
                for ($i = 0; $i < count($id); $i++) {
                    $data = [
                        'transaksi_id' => $transaksi_id,
                        'product_id' => $id[$i],
                        'name' => $name[$i],
                        'harga' => $price[$i],
                        'jumlah' => $qty[$i],
                        'seller_id' => $seller_id[$i],
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

    public function bayar()
    {
        $data['title'] = 'Checkout';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_banner'] = $this->ibm->data_banner();
        $data['seller'] = $this->ibm->seller_only($this->input->post('seller_id'));
        $data['detail'] = $this->ibm->per_trans($this->input->post('id'));

        $this->form_validation->set_rules('buyer_name', 'Name', 'required|trim');
        $this->form_validation->set_rules('buyer_email', 'Email', 'required|trim');
        $this->form_validation->set_rules('buyer_bank', 'Bank', 'required|trim');
        $this->form_validation->set_rules('buyer_rekening', 'Rekening', 'required|trim');
        $this->form_validation->set_rules('buyer_telp', 'Telepon', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/buyer/header', $data);
            $this->load->view('templates/buyer/navbar', $data);
            $this->load->view('buyer/bayar', $data);
            $this->load->view('templates/buyer/footer', $data);
        } else {
            $where = $this->input->post('detail_id');
            $total = $this->input->post('totals');
            $tb['detail_transaksi'] = $this->db->get_where('detail_transaksi', ['detail_id' => $this->input->post('detail_id')])->row_array();

            $data = [
                'total' => preg_replace('/,.*|[^0-9]/', '', $total),
                'status' => 1,
                'tanggal' => date('Y-m-d H:i:s'),
            ];


            // cek jika ada gambar
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/admin/img/data/seller/upload_bukti/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';  //2MB max
                $config['max_width'] = '700'; // pixel
                $config['max_height'] = '700'; // pixel

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    //get gambar yang lama
                    $old_image = $tb['detail_transaksi']['image'];
                    if ($old_image != 'default.png') {
                        @unlink(FCPATH . 'assets/admin/img/data/seller/upload_bukti/' . $old_image);
                    }
                    //get gambar yang baru
                    $data = [
                        'total' => preg_replace('/,.*|[^0-9]/', '', $total),
                        'status' => 1,
                        'tanggal' => date('Y-m-d H:i:s'),
                        'image' => $this->upload->data('file_name'),
                    ];
                    $this->db->where('detail_id', $this->input->post('detail_id'));
                    $query = $this->db->update('detail_transaksi', $data);

                    if ($query) {
                        $data = [
                            'buyer_bank' => $this->input->post('buyer_bank'),
                            'buyer_rekening' => $this->input->post('buyer_rekening'),
                            'buyer_telp' => $this->input->post('buyer_telp'),
                            'seller_id' => $this->input->post('seller_id'),
                            'seller_name' => $this->input->post('seller_name'),
                            'seller_bank' => $this->input->post('seller_bank'),
                            'seller_rekening' => $this->input->post('seller_rekening'),
                            'status' => 1,
                            'transaksi_tanggal' => date('Y-m-d H:i:s'),
                        ];
                        $this->db->where('id', $where);
                        $this->db->update('transaksi', $data);

                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success" role="alert">
                            Pesanan Dikonfirmasi !
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
                        );
                        redirect('Buyer/checkout');
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-danger" role="alert">
                            Konfirmasi Gagal !
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
                        );
                        redirect('Buyer/checkout');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Ukuran melebihi batas. Maksimal 2MB dan dimensi 700 x 700 pixels
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('Buyer/checkout');
                }
            }
            // echo '<pre>';
            // print_r($data);
            // die;
            // echo '</pre>';

            $this->db->where('detail_id', $this->input->post('detail_id'));
            $query1 = $this->db->update('detail_transaksi', $data);



            if ($query1) {
                $data = [
                    'buyer_bank' => $this->input->post('buyer_bank'),
                    'buyer_rekening' => $this->input->post('buyer_rekening'),
                    'buyer_telp' => $this->input->post('buyer_telp'),
                    'seller_id' => $this->input->post('seller_id'),
                    'seller_name' => $this->input->post('seller_name'),
                    'seller_bank' => $this->input->post('seller_bank'),
                    'seller_rekening' => $this->input->post('seller_rekening'),
                    'status' => 1,
                    'transaksi_tanggal' => date('Y-m-d H:i:s'),
                ];
                $this->db->where('id', $where);
                $this->db->update('transaksi', $data);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                    Data berhasil di isi namun bukti belum di upload !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
                );
                redirect('Buyer/checkout');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                    Gagal di upload !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
                );
                redirect('Buyer/checkout');
            }
        }
    }

    public function batal_transaksi()
    {

        // $query = $this->db->get_where('detail_transaksi', ['transaksi_id' => $this->input->post('id')])->row_array();

        // $data = [
        //     'product_id' => $brg['product_id'],
        //     'name' => $brg['nama'],
        //     'jumlah' => $brg['jumlah'],
        // ];

        // echo '<pre>';
        // print_r($brg);
        // die;
        // echo '</pre>';

        // if ($query1) {
        // $this->db->where('product_id', $brg['product_id']);
        // $query2 = $this->db->delete('barang_masuk', $brg);

        $brg = $this->ibm->system_batal($this->input->post('id'));
        $query1 = $this->db->insert_batch('barang_masuk', $brg);

        if ($query1) {
            $this->db->empty_table('barang_masuk');
            $this->db->where('transaksi_id', $this->input->post('id'));
            $query2 = $this->db->delete('detail_transaksi');
            if ($query2) {
                $this->db->where('id', $this->input->post('id'));
                $query3 = $this->db->delete('transaksi');
                if ($query3) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk sukses batal
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('Buyer/checkout');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Produk gagal batal
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                    redirect('Buyer/checkout');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Produk gagal batal (main)
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                redirect('Buyer/checkout');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Produk gagal batal (detail)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Buyer/checkout');
        }
        // } else {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Produk gagal batal (brg-msk)
        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //     <span aria-hidden="true">&times;</span>
        //     </button>
        //     </div>');
        //     redirect('Buyer/checkout');
        // }

        // echo '<pre>';
        // print_r($query);
        // die;
        // echo '</pre>';
    }

    public function detail_transaksi($id)
    {
        $data['title'] = 'Detail Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_banner'] = $this->ibm->data_banner();
        $data['data_detail'] = $this->ibm->detail_trans($id);

        $this->load->view('templates/buyer/header', $data);
        $this->load->view('templates/buyer/navbar', $data);
        $this->load->view('buyer/detail_transaksi', $data);
        $this->load->view('templates/buyer/footer', $data);
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
