<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fab fa-cuttlefish"></i><i class="fab fa-vuejs"></i>  
        </div>
        <div class="sidebar-brand-text mx-2">Student Online CV</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Students
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user-cog"></i>
          <span>Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('user'); ?>">
            <i class="far fa-fw fa-user"></i>
            <span>My Profile</span></a>
            <a class="collapse-item" href="<?= base_url('user/editProfile'); ?>">
            <i class="fas fa-user-edit"></i>
            <span>Edit Profile</span></a>
             <a class="collapse-item" href="<?= base_url('user/changePassword'); ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>Change Password</span></a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - My CV -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('user/myCV'); ?>">
          <i class="far fa-fw fa-eye"></i>
          <span>My CV</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - My Points -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/myPoint'); ?>">
          <i class="fab fa-fw fa-pinterest-p"></i>
          <span>My Points</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Create CV -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/createCV'); ?>">
          <i class="fas fa-fw fa-plus-circle"></i>
          <span>Create CV</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

       <!-- Nav Item - Create CV -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout');  ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name'];  ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/').$user['image'];  ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('user'); ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('auth/logout');  ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">View All Form</h1>

  <div class="card-deck">
    <div class="card mb-4" style="width: 10rem;" >
      <div class="card-header text-white bg-info">
        Student Info
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <h5 class="card-title">NIM</h5>
            <p class="card-text"><?= $user['nim']; ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Email</h5>
            <p class="card-text"><?= $user['email']; ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Nama Lengkap</h5>
            <p class="card-text"><?= $x->nama; ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Tempat Lahir</h5>
            <p class="card-text"><?= $x->tempat_lahir ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Tanggal Lahir</h5>
            <p class="card-text"><?=$x->tanggal_lahir ?></p>
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Agama</h5>
            <p class="card-text"><?=$x->agama ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Alamat</h5>
            <p class="card-text"><?=$x->alamat ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Deskripsi Diri</h5>
            <p class="card-text"><?=$x->deskripsi_diri ?></p> 
        </li>
      </ul>
    </div>

    <div class="card mb-4" style="width: 18rem;" >
      <div class="card-header text-white bg-info">
        Achievement
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <h5 class="card-title">Nama Pencapaian</h5>
            <p class="card-text"><?=$a->nama_pencapaian ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Tahun</h5>
            <p class="card-text"><?=$a->tahun ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Deskripsi Pencapaian</h5>
            <p class="card-text"><?=$a->deskripsi_pencapaian ?></p> 
        </li>
      </ul>
    </div>

    <div class="card mb-4" style="width: 18rem;" >
      <div class="card-header text-white bg-info">
        Certification
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <h5 class="card-title">Nama Kegiatan</h5>
            <p class="card-text"><?=$b->nama_kegiatan ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Deskripsi Kegiatan</h5>
            <p class="card-text"><?=$b->deskripsi_kegiatan ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Tahun</h5>
            <p class="card-text"><?=$b->tahun ?></p> 
        </li>
      </ul>
    </div>

    <div class="card mb-4" style="width: 18rem;" >
      <div class="card-header text-white bg-info">
        Education
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <h5 class="card-title">Jenjang Pendidikan 1</h5>
            <p class="card-text"><?=$c->jenjang_pendidikan ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Tahun</h5>
            <p class="card-text"><?=$c->tahun ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Deskripsi</h5>
            <p class="card-text"><?=$c->deskripsi ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Jenjang Pendidikan 2</h5>
            <p class="card-text"><?=$c->jenjang_pendidikan ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Tahun</h5>
            <p class="card-text"><?=$c->tahun ?></p>
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Deskripsi</h5>
            <p class="card-text"><?=$c->deskripsi ?></p> 
        </li>
        </ul>
    </div>
  </div>

    <div class="card-deck">
    <div class="card mb-4" style="width: 18rem;" >
      <div class="card-header text-white bg-info">
        Internship
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <h5 class="card-title">Tempat Kerja</h5>
            <p class="card-text"><?=$d->tempat_kerja ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Posisi Kerja</h5>
            <p class="card-text"><?=$d->posisi_kerja ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Tahun</h5>
            <p class="card-text"><?=$d->tahun ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Deskripsi Kegiatan</h5>
            <p class="card-text"><?=$d->deskripsi_kegiatan ?></p> 
        </li>
        </ul>
    </div>

    <div class="card mb-4" style="width: 18rem;" >
      <div class="card-header text-white bg-info">
        Organizational
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <h5 class="card-title">Nama Organisasi</h5>
            <p class="card-text"><?=$e->nama_organisasi ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Jabatan Organisasi</h5>
            <p class="card-text"><?=$e->jabatan_organisasi ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Tahun</h5>
            <p class="card-text"><?=$e->tahun ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Deskripsi Kegiatan</h5>
            <p class="card-text"><?=$e->deskripsi_kegiatan ?></p> 
        </li>
        </ul>
    </div>

    <div class="card mb-4" style="width: 18rem;" >
      <div class="card-header text-white bg-info">
        Skills
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <h5 class="card-title">Jenis Keahlian</h5>
            <p class="card-text"><?=$f->jenis_skill ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Nama Keahlian</h5>
            <p class="card-text"><?=$f->nama_skill ?></p> 
        </li>
        </ul>
    </div>

    <div class="card mb-4" style="width: 18rem;" >
      <div class="card-header text-white bg-info">
        Training
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <h5 class="card-title">Nama Training</h5>
            <p class="card-text"><?=$g->nama_training ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Sebagai</h5>
            <p class="card-text"><?=$g->sebagai ?></p> 
        </li>
        <li class="list-group-item">
            <h5 class="card-title">Tahun</h5>
            <p class="card-text"><?=$g->tahun ?></p> 
        </li>
        </ul>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

