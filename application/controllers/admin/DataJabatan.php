<?php

class DataJabatan extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')
            ->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataJabatan', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahData()
    {
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataJabatan', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahDataAksi()
    {

        $this->_rules();
        if ($this->form_validation->run() == FALSE) {

            $this->tambahData();
        } else {
            $nama_jabatan   = $this->input->post('nama_jabatan');
            $gaji_pokok     = $this->input->post('gaji_pokok');
            $tj_transport   = $this->input->post('tj_transport');
            $uang_makan     = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan'  => $nama_jabatan,
                'gaji_pokok'    => $gaji_pokok,
                'tj_transport'  => $tj_transport,
                'uang_makan'    => $uang_makan,
            );

            $this->penggajianModel->insert_data($data, 'data_jabatan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible" role="alert">
            This is a primary dismissible alert — check it out!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
          </div>');
            redirect('admin/dataJabatan');
        }
    }



    //--------------Function Update----------------------
    public function updateData($id)
    {
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan='$id'")->result();
        $data['title'] = "Edit Data Jabatan";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataJabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {

        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->updateData();
        } else {
            $id   = $this->input->post('id_jabatan');
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok     = $this->input->post('gaji_pokok');
            $tj_transport   = $this->input->post('tj_transport');
            $uang_makan     = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan'  => $nama_jabatan,
                'gaji_pokok'    => $gaji_pokok,
                'tj_transport'  => $tj_transport,
                'uang_makan'    => $uang_makan,
            );

            $where = array(
                'id_jabatan' => $id

            );

            $this->penggajianModel->update_data('data_jabatan', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible" role="alert">
            This is a primary dismissible alert — check it out!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
          </div>');
            redirect('admin/dataJabatan');
        }
    }



    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan', 'nama jabatan', 'required');
        $this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'required');
        $this->form_validation->set_rules('tj_transport', 'tj transport', 'required');
        $this->form_validation->set_rules('uang_makan', 'uang makan', 'required');
    }


    //Hapus data///

    public function deleteData($id)
    {
        $where = array('id_jabatan' => $id);
        $this->penggajianModel->delete_data($where, 'data_jabatan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible" role="alert">
            This is a primary dismissible alert — check it out!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
          </div>');
            redirect('admin/dataJabatan');
    }
}


//lanjut coding di menit 30:09 
