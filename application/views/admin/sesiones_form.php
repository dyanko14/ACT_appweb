<!--Header-->
<div class="row" style="border-bottom: solid 1px gray">
  <div class="col l2 m2 s2 center-align">
    <br>
    <ul>
      <li><a href="#" data-activates="slide-out" class="btn-floating blue-grey button-collapse" class="btn-floating blue"><i class="material-icons">menu</i></a></li>
    </ul>
  </div>
  <div class="col l10 m10 s10 center-align">            
    <br>
    <h5><?= $title ?></h5>
  </div>
</div>
<!--/Header-->
<main>
<div class="row">
<div class="col s1 m2 l2">
<!---->
</div>
<div class="col s10 m8 l8">
<?= form_open('Admin/Buscar/Search_filter') ?>
<!--Date Begin-->
<div class='col l6 m6 s12'>
  <span style="color: green">Fecha Inicial</span>'
  <input class="datepicker" name="Fecha1" value="click aquí">
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
</tbody>
</table>
</div>
</main>

</body>