<?php

require "../funcs.php";
date_default_timezone_set('America/Sao_Paulo');

?>
<!DOCTYPE html>
<html>
  <head>
  <style type="text/css">
      @media print { 
          a,input,footer { visibility : hidden; } 
      }
  </style>
    <meta charset="UTF-8" lang="pt">
    <title>Setor de T.I</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="../../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../../plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Color Picker -->
    <link href="../../plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
    <!-- Bootstrap time Picker -->
    <link href="../../plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <script src="../mask.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <a href="../../index2.html" class="logo"><b>Setor de T.I</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
            
              <!-- Notifications: style can be found in dropdown.less -->
              
              <!-- Tasks: style can be found in dropdown.less -->
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../../dist/img/avatar5.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Setor de T.I</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image" />
                    <p>
                      Setor de T.I
                      <small></small>
                    </p>
                  </li>
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                   
                    <div class="pull-right">
                      <a href="../admin/sair.php" class="btn btn-default btn-flat">Sair</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Usuário</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
         
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>HOME</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="../../index.php"><i class="fa fa-circle-o"></i> HOME</a></li>
               
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Produtos</span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" ../produtos/produtos.php"><i class="fa fa-circle-o"></i> Produtos</a></li>
                <li><a href=" ../produtos/add_produto.php"><i class="fa fa-circle-o"></i>Cadastrar produto</a></li>
                <li><a href=" ../produtos/add_categoria.php"><i class="fa fa-circle-o"></i>Adicionar categoria</a></li>
                <li><a href=" ../estoque/saida.php"><i class="fa fa-circle-o"></i>Saida de produto</a></li>
                <li><a href=" ../estoque/entrada.php"><i class="fa fa-circle-o"></i>Entrada de produto</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Estoque</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../estoque/produtos.php"><i class="fa fa-circle-o"></i> Produtos</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Relatórios</span>
                <span class="label label-primary pull-right"><?php echo relatorio();?></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="../relatorio/entradas.php"><i class="fa fa-circle-o"></i> Entrada de produtos  <span class="label label-primary pull-right"><?php echo entradas();?></span></a></li>
                <li><a href="../relatorio/saidas.php"><i class="fa fa-circle-o"></i> Saida de produtos  <span class="label label-primary pull-right"><?php echo saidas();?></span></a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Sobre</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../sobre/sobre.php"><i class="fa fa-circle-o"></i> Sobre o sistema</a></li>
              </ul>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
