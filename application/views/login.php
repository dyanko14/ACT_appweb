<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>styles/css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>image/favicon.gif" type="image/gif">
    <title>Grupo ACT</title>
    <!--Import jQuery before materialize.js-->
    <script src="<?= base_url()?>scripts/jquery-3.1.1.min.js"></script>
</head>
<body>
    <!--Content-->
    <br>
    <br>
    <div class="row">
    <div class="col s1 m2 l4">
    <!--/-->
    </div>
    <div class="col s10 m8 l4 z-depth-3 white center-align">
        <!--Form-->
        <br>
        <img class="responsive-img" src="<?= base_url()?>image/logo_act.png" width="300">
        <br>
        <blockquote><h5 class="grey lighten-3" style="color: #808080">Control de Visitas</h5></blockquote>
        <br>
        <!--User-->
        <?= form_open('Login/validation'); ?>
        <div class="row">
            <div class="col l3 m3 s12">
                <i class="material-icons prefix">account_circle</i>
            </div>
            <div class="col l6 m6 s12">
                <input type="text" class="validate" style="text-align: center" name="Usuario"  placeholder="Usuario">
            </div>
            <div class="col l3 m3 s12">
            </div>
        </div>
        <!--Password-->
        <div class="row">
            <div class="col l3 m13 s12">
                <i class="material-icons prefix">lock</i>
            </div>
            <div class="col l6 m6 s12">
                <input type="password" class="validate" style="text-align: center" name="Password"  placeholder="Password">
            </div>
            <div class="col l3 m3 s12">
            </div>
        </div>
        <!--Button-->
        <div class="row" style="text-align: center;">
            <button type="submit" name="submit" class="waves-effect waves-light blue btn"><i class="material-icons left">lock_open</i>
                Ingresar
            </button>
        </div>
        <!--Login Feedback-->
        <?php
            if ($title == "")
            {
                echo "";
            }
            else
            {
                echo "<div class='red white-text'> $title </div><br>";            
            }
        ?>
        <?php
            echo form_close();
            echo validation_errors('<div class="red white-text">', '</div><br>');
        ?>
    </div>
        <!--/Form-->
    </div>
    <div class="col s1 m2 l4">
    <!--/-->
    </div>
    </div>
</body>
</html>
