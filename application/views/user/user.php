<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('template/frontend/head') ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/backend/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/backend/plugins/fullcalendar/main.css">
</head>

<body>
  <!--/ Topbar  -->
  <?php $this->load->view('template/frontend/topbar') ?>
  <!--/ Topbar end -->
  <!-- Header start -->
  <?php $this->load->view('template/frontend/header_user') ?>
  <!--/ Header end -->

  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url() . 'assets/img/user/' .  $this->session->userdata('foto'); ?>?>" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?php echo $this->session->userdata('nama_user'); ?></h3>

              <!--<p class="text-muted text-center">Software Engineer</p>-->

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b><?php echo $this->session->userdata('no_tlp'); ?></b> <a class="float-right">Telp</a>
                </li>
                <li class="list-group-item">
                  <b><?php echo $this->session->userdata('alamat'); ?></b> <a class="float-right">Alamat</a>
                </li>
                <li class="list-group-item">
                  <b><?php echo $this->session->userdata('email'); ?></b> <a class="float-right">Email</a>
                </li>
              </ul>

              <a href="<?= base_url() ?>Logs/logout" class="btn btn-primary btn-block"><b>Logout</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div><!-- Col end -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                <li class="nav-item"><a class="nav-link" href="#notulensi" data-toggle="tab">Notulensi</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
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
                  <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-danger">
                        10 Feb. 2014
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-envelope bg-primary"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                        <div class="timeline-body">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                          weebly ning heekya handango imeem plugg dopplr jibjab, movity
                          jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                          quora plaxo ideeli hulu weebly balihoo...
                        </div>
                        <div class="timeline-footer">
                          <a href="#" class="btn btn-primary btn-sm">Read more</a>
                          <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-user bg-info"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                        </h3>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-comments bg-warning"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                        <div class="timeline-body">
                          Take me to your leader!
                          Switzerland is small and neutral!
                          We are more like Germany, ambitious and misunderstood!
                        </div>
                        <div class="timeline-footer">
                          <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-success">
                        3 Jan. 2014
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-camera bg-purple"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                        <div class="timeline-body">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <div>
                      <i class="far fa-clock bg-gray"></i>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="notulensi">
                  <!-- The timeline -->
                  <div class="row">
                    <div class="col-sm-12">
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
                            <th>Waktu Kegiatan</th>
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
                              <td><?= $r->deskripsi_kegiatan ?></td>
                              <td><img src="<?php echo base_url() . 'assets/img/sampul/' . $r->foto ?>" style="max-width: 100%;height: auto;  border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;width: 40px;"></td>
                              <td class="text-center">
                                <a class="btn btn-sm btn-warning" title="Edit" href="<?= base_url() ?>Dashboard/notulensi?id=<?= $r->id_kegiatan ?>"><i class="fa fa-edit"></i> Catat</a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="settings">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">NIP</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="NIP" value="<?php echo $this->session->userdata('nip'); ?>" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name" value="<?php echo $this->session->userdata('nama_user'); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $this->session->userdata('email'); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="jenis_kelamin" required="">
                          <option value="">--Pilih--</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Telp</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Telp" value="<?php echo $this->session->userdata('no_tlp'); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Alamat" value="<?php echo $this->session->userdata('alamat'); ?>"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Foto</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="inputSkills" placeholder="Skills">
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
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div>
      <!--/ Content row end -->
    </div>
    <!--/ Container end -->
  </section><!-- Content end -->





  <!-- Footer -->
  <?php $this->load->view('template/frontend/footer') ?>
  <!-- Footer end -->


  <!-- Javascript Files -->
  <?php $this->load->view('template/frontend/script') ?>
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
            $jam = date('H', strtotime($value->waktu_kegiatan)); ?>

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