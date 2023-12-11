<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AppTracerStudy - <?= $title; ?></title>
  <link rel="icon" href="<?= base_url('bootstrap/') ?>assets/img/Logo.ico" type="image/x-icon">
  <!-- FONT -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">\
  <!-- TABLE -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">
  <!-- TEMPLATE AND ICON -->
  <link rel="stylesheet" href="<?= base_url('bootstrap-3/dist/') ?>assets/css/bootstrap.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="<?= base_url('bootstrap-3/dist/') ?>assets/vendors/iconly/bold.css">
  <link rel="stylesheet" href="<?= base_url('bootstrap-3/dist/') ?>assets/vendors/simple-datatables/style.css">
  <link rel="stylesheet" href="<?= base_url('bootstrap-3/dist/') ?>assets/vendors/chartjs/Chart.min.css">
  <link rel="stylesheet" href="<?= base_url('bootstrap-3/dist/') ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="<?= base_url('bootstrap-3/dist/') ?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= base_url('bootstrap-3/dist/') ?>assets/css/app.css">
  <link rel="stylesheet" href="<?= base_url('bootstrap-3/dist/') ?>assets/css/pages/error.css">
</head>

<body>
  <div id="app">
    <div id="sidebar" class="active">
      <div class="sidebar-wrapper active">
        <div class="sidebar-header">
          <div class="d-flex justify-content-between">
            <div class="logo">
              <a href="index.html"><img src="<?= base_url('bootstrap-3/dist/') ?>assets/images/logo/logo-1.png" alt="Logo" srcset=""></a>
              <br>
              <br>
              <h6 class="text-dark">Hi, Welcome</h6>
              <h5 class="font-bold text-primary"><?= $userdata['fullname'] ?></h5>
              <a href="<?= site_url('auth/logout') ?>"><i class="btn-primary-sm bi bi-box-arrow-right bi-middle bi-small"></i></a>
            </div>
            <div class="toggler">
              <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
          </div>
        </div>

        <div class="sidebar-menu">
          <ul class="menu">
            <li class="sidebar-title text-dark">Menu</li>
            <!-- MENU USER DAN ADMIN -->
            <li class="sidebar-item <?= $this->uri->segment(1) == 'dashboard_user' || $this->uri->segment(1) == '' ? 'active' : ''; ?>">
              <a href="<?= site_url('dashboard_user') ?>" class='sidebar-link'>
                <i class="bi bi-grid-1x2-fill "></i>
                <span>Dashboard</span>
              </a>
            </li>

            <?php if ($userdata['role_id'] == 1) { ?>
            <?php } else { ?>
              <?php if ($userdata['is_registed'] == 0) { ?>
                <li class="sidebar-item <?= $this->uri->segment(1) == 'Tracking_studies' || $this->uri->segment(1) == '' ? 'active' : ''; ?>">
                  <a href="<?= site_url('Tracking_studies/register') ?>" class='sidebar-link'>
                    <dt class="the-icon"><span class="fa-fw select-all fas "></span></dt>
                    <span>Tracking Studies</span>
                  </a>
                </li>
              <?php } else { ?>
              <?php } ?>
            <?php } ?>

            <li class="sidebar-item <?php echo ($this->uri->segment(2) == 'index') ? 'active' : ''; ?>">
              <a href="<?= site_url('kuisioner/index') ?>" class='sidebar-link'>
                <dt class="the-icon"><span class="fa-fw select-all fas "></span></dt>
                <span>Questionnaire</span>
              </a>
            </li>
            <li class="sidebar-item <?= $this->uri->segment(1) == 'search_graduate' || $this->uri->segment(1) == '' ? 'active' : ''; ?>">
              <a href="<?= site_url('search_graduate') ?>" class='sidebar-link'>
                <i>
                  <dt class="the-icon"><span class="fa-fw select-all fas "></span></dt>
                </i>
                <span>Graduate Search</span>
              </a>
            </li>
            <li class="sidebar-item <?= $this->uri->segment(1) == 'my_profile' || $this->uri->segment(1) == '' ? 'active' : ''; ?>">
              <a href="<?= site_url('my_profile') ?>" class='sidebar-link'>
                <i>
                  <?php if ($userdata['role_id'] == 1) { ?>
                    <dt class="the-icon"><span class="fa-fw select-all fas "></span></dt>
                  <?php } else { ?>
                    <dt class="the-icon"><span class="fa-fw select-all fas "></span></dt>
                  <?php } ?>
                </i>
                <span>My Profile</span>
              </a>
            </li>
            <?php if ($userdata['is_registed'] == 1) { ?>
              <li class="sidebar-item <?= $this->uri->segment(1) == 'Bursa_kerja' || $this->uri->segment(1) == '' ? 'active' : ''; ?>">
                <a href="<?= site_url('Bursa_kerja') ?>" class='sidebar-link'>
                  <i class="bi bi-briefcase"></i>
                  <span>Job Fair</span>
                </a>
              </li>
            <?php } ?>

            <!-- MENU ADMIN -->
            <?php if ($userdata['role_id'] == 1) { ?>
              <li class="sidebar-title text-dark">Admin</li>
              <li class="sidebar-item  has-sub <?= $this->uri->segment(1) == '#chart' || $this->uri->segment(1) == 'chart_data' ? 'active' : ''; ?>">
                <a href="#chart" class='sidebar-link'>
                  <i class="bi bi-bar-chart-line-fill text-dark"></i>
                  <span>Visual Data</span>
                </a>
                <ul class="submenu ">
                  <li class="sidebar ">
                    <a href="<?= site_url('chart_data') ?>" class='sidebar-link'>
                      <span>All Data</span>
                    </a>
                  </li>
                  <li class="sidebar ">
                    <a href="<?= site_url('chart_data/ipa') ?>" class='sidebar-link'>
                      <span>IPA</span>
                    </a>
                  </li>
                  <li class="sidebar ">
                    <a href="<?= site_url('chart_data/ips') ?>" class='sidebar-link'>
                      <span>IPS</span>
                    </a>
                  </li>

                </ul>
              </li>
              <li class="sidebar-item  has-sub <?= $this->uri->segment(1) == 'Databased_alumni' || $this->uri->segment(1) == 'Users_user' ||  $this->uri->segment(1) == 'Users_user/' ? 'active' : ''; ?>">
                <a href="#data" class='sidebar-link'>
                  <dt class="the-icon"><span class="fa-fw select-all fas text-dark"></span></dt>
                  <span>Manage Data</span>
                </a>
                <ul class="submenu ">
                  <li class="sidebar <?= $this->uri->segment(1) == 'Databased_alumni' || $this->uri->segment(1) == '' ? 'active' : ''; ?>">
                    <a href="<?= site_url('Databased_alumni') ?>" class='sidebar-link'>
                      <dt class="the-icon"><span class="fa-fw select-all fas "></span></dt>
                      <span>Alumni</span>
                    </a>
                  </li>
                  <li class="sidebar <?= $this->uri->segment(1) == 'Users_user' || $this->uri->segment(1) == '' ? 'active' : ''; ?>">
                    <a href="<?= site_url('Users_user') ?>" class='sidebar-link'>
                      <i class="bi bi-person-lines-fill "></i>
                      <span>Admin</span>
                    </a>
                  </li>
                  <li class="sidebar <?= $this->uri->segment(1) == 'Users_user/user' || $this->uri->segment(1) == '' ? 'active' : ''; ?>">
                    <a href="<?= site_url('Users_user/user') ?>" class='sidebar-link'>
                      <i class="bi bi-person-circle"></i>
                      <span>Account</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="sidebar-item  <?php echo ($this->uri->segment(2) == 'input_lowongan') ? 'active' : ''; ?>">
                <a href="<?= site_url('Bursa_kerja/input_lowongan') ?>" class='sidebar-link'>
                  <dt class="the-icon"><span class="fa-fw select-all fas text-dark"></span></dt>
                  <span>Upload Job Vacansies</span>
                </a>
              </li>
              <li class="sidebar-item <?php echo ($this->uri->segment(2) == 'applicants_list') ? 'active' : ''; ?> ">
                <a href="<?= site_url('Bursa_kerja/applicants_list') ?>" class='sidebar-link'>
                  <dt class="the-icon"><span class="fa-fw select-all fas text-dark"></span></dt>
                  <span>Applicants List</span>
                </a>
              </li>
              <li class="sidebar-item <?php echo ($this->uri->segment(2) == 'manage_kuisioner') ? 'active' : ''; ?>">
                <a href="<?= site_url('kuisioner/manage_kuisioner') ?>" class='sidebar-link'>
                  <dt class="the-icon"><img width="16px"  src="<?= base_url('bootstrap-3/dist/') ?>assets/icon/question.png" alt=""></dt>
                  <span>Manage Questionnaire</span>
                </a>
              </li>
            <?php } ?>


          </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
      </div>

    </div>

  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php echo $contents ?>

  </div>
  <!-- /.content-wrapper -->


  <script src="<?= base_url('bootstrap-3/dist/') ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url('bootstrap-3/dist/') ?>assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('bootstrap-3/dist/') ?>assets/vendors/simple-datatables/simple-datatables.js"></script>
  <script src="<?= base_url('bootstrap-3/dist/') ?>assets/js/mazer.js"></script>
  <script src="<?= base_url('bootstrap-3/dist/') ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url('bootstrap-3/dist/') ?>assets/vendors/tinymce/tinymce.min.js"></script>
  <script src="<?= base_url('bootstrap-3/dist/') ?>assets/vendors/tinymce/plugins/code/plugin.min.js"></script>
  <script src="<?= base_url('bootstrap-3/dist/') ?>assets/vendors/fontawesome/all.min.js"></script>
  <script>
    tinymce.init({
      selector: '#lamaran'
    });
    tinymce.init({
      selector: '#dark',
      toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
      plugins: 'code'
    });
  </script>
  <script>
    tinymce.init({
      selector: '#contoh'
    });
  </script>



</body>

</html>