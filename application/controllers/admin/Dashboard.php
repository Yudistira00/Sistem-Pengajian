<?php

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Dashboard";
        $pegawai = $this->db->query("SELECT * FROM data_pegawai");
        $admin = $this->db->query("SELECT * FROM data_pegawai WHERE jabatan = 'Admin'");
        $jabatan = $this->db->query("SELECT * FROM data_jabatan");
        $kehadiran = $this->db->query("SELECT * FROM data_kehadiran");
        $data['pegawai']=$pegawai->num_rows();
        $data['Admin']=$admin->num_rows();
        $data['jabatan']=$jabatan->num_rows();
        $data['kehadiran']=$kehadiran->num_rows();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}
// <?php echo $Admin ?>