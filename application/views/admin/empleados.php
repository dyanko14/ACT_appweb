<!--Header-->
<div class="row" style="border-bottom: solid 1px gray">
  <div class="col l3 m1 s2 center-align">
    <br>
    <ul>
      <li><a href="#" data-activates="slide-out" class="btn-floating blue-grey button-collapse" class="btn-floating blue"><i class="material-icons">menu</i></a></li>
    </ul>
  </div>
  <div class="col l8 m10 s8 center-align">            
    <br>
    <h5><?= $title ?></h5>
  </div>
  <div class="col l1 m1 s2 center-align">  
    <br>
    <ul>
      <li><a class="btn-floating blue" href="<?=base_url()?>Admin/Empleados/Add"><i class="material-icons">add</i></a></li>
    </ul>
  </div>
</div>
<!--/Header-->
<main>
<div style="padding-left: 30px; padding-right: 30px">
<table id='large' class='tablesorter highlight centered responsive-table'>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido P</th>
        <th>Cargo</th>
        <th>Correo</th>
        <th>Género</th>
        <th>Editar</th>
        <th>Activo</th>
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
</div>
</main>

</body>