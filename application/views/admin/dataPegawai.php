<!-- Content wrapper -->
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data </span> / <?php echo $title ?></h4>
        <a href="<?= base_url('admin/dataPegawai/tambahData') ?>" type="button" class="btn btn-primary mb-2"> + Tambah Pegawai</a>
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="tab-content doc-example-content" id="tab-tabContent" data-label="Example">
            <div class="tab-pane fade show active" id="table-striped-preview" role="tabpanel" aria-labelledby="table-striped-preview-tab">
                <!-- <div class="content"> -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nik</th>
                                    <th>Nama Pegawai</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jabatan</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Status</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            <tbody class="table-border-bottom-0 ">

                                <?php $no = 1;
                                foreach ($pegawai as $p) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $p->nik ?></td>
                                        <td><?php echo $p->nama_pegawai ?></td>
                                        <td><?php echo $p->jenis_kelamin ?></td>
                                        <td><?php echo $p->jabatan ?></td>
                                        <td><?php echo $p->tanggal_masuk ?></td>
                                        <td><?php echo $p->status ?></td>
                                        <td><img src="<?= base_url() . 'assets/foto/' . $p->foto ?>" alt=""></td>
                                        <td>
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?= base_url('admin/dataPegawai/updateData/' . $p->id_pegawai) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a onclick="return confirm('Mau Di Apus ???')" class="dropdown-item" href="<?= base_url('admin/dataPegawai/deleteData/' . $p->id_pegawai) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                            </div>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </thead>

                            </tbody>

                        </table>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>



</div>


<!-- lanjut di menit 33:36 -->