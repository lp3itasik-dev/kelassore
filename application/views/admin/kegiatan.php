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
            <h1 class="m-0">Kegiatan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kegiatan</li>
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
                  <h3 class="card-title">Data Kegiatan</h3>
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
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr class="text-center">
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Kategori Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Jam Kegiatan</th>
                        <th>Deskripsi Kegiatan</th>
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
                          <td><?= $r->nama_kategori ?></td>
                          <td><?= $r->waktu_kegiatan ?></td>
                          <td><?= $r->jam ?></td>
                          <td><?= $r->deskripsi_kegiatan ?></td>
                          <td><img src="<?php echo base_url() . 'assets/img/sampul/' . $r->foto ?>" style="max-width: 100%;height: auto;  border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;width: 40px;"></td>
                          <td class="text-center">
                            <button class="btn btn-sm btn-warning" title="Edit" onclick="return ubah('<?= $r->id_kegiatan ?>','<?= $r->id_kategori ?>', '<?= $r->nama_kegiatan ?>', '<?= $r->waktu_kegiatan ?>', '<?= $r->jam ?>', '<?= $r->deskripsi_kegiatan ?>', '<?= $r->foto ?>')"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger" title="Hapus" onclick="return hapus('<?= $r->id_kegiatan ?>','<?= $r->id_kategori ?>', '<?= $r->nama_kegiatan ?>', '<?= $r->waktu_kegiatan ?>', '<?= $r->jam ?>', '<?= $r->deskripsi_kegiatan ?>', '<?= $r->foto ?>')"><i class="fa fa-trash"></i></button>
                          </td>
                        </tr>
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
      $('.modal-title').html('Tambah Kegiatan');
            $('[name="id_kategori"]').val("");
            $('[name="nama_kegiatan"]').val("");
            $('[name="waktu_kegiatan"]').val("");
            $('[name="jam"]').val("");
            $('[name="deskripsi_kegiatan"]').val("");
            $('[name="foto"]').val("");
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>kegiatan/add');
            $('[name="id_kategori"]').attr('required','');
            $('[name="nama_kegiatan"]').attr('required','');
            $('[name="waktu_kegiatan"]').attr('required','');
            $('[name="deskripsi_kegiatan"]').attr('required','');
            $('[name="foto"]').attr('required','');
            
        }
        function ubah(id_kegiatan,id_kategori,nama_kegiatan, waktu_kegiatan, jam, deskripsi_kegiatan, foto){
      $('#myModal').modal({backdrop: 'static', keyboard: false});
      $('.modal-title').html('Ubah Kegiatan');
            $('.select-selection__rendered').html(id_kategori);
            $('[name="nama_kegiatan"]').val(nama_kegiatan);
            $('[name="waktu_kegiatan"]').val(waktu_kegiatan);
            $('[name="jam"]').val(jam);
            $('[name="deskripsi_kegiatan"]').val(deskripsi_kegiatan);
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>kegiatan/edit/'+id_kegiatan);
            $('[name="id_kategori"]').attr('required','');
            $('[name="nama_kegiatan"]').attr('required','');
            $('[name="waktu_kegiatan"]').attr('required','');
            $('[name="deskripsi_kegiatan"]').attr('required','');
        }
        function hapus(id_kegiatan,id_kategori,nama_kegiatan, waktu_kegiatan, jam, deskripsi_kegiatan, foto){
      $('#myModal').modal({backdrop: 'static', keyboard: false});
      $('.modal-title').html('Hapus Kegiatan');
            $('#kegiatan').html(nama_kegiatan);
            $('#submit').html('HAPUS');
            $('.input').addClass('d-none');
            $('.hapus').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>kegiatan/delete/'+id_kegiatan);
            $('[name="id_kategori"]').removeAttr('required');
            $('[name="nama_kegiatan"]').removeAttr('required');
            $('[name="waktu_kegiatan"]').removeAttr('required');
            $('[name="jam"]').removeAttr('required');
            $('[name="deskripsi_kegiatan"]').removeAttr('required');
            $('[name="foto"]').removeAttr('required');
        }
  </script>
  <div id="myModal" class="modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <b><h4><p class="modal-title"></p></h4></b>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <form id="formId" action="" method="POST" enctype="multipart/form-data">
          <div class="modal-body input">
            <div class="form-group">
              <label>Nama Kegiatan</label>
              <input type="text" class="form-control" placeholder="Nama Kegiatan" name="nama_kegiatan" required>
            </div>
            <div class="form-group">
              <label>Waktu Kegiatan</label>
              <input type="date" class="form-control" placeholder="Waktu Kegiatan" name="waktu_kegiatan" required>
            </div>
            <div class="form-group">
              <label>Jam Kegiatan</label>
              <input type="time" class="form-control" placeholder="Jam Kegiatan" name="jam" required>
            </div>
            <div class="form-group">
                  <label>Kategori Kegiatan</label>
                  <select class="custom-select form-control-border" id="id_kategori" name="id_kategori" required>
                    <option value="">--Pilih--</option>
                    <?php foreach ($kategori as $r) { ?>
                      <option value="<?= $r->id_kategori ?>"><?= $r->nama_kategori ?></option>
                    <?php } ?>
                  </select>
            </div>
            <div class="form-group">
              <label>Deskripsi Kegiatan</label>
              <textarea class="form-control" name="deskripsi_kegiatan"></textarea>
            </div>
            <div class="form-group">
              <label>Sampul</label>
              <input type="file" class="form-control" name="foto">
            </div>
          </div>
          <div class="modal-body hapus h5">
            Anda yakin ingin menghapus kegiatan <b id="kegiatan"></b>?
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