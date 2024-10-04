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
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight">Selamat Datang</h3>
                  <h3 class="font-weight-bold text-uppercase" style="font-size: 32px;"><?=$this->session->userdata('nama')  ?></h3>
                  <h5 class="font-weight-normal mb-0">Silakan untuk memulai perkuliahan anda sesuai dengan jadwal yang telah ditentukan.</span></h5>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="<?= base_url() ?>/assets/frontend/images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <!-- <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2> -->
                      </div>
                      <div class="ml-2">
                        <!-- <h4 class="location font-weight-normal">Bangalore</h4>
                        <h6 class="font-weight-normal">India</h6> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Matakuliah</p>
                      <a href="<?= base_url() ?>dashboard/smt1"><p class="fs-30 mb-2" style="color: white;">Semester 1</p></a>
                      <p>Kelas Nonreg</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Matakuliah</p>
                      <a href="<?= base_url() ?>dashboard/smt2"><p class="fs-30 mb-2" style="color: white;">Semester 2</p></a>
                      <p>Kelas Nonreg</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Matakuliah</p>
                      <a href="<?= base_url() ?>dashboard/smt3"><p class="fs-30 mb-2" style="color: white;">Semester 3</p></a>
                      <p>Kelas Nonreg</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Matakuliah</p>
                      <a href="<?= base_url() ?>dashboard/smt4"><p class="fs-30 mb-2" style="color: white;">Semester 4</p></a>
                      <p>Kelas Nonreg</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Matakuliah</p>
                      <a href="<?= base_url() ?>dashboard/smt5"><p class="fs-30 mb-2" style="color: white;">Semester 5</p></a>
                      <p>Kelas Nonreg</p>
                    </div>
                  </div>  
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Matakuliah</p>
                      <a href="<?= base_url() ?>dashboard/smt6"><p class="fs-30 mb-2" style="color: white;">Semester 6</p></a>
                      <p>Kelas Nonreg</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <!-- <div class="card">
                <div class="card-body">
                  <p class="card-title">Advanced Table</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>Quote#</th>
                              <th>Product</th>
                              <th>Business type</th>
                              <th>Policy holder</th>
                              <th>Premium</th>
                              <th>Status</th>
                              <th>Updated at</th>
                              <th></th>
                            </tr>
                          </thead>
                      </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div> -->

                
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

