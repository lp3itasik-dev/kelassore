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
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                  <h3 class="card-title">Data User</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
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
                        <th>NIM</th>
                        <th>Nama User</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th><i class="fa fa-cogs"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($read as $r) { ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $r->nim ?></td>
                          <td><?= $r->nama ?></td>
                          <td><?= $r->kelas ?></td>
                          <td><?= $r->jurusan ?></td>
                          <td class="text-center">
                            <button class="btn btn-sm btn-warning" data-toggle="modal" title="Edit" data-target="#edit<?= $r->nim ?>"><i class="fa fa-edit"></i></button>
                            |
                            <button class="btn btn-sm btn-danger" title="Hapus" data-toggle="modal" data-target="#delete<?= $r->nim ?>"><i class="fa fa-trash"></i></button>
                            |
                            <button class="btn btn-sm btn-info" title="Detail" data-toggle="modal" data-target="#detail<?= $r->nim ?>"><i class="fa fa-eye"></i></button>
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

<!-- Modal -->
  <div class="modal fade" id="add">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header btn-primary">
            <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php
            echo form_open_multipart('User/add');
            ?>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>NIM</label>
                  <input type="text" class="form-control" placeholder="Masukan NIM" name="nim" required autocomplete="off">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Masukan Password" name="password" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Nama User</label>
              <input type="text" class="form-control" placeholder="Nama User" name="nama" required autocomplete="off">
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Kelas</label>
                  <input type="text" class="form-control" placeholder="Kelas" name="kelas" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Jurusan</label>
                  <input type="text" class="form-control" placeholder="Jurusan" name="jurusan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" required>
                      <option value="">--Pilih--</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Level</label>
                    <select class="form-control" name="level" required>
                      <option value="">--Pilih--</option>
                      <option value="1">Admin</option>
                      <option value="2">Mahasiswa</option>
                    </select>
                </div>
              </div>
            </div> 
            <div class="form-group">
              <label>Foto</label>
              <input type="file" name="foto" required>
            </div> 
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          <?php
          echo form_close();
          ?>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

<!-- MODAL EDIT -->
    <?php foreach ($read as $r) { ?>
      <div class="modal fade" id="edit<?= $r->nim ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header btn-primary">
              <h4 class="modal-title"><i class="fa fa-edit"></i> Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php
              echo form_open('User/edit/' . $r->nim);
              ?>
              <div class="form-group">
                <input type="hidden" class="form-control" placeholder="Username" value="<?= $r->nim ?>" name="id" required>
                <label>Nama User</label>
                <input type="text" class="form-control" placeholder="Username" value="<?= $r->nama ?>" name="nama" required>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?php
            echo form_close();
            ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <?php } ?>

<!-- MODAL HAPUS -->    
<?php foreach ($read as $r) { ?>
      <div class="modal fade" id="delete<?= $r->nim ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-trash-alt"></i> Delete Data User </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5>Anda yakin ingin menghapus data dengan NIM [<?= $r->nim ?>]??</h5>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?= base_url() ?>User/delete?id=<?= $r->nim ?>" class="btn btn-danger">Delete</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <?php } ?>
<!-- MODAL DETAIL -->
<?php foreach ($read as $r) {
 ?>
  <div class="modal fade" id="detail<?= $r->nim ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header btn-primary">
            <h4 class="modal-title"><i class="fa fa-eye"></i> Detail User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Nip</label>
                  <input type="text" class="form-control" placeholder="Masukan NIP" name="nim" value="<?= $r->nim ?>" required readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" placeholder="Masukan Password" name="password" value="<?= $r->password ?>" required readonly>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Nama User</label>
              <input type="text" class="form-control" placeholder="Nama User" name="nama" value="<?= $r->nama ?>" required readonly>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Kelas</label>
                  <input type="text" class="form-control" placeholder="kelas" name="kelas" value="<?= $r->kelas ?>" required readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Jurusan</label>
                  <input type="text" class="form-control" placeholder="Jurusan" name="jurusan" value="<?= $r->jurusan ?>" required readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" required disabled>
                      <option value=""><?= $r->jenis_kelamin ?></option>
                    </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Level</label>
                    <select class="form-control" name="level" required readonly>
                      <option value=""><?= $r->level ?></option>
                    </select>
                </div>
              </div>
            </div> 
            <div class="form-group">
              
              <img src="<?php echo base_url() . 'assets/img/user/' . $r->foto ?>"style="  max-width: 100%;height: auto;  border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;width: 300px;">
            </div> 
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
<?php }?>