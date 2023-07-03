  
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Welcome <?php echo $this->session->userdata('namap'); ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

      
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">OFFICER</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php echo $petugas ?> Officer</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 col-xl-4">
            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">COMMUNITY</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $masyarakat ?> Community</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

           <div class="col-xxl-4 col-xl-4">
            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">COMPLAINT</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-chat-left-text"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $pengaduan ?> Complaint</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  </main><!-- End #main -->