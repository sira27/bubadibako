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
      <li class="nav-item">
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
      <li class="nav-item active">
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
  <h1 class="h3 mb-4 text-gray-800">Create Curriculum Vitae</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
  <button type="submit" class="btn btn-info mb-2 col-sm-3" id="p" name="p" value="student">Student</a></button>
  <button type="submit" class="btn btn-info mb-2 col-sm-3" id="p" name="p" value="achievement">Achievement</a></button>
  <button type="submit" class="btn btn-info mb-2 col-sm-3" id="p" name="p" value="education">Education</button>
  <button type="submit" class="btn btn-info mb-2 col-sm-2" id="p" name="p" value="internship">Internship</button>
  <button type="submit" class="btn btn-info mb-2 col-sm-3" id="p" name="p" value="organizational">Organizational</button>
  <button type="submit" class="btn btn-info mb-2 col-sm-3" id="p" name="p" value="certification">Certification</button>
  <button type="submit" class="btn btn-info mb-2 col-sm-3" id="p" name="p" value="skill">Skills</button>
  <button type="submit" class="btn btn-info mb-2 col-sm-2" id="p" name="p" value="training">Training</button>
</form>

  <?php
    if(isset($_GET['p'])){
      $page = $_GET['p'];

      switch ($page) {
         case 'student':
          include 'student.php';
          break;
        case 'achievement':
          include 'achievement.php';
          break;
        case 'education':
          include 'education.php';
          break;
        case 'internship':
          include 'internship.php';
          break;
        case 'organizational':
          include 'organizational.php';
          break;
        case 'certification':
          include 'certification.php';
          break;
        case 'skill':
          include 'skill.php';
          break;
        case 'training':
          include 'training.php';
          break;
        default:
          echo '<center><h3>Halaman tidak ditemukan!</h3></center>';
          break;
      }
    } else {
      echo '<center><h3 style="margin-top:20px;">Silahkan isi kategori form CV berikut. </h3></center>';
    }
  ?>
  

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

