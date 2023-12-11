<?php if ($userdata['role_id'] == 1) { ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-9 order-md-1 order-last">
                        <h3 class="text-dark">Job Vacancies Registration</h3>
                        <p class="text-subtitle text-muted">Post your job vacancies here</p>
                    </div>
                    <div class="col-12 col-md-3 order-md-1 order-last">
                        <a href="<?= site_url('Bursa_kerja/daftar_loker') ?>" class="btn btn-warning rounded-pill text-dark text-center"><b>Vacansies List</b><i class="btn-lg bi bi-arrow-right-circle-fill bi-middle"></i> </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <br>
                            <h4 class="card-title text-center text-dark">Job Vacansies Form</h4>

                            <div class="card-content">
                                <div class="card-body">
                                    <?= $this->session->flashdata('upload_lowongan_berhasil') ?>
                                    <form method="POST" action="<?= site_url('bursa_kerja/input_lowongan') ?>">
                                        <div class="form-group">
                                            <h6>Job Title</h6>
                                            <input type="text" id="judul" class="form-control" placeholder="Write a job title...." name="judul" autofocus>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <h6>Company Name</h6>
                                                    <input type="text" id="perusahaan" class="form-control" placeholder="Company name...." name="perusahaan">
                                                    <?= form_error('perusahaan', '<small class="text-danger pl-3">', '</small>') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <h6>Applied Position</h6>
                                                    <input type="text" id="posisi" class="form-control" placeholder="Applied Position...." name="posisi">
                                                    <?= form_error('posisi', '<small class="text-danger pl-3">', '</small>') ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div>
                                            <div class="form-group">
                                                <h6>Embed File Requirement</h6>
                                                <textarea name="konten" id="lamaran" cols="30" rows="10" placeholder="Embed Link PDF Pamflet"></textarea>
                                                <?= form_error('konten', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>


                                        <div class="col-12 d-flex justify-content-end my-2">
                                            <input type="submit" name="status" value="Publish" class="btn btn-info btn-block text-dark font-bold">
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <input type="submit" name="status" value="Draft" class="btn btn-secondary btn-block  font-bold">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

<?php } else {
    $this->load->view('eror');
} ?>