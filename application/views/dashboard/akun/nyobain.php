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
                  <p class="card-title">Jadwal Perkuliahan</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Matakuliah</th>
                              <th>Semester</th>
                              <th>Dosen</th>
                              <th>Link Gmeet</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php
                              $no = 1;
                              $hari = date('l');
                              //echo date('l');
                              foreach ($read as $r) { ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $r->matkul ?></td>
                              <td><?= $r->semester ?></td>
                              <td><?= $r->dosen ?></td>
                              <?php
                                if($r->hari==date('l')){
                                ?>
                                <td><a href="<?= $r->link_gmeet ?>" class="btn btn-sm btn-danger" target="_blank">gmeet</a></td>
                              <?php } ?>
                              <?php
                                if($r->hari!=date('l')){
                                ?>
                                <td><button href="<?= $r->link_gmeet ?>" class="btn btn-sm btn-danger" target="_blank" disabled>gmeet</button></td>
                              <?php } ?>
                            </tr>
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

