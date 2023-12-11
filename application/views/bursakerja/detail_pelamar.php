<?php if ($userdata['role_id'] == 1) { ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <?php foreach ($pelamar as $key) : ?>
                    <h3 class="text-dark">Profile Applicant : <?= $key['fullname_lamar'] ?></h3>
                    <p class="text-subtitle text-muted">More about applicant in detail</p>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Basic card section start -->
        <div class="page-content">
            <section id="content-types">
                <div class="row">
                    <?php foreach ($pelamar as $key) : ?>
                        <div>
                            <div class="card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12">
                                            <textarea id="contoh" cols="30" rows="30" readonly><?= $key['cv_lamar'] ?></textarea>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <div class="card-body">
                                                <h4 class="card-title text-dark">Applicant Detail</h4>
                                                <br>
                                                <div class="col-md-6 col-sm-12">
                                                    <img class="card-img-top img-fluid" src="<?= base_url('bootstrap/assets/img/') . $key['image_lamar']; ?>" alt="Card image cap" width="200px" height="200px">
                                                </div>
                                                <br>
                                                <span class="description-text"><b>Name :</b></span>
                                                <p>
                                                    <?= $key['fullname_lamar'] ?>
                                                </p>
                                                <span class="description-text"><b>Email :</b></span>
                                                <p>
                                                    <?= $key['email_lamar'] ?>
                                                </p>
                                                <span class="description-text"><b>Phone Number :</b></span>
                                                <p>
                                                    <?= $key['no_hp_lamar'] ?>
                                                </p>
                                                
                                                <hr>
                                                <span class="description-text">Company Name :</span>
                                                <p><b><?= $key['company_lamar'] ?></b></p>

                                                <span class="description-text">Applied Position :</span>
                                                <p><b><?= $key['apply_lamar'] ?></b></p>
                                                <br>


                                                <a href="<?= site_url('bursa_kerja/list_detail/' . $key['judul_loker_lamar']) ?>" class="btn btn-danger font-bold">Back</a>

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

<?php } else {
    $this->load->view('eror');
} ?>
<!-- Basic Card types section end -->