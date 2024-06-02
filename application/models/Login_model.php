<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database('aplikasiabsensi');
    }

    public function check_user($email, $password)
    {

        $str = "SELECT * FROM user WHERE email='$email'";
        // $strP = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $data = $this->db->query($str)->row();
        // $dataP = $this->db->query($strP)->row();
        if ($data) {
            // return 'email ditemukan';
            if ($data->password == $password) {
                return $data->role;
            } else {
                $error = "<span style='color:red'>Masukkan Email dan password yang benar!!</span>";
                $this->session->set_flashdata('message', $error);
                // echo 'kasi masuk email nu anu';
                redirect('login');
            }
        } else {
            $no_email = "<span style='color:red'>Email anda <br>tidak terdaftar dalam sistem!!</span>";
            $this->session->set_flashdata('message', $no_email);
            // echo 'kasi masuk email nu anu';
            redirect('login');
        }
    }
}
