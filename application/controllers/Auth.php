<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    //Halaman Login
    public function index()
    {
        if ($this->session->userdata('email')) {
            //astagfirullah ternyata bisa digunain pas pakek form 403 Access Forbidden kodingan kek gini :(
            if ($this->session->userdata('role_id') == 1) {
                redirect('Admin');
            } elseif ($this->session->userdata('role_id') == 2) {
                redirect('Seller');
            } elseif ($this->session->userdata('role_id') == 3) {
                redirect('Buyer');
            }
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth/auth_footer', $data);
        } else {
            $this->_login();
        }
    }







    //fungsi login
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // echo '<pre>';
        // print_r($user);
        // die;
        // echo '</pre>';

        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek passwordnya
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('Admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('Seller');
                    } else {
                        redirect('Buyer');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">
                        Kata Sandi Salah !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                    );
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                    Email belum diaktifkan !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
                );
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">
                Email belum terdaftar !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
            );
            redirect('Auth');
        }
    }







    //Halaman Registrasi Admin
    public function registration_admin()
    {
        // ========================================
        if ($this->session->userdata('email')) {
            //astagfirullah ternyata bisa digunain pas pakek form 403 Access Forbidden kodingan kek gini :(
            if ($this->session->userdata('role_id') == 1) {
                redirect('Admin');
            } elseif ($this->session->userdata('role_id') == 2) {
                redirect('Seller');
            } elseif ($this->session->userdata('role_id') == 3) {
                redirect('Buyer');
            }
        }
        // ========================================

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => '%s sudah didaftarkan',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|min_length[6]|matches[password1]');
        $this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim|min_length[10]|max_length[14]|numeric');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar sebagai Admin';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('auth/registrasi_admin', $data);
            $this->load->view('templates/auth/auth_footer', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash(htmlspecialchars($this->input->post('password1')), PASSWORD_DEFAULT),
                'no_telp' => htmlspecialchars('62' . $this->input->post('no_telp')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time(),
            ];
            $true = $this->db->insert('user', $data);
            if ($true == true) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                    Akun anda sudah terdaftar sebagai admin!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
                );
                redirect('Auth');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                    Maaf Akun anda gagal didaftarkan !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
                );
                redirect('Auth/registration_admin');
            }
        }
    }







    //Halaman Registrasi Buyer
    public function registration()
    {
        // ========================================
        if ($this->session->userdata('email')) {
            //astagfirullah ternyata bisa digunain pas pakek form 403 Access Forbidden kodingan kek gini :(
            if ($this->session->userdata('role_id') == 1) {
                redirect('Admin');
            } elseif ($this->session->userdata('role_id') == 2) {
                redirect('Seller');
            } elseif ($this->session->userdata('role_id') == 3) {
                redirect('Buyer');
            }
        }
        // ========================================

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => '%s sudah didaftarkan',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|min_length[6]|matches[password1]');
        $this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim|min_length[10]|max_length[14]|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('auth/registrasi', $data);
            $this->load->view('templates/auth/auth_footer', $data);
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.png',
                'password' => password_hash(htmlspecialchars($this->input->post('password1')), PASSWORD_DEFAULT),
                'no_telp' => htmlspecialchars('62' . $this->input->post('no_telp')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'role_id' => 3,
                'is_active' => 0,
                'date_created' => time(),
            ];
            // siapkan tokenisasi
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time(),
            ];
            $true = $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);



            $this->_sendEmail($token, 'verify');



            if ($true == true) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                        Akun anda sudah terdaftar! Silahkan cek email (dibagian spam) untuk aktivasi akun
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('Auth');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                        Maaf Akun anda gagal didaftarkan !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('Auth/registration');
            }
        }
    }





    //Halaman Registrasi
    public function registration_seller()
    {
        // ========================================
        if ($this->session->userdata('email')) {
            //astagfirullah ternyata bisa digunain pas pakek form 403 Access Forbidden kodingan kek gini :(
            if ($this->session->userdata('role_id') == 1) {
                redirect('Admin');
            } elseif ($this->session->userdata('role_id') == 2) {
                redirect('Seller');
            } elseif ($this->session->userdata('role_id') == 3) {
                redirect('Buyer');
            }
        }
        // ========================================

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => '%s sudah didaftarkan',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|min_length[6]|matches[password1]');
        $this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim|min_length[10]|max_length[14]|numeric');
        $this->form_validation->set_rules('no_rekening', 'No Rekening', 'required|trim|numeric|min_length[6]');
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar sebagai Penjual';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('auth/registrasi_seller', $data);
            $this->load->view('templates/auth/auth_footer', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash(htmlspecialchars($this->input->post('password1')), PASSWORD_DEFAULT),
                'no_telp' => htmlspecialchars('62' . $this->input->post('no_telp')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time(),
                'no_rekening' => htmlspecialchars($this->input->post('no_rekening')),
                'nama_bank' => htmlspecialchars($this->input->post('nama_bank')),
            ];
            $true = $this->db->insert('user', $data);
            if ($true == true) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                    Akun anda sudah terdaftar sebagai penjual!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
                );
                redirect('Auth');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                    Maaf Akun anda gagal didaftarkan !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
                );
                redirect('Auth/registration_seller');
            }
        }
    }






    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'aglonemayuana@gmail.com',
            'smtp_pass' => 'asfsffewrwareqrqr123242143432#$%$#@#$#%#$%',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);

        $this->email->initialize($config);
        $this->email->from('aglonemayuana@gmail.com', 'Aglonema Company');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link berikut untuk verifikasi akun anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan akun anda sekarang sebelum 24 jam</a>');
        } elseif ($type == 'forgot') {
            $this->email->subject('Atur Ulang Kata Sandi');
            $this->email->message('Klik link berikut untuk mengatur ulang kata sandi : <a href="' . base_url() . 'auth/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Atur ulang kata sandi anda sebelum 24 jam</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }





    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Akun anda telah aktif<br>Mohon login!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>        
                    </div>');
                    redirect('Auth');
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token aktivasi anda telah kadaluarsa!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>        
                    </div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token aktivasi anda tidak valid!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>        
                </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal, Email salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>        
            </div>');
            redirect('Auth');
        }
    }






    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => '%s tidak boleh kosong',
            'valid_email' => '%s Tidak valid karena tidak sesuai format email !',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lupa Kata Sandi';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('templates/auth/auth_footer', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time(),
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tolong check email anda untuk mengatur ulang kata sandi!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                </div>');
                redirect('Auth/forgot_password');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar atau belum teraktivasi
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                </div>');
                redirect('Auth/forgot_password');
            }
        }
    }





    public function reset_password()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->db->delete('user_token', ['email' => $email]);
                $this->session->set_userdata('reset_email', $email);
                $this->change_password();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Atur ulang kata sandi gagal, Token anda salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Atur ulang kata sandi gagal, Email anda salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                </div>');
            redirect('Auth');
        }
    }





    public function change_password()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('Auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
            'required' => '%s tidak boleh kosong',
            'matches' => '%s tidak sama dengan Konfirm Password !',
            'min_length' => '%s singkat minimal 6 karakter !',
        ]);
        $this->form_validation->set_rules('password2', 'Konfirm Password', 'trim|required|min_length[6]|matches[password1]', [
            'required' => '%s tidak boleh kosong',
            'matches' => '%s tidak sama dengan Password !',
            'min_length' => '%s singkat minimal 6 karakter !',
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Kata Sandi';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('auth/change_password');
            $this->load->view('templates/auth/auth_footer', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata sandi telah berhasil diganti, Mohon login!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                </div>');
            redirect('Auth');
        }
    }





    //untuk logout
    public function logout()
    {
        // $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
            Berhasil logout!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>'
        );
        redirect('Auth');
    }
}
