<?php if ($userdata['role_id'] == 1) { ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">

                <h3 class="text-dark">Database Alumni</h3>
                <p class="text-subtitle text-muted">See all registered alumni</p>
            </div>
        </div>
        <!-- Basic card section start -->
        <div class="page-content">
            <?= $this->session->flashdata('hapus') ?>
            <section class="section">
                <div class="card">

                    <div class="table-responsive">
                        <div class="card-body">
                            <table class="table table-striped-responsive" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jurusan</th>
                                        <th class="text-center">Tahun Lulus</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Institusi</th>
                                        <th class="text-center">Bidang</th>
                                        <th class="text-center">ID Akun</th>
                                        <th class="text-center">No Ponsel</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($daftar as $rw) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td class="text-center"><?= $rw['fullname']; ?></td>
                                            <td class="text-center"><?= $rw['jurusan']; ?></td>
                                            <td class="text-center"><?= $rw['tahun_lulus']; ?></td>
                                            <td class="text-center"><?= $rw['status']; ?></td>
                                            <td class="text-center"><?= $rw['nama_institusi']; ?></td>
                                            <td class="text-center"><?= $rw['jenis_bidang']; ?></td>
                                            <td class="text-center"><?= $rw['id']; ?></td>
                                            <td class="text-center"><?= $rw['no_ponsel']; ?></td>
                                            <td class="text-center">

                                                <form role="form" action="<?= site_url('databased_alumni/hapus') ?>" method="post">
                                                    <input name="email" type="hidden" value="<?= $rw['email']; ?>">
                                                    <button class="btn btn-danger btn-xs">Delete</button>
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
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                Headers : '<?= $title; ?>',
                scrollY : '250px',
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],
                columnDefs: [{
                    targets: -1,
                    visible: false
                }]
            });
        });
    </script>
<?php } else {
    $this->load->view('eror');
} ?>
<!-- Basic Card types section end -->