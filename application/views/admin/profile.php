<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('template/backend/head') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <?php $this->load->view('template/backend/preloader') ?>

  <!-- Navbar -->
  <?php $this->load->view('template/backend/navbar') ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $this->load->view('template/backend/sidebar') ?>
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url() . 'assets/img/user/' .  $akun[0]->foto; ?>?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $akun[0]->nama ?></h3>

                <!--<p class="text-muted text-center">Software Engineer</p>-->

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b><?= $akun[0]->nim ?></b><a class="float-right">Username</a>
                  </li>
                  <li class="list-group-item">
                    <b><?= $akun[0]->password ?></b> <a class="float-right">Password</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
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
                        <form class="form-horizontal" action="<?=base_url()?>Admin/edit" method="POST" enctype="multipart/form-data">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nim" placeholder="NIM" value="<?php echo $this->session->userdata('nim'); ?>" readonly="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nama" placeholder="Name" value="<?= $akun[0]->nama ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" name="password" placeholder="password" value="<?= $akun[0]->password ?>" id="pswd">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label"></label>&nbsp&nbsp&nbsp
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="chk">
                              <label class="form-check-label" id="showhide">Show Password</label>
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
                            <label for="inputSkills" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control-file" name="foto" placeholder="Skills">
                            </div>
                          </div>
                          <!-- <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                </label>
                              </div>
                            </div>
                          </div> -->
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <?php $this->load->view('template/backend/footer') ?>
  <!-- Control Sidebar -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
  <?php $this->load->view('template/backend/script') ?>
</body>
</html>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
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
<script>
    function tambah(){
      $('#myModal').modal({backdrop: 'static', keyboard: false});
      $('.modal-title').html('Tambah Kategori');
            $('[name="nama_kategori"]').val("");
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>kategori/add');
            $('[name="nama_kategori"]').attr('required','');
            
        }
        function ubah(id_kategori,nama_kategori){
      $('#myModal').modal({backdrop: 'static', keyboard: false});
      $('.modal-title').html('Ubah Kategori');
            $('[name="nama_kategori"]').val(nama_kategori);
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>kategori/edit/'+id_kategori);
            $('[name="nama_kategori"]').attr('required','');
        }
        function hapus(id_kategori,nama_kategori){
      $('#myModal').modal({backdrop: 'static', keyboard: false});
      $('.modal-title').html('Hapus Kategori');
            $('#kategori').html(nama_kategori);
            $('#submit').html('HAPUS');
            $('.input').addClass('d-none');
            $('.hapus').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>kategori/delete/'+id_kategori);
            $('[name="nama_kategori"]').removeAttr('required');
        }
  </script>
  <div id="myModal" class="modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <b><h4><p class="modal-title"></p></h4></b>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <form id="formId" action="" method="POST">
          <div class="modal-body input">
            <div class="form-group">
              <label>Nama Kategori</label>
              <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kategori" required>
            </div>
          </div>
          <div class="modal-body hapus h5">
            Anda yakin ingin menghapus kategori <b id="kategori"></b>?
          </div>
          <div class="modal-footer bg-lp3i-dark">
            <button id="tutup" type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
            <button id="submit" type="submit" class="btn bg-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
