<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Narrow Jumbotron Template for Bootstrap</title>

    <link href="<?php echo base_url('assets') ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo base_url('assets') ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/style.css" rel="stylesheet" type="text/css" />
    <!-- jQuery 2.0.2 -->
    <script src="<?php echo base_url('assets') ?>/js/jquery-1.10.2.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets') ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    
    <!-- chosen Styling  -->
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap-chosen/bootstrap-chosen.css') ?>" />
    <script src="<?php echo site_url('assets/bootstrap-chosen/chosen.jquery.js') ?>"></script>
    
    <!-- datatables Styling  -->
    <link rel="stylesheet" href="<?php echo site_url('assets/datatables/dist/media/css/dataTables.bootstrap.min.css') ?>" />
    <script src="<?php echo site_url('assets/datatables/dist/media/js/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo site_url('assets/datatables/dist/media/js/dataTables.bootstrap.min.js') ?>"></script>

    <style>
    .btn-plus{
        margin-top: 20px;
    }
    </style>
    <script>
    $(function(){
        $('.dt_tbl').DataTable();
    });
    </script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="<?php echo site_url() ?>">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manajemen <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('manajemen/penyakit') ?>">Penyakit</a></li>
                <li><a href="<?php echo site_url('manajemen/gejala') ?>">Gejala</a></li>
                <li><a href="<?php echo site_url('manajemen/Relasi') ?>">Relasi</a></li>
              </ul>
            </li>
            <li role="presentation"><a href="<?php echo site_url('konsultasi/daftar') ?>">Konsultasi</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Project name</h3>
      </div>