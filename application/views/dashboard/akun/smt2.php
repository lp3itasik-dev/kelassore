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
                              <th>Presensi</th>
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
                                <td>
                                  <a onclick="return tambah(`<?= $r->id_jadwal ?>`,`<?= $r->nim ?>`,`<?= $r->semester ?>`)" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ">Presensi</a>
                                </td>
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

  <!-- Mendapatkan Link gugelmit -->
  <form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
    <div id="Modal" class="modal fade" tabindex="-1">
      <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h4 id="modal-header" class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-d-none="true">&times;</button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id_jadwal">
            <span id="modal-body-update-or-create">
              <div class="row">
                <!-- <div class="form-group col-md-12">
                  <label>Id Jadwal</label>
                  <input type="text" name="id_jadwal" class="form-control" placeholder="id_jadwal" readonly>
                </div> -->
                <input type="hidden" name="nim" class="form-control" placeholder="nim" readonly>
                <input type="hidden" name="semester" class="form-control" placeholder="Semester" readonly>
                <input type="hidden" name="keterangan" class="form-control" placeholder="Semester" readonly>

            </span>
            <span id="modal-body-delete">
              Yakin untuk menghapus <b id="name-delete"></b> dari tabel ini?
            </span>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-block" id="modal-button" style="color: #fff;">Hadir</button>
            <button type="button" class="btn btn-block" data-dismiss="modal" id="batal" aria-d-none="true" style="color: #fff;">Batal</button>
          </div>
        </div>
      </div>
    </div>
  </form>

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
  <script>
    function tambah(id_jadwal, nim, semester) {
      $('#Modal').modal('show');
      $('#modal-header').html('Presensi');
      $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
      $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
      $('#modal-body-update-or-create').removeClass('d-none');
      $('#modal-body-delete').addClass('d-none');
      $('[name="id_jadwal"]').val(id_jadwal);
      $('[name="nim"]').val(nim);
      $('[name="semester"]').val(semester);
      $('[name="keterangan"]').val();
      document.form.action = '<?= base_url('Dashboard/actadd_detail2'); ?>';
    }
  </script>
</body>

</html>