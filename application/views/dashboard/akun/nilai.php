<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('template/frontend/head') ?>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
      <?php $this->load->view('template/frontend/header') ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php $this->load->view('template/frontend/theme') ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
        <?php $this->load->view('template/frontend/sidebar') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Nilai per Matakuliah</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <div class="col-xs-12 col-sm-4">
                            <form method="get">
                                <div class="row">
                                    <div class="col">
                                      <label>Semester</label>
                                      <select class="form-control" name="semester" required="">
                                        <option value="">--Pilih--</option>
                                        <option value="Semester 1">Semester 1</option>
                                        <option value="Semester 2">Semester 2</option>
                                        <option value="Semester 3">Semester 3</option>
                                        <option value="Semester 4">Semester 4</option>
                                        <option value="Semester 5">Semester 5</option>
                                        <option value="Semester 6">Semester 6</option>
                                      </select>
                                    </div>
                                    <div class="col">
                                        <label>&nbsp</label>
                                        <button type="submit" class="btn btn-secondary btn-fill btn-block">Tampilkan</button>
                                    </div>
                                </div>
                            </form>
                        </div><br>
                        <table id="" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Matakuliah</th>
                              <th>Kehadiran</th>
                              <th>Tugas</th>
                              <th>Formatif</th>
                              <th>UTS</th>
                              <th>UAS</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if (isset($_GET['semester'])) { ?>
                             <?php
                              $no = 1;
                              foreach ($read as $r) { ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $r->matkul ?></td>
                              <td><?= $r->kehadiran ?></td>
                              <td><?= $r->tugas ?></td>
                              <td><?= $r->formatif ?></td>
                              <td><?= $r->uts ?></td>
                              <td><?= $r->uas ?></td>
                            </tr>
                              <?php } ?>
                            <?php } ?>
                          </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
          <?php $this->load->view('template/frontend/footer') ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url() ?>assets/frontend/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url() ?>assets/frontend/vendors/chart.js/Chart.min.js"></script>
  <script src="<?= base_url() ?>assets/frontend/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?= base_url() ?>assets/frontend/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?= base_url() ?>assets/frontend/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url() ?>assets/frontend/js/off-canvas.js"></script>
  <script src="<?= base_url() ?>assets/frontend/js/hoverable-collapse.js"></script>
  <script src="<?= base_url() ?>assets/frontend/js/template.js"></script>
  <script src="<?= base_url() ?>assets/frontend/js/settings.js"></script>
  <script src="<?= base_url() ?>assets/frontend/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url() ?>assets/frontend/js/dashboard.js"></script>
  <script src="<?= base_url() ?>assets/frontend/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

