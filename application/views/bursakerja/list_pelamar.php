<?php if ($userdata['role_id'] == 1) { ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <?php foreach ($lowongan as $key) : ?>
                    <h3 class="text-dark">Applicant List</h3>
                    <p class="text-subtitle text-muted">See and take action for vacansies : <b><?= $key['judul_loker']?></b></p>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Basic card section start -->
        <div class="page-content">
            <section class="section">

                <div class="card">
                    <br>
                    <a href="<?= site_url('bursa_kerja/applicants_list') ?>"><i class="btn-lg bi bi-arrow-left bi-middle"></i></a>

                    <div class="table-responsive">
                        <div class="card-body">
                            <?= $this->session->flashdata('delete') ?>
                            <?= $this->session->flashdata('receiv') ?>
                            <table class="table table-striped-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Pass Photo</th>
                                        <th class="text-center">Fullname</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pelamar as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td class="text-center"><?= $key['id']; ?></td>
                                            <td class="text-center"><img src="<?= base_url('bootstrap/assets/img/') . $key['image_lamar']; ?>" alt="Card image cap" width="150px" height="auto"></td>
                                            <td class="text-center">
                                                <?= $key['fullname_lamar']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $key['status_lamar']; ?>
                                            </td>


                                            <td class="text-center">
                                                <form role="form" action="<?= site_url('bursa_kerja/received_pelamar') ?>" method="post">
                                                    <input name="terima" type="hidden" value="<?= $key['email_lamar']; ?>">
                                                    <button class="btn btn-primary btn-sm btn-block mb-2"><b>Received</b></button>
                                                </form>
                                                <form role="form" action="<?= site_url('bursa_kerja/delete_pelamar') ?>" method="post">
                                                    <input name="hapus" type="hidden" value="<?= $key['id_lamar']; ?>">
                                                    <button class="btn btn-danger btn-sm btn-block mb-2"><b>Rejected</b></button>
                                                </form>
                                                <a href="<?= site_url('bursa_kerja/applicants_detail/' . $key['id_lamar']) ?>" class="btn btn-info btn-sm btn-block"><b>See Detail</b></a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </section>
        </div>

    </div>
    <script src="<?= base_url('bootstrap-3/dist/') ?>assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
<?php } else {
    $this->load->view('eror');
} ?>
<!-- Basic Card types section end -->