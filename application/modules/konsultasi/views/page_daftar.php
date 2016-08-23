<?php $this->load->view('template/head') ?>
<div class="panel panel-default">
  <div class="panel-heading">Daftar Pasien Konsultasi</div>
  <div class="panel-body">
    <form class="form-horizontal" method="POST" action="<?php echo site_url('konsultasi/do_daftar') ?>">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Umur</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="umur" placeholder="Umur">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Jenis Kelamin</label>
        <div class="col-sm-10">
          <select name="jk" class="form-control">
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="alamat" rows="3"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Mendaftar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php $this->load->view('template/footer') ?>