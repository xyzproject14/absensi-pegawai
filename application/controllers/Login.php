<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    // public $harian;
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Login_model');
    }

    public function index()
    {
        // $this->Absensi = new Absensi();
        $model = $this->Login_model;

        $this->session->unset_userdata('role_id');

        $this->load->view('login_view');
    }

    public function login()
    {
        $model = $this->Login_model;

        $email = $_POST['email'];
        $password = $_POST['password'];
        $cek_email = $model->check_user($email, $password);

        // echo $cek_email;
        if ($cek_email) {
            // echo 'masuk pak eko';
            $data_session = ['role_id' => $cek_email];
            $this->session->set_userdata($data_session);
            $this->_login($cek_email);
        } else {
            $error = "<span style='color:red'>Masukkan Email dan password yang benar!!</span>";
            $this->session->set_flashdata('message', $error);
            // echo 'kasi masuk email nu anu';
            redirect('login');
        }
    }

    private function _login($cek_email)
    {
        if ($cek_email == 1) {
            redirect('rekap');
        } elseif ($cek_email == 2 || $cek_email == 4 || $cek_email == 5) {
            redirect('absen_jam');
        } elseif ($cek_email == 3) {
            redirect('absensi');
        } else {
            echo 'email salah';
            echo $cek_email;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('role_id');
        redirect('login');
    }
}
