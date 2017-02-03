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
    <title>Grupo ACT</title>
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
        <br>
            <img class="responsive-img" src="<?= base_url()?>image/icon_404.jpg" width="400">
            <br>
            <blockquote><h5 class="grey lighten-3" style="color: #808080">Error 404: Página no existente</h5></blockquote>
            <br>
            <!--Back Button-->
            <div class="row" style="text-align: center;">        
                <a href="javascript:history.back()">
                <button type="submit" name="submit" class="waves-effect waves-light red btn"><i class="material-icons left">block</i>
                    Regresar
                </button>
                </a>
            </div>
        </div>
        <div class="col s1 m2 l4">
        <!--/-->
        </div>
    </div>
</body>
</html>
