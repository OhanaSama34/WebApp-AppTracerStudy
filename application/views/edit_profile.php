<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>


    <div class="page-heading">
        <div class="page-title">

            <h3 class="text-dark">Edit Profile</h3>
            <p class="text-subtitle text-muted">Change your profile here</p>

        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card">
                    <br>
                    <a href="<?= site_url('my_profile/index') ?>"><i class="btn-lg bi bi-arrow-left bi-middle"></i></a>
                </div>

                <h4 class="card-title text-center text-dark"><b>Edit Your Profile</b></h4>

                <div class="card-body">
                    <?php echo form_open_multipart('my_profile/edit_profile'); ?>
                    <div class="form-group ">

                        <div class="row">
                            <div class="col-sm-3 text-center">
                                <img src="<?= base_url('bootstrap/assets/img/') . $userdata['image']; ?>" height="180px" width="180px">
                            </div>
                            <br>
                            <div class="col-sm-9">
                                <div class="form-group ">
                                    <label>Fullname</label>
                                    <input id="fullname" type="text" class="form-control" name="fullname" placeholder="Enter your fullname..." value="<?= $userdata['fullname']; ?>">
                                    <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>

                                <div class="form-group ">
                                    <label>Status</label>
                                    <input id="status" type="text" class="form-control" name="status" placeholder="Staff/Guru/Siswa" value="<?= $userdata['status']; ?>">
                                    <?= form_error('status', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>


                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="email" type="text" class="form-control" name="email" placeholder="Email" value="<?= $userdata['email']; ?>" readonly>
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No Ponsel</label>
                                    <input id="noponsel" type="number" class="form-control" name="noponsel" placeholder="Enter your phone number..." value="<?= $userdata['no_hp']; ?>">
                                    <?= form_error('noponsel', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <br>
                            <label class="custom-file-label" for="image">
                                <p>
                                    Note : *1:1 (1080 X 1080 px) image ratio is recommended | Image size does not exceed 10MB
                                </p>
                            </label>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-warning rounded-pill text-dark"><b>Submit</b></button>
                <br>
                </form>
            </div>
    </div>
    </section>
</div>
</div>