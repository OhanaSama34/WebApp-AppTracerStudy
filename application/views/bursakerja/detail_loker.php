<?php if ($userdata['is_registed'] == 1) { ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">

                <h3 class="text-dark">Detail</h3>
                <p class="text-subtitle text-muted">About this job vacansies</p>

            </div>
        </div>
        <!-- Basic card section start -->
        <div class="page-content">

            <section id="content-types">
                <div class="row">
                    <?php foreach ($edit as $key) : ?>
                        <div>
                            <div class="card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12">
                                            <textarea id="contoh" cols="30" rows="30" readonly><?= $key['content_loker'] ?></textarea>
                                        </div>
                                        <div class="col-md-5 col-sm-12">

                                            <div class="card-body">
                                                <h4 class="card-title">Detail Job</h4>
                                                <br>
                                                <span class="description-text"><b>Company Name</b></span>
                                                <p>
                                                <h5><?= $key['perusahaan_loker'] ?></h5>
                                                </p>
                                                <hr>
                                                <span class="description-text">Applied Position :</span>
                                                <p><b><?= $key['position_loker'] ?> </b></p>
                                                <br>

                                                <a href="<?= site_url('bursa_kerja') ?>" class="btn btn-danger">Back</a>

                                                <a href="<?= site_url('bursa_kerja/view_lamaran/' . $key['slug_loker']) ?>" class="btn btn-primary">Apply</a>

                                            </div>
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
    <!-- Basic Card types section end -->
<?php } else {
    $this->load->view('eror');
} ?>