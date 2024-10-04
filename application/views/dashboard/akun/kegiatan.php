<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>E-Notas - <?= $title;  ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">
   <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/backend/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/backend/plugins/fullcalendar/main.css">
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
                      <div class="card-body p-0">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="sticky-top mb-3">
                          <div class="card">
                            <div class="card-header">
                              <h5>Data Kegiatan</h5>
                            </div>
                            <div class="card-body">
                              <!-- the events -->
                              <div id="external-events">
                                <?php foreach ($read as $r) {
                                  $bg = null;
                                  if ($r->id_kategori == '1') {
                                    $bg = 'warning';
                                  }
                                  if ($r->id_kategori == '2') {
                                    $bg = 'primary';
                                  }
                                  if ($r->id_kategori == '3') {
                                    $bg = 'danger';
                                  }
                                  if ($r->id_kategori == '4') {
                                    $bg = 'success';
                                  }
                                  if ($r->id_kategori == '5') {
                                    $bg = 'info';
                                  }
                                ?>
                                  <div class="external-event bg-<?= $bg ?>"><?= $r->nama_kegiatan ?></div>
                                <?php } ?>
                              </div>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-9">
                        <div class="card card-primary">
                          <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                  </div>
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
<script>
    $(function() {

      /* initialize the external events
       -----------------------------------------------------------------*/
      function ini_events(ele) {
        ele.each(function() {

          // create an Event Object (https://fullcalendar.io/docs/event-object)
          // it doesn't need to have a start or end
          var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
          }

          // store the Event Object in the DOM element so we can get to it later
          $(this).data('eventObject', eventObject)

          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex: 1070,
            revert: true, // will cause the event to go back to its
            revertDuration: 0 //  original position after the drag
          })

        })
      }

      ini_events($('#external-events div.external-event'))

      /* initialize the calendar
       -----------------------------------------------------------------*/
      //Date for the calendar events (dummy data)
      var date = new Date()
      var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

      var Calendar = FullCalendar.Calendar;
      var Draggable = FullCalendar.Draggable;

      var containerEl = document.getElementById('external-events');
      var checkbox = document.getElementById('drop-remove');
      var calendarEl = document.getElementById('calendar');

      // initialize the external events
      // -----------------------------------------------------------------

      new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
          return {
            title: eventEl.innerText,
            backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
            borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
            textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
          };
        }
      });

      var calendar = new Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        themeSystem: 'bootstrap',
        //Random default events
        events: [
          <?php foreach ($read as $key => $value) {
            $tahun = date('Y', strtotime($value->waktu_kegiatan));
            $bulan = date('m', strtotime($value->waktu_kegiatan)) - 1;
            $hari = date('d', strtotime($value->waktu_kegiatan));
            $jam = date('H', strtotime($value->jam)); ?>

            {
              title: '<?= $value->nama_kegiatan ?>',
              start: new Date(<?= $tahun ?>, <?= $bulan ?>, <?= $hari ?>, <?= $jam ?>),
              backgroundColor: '#0073b7', //red
              borderColor: '#0073b7', //red
              allDay: false
            },
          <?php } ?>
        ],
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(info) {
          // is the "remove after drop" checkbox checked?
          if (checkbox.checked) {
            // if so, remove the element from the "Draggable Events" list
            info.draggedEl.parentNode.removeChild(info.draggedEl);
          }
        }
      });

      calendar.render();
      // $('#calendar').fullCalendar()

      /* ADDING EVENTS */
      var currColor = '#3c8dbc' //Red by default
      // Color chooser button
      $('#color-chooser > li > a').click(function(e) {
        e.preventDefault()
        // Save color
        currColor = $(this).css('color')
        // Add color effect to button
        $('#add-new-event').css({
          'background-color': currColor,
          'border-color': currColor
        })
      })
      $('#add-new-event').click(function(e) {
        e.preventDefault()
        // Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
          return
        }

        // Create events
        var event = $('<div />')
        event.css({
          'background-color': currColor,
          'border-color': currColor,
          'color': '#fff'
        }).addClass('external-event')
        event.text(val)
        $('#external-events').prepend(event)

        // Add draggable funtionality
        ini_events(event)

        // Remove event from text input
        $('#new-event').val('')
      })
    })
  </script>
  <script src="<?= base_url() ?>/assets/backend/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url() ?>/assets/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- fullCalendar 2.2.5 -->
  <script src='<?= base_url() ?>/assets/backend/plugins/fullcalendar/locales/id.js'></script>
  <script src="<?= base_url() ?>/assets/backend/plugins/moment/moment.min.js"></script>
  <script src="<?= base_url() ?>/assets/backend/plugins/fullcalendar/main.js"></script>

</body>

</html>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>/assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/backend/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/assets/backend/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/assets/backend/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/assets/backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>