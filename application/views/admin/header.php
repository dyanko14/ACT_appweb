<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>styles/css/materialize.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>styles/css/formato2.css" />
        <!--Let browser know website is optimized for mobile-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!--Favicon-->
        <link rel="icon" href="<?php echo base_url(); ?>image/favicon.gif" type="image/gif">
        <!--Personal Data-->
        <meta name="description" content="Control de visitas ACT">
        <meta name="author" content="Dyanko Cisneros Mendoza">
        <title>Grupo ACT - Admin</title>
        <!--Import jQuery before materialize.js-->
        <script src="<?= base_url()?>scripts/jquery-3.1.1.min.js"></script>
    </head>
    <body>
    <!--Navbar-->
    <ul id="slide-out" class="side-nav fixed">
    <li>
        <div class="userView">
          <div class="background">
            <img src="<?=base_url()?>image/background_admin.jpg">
          </div>
          <a href="<?= base_url()?>Admin/Inicio"><img class="circle" src="<?=base_url()?>image/admin_icon.jpg"></a>
          <a href="<?= base_url()?>Admin/Inicio"><span class="white-text name"><?= $this->session->userdata('logged_in2')?></span></a>
          <a href="<?= base_url()?>Admin/Inicio">
          <span class="white-text email">Bienvenido Administrador</span></a>
        </div>
      </li>
      <li><a href="<?= base_url()?>Admin/Inicio" class=<?= $modo_inicio ?>><i class="material-icons">home</i>Inicio</a></li>
      <li><a href="<?= base_url()?>Admin/Empleados" class=<?= $modo_empleados ?>><i class="material-icons">perm_identity</i>Empleados</a></li>
      <li><a href="<?= base_url()?>Admin/Sesiones" class=<?= $modo_sesiones ?>><i class="material-icons">security</i>Sesiones</a></li>
      <li><a href="<?= base_url()?>Admin/Buscar" class=<?= $modo_buscar ?>><i class="material-icons">search</i>Buscar</a></li>
      <li><a href="<?= base_url()?>Admin/Info" class=<?= $modo_info ?>><i class="material-icons">info_outline</i>Info</a></li>
      <li><a href="<?= base_url()?>Admin/Salir" class=<?= $modo_salir ?>><i class="material-icons">exit_to_app</i>Salir</a></li>
    </ul>
    <!--/Navbar-->