<?php if ($userdata['role_id'] == 1) { ?>
  <div id="main">
    <header class="mb-3">
      <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
      </a>
    </header>

    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-9 order-md-1 order-last">
            <h3 class="text-dark">Questionnaire Management</h3>
            <p class="text-subtitle text-muted">Post & manage your questionnaire here</p>
          </div>
          <div class="col-12 col-md-3 order-md-1 order-last">
            <a href="<?= site_url('kuisioner/list_kuisioner') ?>" class="btn btn-warning rounded-pill text-dark text-center"><b>Quiz List</b><i class="btn-lg bi bi-arrow-right-circle-fill bi-middle"></i> </a>
          </div>
        </div>
      </div>
    </div>

    <div class="page-content">
      <section id="multiple-column-form">
        <div class="row match-height">
          <div class="col-12">
            <div class="card">
              <br>
              <h4 class="card-title text-center text-dark">Post Questionnaire</h4>

              <div class="card-content">
                <div class="card-body">
                  <?= $this->session->flashdata('uploadberhasil') ?>
                  <form method="POST" action="<?= site_url('kuisioner/manage_kuisioner') ?>">
                    <div class="row my-2">
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <h6>Quiz Name</h6>
                          <input type="text" id="namakuis" class="form-control" placeholder="Questionnaire name..." name="namakuis">
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <h6>Author</h6>
                          <input type="text" id="author" class="form-control" name="author" value="<?= $userdata['email'] ?>">

                        </div>
                      </div>
                    </div>


                    <h6>Tendence Questionnaire</h6>
                    <fieldset class="form-group">
                      <select class="form-select" id="tendence" name="tendence">
                        <option>Wajib</option>
                        <option>Tidak Wajib
                        <option>
                      </select>
                    </fieldset>

                    <div class="form-group mb-5">
                      <h6>Link Quiz</h6>
                      <input type="text" class="form-control" id="link" name="link" placeholder="Enter email">
                    </div>

                    <div class="col-12 d-flex justify-content-end my-2">
                      <input type="submit" id="status" name="status" value="Publish" class="btn btn-info btn-block text-dark font-bold">
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                      <input type="submit" id="status" name="status" value="Draft" class="btn btn-secondary btn-block  font-bold">

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

  </div>

<?php } else {
  $this->load->view('eror');
} ?>