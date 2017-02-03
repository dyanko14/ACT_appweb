<main>
<br>
<div class="row">
<div class="col s1 m2 l2">
<!---->
</div>
<div class="col s10 m8 l8">
<?= form_open('Admin/Buscar/Search_filter') ?>
<!--Date Begin-->
<div class='col l6 m6 s12'>
  <span style="color: green">Fecha Inicial</span>'
  <input class="datepicker" name="Fecha1" >
</div>
<div class='col l6 m6 s12'>
  <span style="color: red">Fecha Final</span>
  <input class="datepicker" name="Fecha2" value="<?=date('Y:m:d')?>">
</div>
<!--Date End-->
</div>
<div class="col s1 m2 l2">
</div>
</div>
<!--/Row-->
<div class="row center-align">    
  <button type="submit" name="submit" class="waves-effect waves-light orange btn"><i class="material-icons left">search</i>
    Buscar
  </button>
    <?= form_close() ?>    
  </div>
</div>
</main>