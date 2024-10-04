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
            <h1 class="m-0">Nilai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Nilai</li>
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
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Data Nilai</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" onclick="return tambah()">
                      <i class="fas fa-plus"></i> Tambah
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- /.card-header -->
                  <?php
                  if ($this->session->flashdata('pesan1') != '') {
                    echo '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa fa-check"></i>';
                    echo $this->session->flashdata('pesan1');
                    $this->session->set_flashdata('pesan1', '');
                    echo '</h5></div>';
                  }
                  ?>
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
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr class="text-center">
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Matakuliah</th>
                        <th>Kehadiran</th>
                        <th>Tugas</th>
                        <th>Formatif</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th><i class="fa fa-cogs"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($_GET['semester'])) { ?>
                      <?php
                      $no = 1;
                      foreach ($read as $r) { ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $r->nama ?></td>
                          <td><?= $r->matkul ?></td>
                          <td><?= $r->kehadiran ?></td>
                          <td><?= $r->tugas ?></td>
                          <td><?= $r->formatif ?></td>
                          <td><?= $r->uts ?></td>
                          <td><?= $r->uas ?></td>
                          <td class="text-center">
                            <button class="btn btn-sm btn-warning" title="Edit" onclick="return ubah('<?= $r->id_nilai ?>','<?= $r->nim ?>', '<?= $r->id_matkul ?>', '<?= $r->kehadiran ?>', '<?= $r->tugas ?>', '<?= $r->formatif ?>', '<?= $r->uts ?>', '<?= $r->uas ?>')"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger" title="Hapus" onclick="return hapus('<?= $r->id_nilai ?>','<?= $r->nim ?>', '<?= $r->id_matkul ?>', '<?= $r->kehadiran ?>', '<?= $r->tugas ?>', '<?= $r->formatif ?>', '<?= $r->uts ?>', '<?= $r->uas ?>')"><i class="fa fa-trash"></i></button>
                          </td>
                        </tr>
                      <?php } ?>
                      <?php } ?>
                    </tbody>
                  </table>
                  <!-- /.card -->
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
    function tambah(){
      $('#myModal').modal({backdrop: 'static', keyboard: false});
      $('.modal-title').html('Tambah Nilai');
            $('[name="nim"]').val("");
            $('[name="id_matkul"]').val("");
            $('[name="kehadiran"]').val("");
            $('[name="tugas"]').val("");
            $('[name="formatif"]').val("");
            $('[name="uts"]').val("");
            $('[name="uas"]').val("");
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>nilai/add');
            
        }
        function ubah(id_nilai,nim,id_matkul,kehadiran,tugas,formatif,uts,uas){
      $('#myModal').modal({backdrop: 'static', keyboard: false});
      $('.modal-title').html('Ubah Nilai');
            $('[name="nim"]').val(nim);
            $('[name="id_matkul"]').val(id_matkul);
            $('[name="kehadiran"]').val(kehadiran);
            $('[name="tugas"]').val(tugas);
            $('[name="formatif"]').val(formatif);
            $('[name="uts"]').val(uts);
            $('[name="uas"]').val(uas);
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>nilai/edit/'+id_nilai);
        }
        function hapus(id_nilai,nim,id_matkul,kehadiran,tugas,formatif,uts,uas){
      $('#myModal').modal({backdrop: 'static', keyboard: false});
      $('.modal-title').html('Hapus Nilai');
            $('#jadwal').html(id_nilai);
            $('#submit').html('HAPUS');
            $('.input').addClass('d-none');
            $('.hapus').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>nilai/delete/'+id_nilai);
            $('[name="nim"]').removeAttr('required');
            $('[name="id_matkul"]').removeAttr('required');
            $('[name="kehadiran"]').removeAttr('required');
            $('[name="tugas"]').removeAttr('required');
            $('[name="formatif"]').removeAttr('required');
            $('[name="uts"]').removeAttr('required');
            $('[name="uas"]').removeAttr('required');
        }
  </script>
  <div id="myModal" class="modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <b><h4><p class="modal-title"></p></h4></b>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <form id="formId" action="" method="POST" enctype="multipart/form-data">
          <div class="modal-body input">
            <div class="form-group">
                  <label>Nama Mahasiswa</label>
                  <select class="custom-select form-control-border" id="nim" name="nim" required>
                    <option value="">--Pilih--</option>
                    <?php foreach ($akun as $s) { ?>
                      <option value="<?= $s->nim ?>"><?= $s->nama ?></option>
                    <?php } ?>
                  </select>
            </div>
            <div class="form-group">
                  <label>Matakuliah</label>
                  <select class="custom-select form-control-border" id="id_matkul" name="id_matkul" required>
                    <option value="">--Pilih--</option>
                    <?php foreach ($matkul as $m) { ?>
                      <option value="<?= $m->id_matkul ?>"><?= $m->matkul ?></option>
                    <?php } ?>
                  </select>
            </div>
            <div class="form-group">
              <label>Kehadiran</label>
              <input type="text" class="form-control" placeholder="kehadiran" name="kehadiran" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Tugas</label>
              <input type="text" class="form-control" placeholder="tugas" name="tugas" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Formatif</label>
              <input type="text" class="form-control" placeholder="formatif" name="formatif" autocomplete="off">
            </div>
            <div class="form-group">
              <label>UTS</label>
              <input type="text" class="form-control" placeholder="uts" name="uts" autocomplete="off">
            </div>
            <div class="form-group">
              <label>UAS</label>
              <input type="text" class="form-control" placeholder="uas" name="uas" autocomplete="off">
            </div>
          </div>
          <div class="modal-body hapus h5">
            Anda yakin ingin menghapus data ini</b>?
          </div>
          <div class="modal-footer bg-lp3i-dark">
            <button id="tutup" type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
            <button id="submit" type="submit" class="btn bg-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<script src="<?= base_url()?>assets/ckeditor/ckeditor.js"></script>