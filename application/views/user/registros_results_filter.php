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
<div style="padding-left: 30px; padding-right: 30px">
<table id='large' class='tablesorter highlight centered responsive-table'>
    <thead>
      <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Hora In</th>
        <th>Visitante</th>
        <th>Empresa</th>
        <th>Empleado</th>
        <th>Motivo</th>
        <th>Hora Out</th>
        <th>Se fue?</th>
        <th>Duracion</th>
      </tr>
    </thead>
    <tbody>
	 <?php
    //Datos enviados por Post
    $visitante = $this->input->post('visitante');
    $empleado  = $this->input->post('empleado');
    $empresa   = $this->input->post('empresa');
    $razon     = $this->input->post('razon');
    $genero1   = $this->input->post('genero_persona');
    $genero2   = $this->input->post('genero_act');
		$actual    = date('Y-m-d');
	  $query     = $this->db->query("SELECT * FROM registro T1
                                    INNER JOIN visitante T2 ON T1.id_visitante = T2.id_visitante
                                    INNER JOIN empresa T3 ON T2.id_empresa = T3.id_empresa
                                    INNER JOIN empleados T4 ON T1.id_act = T4.id_act
                                    INNER JOIN razon T5 ON T1.id_razon = T5.id_razon
                                    WHERE T2.v_genero = '$genero1' OR T1.id_razon = '$razon' OR T2.id_empresa = '$empresa' OR T4.e_genero = '$genero2' OR  T1.id_act = '$empleado' OR T1.id_visitante = '$visitante' ORDER BY T1.fecha_in ASC");
		foreach ($query->result() as $row){
	  ?>
    <tr>
      <td><?= $row->id_reg   ?></td>
      <td><?= $row->fecha_in ?></td>
      <td><?= $row->hora_in  ?></td>
      <td>
        <?php
        if ($row->id_visitante == $visitante OR $row->v_genero == $genero1 OR $row->v_genero == $genero1)
        {
          echo "<p style='color: blue'>$row->v_nombre $row->v_apellido</p>";
        }
        else
        {
          echo $row->v_nombre." ".$row->v_nombre;
        }
        ?>
      </td>
      <td>
        <?php
        if ($row->id_empresa == $empresa)
        {
          echo "<p style='color: blue'>$row->r_social</p>";
        }
        else
        {
          echo $row->r_social;
        }
        ?>
      </td>
      <td>
        <?php
        if ($row->id_act == $empleado OR $row->e_genero == $genero2 OR $row->e_genero == $genero2)
        {
          echo "<p style='color: blue'>$row->e_nombre $row->e_apellido</p>";
        }
        else
        {
          echo $row->e_nombre." ".$row->e_apellido;
        }
        ?>
      </td>
      <td>
        <?php
        if ($row->id_razon == $razon)
        {
          echo "<p style='color: blue'>$row->razon</p>";
        }
        else
        {
          echo $row->razon;
        }
        ?>
      </td>
      <td><?= $row->hora_out ?></td>
      <td>
        <?php
          if ($row->completo == 'no')
          {
          ?>
            <a href='<?= base_url() ?>User/Registros/Edit/<?= $row->id_reg ?>'>
          <i class='material-icons tooltipped green-text' data-position='right' data-delay='50' data-tooltip='Dar Salida'>directions_run</i>
          </a>
          <?php
          }
          else
          {
          ?>
          <i class='material-icons tooltipped' data-position='right' data-delay='50' data-tooltip='Visita completa'>done</i>
      <?php
          }
        ?>
      </td>
      <td>
        <?php
          if ($row->duracion >= 0 AND $row->duracion <= 60)
          {
            echo $row->duracion." s";
          }
          else if ($row->duracion > 60 AND $row->duracion <= 3600)
          {
            echo number_format(($row->duracion / 60),1,".",",")." min";
          }
          else if ($row->duracion > 3600)
          {
            echo number_format(($row->duracion / 3600),1,".",",")." hras";
          }
        ?>
      </td>
    </tr>
 <?php
  }
 ?>
  </div>
  </tbody>
  </div>
  </main>

  </body>