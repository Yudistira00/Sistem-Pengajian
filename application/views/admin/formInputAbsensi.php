<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data </span> / <?php echo $title ?></h4>
        <!-- <a href="<?= base_url('admin/dataJabatan/tambahData') ?>" type="button" class="btn btn-primary mb-2"> + Add New</a> -->
        <?php echo $this->session->flashdata('pesan') ?>

        <div class="card mb-3 ">

            <div class="card-header bg-primary text-white ">
                Input Absensi Pegawai
            </div>
            <br>

            <div class="card-body">
                <form class="form-inline">
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="inputPassword2">Bulan :</label>
                            <select class="form-control " name="bulan" id="">
                                <option value="">---Pilih Bulan---</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group  col-3">
                            <label for="inputPassword2">Tahun :</label>
                            <select class="form-control" name="tahun" id="">
                                <option value="">Pilih Tahun</option>
                                <?php $tahun = date('Y');
                                for ($i = 2022; $i < $tahun + 5; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-5 mt-4 ">
                            <button type="submit" class="btn btn-primary mr-5"><i class="fas fa-eye"></i>Generate</button>

                        </div>

                    </div>
                </form>
            </div>



        </div>
        <?php
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('y');
            $bulantahun = $bulan . $tahun;
        }

        ?>
        <!-- <div class=" alert alert-info">
                                Menampilkan data Kehadiran Pegawai Bulan: <span class="font-wight-bold"></span><?php echo $bulan ?> Tahun: <span class="font-wight-bold"></span><?php echo $tahun ?>
                        </div> -->

        <div class="alert alert-primary alert-dismissible" role="alert">
            <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Well done :)</h6>
            <p class="mb-0"> Menampilkan data Kehadiran Pegawai Bulan: <span class="font-wight-bold"></span><?php echo $bulan ?> Tahun: <span class="font-wight-bold"></span><?php echo $tahun ?></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>


        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="tab-content doc-example-content" id="tab-tabContent" data-label="Example">
                    <div class="tab-pane fade show active" id="table-striped-preview" role="tabpanel" aria-labelledby="table-striped-preview-tab">
                        <!-- <div class="content"> -->

                        <div class="table-responsive">
                            <form method="POST">
                                <button type="submit" name="submit" class="btn btn-primary mb-3"><i class="fas fa-eye"></i>Simpan</button>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nik</th>
                                            <th class="text-center">Nama Pegawai</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th class="text-center">Jabatan</th>
                                            <th class="text-center" width="10%">Hadir</th>
                                            <th class="text-center" width="10%">Sakit</th>
                                            <th class="text-center" width="10%">Alpa</th>
                                        </tr>
                                    <tbody class="table-border-bottom-0 ">

                                        <?php $no = 1;
                                        foreach ($input_absensi as $a) : ?>
                                            <tr>
                                            <input type="hidden" name="bulan[]" class="form-control" value="<?php echo $bulantahun ?>">
                                            <input type="hidden" name="nik[]" class="form-control" value="<?php echo $a->nik ?>">
                                            <input type="hidden" name="nama_pegawai[]" class="form-control" value="<?php echo $a->nama_pegawai ?>">
                                            <input type="hidden" name="jenis_kelamin[]" class="form-control" value="<?php echo $a->jenis_kelamin ?>">
                                            <input type="hidden" name="nama_jabatan[]" class="form-control" value="<?php echo $a->nama_jabatan ?>">
                                           
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $a->nik ?></td>
                                                <td><?php echo $a->nama_pegawai ?></td>
                                                <td><?php echo $a->jenis_kelamin ?></td>
                                                <td><?php echo $a->jabatan ?></td>
                                                <td><input type="number" name="hadir[]" class="form-control" value="0"></td>
                                                <td><input type="number" name="sakit[]" class="form-control" value="0"></td>
                                                <td><input type="number" name="alpa[]" class="form-control" value="0"></td>
                                            </tr>
                                        <?php endforeach; ?>


                                    </tbody>
                                    </thead>
                                </table>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>