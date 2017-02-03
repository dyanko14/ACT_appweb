<main>
<br>
<div class='center-align'>
  <h6>¿Deseas cerrar sesión?</h6>
  <br>
  <div class="row">
    <div class="col s1 m1 l1">
    </div>
    <div class="col s5 m5 l5">
    <!--Button-->
      <?= form_open('Admin/Salir/Feedback') ?>
      <button type="submit" name="submit" class="waves-effect waves-light green btn"><i class="material-icons left">done</i>
        Sí
      </button>
      <?= form_close() ?>
    <!--Button-->
    </div>
    <div class="col s5 m5 l5">
    <!--Button-->
      <?= form_open('Admin/Inicio') ?>
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
</main>