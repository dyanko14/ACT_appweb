<main>
<br>

<div style="padding-left: 30px; padding-right: 30px">
<table id='large' class='tablesorter highlight centered responsive-table'>
    <thead>
      <tr>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>ID</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Nombre</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Apellido 1</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Apellido 2</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Genero</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Identificación</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Empresa</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Editar</th>
      </tr>
    </thead>
    <tbody>
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
                    ORDER BY id_visitante");
  foreach ($query->result() as $row){
 ?>
    <tr>
      <td><?= $row->id_visitante ?></td>
      <td><?= $row->v_nombre     ?></td>
      <td><?= $row->v_apellido   ?></td>
      <td><?= $row->v_s_apellido ?></td>
      <td><?= $row->v_genero     ?></td>
      <td><?= $row->v_identif    ?></td>
      <td><?= $row->r_social     ?></td>
      <td>
        <a href='<?= base_url() ?>User/Personas/Edit/<?= $row->id_visitante ?>'>
      <i class='small material-icons green-text'>edit</i>
      </a>
      </td>
    </tr>
 <?php
  }
 ?>
</tbody>
</table>
</table>

<!--Total Records-->
<div class='center-align' style="border-top: 1px dotted gray">
   <h6><?php echo 'Registros: '.'<b>'.$query->num_rows().'</b>'; ?></h6>
</div>
</div>

<!--Air Button-->
<div class="fixed-action-btn horizontal click-to-toggle tooltipped" data-position="top" data-delay="50" data-tooltip="Opciones">
	<a class="btn-floating btn-large red">
    <i class="material-icons">menu</i>
   	</a>
  	<ul>
   	<li><a class="btn-floating blue btn"  href="<?=base_url()?>User/Personas/Add"><i class="material-icons">add</i></a></li>
 	</ul>
</div>
