<?php $this->load->view('template/head') ?>
<?php //echo_pre($this->session->all_userdata()) ?>
<form method="POST" action="<?php echo site_url('konsultasi/view_gejala') ?>">
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Gejala</th>
            <th><input type="checkbox" id="checkAll" /> Pilih</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($dt_gejala as $val){ ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $val->nama_gejala ?></td>
            <td><input type="checkbox" name="gejala[]" value="<?php echo $val->id_gejala ?>"/></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
<br />
<script>
$(function(){
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
});
</script>
<?php $this->load->view('template/footer') ?>