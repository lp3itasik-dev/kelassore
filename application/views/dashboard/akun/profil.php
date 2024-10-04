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
            <div class="col-md-6 grid-margin stretch-card">
              <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url() . 'assets/img/user/' .  $this->session->userdata('foto'); ?>?>"
                       alt="User profile picture" style="width: 40%;">
                </div>
                <p>
                <h3 class="profile-username text-center"><?= $this->session->userdata('nama') ?></h3>
              </p><br>
                <!--<p class="text-muted text-center">Software Engineer</p>-->

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b><?= $this->session->userdata('kelas') ?></b><a class="float-right">Kelas</a>
                  </li>
                  <li class="list-group-item">
                    <b><?= $this->session->userdata('jurusan') ?></b> <a class="float-right">Jurusan</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Profil Saya</h4>
                  <p class="card-description">
                    Form ubah data diri
                  </p>
                  <form action="<?= base_url() ?>Dashboard/edit" method="POST" enctype="multipart/form-data">
                    <?php
                    if ($this->session->flashdata('pesan')) {
                      echo '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa fa-check"></i>';
                      echo $this->session->flashdata('pesan');
                      echo '</h5></div>';
                    }
                    ?>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">NIM</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nim" value="<?= $this->session->userdata('nim') ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                      <input type="password" class="form-control" name="password" value="<?= $this->session->userdata('password') ?>" id="pswd">
                      </div>
                       <label class="col-md-3 col-form-label"></label>
                       <label class="col-sm-3 form-check-label" id="showhide">show password</label>
                        <div style="margin-left: -55px;">
                          <input type="checkbox" class="form-check-input" id="chk">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" value="<?= $this->session->userdata('nama') ?>" autocomplete="off">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Kelas</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="kelas" value="<?= $this->session->userdata('kelas') ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Jurusan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="jurusan" value="<?= $this->session->userdata('jurusan') ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="jenis_kelamin">
                          <option value="Laki-laki" <?php if ($this->session->userdata('jenis_kelamin') == 'Laki-laki') {
                                                      echo 'selected';
                                                    } ?>>Laki-Laki</option>
                          <option value="Perempuan" <?php if ($this->session->userdata('jenis_kelamin') == 'Perempuan') {
                                                      echo 'selected';
                                                    } ?>>Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-3 col-form-label">Foto</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" name="foto" value="<?= $this->session->userdata('foto') ?>">
                      </div>
                    </div>  
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
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
  <script>
      var masukanpass = document.getElementById('pswd'),
      chk  = document.getElementById('chk'),
      label = document.getElementById('showhide');


     chk.onclick = function () {

      if(chk.checked) {

           masukanpass.setAttribute('type', 'text');
           label.textContent = 'hide password';
       } else {

           masukanpass.setAttribute('type', 'password');
           label.textContent = 'show password';
       }
 
     }
  </script>
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

