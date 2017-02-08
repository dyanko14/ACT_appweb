<main>
<br>
<div class="row">
<div class="col s1 m2 l2">
<!---->
</div>
<div class="col s10 m8 l8">
<?php
//--Hidden Form
$query = $this->db->query("SELECT * FROM registro WHERE id_reg = '$ID' ");
foreach ($query->result() as $row){
  echo form_open('User/Registros/Form_edit');
  //--
  echo form_hidden('ID', $row->id_reg);
  echo form_hidden('Fecha_in', $row->fecha_in);
  echo form_hidden('id_visitante', $row->id_visitante);
  echo form_hidden('id_act', $row->id_act);
  echo form_hidden('id_razon', $row->id_razon);
  echo form_hidden('completo', 'si');
  echo form_hidden('duracion', $row->duracion);
  }
?>
<!--Date Begin-->
<div class='col l6 m6 s12'>
  <span style="color: green">Hora de Entrada</span>'
  <input name="Hora_In" value="<?=$row->hora_in?>" id="Hora_In">
</div>
<div class='col l6 m6 s12' onmouseover="fecha_menor()">
  <span style="color: red">Hora de Salida</span>
  <input name="Hora_Out" value="<?=date('H:i:s')?>" id="Hora_Out">
</div>
<!--Date End-->
</div>
<div class="col s1 m2 l2">
<!---->
</div>
</div>
<!--/Row-->
<div class='center-align'>
  <div class="row">
    <div class="col s1 m1 l1">
    </div>
    <div class="col s5 m5 l5">
    <!--Button-->
        <button type="submit" name="submit" class="waves-effect waves-light green btn"><i class="material-icons left">access_time</i>
        Sí
        </button>
      <?php echo form_close() ?>
    <!--Button-->
    </div>
    <div class="col s5 m5 l5">
    <!--Button-->
      <?= form_open('User/Registros') ?>
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
<!--Button-->
<div class="row" style="text-align: center;">
    <div class="col s1 m2 l2">
    </div>
    <div class="col s10 m8 l8">

    <br>
    <br>
    <!--Error Feedback-->
    <?php
        echo validation_errors('<div class="row center-align red-text"><div class="col l12 m12 s12 red white-text" style="border-radius: 10px">', '</div></div>');
    ?>
    </div>
    <div class="col s1 m2 l2">
    </div>
</div>