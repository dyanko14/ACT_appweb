<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>styles/css/materialize.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>styles/css/formato.css" />
        <!--Let browser know website is optimized for mobile-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Grupo ACT</title>
        <!--Import jQuery before materialize.js-->
        <script src="<?= base_url()?>scripts/jquery-3.1.1.min.js"></script>
    </head>
    <body>
    <!--Navbar-->
    <ul id="slide-out" class="side-nav fixed">
    <li>
        <div class="userView">
          <div class="background">
            <img src="<?=base_url()?>image/background.jpg">
          </div>
          <a href="<?= base_url()?>User/Inicio"><img class="circle" src="<?=base_url()?>image/user_icon.jpg"></a>
          <a href="<?= base_url()?>User/Inicio"><span class="white-text name"><?= $this->session->userdata('logged_in')?></span></a>
          <a href="<?= base_url()?>User/Inicio">
          <span class="white-text email">Bienvenido</span></a>
        </div>
      </li>
      <li><a href="<?= base_url()?>User/Inicio" class=<?= $modo_inicio ?>><i class="material-icons">home</i>Inicio</a></li>
      <li><a href="<?= base_url()?>User/Personas" class=<?=$modo_personas?>><i class="material-icons">perm_identity</i>Personas</a></li>
      <li><a href="<?= base_url()?>User/Empresas" class=<?=$modo_empresas?>><i class="material-icons">business</i>Empresas</a></li>
      <li><a href="<?= base_url()?>User/Registros" class=<?=$modo_registros?>><i class="material-icons">description</i>Registros</a></li>
      <li><a href="<?= base_url()?>User/Buscar" class=<?=$modo_buscar?>><i class="material-icons">search</i>Buscar</a></li>
      <li><a href="<?= base_url()?>User/Info" class=<?=$modo_info?>><i class="material-icons">pie_chart_outlined</i>Estadísticas</a></li>
      <li><a href="<?= base_url()?>User/Salir" class=<?=$modo_salir?>><i class="material-icons">exit_to_app</i>Salir</a></li>
    </ul>
     
    <!--/Navbar-->
    <!--Header-->
    <div class="row center-align">
      <div class="col l2 m1 s2">
      <br>
        <a href="#" data-activates="slide-out" class="button-collapse"><div class="btn-floating btn-large red white-text"><i class="material-icons">menu</i></div></a>
      </div>
      <div class="col l10 m11 s10 center-align">            
        <br><h5><?= $title ?></h5>
      </div>
    </div>
    <HR>
    <!--/Header-->