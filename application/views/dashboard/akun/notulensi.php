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
                  <img style="max-width: 100%;height: auto;  border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;width: 100px;" src="<?php echo base_url() . 'assets/img/user/' .  $akun[0]->foto ?>?>" alt="User profile picture">
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
                          Logout
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
                  <div class="card-body">
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
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr class="text-center">
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Waktu Kegiatan</th>
                            <th>sampul</th>
                            <th><i class="fa fa-cogs"></i></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($read as $r) { ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $r->nama_kegiatan ?></td>
                              <td><?= $r->waktu_kegiatan ?></td>
                              <td class="text-center"><img src="<?php echo base_url() . 'assets/img/sampul/' . $r->foto ?>" style="max-width: 100%;height: auto;  border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;width: 40px;"></td>
                              <td class="text-center">
                                <a class="btn btn-sm btn-warning" title="Edit" href="<?= base_url() ?>Dashboard/catat?id=<?= $r->id_kegiatan ?>"><i class="fa fa-edit"></i> Catat</a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
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