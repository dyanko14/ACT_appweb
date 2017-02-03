<main>
<br>
<blockquote>
<div class="row">
    <div class="col l1 m1 s1">
    </div>
    <div class="col l8 m10 s10">
        <!--Input-->
        <?= form_open('User/Personas/Form_edit'); ?>
        <!--/-->
        <?php
          $query = $this->db->query("
             SELECT
                  visitante.id_visitante,
                    visitante.v_nombre,
                    visitante.v_apellido,
                    visitante.v_s_apellido,
                    visitante.v_genero,
                    visitante.id_empresa,
                    visitante.v_identif,
                    empresa.r_social
                 FROM visitante
                    INNER JOIN empresa
                        ON visitante.id_empresa = empresa.id_empresa
                            WHERE id_visitante = '$ID' ");
          foreach ($query->result() as $row){  
            echo "<div style='display: none'>".form_input('ID', $row->id_visitante)."</div><br>";        
          ?>

        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">person_pin</i>
        </div>
        <div class="col l2 m3 s6">
            <label><span style="color: red">*&nbsp;</span>Nombre:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
            <?= form_input('Nombre', $row->v_nombre) ?>
            <span style="text-align: center;" class="red-text"><b><?php echo form_error('Nombre'); ?></b></span>
        </div>
        <!--/Input-->
        <!--Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">person_pin</i>
        </div>
        <div class="col l2 m3 s6">
            <label><span style="color: red">*&nbsp;</span>ApellidoM:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
            <?= form_input('ApellidoM', $row->v_apellido) ?>
            <span style="text-align: center;" class="red-text"><b><?php echo form_error('ApellidoM'); ?></b></span>
        </div>
        <!--/Input-->
        <!--Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">person_pin</i>
        </div>
        <div class="col l2 m3 s6">
            <label><span style="color: red">*&nbsp;</span>ApellidoP:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
            <?= form_input('ApellidoP', $row->v_s_apellido) ?>
            <span style="text-align: center;" class="red-text"><b><?php echo form_error('ApellidoP'); ?></b></span>
        </div>
        <!--/Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">credit_card</i>
        </div>
        <div class="col l2 m3 s6">
            <label><span style="color: red">*&nbsp;</span>Identificación:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
            <?= form_input('IFE', $row->v_identif) ?>
            <span style="text-align: center;" class="red-text"><b><?php echo form_error('IFE'); ?></b></span>
        </div>
        <!--Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">info_outline</i>
        </div>
        <div class="col l2 m3 s6">
            <label><span style="color: red">*&nbsp;</span>Género:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
            <select name="Genero">
                <option value=""></option>
                <option value="M" <?php echo  set_select('myselect', 'one'); ?> >Masculino</option>
                <option value="F" <?php echo  set_select('myselect', 'two'); ?> >Femenino</option>
            </select>
            <span style="text-align: center;" class="red-text"><b><?php echo form_error('Genero'); ?></b></span>
        </div>
        <!--Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">business</i>
        </div>
        <div class="col l2 m3 s6">
            <label><span style="color: red">*&nbsp;</span>Empresa:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
            <select name="Empresa">
            <option class=""></option>
            <?php
            $query = $this->db->query("SELECT * FROM empresa ORDER BY r_social ASC");
            foreach ($query->result() as $row){
            ?>
                <option value=<?php echo $row->id_empresa ?> ><?php echo $row->r_social ?></option>
            <?php
            }
            ?>
            </select>
            <span style="text-align: center;" class="red-text"><b><?php echo form_error('Empresa'); ?></b></span>
        </div>
        <?php } ?>
        <!--/Input-->
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
</blockquote>
</main>