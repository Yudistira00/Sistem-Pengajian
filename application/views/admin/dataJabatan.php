<!-- Content wrapper -->
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data </span> / <?php echo $title ?></h4>
        <a href="<?= base_url('admin/dataJabatan/tambahData') ?>" type="button" class="btn btn-primary mb-2"> + Add New</a>
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Tj. Transport</th>
                        <th>Uang Makan</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                </tbody>
                <?php $no = 1;
                foreach ($jabatan as $j) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $j->nama_jabatan ?></td>
                        <td>Rp. <?php echo number_format($j->gaji_pokok, 0, ',', '.') ?></td>
                        <td>Rp. <?php echo number_format($j->tj_transport, 0, ',', '.') ?></td>
                        <td>Rp. <?php echo number_format($j->uang_makan, 0, ',', '.') ?></td>
                        <td>Rp. <?php echo number_format($j->gaji_pokok + $j->tj_transport + $j->uang_makan, 0, ',', '.') ?></td>
                        <td>
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= base_url('admin/dataJabatan/updateData/' . $j->id_jabatan) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a onclick="return confirm('Mau Di Apus ???')" class="dropdown-item" href="<?= base_url('admin/dataJabatan/deleteData/' . $j->id_jabatan) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>

                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    </div>





    <!-- Bootstrap Dark Table -->

    <!--/ Bootstrap Dark Table -->

</div>