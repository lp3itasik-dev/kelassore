<link rel="stylesheet" href="<?= base_url() ?>assets/backend/swal/sweetalert2.min.css">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>Dashboard" class="brand-link">
      <img src="<?= base_url() ?>/assets/frontend/img/lp3i-logo-white.png" alt="AdminLTE Logo" class="img-fluid" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() . 'assets/img/user/' .  $akun[0]->foto; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $akun[0]->nama ?></a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url()?>admin" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-calendar-minus"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>dosen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Dosen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>matkul" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Matakuliah</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>jadwal" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Jadwal
                <?php $jmlc = $this->m->view('jadwal')->num_rows(); ?>
                <span class="badge badge-info right"><?php echo $jmlc; ?></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>nilai" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Nilai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>user" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?= base_url()?>admin/profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>Logs/logout" class="nav-link" id="btn-logout">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
   <?php $this->load->view('template/backend/script') ?>
  <script>
  var flash = $('#flash').data('flash');
  if (flash) {
    Swal.fire({
      icon: 'success',
      tittle: 'Berhasil',
      text: flash
    })
  }
  $(document).on('click', '#btn-logout', function(e){
    e.preventDefault();
    var link = $(this).attr('href');
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Akan Logout!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Logout!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = link; 
        }
})
  })
</script>