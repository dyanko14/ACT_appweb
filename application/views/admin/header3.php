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
        <meta http-equiv="Refresh" content="5;url=<?= base_url()?><?= $link ?>">
        <title>Grupo ACT</title>
    </head>
    <body>
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper blue-grey darken-2 center-align">
                    <a href="<?= base_url() ?>Home" class="brand-logo">
                        Error
                    </a>
                </div>
            </nav>
        </div>
        <!--Content-->
        <div class="container grey lighten-5" id="modo_principal" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
            <div class="col l12 m12">
                <!--Mode Header-->
                <div>
                    <br>
                    <blockquote><h5 class="center-align" id="title" style="color: #808080"><?= $msj ?></h5></blockquote>
                    <br>
                </div>
