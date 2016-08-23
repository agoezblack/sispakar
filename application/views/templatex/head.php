<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url('assets') ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url('assets') ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets') ?>/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets') ?>/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        
        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url('assets') ?>/js/jquery-1.10.2.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url('assets') ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets') ?>/js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/timeago/jquery.timeago.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/timeago/locales/jquery.timeago.id.js" type="text/javascript"></script>
        <link href="<?php echo site_url() ?>assets/vendor/jPlayer/dist/skin/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo site_url() ?>assets/vendor/jPlayer/dist/jplayer/jquery.jplayer.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>
        .no-radius{
            border-radius: 0;
        }
        .no-margin{
            margin: 0;
        }
        .no-padding{
            padding: 0;
        }
        .thumbnailx{
            border-radius: 3px;
        }
        .hr{
            margin-top: 0;
        }
        textarea{
            resize: none;
        }
        </style>
    </head>
    
    <body class="skin-blue pace-done fixed">
        <!-- header logo: style can be found in header.less -->
        <header class="header" style="border-bottom: 1px solid red;">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <span class="glyphicon glyphicon-book"></span> Elearning
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                        
                        <!-- Tasks: style can be found in dropdown.less -->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Admin <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url('common/profil/default.png') ?>" class="img-circle" alt="User Image" />
                                    <p>Admin - Elearning</p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('app/logout') ?>" class="btn btn-default btn-flat">Keluar</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas" style="background: white;border-color: red; border:1px solid #ddd;">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url('common/profil/default.png') ?>" class="img-circle" />
                        </div>
                        <div class="pull-left info">
                            <p><a href="<?php echo site_url() ?>">Admin</a></p>

                            
                        </div>
                    </div>
                    <!-- search form -->
                    <!--<form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>-->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo base_url('beranda') ?>">
                                <i class="fa fa-home"></i> <span>Beranda</span>
                            </a>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Master Data</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('master_role')?>"><i class="fa fa-bookmark"></i> Master Role</a></li>
                                <li><a href="<?php echo site_url('master_user')?>"><i class="fa fa-user"></i> Master User</a></li>
                                <li><a href="<?php echo site_url('master_kategori')?>"><i class="fa fa-book"></i> Master Kategori</a></li>
                                <li><a href="<?php echo site_url('master_materi')?>"><i class="fa fa-bookmark"></i> Master Materi</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('report') ?>">
                                <i class="fa fa-list"></i> <span>Report</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <!--<section class="content-header">
                    <h1>
                        Blank page
                        <small>it all starts here</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Examples</a></li>
                        <li class="active">Blank page</li>
                    </ol>
                </section>-->
                
                
                <!-- Main content -->
                <section class="content" style="background: url('<?php echo site_url('common/img/bg.jpg') ?>')repeat;">
                 

                