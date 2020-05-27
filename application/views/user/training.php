<h1 class="h3 mb-4 mt-4 text-gray-800">Training</h1>
<?= form_open_multipart('user/add_create_cv_training') ?>
  <div class="form-group row">
    <label for="nama_training" class="col-sm-2 col-form-label">Nama Training</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama_training" name="nama_training" value="" >
    </div>
  </div>
  <div class="form-group row">
    <label for="sebagai" class="col-sm-2 col-form-label">Sebagai</label>
    <div class="col-sm-2">
      <select class="form-control" id="sebagai" name="sebagai">
        <option value="Trainer">Trainer</option>
        <option value="ATS">ATS</option>
        <option value="Peserta">Peserta</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
    <div class="col-sm-2">
      <input type="number" class="form-control" min="2000" max="2099" id="tahun" name="tahun" value="2020">
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
      <button type="submit" class="btn btn-primary">Submit Training</button>
    </div>
  </div>
</form>