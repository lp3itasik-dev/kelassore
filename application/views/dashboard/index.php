<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nonreg | Log in</title>

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/frontend/img/lp3i-head.png" rel="icon">
  <link href="<?= base_url() ?>assets/frontend/img/lp3i-head.png" rel="apple-touch-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/dist/css/adminlte.min.css">
  <style type="text/css">
    body{
     background-image: url('assets/img/bg.png');
     background-position: center;
     background-repeat: no-repeat;
     background-size: cover;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary" style="box-shadow: 0px 1px 5px 10px lightblue;">
    <div class="card-header text-center">
      <a href="#" class="h4">Kelas <b>Non Reguler</b></a><br>
      <img src="<?= base_url() ?>/assets/frontend/img/logo-lp3i.png" width="70%" style="margin-top: 15px;">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php
              if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa fa-times"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
              }
      ?>
      <?php
              if ($this->session->flashdata('pesan2')) {
                echo '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa fa-check"></i>';
                echo $this->session->flashdata('pesan2');
                echo '</h5></div>';
              }
              ?>
      <form action="<?= base_url() ?>Logs/cek_login" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="nim" required="" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required="" id="pswd">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="chk">
                <label class="form-check-label" id="showhide">Show Password</label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="" data-toggle="modal" data-target="#forgot-password">I forgot my password</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/backend/dist/js/adminlte.min.js"></script>
<script>
      var masukanpass = document.getElementById('pswd'),
      chk  = document.getElementById('chk'),
      label = document.getElementById('showhide');


     chk.onclick = function () {

      if(chk.checked) {

           masukanpass.setAttribute('type', 'text');
           label.textContent = 'Hide Passowrd';
       } else {

           masukanpass.setAttribute('type', 'password');
           label.textContent = 'Show Passowrd';
       }
 
     }
  </script>
</body>
<div class="modal fade" id="forgot-password">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Reset Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url() ?>dashboard/resetpass" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="nim" class="form-control" required="">
              </div>
              <div class="form-group">
                <label>New Password</label>
                <input type="password" name="password" class="form-control" required="" id="pswd">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
</html>
