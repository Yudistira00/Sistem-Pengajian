<?php
class dataPegawai extends CI_Controller
{

  public function index()
  {
    $data['title'] = "Data Pegawai";
    $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/dataPegawai', $data);
    $this->load->view('templates_admin/footer');
  }
  public function tambahData()
  {
    $data['title'] = "Tambah Data Pegawai";
    $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/tabahDataPegawai', $data);
    $this->load->view('templates_admin/footer');
  }




  public function tambahDataAksi()
  {

    $this->_rules();
    if($this->form_validation->run() == FALSE) {
      $this->tambahData();
    } else {
      $nik             = $this->input->post('nik');
      $nama_pegawai    = $this->input->post('nama_pegawai');
      $jenis_kelamin   = $this->input->post('jenis_kelamin');
      $tanggal_masuk   = $this->input->post('tanggal_masuk');
      $jabatan         = $this->input->post('jabatan');
      $status          = $this->input->post('status');
      $foto            = $_FILES['foto']['name'];
      if($foto=''){}else{
        $config ['upload_path']  = './assets/foto/';
        $config ['allowed_types'] =  'jpg|jpeg|png|tiff';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
          echo "Foto Gagal Di Upload";
        } else {
          $foto = $this->upload->data('file_name');
        }
      }

      $data = array(
        'nik'              => $nik,
        'nama_pegawai'     => $nama_pegawai,
        'jenis_kelamin'    => $jenis_kelamin,
        'jabatan'          => $jabatan,
        'tanggal_masuk'    => $tanggal_masuk,
        'status'           => $status,
        'foto'             => $foto,

      );

      $this->penggajianModel->insert_data($data, 'data_pegawai');
      $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible" role="alert">
      This is a primary dismissible alert — check it out!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>');
      redirect('admin/dataPegawai');
    }
  }

  public function updateData($id)
  {
    $where = array('id_pegawai' => $id); 
    $data['title'] = 'Update Data Pegawai';
    $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
    $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/UpdateDataPegawai', $data);
    $this->load->view('templates_admin/footer');
  }

  public function updateDataAksi()
  {

    $this->_rules();
    if($this->form_validation->run() == FALSE) {
      $this->updateData();
    } else {
      $id             = $this->input->post('id_pegawai');
      $nik             = $this->input->post('nik');
      $nama_pegawai    = $this->input->post('nama_pegawai');
      $jenis_kelamin   = $this->input->post('jenis_kelamin');
      $tanggal_masuk   = $this->input->post('tanggal_masuk');
      $jabatan         = $this->input->post('jabatan');
      $status          = $this->input->post('status');
      $foto            = $_FILES['foto']['name'];
      if($foto){
        $config ['upload_path']  = './assets/foto/';
        $config ['allowed_types'] =  'jpg|jpeg|png|tiff';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
          $foto = $this->upload->data('file_name');
          $this->db->set('foto', $foto);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $data = array(
        'nik'              => $nik,
        'nama_pegawai'     => $nama_pegawai,
        'jenis_kelamin'    => $jenis_kelamin,
        'jabatan'          => $jabatan,
        'tanggal_masuk'    => $tanggal_masuk,
        'status'           => $status,
  

      );

      $where = array(
        'id_pegawai' => $id
      );

      $this->penggajianModel->update_data('data_pegawai', $data, $where);
      $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible" role="alert">
      This is a primary dismissible alert — check it out!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>');
      redirect('admin/dataPegawai');
    }
  }



  

  public function _rules()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

    }


public function deleteData($id)
    {
        $where = array('id_pegawai' => $id);
        $this->penggajianModel->delete_data($where, 'data_pegawai');
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible" role="alert">
            This is a primary dismissible alert — check it out!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
          </div>');
            redirect('admin/datapegawai');
    }
  }

// LANJUT DI MENIT 47:48