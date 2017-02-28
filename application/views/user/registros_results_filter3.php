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
    $filtro1  = $this->input->post('filtro',TRUE);  //--Comparation Operators
    $filtro2  = $this->input->post('filtro2',TRUE); //--Seconds
	  $query    = $this->db->query(" SELECT * 
          FROM registro T1
            INNER JOIN visitante T2 ON T1.id_visitante = T2.id_visitante
            INNER JOIN empresa T3 ON T2.id_empresa = T3.id_empresa
            INNER JOIN empleados T4 ON T1.id_act = T4.id_act
            INNER JOIN razon T5 ON T1.id_razon = T5.id_razon
              WHERE T1.duracion $filtro1 $filtro2 ");
		foreach ($query->result() as $row){
	?>
    <tr>
      <td><?= $row->id_reg   ?></td>
      <td><?= $row->fecha_in ?></td>
      <td><?= $row->hora_in  ?></td>
      <td><?= $row->v_nombre." ".$row->v_apellido  ?></td>
      <td><?= $row->r_social  ?></td>
      <td><?= $row->e_nombre." ".$row->e_apellido  ?></td>
      <td><?= $row->razon    ?></td>
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
      <td style="color: blue">
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