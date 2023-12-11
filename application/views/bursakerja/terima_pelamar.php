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
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Received Data</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic card section start -->
        <div class="page-content">
            <section class="section">
                <?= $this->session->flashdata('delete') ?>
                <div class="card">

                    <br>
                    <a href="<?= site_url('bursa_kerja') ?>"><i class="btn-lg bi bi-arrow-left bi-middle"></i></a>
                    <div class="table-responsive">
                        <div class="card-body">
                            <table class="table table-striped-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">fullname</th>
                                        <th class="text-center">Company</th>
                                        <th class="text-center">Position</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($pelamar as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $key['id']; ?></td>
                                            <td class="text-center"><?= $key['fullname_lamar']; ?></td>
                                            <td class="text-center"><?= $key['company_lamar']; ?></td>
                                            <td class="text-center"><?= $key['apply_lamar']; ?></td>
                                            <td class="text-center"><?= $key['status_lamar']; ?></td>
                                        </tr>

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
    <!-- Basic Card types section end -->
<?php } else {
    $this->load->view('eror');
} ?>