<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>dashboard/mhs">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Jadwal</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/smt1">Semester 1</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/smt2">Semester 2</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/smt3">Semester 3</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/smt4">Semester 4</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/smt5">Semester 5</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/smt6">Semester 6</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>dashboard/nilai">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Nilai</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>dashboard/profil">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Profil Saya</span>
            </a>
          </li>
          
        </ul>
      </nav>