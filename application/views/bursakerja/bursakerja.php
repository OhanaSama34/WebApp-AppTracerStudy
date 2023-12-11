<?php if ($userdata['is_registed'] == 1) { ?>
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
                        <h3>Job Fair</h3>
                        <p class="text-subtitle text-muted">Feature to find job vacansies, <b>find your job now</b></p>
                    </div>
                    <div class="col-12 col-md-3 order-md-1 order-last">
                        <a href="<?= site_url('Bursa_kerja/received_list') ?>" class="btn btn-warning rounded-pill "><b>Received List</b></a>
                    </div>
                </div>
            </div>
        </div>

        <?php foreach ($loker as $a) : ?>
            <div class="card">
                <div class="card-body">
                    <img class="card-img-top img-fluid" src="<?= base_url('bootstrap/assets/img/')  . $a['cover_loker'];  ?>" alt="Card image cap" style="height: 20rem" />
                    <div class="card-body">
                        <h4 class="card-title"><?= $a['perusahaan_loker']?> : <?= $a['judul_loker']; ?></h4>
                        <p class="card-text">
                            Created on <?= date('d/m/y', $a['date_created']) ?> by <?= $a['author_loker']?>
                        </p>
                        <p class="card-text">
                            <b>
                               Position needed : <?= $a['position_loker']; ?>
                            </b>
                        </p>

                        <a href="<?php echo site_url('bursa_kerja/viewdetail_loker/' . $a['slug_loker'])   ?>" class="btn btn-primary btn-sm"> DETAIL </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
<?php } else {
    $this->load->view('eror');
} ?>