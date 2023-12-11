<?php if ($userdata['role_id'] == 1) { ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">

                <h3 class="text-dark">Job Vacancies Edit</h3>
                <p class="text-subtitle text-muted">Edit your job vacansies</p>
            </div>
        </div>

        <div class="page-content">
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">

                            <br>
                            <a href="<?= site_url('bursa_kerja/daftar_loker') ?>"><i class="btn-lg bi bi-arrow-left bi-middle"></i></a>

                            <br>
                            <h4 class="card-title text-center text-dark">Job Vacansies Edit Form</h4>

                            <?php foreach ($edit as $key) : ?>
                                <div class="card-content">
                                    <div class="card-body">

                                        <?php echo form_open_multipart('bursa_kerja/editing_loker'); ?>
                                        <input type="hidden" id="id" class="form-control" name="id" value="<?= $key['id_loker']; ?>">
                                        <div class="form-group">
                                            <h6>Job Title</h6>
                                            <input type="text" id="judul" class="form-control" placeholder="Write a job title...." name="judul" autofocus value="<?= $key['judul_loker']; ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Company Name</label>
                                                    <input type="text" id="perusahaan" class="form-control" placeholder="Company name..." name="perusahaan" value="<?= $key['perusahaan_loker']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Applied Position</label>
                                                    <input type="text" id="posisi" class="form-control" placeholder="Applied Position..." name="posisi" value="<?= $key['position_loker']; ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div>
                                            <div class="form-group">
                                                <label for="last-name-column">File</label>
                                                <textarea name="konten" id="lamaran" cols="30" rows="10"><?= $key['content_loker']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="custom-file">
                                            <label for="last-name-column"><b>Cover</b></label>
                                            <br>
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <br>
                                            <label class="custom-file-label" for="image">
                                                <p>
                                                    Note : *Image size does not exceed 10MB
                                                </p>
                                            </label>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end my-2">

                                            <input type="submit" name="status" value="Publish" class="btn btn-info btn-block text-dark font-bold">
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <input type="submit" name="status" value="Draft" class="btn btn-secondary btn-block font-bold">

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

<?php } else {
    $this->load->view('eror');
} ?>