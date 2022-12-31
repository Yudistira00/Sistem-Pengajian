<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data </span> / <?php echo $title ?></h4>

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Basic with Icons</h5>
                <small class="text-muted float-end">Merged input group</small>
            </div>
            <!-- Basic with Icons -->
            <div class="card-body">
                <?php foreach ($jabatan as $j): ?>
                <form method="POST" action="<?= base_url('admin/dataJabatan/updateDataAksi/') ?>">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Jabatan</label>

                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <!-- <input name="nama_jabatan" type="text" class="form-control" id="basic-icon-default-fullname" aria-describedby="basic-icon-default-fullname2" /> -->
                                <input required name="id_jabatan" type="hidden" class="form-control" value="<?php echo $j->id_jabatan?>" id="basic-icon-default-fullname" aria-describedby="basic-icon-default-fullname2" />
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                
                                <input name="nama_jabatan" type="text" class="form-control" value="<?php echo $j->nama_jabatan?>" id="basic-icon-default-fullname" aria-describedby="basic-icon-default-fullname2" />

                            </div>
                            <?php echo form_error('nama_jabatan', '<div class="text-small text-danger"></div>') ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Gaji Pokok</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input name="gaji_pokok" type="number" class="form-control" value="<?php echo $j->gaji_pokok?>" id="basic-icon-default-fullname" aria-describedby="basic-icon-default-fullname2" />

                            </div>
                            <?php echo form_error('gaji_pokok', '<div class="text-small text-danger"></div>') ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tunjangan Transport</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input name="tj_transport" type="number" class="form-control" value="<?php echo $j->tj_transport?>" id="basic-icon-default-fullname" aria-describedby="basic-icon-default-fullname2" />

                            </div>
                            <?php echo form_error('tj_transport', '<div class="text-small text-danger"></div>') ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Uang Makan</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input name="uang_makan" type="number" class="form-control" value="<?php echo $j->uang_makan?>" id="basic-icon-default-fullname" aria-describedby="basic-icon-default-fullname2" />

                            </div>
                            <?php echo form_error('uang_makan', '<div class="text-small text-danger"></div>') ?>
                        </div>

                    </div>
                    
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                <?php endforeach ?>
            </div>
        </div>
    </div>

</div>





<!-- Bootstrap Dark Table -->

<!--/ Bootstrap Dark Table -->