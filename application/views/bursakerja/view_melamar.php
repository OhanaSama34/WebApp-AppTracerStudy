<?php if ($userdata['is_registed'] == 1) { ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>


        <div class="page-heading">
            <div class="page-title">

                <h3 class="text-dark">Application Form</h3>
                <p class="text-subtitle text-muted">Upload your CV and applicant</p>
            </div>
        </div>
        <div class="page-content">
            <section class="section">
                <div class="card">
                    <?php foreach ($lamaran as $a) : ?>

                        <br>
                        <a href="<?php echo site_url('bursa_kerja/viewdetail_loker/' . $a['slug_loker'])   ?>"><i class="btn-lg bi bi-arrow-left bi-middle"></i></a>

                    <?php endforeach; ?>
                    <div class="card">

                    </div>
                    <?php foreach ($lamaran as $key) : ?>
                        <h3 class="card-title text-center text-dark"><b>Send Application</b></h3>
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <?php echo form_open_multipart('bursa_kerja/lamaran_action'); ?>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Fullname</label>
                                                        <input type="text" id="fullname" class="form-control" placeholder="Fullname" name="fullname" value="<?= $userdata['fullname']; ?>">
                                                        <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">Email</label>
                                                        <input type="text" id="email" class="form-control" placeholder="Email" name="email" value="<?= $userdata['email']; ?>">
                                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">Phone Number</label>
                                                        <input type="number" id="noponsel" class="form-control" placeholder="Phone Number" name="noponsel" value="<?= $userdata['no_hp']; ?>">
                                                        <?= form_error('noponsel', '<small class="text-danger pl-3">', '</small>') ?>
                                                    </div>
                                                </div>


                                                <div class="col-md-6 col-12">
                                                    <label>Upload a formal photo</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="photo" name="photo">
                                                        <br>
                                                        <label class="custom-file-label" for="photo">
                                                            <p>
                                                                Note : *3:4 image ratio is recommended | Image size does not exceed 10MB
                                                            </p>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <input id="jurusan" type="hidden" class="form-control" name="jurusan" value="<?= $userdata['jurusan']; ?>" readonly>
                                                    <input id="tahunlulus" type="hidden" class="form-control" name="tahunlulus" value="<?= $userdata['tahun_lulus']; ?>" readonly>
                                                    <input id="idpelamar" type="hidden" class="form-control" name="idpelamar" value="<?= $userdata['id']; ?>" readonly>
                                                </div>

                                                <br>

                                                <h6>Apply on : <?= $key['judul_loker']; ?></h6>
                                                <input id="judul" type="hidden" class="form-control" name="judul" value="<?= $key['slug_loker']; ?>" readonly>
                                                <div class="form-group">
                                                    <label>Company Name</label>
                                                    <input id="company" type="text" class="form-control" name="company" placeholder="Company Name" readonly value="<?= $key['perusahaan_loker'] ?>">

                                                </div>
                                                <div class="form-group">
                                                    <label>Company Name</label>
                                                    <input id="posisi" type="text" class="form-control" name="posisi" placeholder="Position" readonly value="<?= $key['position_loker'] ?>">

                                                </div>
                                                <div>
                                                    <div class="form-group">
                                                        <label for="last-name-column">Embed CV</label>
                                                        <textarea name="lamaran" id="lamaran" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </section>
        </div>

    </div>
<?php } else {
    $this->load->view('eror');
} ?>