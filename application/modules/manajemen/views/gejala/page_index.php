<?php $this->load->view('template/head') ?>
<div class="page-header">
  <div class="row">
    <div class="col-md-10">
        <h3>Data Gejala</h3>
    </div>
    <div class="col-md-2">
        <a href="<?php echo site_url('manajemen/gejala/add') ?>" class="btn btn-success btn-plus"><i class="fa fa-plus"></i> Tambah Data</a>
    </div>
  </div>
</div>
<?php echo $this->session->flashdata('notif') ?>
<table class="table table-bordered table-hover dt_tbl">
    <thead class="thead">
        <tr>
            <th>No</th>
            <th>Nama Gejala</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($dt_result as $val){ ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $val->nama_gejala?></td>
        <td>
            <a href="<?php echo site_url('manajemen/gejala/update/'.$val->id_gejala) ?>" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="#" onclick="del_row('<?php echo $val->id_gejala ?>','<?php echo $val->nama_gejala ?>')" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
    <?php }?>
    </tbody>
</table>

<div class="modal fade" tabindex="-1" role="dialog" id="mdl-del">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Hapus data</h4>
      </div>
      <div class="modal-body">
        <p>Anda yakin data gejala <span id="nm"></span> ???</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="<?php echo site_url('manajemen/gejala/do_delete')  ?>">
        <input type="hidden" name="pk" id="del-pk"/>
        <input type="hidden" name="nm" id="del-nm"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
function del_row(pk,nm){
    $('#nm').text(nm);
    $('#del-pk').val(pk);
    $('#del-nm').val(nm);
    $('#mdl-del').modal('show');
}
</script>
<?php $this->load->view('template/footer') ?>