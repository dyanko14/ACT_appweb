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
    <style type="text/css">
#padre {
    padding: 5% 0;
    /*background-color: blue;*/
}
#hijo {
    padding: 1% 0;
    /*background-color: yellow;*/
    text-align: center;
}
    </style>
</head>
<body>
<div id="padre">
    <div id="hijo">
        
        <div class="row">
        <div class="col s1 m3 l4">
        </div>
        <div class="col s10 m6 l4 z-depth-3 white">
            <!--Header-->
            <div style="padding: 25px">
            <img class="responsive-img" src="<?= base_url()?>image/logo_act.png" width="250">
            <blockquote><h5 class="grey lighten-3" style="color: #808080">Control de Visitas</h5></blockquote>
            <!--Inputs-->
            <?= form_open('Login/validation'); ?>
            <i class="material-icons prefix">account_circle</i>
            <input type="text" class="validate" style="text-align: center" name="Usuario"  placeholder="Usuario">
            <i class="material-icons prefix">lock</i>
            <input type="password" class="validate" style="text-align: center" name="Password"  placeholder="Password">
            <!--Button-->
            <button type="submit" name="submit" class="waves-effect waves-light blue btn"><i class="material-icons left">lock_open</i>
                Ingresar
            </button>
            </div>
        </div>
        <div class="col s1 m3 l4">
        </div>
        </div>
        <!--Login Feedback-->
        <div class="row">
        <div class="col s1 m3 l4">
        </div>
        <div class="col s10 m6 l4">
            <?php
                if ($title == "")
                {
                    echo "";
                }
                else
                {
                    echo "<h6 class='red-text'> $title </h6>";
                }
            ?>
            <?php
                echo form_close();
                echo validation_errors('<h6 class="red-text">', '</h6>');
            ?>
        </div>
        <div class="col s1 m3 l4">
        </div>
        </div>

    </div>
</div>
</body>
</html>