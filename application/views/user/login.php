<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/frontend/images/Logo_Kota_Tasikmalaya.png">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url() ?>/assets/frontend/login/fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?= base_url() ?>/assets/frontend/login/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/frontend/login/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/frontend/login/css/style.css">

  <title>Login</title>
</head>

<body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?= base_url() ?>/assets/frontend/login/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <h3><b>Login</b></h3>
                <p class="mb-4">Silahkan masukkan username dan password anda.</p>
              </div>
              <form action="<?= base_url() ?>/Logs/cek_login" method="post" class="login100-form validate-form">
                <?php
                if ($this->session->flashdata('message') != '') {
                  echo '<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa fa-check"></i>';
                  echo $this->session->flashdata('message');
                  $this->session->set_flashdata('message', '');
                  echo '</h5></div>';
                }
                ?>
                <div class="form-group first">
                  <label for="username">NIP</label>
                  <input type="text" class="form-control" id="username" name="nip" autocomplete="off" required="">

                </div>
                <div class="form-group last mb-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password">

                </div>

                <div class="d-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked" />
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                </div>

                <input type="submit" value="Log In" class="btn btn-block btn-primary">



              </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


  <script src="<?= base_url() ?>/assets/frontend/login/js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url() ?>/assets/frontend/login/js/popper.min.js"></script>
  <script src="<?= base_url() ?>/assets/frontend/login/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/assets/frontend/login/js/main.js"></script>
</body>

</html>