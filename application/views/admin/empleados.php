<main>
<br>
<blockquote>
<table id='large' class='tablesorter highlight centered responsive-table'>
    <thead>
      <tr>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>ID</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Nombre</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Apellido 1</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Cargo</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Correo</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Género</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Editar</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Activo</th>
      </tr>
    </thead>
    <tbody>
 <?php
  $query = $this->db->get('empleados');
  foreach ($query->result() as $row){
 ?>
    <tr>
      <td><?= $row->id_act     ?></td>
      <td><?= $row->e_nombre   ?></td>
      <td><?= $row->e_apellido ?></td>
      <td><?= $row->e_posicion ?></td>
      <td><?= $row->email      ?></td>
      <td><?= $row->e_genero   ?></td>
      <td>
      	<a href='<?= base_url() ?>Admin/Empleados/Edit/<?= $row->id_act ?>'>
			   <i class='small material-icons green-text'>edit</i>
   		  </a>
      </td>
      <?php
        if($row->e_activo == 'si')
        {
        ?>
        <td>
        	<a href='<?= base_url() ?>Admin/Empleados/Deactivate/<?= $row->id_act ?>'>
  			   <i class='small material-icons blue-text'>done</i>
     		  </a>
        </td>
        <?php
        }
        else
        {
          ?>
          <td>
          	<a href='<?= base_url() ?>Admin/Empleados/Activate/<?= $row->id_act ?>'>
    			   <i class='small material-icons red-text'>clear</i>
       		  </a>
          </td>
          <?php
        }
      ?>

    </tr>
 <?php
  }
 ?>
</tbody>
</table>
</blockquote>

<!--Total Records-->
<blockquote>
<div class='center-align' style="border-top: 1px dotted gray">
   <h6><?php echo 'Registros: '.'<b>'.$query->num_rows().'</b>'; ?></h6>
</div>
</blockquote>

<!--Air Button-->
<div class="fixed-action-btn horizontal click-to-toggle tooltipped" data-position="top" data-delay="50" data-tooltip="Opciones">
	<a class="btn-floating btn-large blue-grey darken-2">
    <i class="material-icons">menu</i>
   	</a>
  	<ul>
   	<li><a class="btn-floating blue btn"  href="<?=base_url()?>Admin/Empleados/Add"><i class="material-icons">add</i></a></li>
 	</ul>
</div>
