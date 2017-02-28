<!--Header-->
<div class="row" style="border-bottom: solid 1px red">
  <div class="col l3 m1 s2 center-align">
    <br>
    <ul>
      <li><a href="#" data-activates="slide-out" class="btn-floating red button-collapse" class="btn-floating blue"><i class="material-icons">menu</i></a></li>
    </ul>
  </div>
  <div class="col l8 m10 s8 center-align">            
    <br>
    <h5><?= $title ?></h5>
  </div>
  <div class="col l1 m1 s2 center-align">  
    <br>
    <ul>
      <li><a class="btn-floating blue" href="<?=base_url()?>User/Personas/Add"><i class="material-icons">add</i></a></li>
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
        <th>Apellido M</th>
        <th>Genero</th>
        <th>Identificación</th>
        <th>Empresa</th>
        <th>Editar</th>
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
</div>
</main>

</body>