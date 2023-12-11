<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>

  <div class="page-heading">
    <h3 class="text-dark text-center">AppTracerStudy</h3>
    <p class="text-subtitle text-muted text-center">Welcome To The Industrial Relations Trace Study Web APP</p>
  </div>
  <div class="page-content">
    <?= $this->session->flashdata('loginberhasil') ?>
    <section class="row">
      <div class="col-12 col-lg-12">
        <div class="card">
          <div class="card-body py-4 px-5">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl">
                <img src="<?= base_url('bootstrap/assets/img/') . $userdata['image']; ?>" alt="Face 1">
              </div>

              <div class="ms-3 name">
                <h5 class="font-bold text-dark responsive"><?= $userdata['fullname'] ?></h5>
                <h6 class="text-muted mb-0"><b>Since</b> <?= date('d/m/y', $userdata['data_created']) ?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <section class="row">
      <div class="col-lg-12">

        <div class="row">
          <div class="col-6 col-lg-6 col-md-6">
            <div class="card">
              <div class="card-body px-6 py-4">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon green">
                      <i class="bi bi-person-lines-fill"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold"><b>Registered Accounts</b></h6>
                    <h6 class="font-extrabold mb-0"><?= $total ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-6 col-md-6">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon blue">
                      <i class="bi bi-people"></i>

                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold"><b>Registered Alumni</b></h6>
                    <h6 class="font-extrabold mb-0"><?= $jumlah ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    </section>
  </div>

  <?php if ($userdata['role_id'] == 2) { ?>
    <div class="page-heading">
      <h3 class="text-dark">Job Fair</h3>
      <p class="text-subtitle text-muted">Our new feature that makes it easier to find job</p>
    </div>
    <div class="card mb-3" style="max-width: 540vh;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="<?= base_url('bootstrap-3/') ?>dist/assets/images/samples/loker (1).jpg" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title text-dark">New Feature</h5>
            <p class="card-text">Responding to everyone's need for information about job vacansies, The Industrial Relations Web APP presents feature that make it easier for alumni to find job vacansies. To use this feature, make sure you have filled out the available tracking study form data.</p>
            <?php if ($userdata['is_registed'] == 0) { ?>
              <a href="<?= site_url('tracking_studies/register') ?>" class="btn btn-warning text-dark "><b>Tracking Study</b><i class="btn-lg bi bi-arrow-right-circle-fill bi-middle"></i></a>
            <?php } else { ?>
              <a href="<?= site_url('bursa_kerja') ?>" class="btn btn-info text-dark"><b>Job Fair</b><i class="btn-lg bi bi-arrow-right-circle-fill bi-middle"></i></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <div class="page-title">

    <h3 class="text-dark">DataChart</h3>
    <p class="text-subtitle text-muted">To see the progess of alumni</p>

  </div>
  <div class="row">
    <div class="card card-responsive">

      <div class="card-header">
        <h4 class="card-title text-center text-dark">Alumni Statistics</h4>
      </div>
      <div class="card-body card-responsive">

        <canvas class="responsive" id="myChart"></canvas>

      </div>
    </div>

  </div>


</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const labels = [
    'Work',
    'Entrepreneur',
    'Unemployee',
    'Colleges',

  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Alumni Data',
      backgroundColor: 'rgb(224, 184, 0)',
      borderColor: 'rgb(224, 184, 0)',
      data: [<?= $bekerja ?>, <?= $wirausaha ?>, <?= $belumbekerja ?>, <?= $kuliah ?>],
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      layout: {
        autoPadding: true
      },
      responsive: true,
      events: ['click']
    }
  };
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>