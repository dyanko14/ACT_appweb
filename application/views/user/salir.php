<!--Header-->
<div class="row" style="border-bottom: solid 1px red">
  <div class="col l2 m2 s2 center-align">
    <br>
    <ul>
      <li><a href="#" data-activates="slide-out" class="btn-floating red button-collapse" class="btn-floating blue"><i class="material-icons">menu</i></a></li>
    </ul>
  </div>
  <div class="col l10 m10 s10 center-align">            
    <br>
    <h5><?= $title ?></h5>
  </div>
</div>
<!--/Header-->
<main>
<div class='center-align'>
  <h6>¿Deseas cerrar sesión?</h6>
  <br>
  <div class="row">
    <div class="col s1 m1 l1">
    </div>
    <div class="col s5 m5 l5">
    <!--Button-->
      <?= form_open('User/Salir/Feedback') ?>
      <button type="submit" name="submit" class="waves-effect waves-light green btn"><i class="material-icons left">done</i>
        Sí
      </button>
      <?= form_close() ?>
    <!--Button-->
    </div>
    <div class="col s5 m5 l5">
    <!--Button-->
      <?= form_open('User/Inicio') ?>
      <button type="submit" name="submit" class="waves-effect waves-light red btn"><i class="material-icons left">close</i>
        No
      </button>
      <?= form_close() ?>
    <!--Button-->
    <div class="col s1 m1 l1">
    </div>
    </div>
  </div>
</div>
</tbody>
</div>
</main>

</body>