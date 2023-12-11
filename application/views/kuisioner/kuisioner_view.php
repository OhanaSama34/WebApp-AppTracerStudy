<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">

            <h3 class="text-dark">List Quiz</h3>
            <p class="text-subtitle text-muted">Fill in the available questionnaire</p>

        </div>
    </div>
    <!-- Basic card section start -->
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table " id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Quiz</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Tendence</th>
                                    <th class="text-center">Creation Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kuis as $key) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><?= $key['nama_kuis']; ?></td>
                                        <td class="text-center"><?= $key['author_kuis']; ?></td>
                                        <td class="text-center"><?= $key['status_kuis']; ?></td>
                                        <td class="text-center"><?= $key['sifat_kuis']; ?></td>
                                        <td class="text-center"><?= date('d/m/y', $key['date_created']) ?></td>
                                        <td class="text-center">


                                            <a href="<?= $key['link_kuis']; ?>"><button class="btn btn-warning text-dark btn-md"><b>Isi Kuis</b></button></a>
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
<!-- Basic Card types section end -->