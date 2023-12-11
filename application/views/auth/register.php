<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>AppTracerStudy - <?= $title; ?></title>
  <link rel="icon" href="<?= base_url('bootstrap/') ?>assets/img/Logo.ico" type="image/x-icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('bootstrap/') ?>node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('bootstrap/') ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url('bootstrap/') ?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?= base_url('bootstrap') ?>/assets/img/Logo.png" alt="logo" width="100">
            </div>

            <div class="card card-dark">
              <div class="card-header">
                <h3 class="textcolor text-dark">Register</h3>
              </div>

              <div class="card-body">
                <form method="post" action="<?= site_url('auth/register') ?>">
                  <div class="form-group">
                    <label>Fullname</label>
                    <input id="fullname" type="text" class="form-control" name="fullname" placeholder="Enter your fullname..." value="<?= set_value('fullname') ?>">
                    <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                      <fieldset class="form-group">
                        <select class="form-select" id="status" name="status" value="<?= set_value('status') ?>">
                          <option>--Pilih--</option>
                          <option>Alumni</option>
                        </select>
                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>') ?>
                      </fieldset>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group">
                    <label>No Ponsel</label>
                    <input id="noponsel" type="number" class="form-control" name="noponsel" placeholder="Enter your phone number..." value="<?= set_value('noponsel') ?>">
                    <?= form_error('noponsel', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class=" row">
                    <div class="form-group col-6">
                      <label class="d-block">Password</label>
                      <input id="password1" type="password" class="form-control" name="password1">
                      <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group col-6">
                      <label class="d-block">Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password2">
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg btn-block">
                      <h6 class="text-center">Register</h6>
                    </button>
                    <div class="mt-5 text-center">
                      have an account? <a href="<?= site_url('auth'); ?>">Login</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url() ?>bootstrap/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?= base_url() ?>bootstrap/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?= base_url() ?>bootstrap/node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url() ?>bootstrap/assets/js/scripts.js"></script>
  <script src="<?= base_url() ?>bootstrap/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url() ?>bootstrap/assets/js/page/auth-register.js"></script>
</body>

</html>