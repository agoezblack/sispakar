<?php $this->load->view('template/head') ?>
<div class="page-header">
  <div class="row">
    <div class="col-md-10">
        <h3>Data Gejala</h3>
    </div>
    <div class="col-md-2">
        
    </div>
  </div>
</div>

<form class="form-horizontal" method="POST" action="<?php echo site_url('manajemen/gejala/do_update') ?>">
  <input type="hidden" name="pk" value="<?php echo $dt_row->id_gejala ?>"/>
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Gejala</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nm_gejala" placeholder="Nama gejala" value="<?php echo $dt_row->nama_gejala ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="<?php echo site_url('manajemen/gejala') ?>" class="btn btn-danger"> Kembali</a>
    </div>
  </div>
</form>
<script>

</script>
<?php $this->load->view('template/footer') ?>