<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data </span> / <?php echo $title ?></h4>

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Tambah Data Pegawai</h5>
                <!-- <small class="text-muted float-end">Merged input group</small> -->
            </div>
            <!-- Basic with Icons  enctype="multipart/form-data" -->
            <div class="card-body">
                <form method="POST" action="<?= base_url('admin/dataPegawai/tambahDataAksi/') ?>" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">NIK</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bx-face'></i></span>
                                <input name="nik" type="text" class="form-control" id="basic-icon-default-fullname" aria-describedby="basic-icon-default-fullname2" />
                            </div>
                            <?php echo form_error('nik', '<div class="text-small text-danger"></div>') ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Pegawai</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input name="nama_pegawai" type="text" class="form-control" id="basic-icon-default-fullname" aria-describedby="basic-icon-default-fullname2" />
                            </div>
                            <?php echo form_error('nama_pegawai', '<div class="text-small text-danger"></div>') ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <!-- <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bx-face'></i></span> -->
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select name="jenis_kelamin" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>

                            </select>
                            <?php echo form_error('jenis_kelamin', '<div class="text-small text-danger"></div>') ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Jabatan</label>
                        <div class="col-sm-10">
                            <select name="jabatan" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option selected>Pilih Jabatan</option>
                                <?php foreach ($jabatan as $j) : ?>
                                    <option value="<?php echo $j->nama_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                                <?php endforeach; ?>

                            </select>
                            <?php echo form_error('jabatan', '<div class="text-small text-danger"></div>') ?>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tanggal Masuk</label>

                        <div class="col-md-10">
                            <input name="tanggal_masuk" class="form-control" type="date" value="2021-06-18" id="html5-date-input" />

                        </div>
                        <?php echo form_error('tanggal_masuk', '<div class="text-small text-danger"></div>') ?>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Status</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option selected>Pilih Status Pegawai</option>
                                <option value="Pegawai Tetap">Pegawai Tetap</option>
                                <option value="Pegawai Kontrak">Pegawai Kontrak</option>

                            </select>
                            <?php echo form_error('tanggal_masuk', '<div class="text-small text-danger"></div>') ?>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Foto</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <!-- <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span> -->
                                <input type="file" name="foto"  class="form-control"/>

                            </div>

                        </div>

                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>





<!-- Bootstrap Dark Table -->

<!--/ Bootstrap Dark Table -->