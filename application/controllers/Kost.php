<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kost extends CI_Controller
{
    public function __construct()    ///fungsi pertama kali dijalankan saat controler ini di akses
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Kost';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // var_dump($data['user']['id']);
        // die;

        $data['nama'] = $this->db->get_where('data_kost')->result_array();

        //menampilkan data user menu di tabel menu manajemen, dengan menggunakan fungsi result_array(); karena data bnyak. kalau misal hnya sebaris saja menggunakan row_array();
        $kost = $this->db->get_where('data_kost', ['user_id' => $data['user']['id']])->result_array();
        if ($data['user']['role_id'] == 1) {
            $kost = $this->db->get_where('data_kost')->result_array();
        }


        $this->form_validation->set_rules('nama', 'nama', 'required');        // 'menu' disini harus sesuai dengan 'name=menu' di kotak form tambah menu
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('fasilitas', 'fasilitas');
        $this->form_validation->set_rules('alamat', 'alamat');
        $this->form_validation->set_rules('no_telepon', 'no_telepon');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kost/index', compact("data", "kost"));    // biar bisa parsing(ambil) data banyak
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $fasilitas = $this->input->post('fasilitas');
            $alamat = $this->input->post('alamat');
            $no_telepon = $this->input->post('no_telepon');
            $lokasi = $this->input->post('lokasi');

            $upload_kost = $_FILES['kost']['name'];

            if ($upload_kost) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '6144';  /// 6144 = seukuran 6 mb
                $config['upload_path'] = './assets/img/kost/';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('kost')) {

                    $new_image = $this->upload->data('file_name');     /// untuk upload/ubah gambar profil
                    $this->db->set('kost', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('kost');
                }
            }

            $upload_kamar = $_FILES['kamar']['name'];

            if ($upload_kamar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '6144';  /// 6144 = seukuran 6 mb
                $config['upload_path'] = './assets/img/kamar/';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('kamar')) {

                    $new_image = $this->upload->data('file_name');     /// untuk upload/ubah gambar profil
                    $this->db->set('kamar', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('kost');
                }
            }

            $upload_toilet = $_FILES['toilet']['name'];

            if ($upload_toilet) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '6144';  /// 6144 = seukuran 6 mb
                $config['upload_path'] = './assets/img/toilet/';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('toilet')) {

                    $new_image = $this->upload->data('file_name');     /// untuk upload/ubah gambar profil
                    $this->db->set('toilet', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('kost');
                }
            }

            $upload_kamar2 = $_FILES['kamar2']['name'];

            if ($upload_kamar2) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '6144';  /// 6144 = seukuran 6 mb
                $config['upload_path'] = './assets/img/kamar2/';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('kamar2')) {

                    $new_image = $this->upload->data('file_name');     /// untuk upload/ubah gambar profil
                    $this->db->set('kamar2', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('kost');
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('harga', $harga);
            $this->db->set('fasilitas', $fasilitas);
            $this->db->set('alamat', $alamat);
            $this->db->set('no_telepon', $no_telepon);
            $this->db->set('lokasi', $lokasi);
            $this->db->set("user_id", $data["user"]["id"]);
            $this->db->insert('data_kost');


            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert">Data Kost Berhasil Di Tambahkan !</div>');

            redirect('kost');
        }
    }



    public function edit($id)
    {
        $data['title'] = 'Edit Data Kost';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $kost = $this->db->get_where('data_kost', ['id' => $id])->result_array();
        $data["kost"] = $kost[0];

        // die;
        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kost/edit', compact("data", "kost"));
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $fasilitas = $this->input->post('fasilitas');
            $alamat = $this->input->post('alamat');
            $no_telepon = $this->input->post('no_telepon');
            $lokasi = $this->input->post('lokasi');

            $upload_kost = $_FILES['kost']['name'];

            if ($upload_kost) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '6144';  /// 6144 = seukuran 6 mb
                $config['upload_path'] = './assets/img/kost/';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('kost')) {
                    $old_kost = $data['kost']['kost'];    /// untuk hapus gambar lama ketika gambar baru di upload
                    if ($old_kost != 'sktm.jpeg') {
                        unlink(FCPATH . 'assets/img/kost/' . $old_kost);
                    }

                    $new_image = $this->upload->data('file_name');     /// untuk upload/ubah gambar profil
                    $this->db->set('kost', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('kost');
                }
            }

            $upload_kamar = $_FILES['kamar']['name'];

            if ($upload_kamar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '6144';  /// 6144 = seukuran 6 mb
                $config['upload_path'] = './assets/img/kamar/';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('kamar')) {
                    $old_kamar = $data['kost']['kamar'];    /// untuk hapus gambar lama ketika gambar baru di upload
                    if ($old_kamar != 'sktmb.jpeg') {
                        unlink(FCPATH . 'assets/img/kamar/' . $old_kamar);
                    }

                    $new_image = $this->upload->data('file_name');     /// untuk upload/ubah gambar profil
                    $this->db->set('kamar', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('kost');
                }
            }

            $upload_toilet = $_FILES['toilet']['name'];

            if ($upload_toilet) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '6144';  /// 6144 = seukuran 6 mb
                $config['upload_path'] = './assets/img/toilet/';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('toilet')) {
                    $old_toilet = $data['kost']['toilet'];    /// untuk hapus gambar lama ketika gambar baru di upload
                    if ($old_toilet != 'sktmb.jpeg') {
                        unlink(FCPATH . 'assets/img/toilet/' . $old_toilet);
                    }

                    $new_image = $this->upload->data('file_name');     /// untuk upload/ubah gambar profil
                    $this->db->set('toilet', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('kost');
                }
            }

            $upload_kamar2 = $_FILES['kamar2']['name'];

            if ($upload_kamar2) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '6144';  /// 6144 = seukuran 6 mb
                $config['upload_path'] = './assets/img/kamar2/';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('kamar2')) {
                    $old_kamar2 = $data['kost']['kamar2'];    /// untuk hapus gambar lama ketika gambar baru di upload
                    if ($old_kamar2 != 'sktmb.jpeg') {
                        unlink(FCPATH . 'assets/img/kamar2/' . $old_kamar2);
                    }

                    $new_image = $this->upload->data('file_name');     /// untuk upload/ubah gambar profil
                    $this->db->set('kamar2', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('kost');
                }
            }


            $this->db->set('nama', $nama);
            $this->db->set('harga', $harga);
            $this->db->set('fasilitas', $fasilitas);
            $this->db->set('alamat', $alamat);
            $this->db->set('no_telepon', $no_telepon);
            $this->db->set('lokasi', $lokasi);
            $this->db->where('id', $id);
            $this->db->update('data_kost');


            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert">Data Kost Berhasil Di Ubah !</div>');

            redirect('kost');
        }
    }




    public function hapus($id)
    {
        $kost = $this->db->get_where('data_kost', ['id' => $id])->result_array()[0];
        $this->db->where('id', $id);

        unlink(FCPATH . 'assets/img/kost/' . $kost['kost']);
        unlink(FCPATH . 'assets/img/kamar/' .  $kost['kamar']);
        unlink(FCPATH . 'assets/img/toilet/' . $kost['toilet']);
        unlink(FCPATH . 'assets/img/kamar2/' . $kost['kamar2']);

        $this->db->delete('data_kost');
        $this->session->set_flashdata('message', '<div class="alert 
                alert-success" role="alert">Data Kost Berhasil Dihapus ! </div>');
        redirect('kost');
    }
}
