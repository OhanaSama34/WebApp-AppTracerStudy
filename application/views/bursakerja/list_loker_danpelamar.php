<?php if ($userdata['role_id'] == 1) { ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">

                <h3 class="text-dark">Company List</h3>
                <p class="text-subtitle text-muted">See all applicants in various company</p>
            </div>
        </div>
        <!-- Basic card section start -->
        <div class="page-content">
            <section class="section">

                <div class="card">


                    <div class="table-responsive">
                        <div class="card-body">

                            <?= $this->session->flashdata('delete') ?>
                            <?= $this->session->flashdata('receiv') ?>
                            <table class="table table-striped-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Job Title</th>
                                        <th class="text-center">Company</th>
                                        <th class="text-center">Cover</th>
                                        <th class="text-center">Position</th>


                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($loker as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td class="text-center"><?= $key['judul_loker']; ?></td>
                                            <td class="text-center"><?= $key['perusahaan_loker']; ?></td>
                                            <td class="text-center">
                                                <img width="200vh" height="100vh" class="img-responsive" src="<?= base_url('bootstrap/assets/img/') . $key['cover_loker']; ?>">
                                            </td>
                                            <td class="text-center">
                                                <?= $key['position_loker']; ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= site_url('bursa_kerja/list_detail/' . $key['slug_loker']) ?>" class="btn btn-primary">Applicant List</a>
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