<?php $this->load->view('template/head') ?>
<div class="page-header">
  <div class="row">
    <div class="col-md-10">
        <h3>Data Relasi</h3>
    </div>
    <div class="col-md-2">
        
    </div>
  </div>
</div>

<form class="form-horizontal" method="POST" action="<?php echo site_url('manajemen/relasi/do_upd') ?>">
  <input type="hidden" name="pk" value="<?php echo $dt_row->id_relasi ?>"/>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Penyakit</label>
    <div class="col-sm-10">
      <select class="form-control" name="id_penyakit" id="id_penyakit">
        <option value="">Pilih Penyakit</option>
        <?php foreach($dt_penyakit as $p){ ?>
        <option value="<?php echo $p->id_penyakit ?>"><?php echo $p->nama_penyakit ?></option>
        <?php }?>
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Gejala</label>
    <div class="col-sm-10">
      <select name="id_gejala" data-placeholder="Pilih beberapa gejala" class="form-control">
        <?php foreach($dt_gejala as $g){ ?>
        <option value="<?php echo $g->id_gejala ?>"><?php echo $g->nama_gejala ?></option>
        <?php }?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">MB</label>
    <div class="col-sm-10">
      <input type="text" name="mb" class="form-control" value="<?php echo $dt_row->mb ?>"/>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">MD</label>
    <div class="col-sm-10">
      <input type="text" name="md" class="form-control" value="<?php echo $dt_row->md ?>"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="<?php echo site_url('manajemen/relasi') ?>" class="btn btn-danger"> Kembali</a>
    </div>
  </div>
</form>
<script>
$(function(){
    $('.chosen').chosen();
    $('#id_penyakit').val('<?php echo $dt_row->id_penyakit ?>');
});
</script>
<?php $this->load->view('template/footer') ?>