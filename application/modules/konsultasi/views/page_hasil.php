<?php $this->load->view('template/head') ?>
<div class="page-header">
  <h4>Example page header <small>Subtext for header</small></h4>
</div>
<table class="table">
    <caption><h4>Hasil Diagnosa</h4></caption>
    <thead>
        <tr>
            <th>Diagnosa</th>
            <th>hasil</th>
        </tr>
        <tr>
            <th>Solusi</th>
            <th>hasil solusi</th>
        </tr>
    </thead>
</table>

<table class="table table-bordered">
    <caption><h4>Hasil Analisa</h4></caption>
    <thead>
        <tr>
            <th>No</th>
            <th>Penyakit</th>
            <th>CF</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($dftr_penyakit); $i++){
            $pny=$this->M_diagnosa->get_penyakit($dftr_penyakit[$i]);?>
        <tr>
            <td><?php $i; ?></td>
            <td><?php echo $pny->nama_penyakit ?></td>
            <td><?php echo $dftr_cf[$i] ?></td>
        </tr>
        <?php }?>
    </tbody>
</table>

<table class="table table-bordered">
    <caption><h4>Gejala yang dipilih</h4></caption>
    <thead>
        <tr>
            <th>No</th>
            <th>Gejala</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>
<?php $this->load->view('template/footer') ?>