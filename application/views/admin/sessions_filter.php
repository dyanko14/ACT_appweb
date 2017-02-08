<main>
<br>

<div style="padding-left: 30px; padding-right: 30px">
<table id='large' class='tablesorter highlight centered responsive-table'>
    <thead>
      <tr>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>ID</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Fecha</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Usuario</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Navegador</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>SO</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Dirección IP</th>
      </tr>
    </thead>
    <tbody>
	 <?php
    //Datos enviados por Post
    $fecha1 = $this->input->post('Fecha1',TRUE);
    $fecha2 = $this->input->post('Fecha2',TRUE);
	  $query  = $this->db->query(" SELECT * FROM sesiones WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY id_sesion ASC");
		foreach ($query->result() as $row){
	?>
    <tr>
      <td><?= $row->id_sesion   ?></td>
      <td style="color: blue"><?= $row->fecha?></td>
      <td><?= $row->user  ?></td>
      <td><?= $row->navegador ?></td>
      <td><?= $row->so ?></td>
      <td><?= $row->ip ?></td>
    </tr>
 <?php
  }
 ?>
</tbody>
</table>
</blockquote>

<!--Total Records-->
<div class='center-align' style="border-top: 1px dotted gray">
   <h6><?php echo 'Registros: '.'<b>'.$query->num_rows().'</b>'; ?></h6>
</div>
</div>