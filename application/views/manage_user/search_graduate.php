<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">

            <h3 class="text-dark">Search Graduate</h3>
            <p class="text-subtitle text-muted">Searching People Who Have Graduated</p>

        </div>
    </div>
    <!-- Basic card section start -->
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Major</th>
                                    <th class="text-center">Graduation Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($nama as $rw) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><?= $rw['fullname']; ?></td>
                                        <td class="text-center"><?= $rw['status']; ?></td>
                                        <td class="text-center"><?= $rw['jurusan']; ?></td>
                                        <td class="text-center"><?= $rw['tahun_lulus']; ?></td>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            scrollY: '250px',
            dom: 'Bfrtip',
            columnDefs: [{
                targets: -1,
                visible: false
            }]
        });
    });
</script>
<!-- Basic Card types section end -->