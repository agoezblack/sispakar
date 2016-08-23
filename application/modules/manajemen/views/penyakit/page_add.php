<?php $this->load->view('template/head') ?>
<div class="page-header">
  <div class="row">
    <div class="col-md-10">
        <h3>Data Penyakit</h3>
    </div>
    <div class="col-md-2">
        
    </div>
  </div>
</div>

<form class="form-horizontal" method="POST" action="<?php echo site_url('manajemen/penyakit/do_add') ?>">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Penyakit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nm_penyakit" placeholder="Nama Penyakit">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
    <div class="col-sm-10">
      <textarea rows="3" class="form-control" name="ket" placeholder="Keterangan"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Solusi</label>
    <div class="col-sm-10">
      <textarea rows="3" class="form-control" name="solusi" placeholder="Solusi untuk penyakit"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="<?php echo site_url('manajemen/penyakit') ?>" class="btn btn-danger"> Kembali</a>
    </div>
  </div>
</form>

<?php $this->load->view('template/footer') ?>