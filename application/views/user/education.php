<h1 class="h3 mb-4 mt-4 text-gray-800">Education</h1>
<?= form_open_multipart('user/add_create_cv_education') ?>
  <div class="form-group row">
  <label for="jenjang_pendidikan1" class="col-sm-2 col-form-label">Jenjang Pendidikan</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="jenjang_pendidikan1" name="jenjang_pendidikan1" placeholder="ex : SMA Negeri 96 Jakarta">
  </div>
  </div>
  <div class="form-group row">
    <label for="tahun1" class="col-sm-2 col-form-label">Tahun</label>
    <div class="col-sm-2">
      <input type="number" class="form-control" min="2000" max="2099" id="tahun1" name="tahun1" value="2020">
    </div>
  </div>
  <div class="form-group row">
    <label for="deskripsi1" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="deskripsi1" name="deskripsi1"></textarea>
    </div>
  </div>
  <div class="form-group row">
  <label for="jenjang_pendidikan2" class="col-sm-2 col-form-label">Jenjang Pendidikan</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="jenjang_pendidikan2" name="jenjang_pendidikan2" placeholder="ex : STIMIK ESQ Business School Jakarta">
  </div>
  </div>
  <div class="form-group row">
    <label for="tahun2" class="col-sm-2 col-form-label">Tahun</label>
    <div class="col-sm-2">
      <input type="number" class="form-control" min="2000" max="2099" id="tahun2" name="tahun2" value="2020">
    </div>
  </div>
  <div class="form-group row">
    <label for="deskripsi2" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="deskripsi2" name="deskripsi2"></textarea>
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
      <button type="submit" class="btn btn-primary">Submit Education</button>
    </div>
  </div>
</form>