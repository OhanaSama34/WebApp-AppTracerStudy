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
                    <h3 class="text-dark">Change Password</h3>
                    <p class="text-subtitle text-muted">Change your password here</p>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">

                <br>
                <a href="<?= site_url('my_profile/index') ?>"><i class="btn-lg bi bi-arrow-left bi-middle"></i></a>

                <div class="container">
                    <div class="card">
                        <?= $this->session->flashdata('password') ?>
                    </div>
                </div>
                
                <h4 class="card-title text-center text-dark"><b>Change Your Password</b></h4>

                <div class="card-body">
                    <form method="post" action="<?= site_url('Change_password/index') ?>">
                        <div class="box-body">
                            <div class="card-body">
                                <div class="form-group col-xs-6">
                                    <label for="current_password">Current Password</label>
                                    <input id="current_password" type="password" class="form-control" name="current_password" placeholder="Enter your old password....">
                                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="new_password1">New Password</label>
                                        <input id="new_password1" type="password" class="form-control" name="new_password1" placeholder="Make a new one">
                                        <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>

                                    <div class="form-group col-xs-6">
                                        <label for="new_password2">Confirmation Password</label>
                                        <input id="new_password2" type="password" class="form-control" name="new_password2" placeholder="Confirmation the new password">
                                        <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="box-footer">

                                    <button type="submit" class="btn btn-primary rounded-pill"><b>Submit</b> </button>

                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>