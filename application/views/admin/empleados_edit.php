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
    <div class="col l1 m1 s1">
    </div>
    <div class="col l8 m10 s10">
        <!--Input-->
        <?= form_open('Admin/Empleados/Form_edit'); ?>
        <?php
        $query = $this->db->query("SELECT * FROM empleados WHERE id_act = '$ID' ");
        foreach ($query->result() as $row){
          echo "<div style='display: none'>".form_input('ID', $row->id_act)."</div><br>";
          echo "<div style='display: none'>".form_input('Activo', $row->e_activo)."</div><br>";
        ?>
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">person_pin</i>
        </div>
        <div class="col l2 m3 s6">
            <label><span style="color: red">*&nbsp;</span>Nombre:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
            <?= form_input('Nombre', $row->e_nombre) ?>
            <span style="text-align: center;" class="red-text"><b><?php echo form_error('Nombre'); ?></b></span>
        </div>
        <!--/Input-->
        <!--Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">person_pin</i>
        </div>
        <div class="col l2 m3 s6">
            <label><span style="color: red">*&nbsp;</span>Apellido P:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
            <?= form_input('ApellidoM', $row->e_apellido) ?>
            <span style="text-align: center;" class="red-text"><b><?php echo form_error('ApellidoM'); ?></b></span>
        </div>
        <!--/Input-->
        <!--Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">email</i>
        </div>
        <div class="col l2 m3 s6">
            <label><span style="color: red">*&nbsp;</span>email:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
            <?= form_input('Email', $row->email) ?>
            <span style="text-align: center;" class="red-text"><b><?php echo form_error('Email'); ?></b></span>
        </div>
        <!--Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">work</i>
        </div>
        <div class="col l2 m3 s6">
            <label><span style="color: red">*&nbsp;</span>Cargo:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
        <select name="Cargo">
          <option value=<?= $row->e_posicion ?>><?= $row->e_posicion ?></option>
          <option value="Almacén">Almacén</option>
          <option value="Calidad">Calidad</option>
          <option value="Cobranza">Cobranza</option>
          <option value="Compras">Compras</option>
          <option value="Contabilidad">Contabilidad</option>
          <option value="Desarrollador">Desarrollador</option>
          <option value="Director">Director</option>
          <option value="Diseño">Diseño</option>
          <option value="Gerente">Gerente</option>
          <option value="Ingeniería">Ingeniería</option>
          <option value="Limpieza">Limpieza</option>
          <option value="Mensajero">Mensajero</option>
          <option value="Programador">Programador</option>
          <option value="Proyectos">Proyectos</option>
          <option value="Recepción">Recepción</option>
          <option value="Técnico">Técnico</option>
          <option value="Ventas">Ventas</option>
          <option value="Viáticos">Viáticos</option>
        </select>
        <span style="text-align: center;" class="red-text"><b><?php echo form_error('Cargo'); ?></b></span>
        </div>
        <!--/Input-->
        <!--Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">info_outline</i>
        </div>
        <div class="col l2 m3 s6">
            <label><span style="color: red">*&nbsp;</span>Género:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
            <select name="Genero">
                <option value=<?= $row->e_genero ?>><?= $row->e_genero ?></option>
                <option value="M" <?php echo  set_select('myselect', 'one'); ?> >Masculino</option>
                <option value="F" <?php echo  set_select('myselect', 'two'); ?> >Femenino</option>
            </select>
            <span style="text-align: center;" class="red-text"><b><?php echo form_error('Genero'); ?></b></span>
        </div>
        <!--/Input-->
       <!--/Input-->
        <?php
        }
        ?>
    </div>
    <div class="col l3 m1 s1">
    </div>
</div>
<!--Button-->
<div class="row" style="text-align: center;">
    <div class="col s1 m2 l2">
    </div>
    <div class="col s10 m8 l8">
    <button type="submit" name="submit" class="waves-effect waves-light green btn"><i class="material-icons left">edit</i>
        Modificar
    </button>
    </div>
</div>

</tbody>
</table>
</div>
</main>

</body>