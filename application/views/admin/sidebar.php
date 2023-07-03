  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?= base_url('dashboard/admin'); ?>">
          <i class="bi bi-grid"></i>
          <span>DASHBOARD</span>
        </a>
      </li><!-- End Dashboard Nav -->

         <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>DATA</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('dashboard/data_petugas'); ?>">
              <i class="bi bi-circle"></i><span>Officer</span>
            </a>
             <a href="<?= base_url('dashboard/data_masyarakat'); ?>">
              <i class="bi bi-circle"></i><span>Community</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

       <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('dashboard/pengaduan'); ?>">
          <i class="bi bi-envelope"></i>
          <span>COMPLAINT</span>
        </a>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('dashboard/laporan'); ?>">
          <i class="bi bi-journal-text"></i>
          <span>REPORT</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->