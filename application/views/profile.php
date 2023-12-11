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
                    <h3 class="text-dark">My Profile</h3>
                    <p class="text-subtitle text-muted">See your profile here</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic card section start -->
    <div class="page-content">
        <?= $this->session->flashdata('berhasildiubah') ?>
        <?= $this->session->flashdata('updatedberhasil') ?>
        <?= $this->session->flashdata('updated') ?>
        <div class="row">

            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <img class="card-img img-fluid" src="<?= base_url('bootstrap/assets/img/') . $userdata['image']; ?>" alt="Card image cap" width="200px" height="200px">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="card-body">
                                    <h4 class="card-title text-dark">Profile</h4>
                                    <br>
                                    <span class="description-text">Name :</span>
                                    <p><b><?= $userdata['fullname'] ?> (ID : <?= $userdata['id'] ?>)</b></p>
                                    <span class="description-text">Phone Number :</span>
                                    <p><b><?= $userdata['no_hp'] ?> </b></p>
                                    <span class="description-text">Email :</span>
                                    <p><b><?= $userdata['email'] ?> </b></p>
                                    <br>

                                    <a href="<?= site_url('my_profile/edit_profile') ?>" class="btn btn-warning text-dark my-2"><b>Edit</b> </a>
                                    <a href="<?= site_url('change_password') ?>" class="btn btn-primary "><b>Change Password</b> </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($userdata['role_id'] == 2) { ?>
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">

                                    <div class="card-body">
                                        <span class="description-text">Graduation Year :</span>
                                        <p><b><?= $userdata['tahun_lulus'] ?> </b></p>
                                        <span class="description-text">Major :</span>
                                        <p><b><?= $userdata['jurusan'] ?> </b></p>
                                        <hr>
                                        <span class="description-text">Status :</span>
                                        <p><b><?= $userdata['status_alumni'] ?> </b></p>
                                        <span class="description-text">Institusi :</span>
                                        <p><b><?= $userdata['nama_institusi'] ?> </b></p>
                                        <span class="description-text">Bidang :</span>
                                        <p><b><?= $userdata['jenis_bidang'] ?> </b></p>
                                        <br>

                                        <a href="<?= site_url('my_profile/edit_alumni') ?>" class="btn btn-warning text-dark"><b>Update Data </b> <i class="btn-lg bi bi-arrow-right-circle-fill bi-middle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

</div>
<!-- Basic Card types section end -->