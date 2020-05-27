<h1 class="h3 mb-4 mt-4 text-gray-800">Skills</h1>
<?= form_open_multipart('user/add_create_cv_skill') ?>
  <div class="form-group row">
    <label for="jenis_skill" class="col-sm-2 col-form-label">Jenis Keahlian</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="jenis_skill" name="jenis_skill" value="" >
    </div>
  </div>
  <div class="form-group row">
    <label for="nama_skill" class="col-sm-2 col-form-label">Nama Keahlian</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama_skill" name="nama_skill" value="" >
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
      <button type="submit" class="btn btn-primary">Submit Skills</button>
    </div>
  </div>
</form>