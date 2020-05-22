<h1 class="h3 mb-4 mt-4 text-gray-800">Student</h1>
<form action="" method="post">
  <div class="form-group row">
    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" maxlength="12" id="nim" name="nim" value="" >
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tempatLahir" name="tempatLahir">
    </div>
  </div>
  <div class="form-group row">
    <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" value="2020">
    </div>
  </div>
  <div class="form-group row">
    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
    <div class="col-sm-10">
      <select class="form-control" id="agama" name="agama">
        <option value="1">Islam</option>
        <option value="2">Kristen</option>
        <option value="3">Hindu</option>
        <option value="4">Buddha</option>
        <option value="5">Kong Hu Cu</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Diri</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Foto Profil</div>
    <div class="col-sm-10">
      <div class="row">
        <div class="col-sm-3">
          <img src="<?= base_url('assets/img/profile/').$user['image']; ?>" class="img-thumbnail">
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div align="right">
      <button type="submit" class="btn btn-primary" name="btnSubmit">Submit Student</button>
    </div>
  </div>
</form>