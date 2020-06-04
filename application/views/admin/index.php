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
            <a class="collapse-item" href="<?= base_url('admin/myProfile'); ?>">
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
<section class="content">
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Head of Study Program Dashboard</h1>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Users</h3>
        <div class="pull-right">
          <a href="<?=site_url('admin/add_user')?>" class="btn btn-primary btn-flat mb-2">
            <i class="fa fa-user-plus fa-fw"></i>
          </a>
        </div>
      </div>
      <div class="box-body table-resposive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Date Created</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($row->result() as $key => $data) { ?>
            <tr>
              <td><?=$no++?>.</td>
              <td><?=$data->nim?></td>
              <td><?=$data->name?></td>
              <td><?=$data->email?></td>
              <td><?php
              switch($data->role_id) {
                case 1:
                  echo "Admin";
                  break;
                case 2:
                  echo "Advisor";
                  break;
                case 3:
                  echo "Student";
                  break;
                default:
                  echo "Null";
                  break;
              }
              ?></td>
              <td><?php
              if ($data->is_active == 1) {
                  echo "Active";
              } else {
                  echo "Disactive";
              }
              ?></td>
              <td><?= date('d F Y', $data->date_created) ?></td>
              <td class="text-center">
              <form action="<?=site_url('admin/delete_user')?>" method="post">
                  <a href="<?=site_url('admin/edit_user/'.$data->id)?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-fw fa-edit"></i>
                  </a>
                  <input type="hidden" name="id" value="<?=$data->id?>">
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?');">
                    <i class="far fa-fw fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  <!-- Modal Create User -->
  <div class="modal fade bd-example-modal-lg" id="create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" required>
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-sm-2 col-form-label">Role</label>
              <div class="col-sm-10">
                <select id="role" name="role_id" class="form-control">
                  <option value="">-- Pilih --</option>
                  <option value="1">Head of Study Program</option>
                  <option value="2">Academic Adviser</option>
                  <option value="3">Student</option>
                </select>
              </div>
            </div>
        </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create User</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <!-- Modal Edit User -->
  <div class="modal fade bd-example-modal-lg" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Your CV!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Full Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea type="text" class="form-control" id="description" name="description"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">Picture</div>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/profile/').$user['image']; ?>" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                      <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Edit CV</button>
            </div>
          </div>
        </div>
      </div>
    </div>

   <!-- Modal Delete User-->
    <div div class="modal fade" id="delete">
      <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-red">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
                <form action="#">
                    <input name="id" type="hidden" value="">
                    <div class="modal-body">
                        <p>Are you sure want to delete this?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.example-modal -->

  </div>
  <!-- /.container-fluid -->
</section>
</div>
<!-- End of Main Content -->

