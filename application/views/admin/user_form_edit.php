<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fab fa-cuttlefish"></i><i class="fab fa-vuejs"></i>  
  </div>
  <div class="sidebar-brand-text mx-2">Student Online CV</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
  Admin
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="<?= base_url('admin');  ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Head of Study Program
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-user-cog"></i>
    <span>Profile</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item active" href="<?= base_url('admin/myProfile'); ?>">
      <i class="far fa-fw fa-user"></i>
      <span>My Profile</span></a>
      <a class="collapse-item" href="<?= base_url('admin/editProfile'); ?>">
      <i class="fas fa-user-edit"></i>
      <span>Edit Profile</span></a>
       <a class="collapse-item" href="<?= base_url('admin/changePassword'); ?>">
      <i class="fas fa-fw fa-key"></i>
      <span>Change Password</span></a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - My CV -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/listCV'); ?>">
    <i class="far fa-fw fa-eye"></i>
    <span>List Students CV</span></a>
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
          <a class="dropdown-item" href="<?= base_url('admin/myProfile');  ?>">
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

<div class="box">
    <div class="box-header">
        <h1 class="h3 mb-4 text-gray-800">Edit User Form</h1>
        <div class="pull-right">
            <a href="<?=site_url('admin')?>" class="btn btn-warning btn-flat mb-2">
                <i class="fa fa-undo fa-fw"></i> Back
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8">
                <!-- Start Form -->
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="induk" class="col-sm-3 col-form-label">ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="induk" value="<?=$this->input->post('induk') ?? $row->nim?>" readonly>
                            <?=form_error('induk');?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <input type="hidden" name="id" value="<?=$row->id?>">
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="fullname" value="<?=$this->input->post('fullname') ?? $row->name?>">
                            <?=form_error('fullname');?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" value="<?=$this->input->post('email') ?? $row->email?>" readonly>
                            <?=form_error('email');?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" value="<?=$this->input->post('password')?>">
                            <small>Biarkan kosong jika tidak diganti</small>
                            <?=form_error('password');?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="passconf" class="col-sm-3 col-form-label">Repeat Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="passconf" value="<?=$this->input->post('passconf')?>">
                            <?=form_error('passconf');?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="role" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="role">
                                <?php $role = $this->input->post('role') ? $this->input->post('role') : $row->role_id?>
                                <option value="1" <?=$role == 1 ? 'selected' : null?>>Head of Study Program</option>
                                <option value="2" <?=$role == 2 ? 'selected' : null?>>Academic Adviser</option>
                                <option value="3" <?=$role == 3 ? 'selected' : null?>>Student</option>
                            </select>
                            <?=form_error('role');?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary btn-flat">Save</button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

