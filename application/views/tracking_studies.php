<?php if ($userdata['is_registed'] == 0) { ?>
    <?php if ($userdata['role_id'] == 2) { ?>

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
                            <h3>Alumni Registration</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Lengkapi data diri anda dengan mengisi form sebagai berikut</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= site_url('Tracking_studies/register') ?>">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jurusan</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="jurusan" name="jurusan" value="<?= set_value('jurusan') ?>" autofocus>
                                                    <option>--Pilih Jurusan--</option>
                                                    <option>IPA</option>
                                                    <option>IPS</option>
                                                </select>
                                                <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>') ?>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <label>Tahun Lulus</label>
                                            <input type="number" class="form-control" id="tahunlulus" name="tahunlulus" placeholder="Tahun Lulus" value="<?= set_value('tahunlulus') ?>">
                                            <?= form_error('tahunlulus', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="status" name="status" value="<?= set_value('status') ?>">
                                                    <option>--Pilih Status--</option>
                                                    <option>Bekerja</option>
                                                    <option>Wirausaha</option>
                                                    <option>Belum Bekerja</option>
                                                    <option>Kuliah</option>

                                                </select>
                                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>') ?>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input id="email" type="text" class="form-control" name="email" placeholder="Email" value="<?= $userdata['email']; ?>" readonly>
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>No Ponsel</label>
                                            <input id="noponsel" type="number" class="form-control" name="noponsel" placeholder="Enter your phone number..." value="<?= $userdata['no_hp']; ?>" readonly>
                                            <?= form_error('noponsel', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input id="registered" type="hidden" class="form-control" name="registered" value="1" readonly>
                                            <?= form_error('noponsel', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>

                                    </div>

                                    <div class="container">
                                        <hr>
                                    </div>

                                    <h6>Nama Tempat</h6>
                                    <p>*Isikan nama institusi dimana anda Kuliah/Bekerja/Wirausaha, jika belum bekerja isikan "-"</p>
                                    <div class="form-group mb-2 ">
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Isikan Nama Institusi" value="<?= set_value('lokasi') ?>">
                                        <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <h6>Bidang</h6>
                                    <p>*Isikan bidang institusi tempat Bekerja/Wirausaha, jika Kuliah isikan jurusan anda, jika Belum bekerja isikan "-"</p>
                                    <div class="form-group ">
                                        <input type="text" class="form-control" id="bidang" name="bidang"  value="<?= set_value('bidang') ?>">
                                        <?= form_error('bidang', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>

                                </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                        </form>
                    </div>
            </div>
            </section>
        </div>

        </div>
    <?php } else {
        $this->load->view('eror');
    } ?>
<?php } else {
} ?>