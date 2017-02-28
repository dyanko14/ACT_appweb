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
<div class="row">

    <div class="col l3 m1 s1">
    </div>

    <div class="col l6 m10 s10">
    <?= form_open('User/Inicio/Form_add'); ?>
    <br>
        <div class="row">
            <div class="col l1 m3 s6">
                <i class="material-icons">date_range</i>
            </div>
            <div class="col l3 m3 s6 center-align">
                <label><span style="color: red">*&nbsp;</span>Fecha:</label>
            </div>
            <div class="col l8 m6 s12">
                <input name="fecha_in" type="date" class="datepicker" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col l1 m3 s6">
                <i class="material-icons">access_time</i>
            </div>
            <div class="col l3 m3 s6 center-align">
                <label><span style="color: red">*&nbsp;</span>Hora:</label>
            </div>
            <div class="col l8 m6 s12">
                <input name="hora_in" value="<?php echo date('H:i:s'); ?>">
                <span style="text-align: center;" class="red-text"><b><?php echo form_error('hora_in'); ?></b></span>
            </div>            
        </div>
        <div class="row">
            <div class="col l1 m3 s6">
                <i class="material-icons">person</i>
            </div>
            <div class="col l3 m3 s6 center-align">
                <label><span style="color: red">*&nbsp;</span>Visitante:</label>
            </div>
            <div class="col l8 m6 s12">
                <select id="visitante" name="visitante">
                <option></option>
                <?php
                    $query = $this->db->query("SELECT * FROM visitante ORDER BY v_nombre ASC");
                    foreach ($query->result() as $row){
                ?>
                    <option value=<?= $row->id_visitante ?>><p><?= $row->v_nombre." ".$row->v_apellido ?></p></option>
                <?php
                }
                ?>
                </select>
                <span style="text-align: center;" class="red-text"><b><?php echo form_error('visitante'); ?></b></span>
            </div>            
        </div>
        <div class="row">
            <div class="col l1 m3 s6">
                <i class="material-icons">person_pin</i>
            </div>
            <div class="col l3 m3 s6 center-align">
                <label><span style="color: red">*&nbsp;</span>Empleado:</label>
            </div>
           <div class="col l8 m6 s12">
                <select id="empleado" name="empleado">
                <option></option>
                <?php
                    $query = $this->db->query("SELECT * FROM empleados WHERE e_activo='si' ORDER BY e_nombre ASC");
                    foreach ($query->result() as $row){
                ?>
                    <option value=<?= $row->id_act ?>><p><?= $row->e_nombre." ".$row->e_apellido ?></p></option>
                <?php
                }
                ?>
                </select>
                <span style="text-align: center;" class="red-text"><b><?php echo form_error('empleado'); ?></b></span>
            </div>
        </div>
        <div class="row">
            <div class="col l1 m3 s6">
                <i class="material-icons">work</i>
            </div>
            <div class="col l3 m3 s6 center-align">
                <label><span style="color: red">*&nbsp;</span>Motivo:</label>
            </div>
            <div class="col l8 m6 s12">
                <select name="razon">
                    <option value=""></option>
                    <?php
                        $query = $this->db->query("SELECT * FROM razon ORDER BY razon ASC");
                        foreach ($query->result() as $row){
                    ?>
                        <option value=<?= $row->id_razon ?>><p><?= $row->razon ?></p></option>
                    <?php
                    }
                    ?>
                </select>
                <span style="text-align: center;" class="red-text"><b><?php echo form_error('razon'); ?></b></span>
            </div>
        </div>
    </div>

    <div class="col l3 m1 s1">
    </div>
</div>

<!--Button-->
<div class="row center-align">
    <button type="submit" name="submit" class="waves-effect waves-light blue btn"><i class="material-icons left">done</i>
        Registrar
    </button>
</div>
<?= form_close() ?>
</tbody>
</div>
</main>

</body>