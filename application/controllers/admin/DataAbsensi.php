<?php

class DataAbsensi extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Data Absensi Pegawai";

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }


        $data['absensi'] = $this->db->query("SELECT data_kehadiran.*,
        data_pegawai.nama_pegawai, data_pegawai.jenis_kelamin, data_pegawai.jabatan
        FROM data_kehadiran 
        INNER JOIN data_pegawai ON data_kehadiran.nik=data_pegawai.nik
        INNER JOIN data_jabatan ON data_pegawai.jabatan=data_jabatan.nama_jabatan
        WHERE data_kehadiran.bulan='$bulantahun'
        ORDER BY data_pegawai.nama_pegawai ASC")->result();

        // var_dump($data1);
        // die();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function inputAbsensi()
    {
        if($this->input->post('submit', TRUE) == 'submit'){
            $post = $this->input->post();
            foreach ($post as $key => $value ){
                if($post['bulan'][$key] !='' || $post['nik'][$key] !='')
                {
                    $simpan[] = array(
                        'bulan'         => $post['bulan'][$key],
                        'nik'           => $post['nik'][$key],
                        'nama_pegawai'  => $post['nama_pegawai'][$key],
                        'jenis_kelamin' => $post['jenis_kelamin'][$key],
                        'nama_jabatan'  => $post['nama_jabatan'][$key],
                        'hadir'         => $post['hadir'][$key],
                        'sakit'         => $post['sakit'][$key],
                        'alpa'          => $post['alpa'][$key],
                        

                    );
                }
            }
        } 



        $data['title'] = "Form Input Absensi";
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }
        $data['input_absensi'] = $this->db->query("SELECT data_pegawai.*, data_jabatan.nama_jabatan FROM data_pegawai
        INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan
        WHERE NOT EXISTS (SELECT * FROM data_kehadiran WHERE bulan='$bulantahun' AND data_pegawai.nik=data_kehadiran.nik) ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formInputAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }
}
