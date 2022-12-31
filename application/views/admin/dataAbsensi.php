<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data </span> / <?php echo $title ?></h4>
        <!-- <a href="<?= base_url('admin/dataJabatan/tambahData') ?>" type="button" class="btn btn-primary mb-2"> + Add New</a> -->
        <?php echo $this->session->flashdata('pesan') ?>

        <div class="card mb-3 ">

            <div class="card-header bg-primary text-white ">
                Filter Data Absensi
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
                            <button type="submit" class="btn btn-primary mr-5"><i class="fas fa-eye"></i>Tampilkan Data</button>
                            <!-- <button type="submit" class="btn btn-success mr-5"><i class="fas fa-aye"></i>+ Input Kehadiran</button> -->
                            <a href="<?= base_url('admin/dataAbsensi/inputAbsensi') ?>" class="btn btn-success mr-5" ><i class="fas fa-aye"></i>+ Input Kehadiran</a>
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
                        <?php
                        $jml_data = count($absensi);
                        if ($jml_data > 0) { ?>

                            <div class="content-wrapper">
                                <div class="container-xxl flex-grow-1 container-p-y">
                                    <div class="tab-content doc-example-content" id="tab-tabContent" data-label="Example">
                                        <div class="tab-pane fade show active" id="table-striped-preview" role="tabpanel" aria-labelledby="table-striped-preview-tab">
                                            <!-- <div class="content"> -->

                                            <div class="table-responsive">

                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Nik</th>
                                                            <th class="text-center">Nama Pegawai</th>
                                                            <th class="text-center">Jenis Kelamin</th>
                                                            <th class="text-center">Jabatan</th>
                                                            <th class="text-center">Hadir</th>
                                                            <th class="text-center">Sakit</th>
                                                            <th class="text-center">Alpa</th>
                                                        </tr>
                                                    <tbody class="table-border-bottom-0 ">

                                                        <?php $no = 1;
                                                        foreach ($absensi as $a) : ?>
                                                            <tr>
                                                                <td><?php echo $no++ ?></td>
                                                                <td><?php echo $a->nik ?></td>
                                                                <td><?php echo $a->nama_pegawai ?></td>
                                                                <td><?php echo $a->jenis_kelamin ?></td>
                                                                <td><?php echo $a->jabatan ?></td>
                                                                <td><?php echo $a->hadir ?></td>
                                                                <td><?php echo $a->sakit ?></td>
                                                                <td><?php echo $a->alpa ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>


                                                    </tbody>
                                                    </thead>
                                                </table>
                                            <?php } else { ?>
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Problem !!! :)</h6>
                                                    <p class="mb-0">Data masih kosong, silahkan input data kehadiran</p>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                    </button>
                                                </div>
                                            <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>