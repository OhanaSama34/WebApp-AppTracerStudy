<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>


    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3 class="text-dark">Edit Data Alumni</h3>
                    <p class="text-subtitle text-muted">Always update your alumni data every month</p>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">

                <br>
                <a href="<?= site_url('my_profile/index') ?>"><i class="btn-lg bi bi-arrow-left bi-middle"></i></a>


                <h4 class="card-title text-center text-dark"><b>Update Your Graduation Data</b></h4>

                <div class="card-body">
                    <form method="POST" action="<?= site_url('my_profile/edit_alumni') ?>">
                        <div class="form-group">
                            <label>Status</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="status" name="status" value="<?= $userdata['status_alumni']; ?>">
                                    <option><?= $userdata['status_alumni']; ?></option>
                                    <option>Bekerja</option>
                                    <option>Wirausaha</option>
                                    <option>Belum Bekerja</option>
                                    <option>Kuliah</option>

                                </select>
                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>') ?>
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <label>Tahun Lulus</label>
                            <input type="number" class="form-control" id="tahunlulus" name="tahunlulus"  value="<?= $userdata['tahun_lulus']; ?>">
                            <?= form_error('tahunlulus', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="jurusan" name="jurusan" value="<?= $userdata['jurusan']; ?>">
                                    <option><?= $userdata['jurusan']; ?></option>
                                    <option>IPA</option>
                                    <option>IPS</option>
                                </select>
                                <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>') ?>
                            </fieldset>
                        </div>

                        <div class="container">
                            <hr>
                        </div>

                        <h6>Nama Tempat</h6>
                        <p>*Isikan nama institusi dimana anda Kuliah/Bekerja/Wirausaha, jika belum bekerja isikan "-"</p>
                        <div class="form-group mb-2 ">
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $userdata['nama_institusi']; ?>">
                            <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <h6>Bidang</h6>
                        <p>*Isikan bidang institusi tempat Bekerja/Wirausaha, jika Kuliah isikan jurusan anda, jika Belum bekerja isikan "-"</p>
                        <div class="form-group ">
                            <input type="text" class="form-control" id="bidang" name="bidang"  value="<?= $userdata['jenis_bidang']; ?>">
                            <?= form_error('bidang', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <input id="email" type="hidden" class="form-control" name="email" value="<?= $userdata['email']; ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-warning rounded-pill text-dark font-bold">Submit <i class=" bi bi-arrow-right-circle-fill bi-middle"></i></button>
                    </form>
                </div>



            </div>
        </section>
    </div>
</div>
</div>