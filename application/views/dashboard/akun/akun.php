<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>E-Notas - <?= $title;  ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php $this->load->view('template/frontend/head') ?>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php $this->load->view('template/frontend/header') ?>
  <!-- End Header -->
  <!-- ======= Breadcrumbs ======= -->
    <?php $this->load->view('template/frontend/breadcrumbs') ?>
    <!-- End Breadcrumbs -->

  <section id="contact" class="contact mt-1">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Akun</h2>
        <p><?= $title  ?></p>
      </header>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-header bg-info">
                <h3 class="card-title text-center text-white">Profile</h3>
              </div>
              <div class="card-body box-profile">
                <div class="text-center">
                  <img style="max-width: 100%;height: auto;  border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;width: 100px;" src="<?php echo base_url() . 'assets/img/user/' .  $akun[0]->foto; ?>?>" alt="User profile picture">
                </div>
                <h2 class="profile-username text-center"><?= $akun[0]->nama_user ?></h2>
                <hr>
                <nav class="mt-2 ">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                      <a href="<?= base_url() ?>dashboard/user" class="nav-link <?php if ($this->uri->segment(2) == 'user') {
                                                                          echo "active";
                                                                        } ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                          Akun Saya
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url() ?>dashboard/kegiatan" class="nav-link <?php if ($this->uri->segment(2) == 'kegiatan') {
                                                                            echo "active";
                                                                          } ?>">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                          Kegiatan
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url() ?>dashboard/scanqr" class="nav-link">
                        <i class="nav-icon fas fa-qrcode"></i>
                        <p>
                          Scan Qr
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url() ?>dashboard/notulensi" class="nav-link <?php if ($this->uri->segment(2) == 'notulensi') {
                                                                            echo "active";
                                                                          } ?>">
                        <i class="nav-icon fas fa-sticky-note"></i>
                        <p>
                          Notulensi
                        </p>
                      </a>
                    </li>
                    </li>
                    <li class="nav-item">
                      <a onclick="return confirm('Anda Yakin Ingin Keluar?')" href="<?= base_url() ?>Logs/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                          Keluar
                        </p>
                      </a>
                    </li>
                    </li>
                  </ul>
                  </li>
                  </ul>
                </nav>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary card-tabs">
                  <div class="card-body ">
                    <?php
                    if ($this->session->flashdata('pesan')) {
                      echo '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa fa-check"></i>';
                      echo $this->session->flashdata('pesan');
                      echo '</h5></div>';
                    }
                    ?>
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                      <div class="tab-pane active" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                        <form class="form-horizontal" action="<?=base_url()?>Dashboard/edit" method="POST" enctype="multipart/form-data">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" name="nip" placeholder="NIP" value="<?php echo $this->session->userdata('nip'); ?>" readonly="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nama_user" placeholder="Name" value="<?= $akun[0]->nama_user ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" name="password" placeholder="password" value="<?= $akun[0]->password ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $akun[0]->email ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="jenis_kelamin">
                  <option value="Laki-laki" <?php if ($akun[0]->jenis_kelamin == 'Laki-laki') {
                                              echo 'selected';
                                            } ?>>Laki-Laki</option>
                  <option value="Perempuan" <?php if ($akun[0]->jenis_kelamin == 'Perempuan') {
                                              echo 'selected';
                                            } ?>>Perempuan</option>
                </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="no_tlp" placeholder="Telp" value="<?= $akun[0]->no_tlp ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" id="inputExperience" placeholder="Alamat" name="alamat"><?= $akun[0]->alamat ?></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control-file" name="foto" placeholder="Skills">
                              <input type="hidden" name="level" value="2">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
  </section><!-- End Contact Section -->

  <!-- ======= Footer ======= -->
  <?php $this->load->view('template/frontend/footer') ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php $this->load->view('template/frontend/script') ?>
  <!-- Template Main JS File -->
</body>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example3").DataTable({
      "responsive": true,
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example4").DataTable({
      "responsive": true,
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#detailpenjualan").DataTable({
      "responsive": true,
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: ' Produk Berhasil Dimasukan Keranjang'
      })
    });
  });
</script>