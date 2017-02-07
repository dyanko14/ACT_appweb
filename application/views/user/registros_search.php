<main>
<br>
  <div class="row" style="text-align: center">
    <div class="col s1 m1 l1">
    </div>
    <div class="col s10 m10 l10">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Filtros</a></li>
        <li class="tab col s3"><a href="#test2">Fechas</a></li>
        <li class="tab col s3"><a href="#test3">Duración</a></li>
      </ul>
      <div id="test1" class="col s12">
      <!--Form1-->
      <br>
      <!--Input-->
      <?= form_open("User/Buscar/Search_filter") ?>
    <div class="row">
    <div class="col l1 m1 s12">
    </div>
    <div class="col l8 m8 s12">
        <!--Input-->
        <br>
        <?= form_open('Admin/Empleados/Form_add'); ?>
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">person</i>
        </div>
        <div class="col l2 m3 s6">
            <label>Visitante:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">        
          <select id="visitante" name="visitante">
          <option value=""></option>
          <?php
              $query = $this->db->query("SELECT * FROM visitante ORDER BY v_nombre ASC");
              foreach ($query->result() as $row){
          ?>
              <option value=<?= $row->id_visitante ?>><p><?= $row->v_nombre." ".$row->v_apellido ?></p>
          <?php
          }
          ?>
          </select>
        </div>
        <!--/Input-->
        <!--Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">person_pin</i>
        </div>
        <div class="col l2 m3 s6">
            <label>Empleado:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
          <select id="empleado" name="empleado">
            <option value=""></option>
            <?php
              $query = $this->db->query("SELECT * FROM empleados ORDER BY e_nombre ASC");
              foreach ($query->result() as $row){
            ?>
              <option value=<?= $row->id_act ?>><p><?= $row->e_nombre." ".$row->e_apellido ?></p>
            <?php
            }
            ?>
          </select>
        </div>
        <!--Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">business</i>
        </div>
        <div class="col l2 m3 s6">
            <label>Empresa:</label>
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
        </div>
        <!--/Input-->
        <!--Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">work</i>
        </div>
        <div class="col l2 m3 s6">
            <label>Motivo:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
        <select name="razon">
          <option value=""></option>
            <?php
                $query = $this->db->query("SELECT * FROM razon ORDER BY razon ASC");
                foreach ($query->result() as $row){
            ?>
                <option value=<?= $row->id_razon ?>><p><?= $row->razon ?></p>
            <?php
            }
            ?>
        </select>
        </div>
        <!--Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">info_outline</i>
        </div>
        <div class="col l2 m3 s6">
            <label>Género Visitante:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
          <select name="genero_persona">
            <option value=""></option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
          </select>
          </div>
          <!--/Input-->
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">info_outline</i>
        </div>
        <div class="col l2 m3 s6">
            <label>Género ACT:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
          <select name="genero_act">
            <option value=""></option>
            <option value="M">Masculino</option>          
            <option value="F">Femenino</option>          
          </select>
        </div>
        <!--Input-->
        <!--/Input-->
        </div>
    </div>
    <div class="col l3 m3 s12">
    </div>
      <!--/Input-->
      <button type="submit" name="submit" class="waves-effect waves-light orange btn"><i class="material-icons left">search</i>
        Buscar
      </button>
      <br><br>
      <?= form_close() ?>    
      </div>
      <!--/Form1-->      
      </div>


      <div id="test2">
      <?= form_open("User/Buscar/Search_filter2") ?>
      <br><br><br>
      <div class="row">

      <div class="col l4 m4 s12">
      </div>

      <div class="col l2 m2 s6">
        <label>Fecha Inicial</label>
        <input class="datepicker" name="fecha_in">
        <br>
      </div>
      <div class="col l2 m2 s6">
        <label>Fecha Final</label>
        <input class="datepicker" name="fecha_out" value=<?=date('Y-m-d') ?>>
        <br>
      </div>

      <div class="col l4 m4 s12">
      </div>

      <div class="col l12 m12 s12">
        <button type="submit" name="submit" class="waves-effect waves-light orange btn"><i class="material-icons left">search</i>
          Buscar
        </button>
      </div>

      <?= form_close() ?>
      </div>
      </div>



      <div id="test3">
      <?= form_open("User/Buscar/Search_filter3") ?>
      <br><br><br>
      <div class="row">

      <div class="col l4 m4 s12">
      </div>

      <div class="col l2 m2 s6">
      <select name="filtro">
        <option value=">="> Mayor/Igual a </option>
        <option value=">">  Mayor a       </option>
        <option value="<="> Menor/Igual a </option>
        <option value="<">  Menor a       </option>
        <option value="=">  Igual a       </option>        
      </select>
      </div>
      
      <div class="col l2 m2 s6">
      <select name="filtro2">
        <option value="900">15 Min</option>
        <option value="1800">30 Min</option>
        <option value="2700">45 Min</option>
        <option value="3600">1 Hora</option>
        <option value="7200">2 Horas</option>
        <option value="10800">3 Horas</option>
        <option value="14400">4 Horas</option>
        <option value="18000">5 Horas</option>
      </select>
      </div>
      
      <div class="col l4 m4 s12">
      </div>

      <div class="col l12 m12 s12">
        <button type="submit" name="submit" class="waves-effect waves-light orange btn"><i class="material-icons left">search</i>
          Buscar
        </button>
      </div>

      <?= form_close() ?>
      </div>

    <!--Div-->
    <div class="col s1 m1 l1">
    </div>
  <!--Row-->
  </div>