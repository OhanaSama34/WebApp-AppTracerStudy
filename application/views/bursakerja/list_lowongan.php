<?php if ($userdata['role_id'] == 1) { ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">

                <h3 class="text-dark">Job Vacansies List</h3>
                <p class="text-subtitle text-muted">See and manage all job vacansies postings</p>
            </div>
        </div>
        <!-- Basic card section start -->
        <div class="page-content">
            <section class="section">
                <?= $this->session->flashdata('delete_lowongan') ?>
                <?= $this->session->flashdata('updated_lowongan_berhasil') ?>
                <div class="card">

                    <br>
                    <a href="<?= site_url('bursa_kerja/input_lowongan') ?>"><i class="btn-lg bi bi-arrow-left bi-middle"></i></a>

                    <div class="table-responsive">
                        <div class="card-body">
                            <table class="table table-striped-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Created</th>
                                        <th class="text-center">Company</th>
                                        <th class="text-center">Author</th>
                                        <th class="text-center">Position</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($loker as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td class="text-center"><?= $key['judul_loker']; ?></td>
                                            <td class="text-center"> <?= date('d/m/y', $key['date_created']) ?></td>
                                            <td class="text-center"><?= $key['perusahaan_loker']; ?></td>
                                            <td class="text-center"><?= $key['author_loker']; ?></td>
                                            <td class="text-center"><?= $key['position_loker']; ?></td>
                                            <td class="text-center"><?= $key['status_loker']; ?></td>
                                            <td class="text-center">

                                                <a href="<?php echo site_url('bursa_kerja/edit_loker/' . $key['id_loker'])   ?>" class="btn btn-warning btn-block btn-sm font-bold my-2"> Edit </a>
                                                <form role="form" action="<?= site_url('bursa_kerja/delete_loker') ?>" method="post">
                                                    <input name="hapus" type="hidden" value="<?= $key['id_loker']; ?>">
                                                    <button class="btn btn-danger btn-sm btn-block font-bold">Delete</button>
                                                </form>



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