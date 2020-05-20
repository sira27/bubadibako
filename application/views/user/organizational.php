<h1 class="h3 mb-4 mt-4 text-gray-800">Organizational</h1>
<form action="" method="post">
  <div class="form-group row">
    <label for="namaOrganisasi" class="col-sm-2 col-form-label">Nama Organisasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namaOrganisasi" name="namaOrganisasi" value="" >
    </div>
  </div>
  <div class="form-group row">
    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan Organisasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="jabatan" name="jabatan" value="" >
    </div>
  </div>
  <div class="form-group row">
    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
    <div class="col-sm-2">
      <input type="number" class="form-control" min="2000" max="2099" id="tahun" name="tahun" value="2020">
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Deskripsi Kegiatan</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="description" name="description"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Bukti Pendukung</div>
    <div class="col-sm-10">
      <div class="row">
        <!-- <div class="col-sm-3">
          <img src="<?= base_url('assets/img/CV/'); ?>" class="img-thumbnail">
        </div> -->
        <div class="col-sm-9">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="image">Choose file</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div align="right">
      <button type="submit" class="btn btn-primary">Submit Organizational</button>
    </div>
  </div>
</form>