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
<div style="padding-left: 30px; padding-right: 30px">
<!--Query Data-->
<?php
  $this->db->select('*');
  $this->db->order_by('id_sesion', 'DESC');
  $this->db->limit(50);
  $query = $this->db->get('sesiones');

  if ($query->num_rows() >= 1)
  {
?>
<!--Data Table-->
  <table id='large' class='tablesorter highlight centered responsive-table'>
    <thead>
      <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Usuario</th>
        <th>Navegador</th>
        <th>SO</th>
        <th>Dirección IP</th>
      </tr>
    </thead>
    <tbody>
    <?php
    }
  foreach ($query->result() as $row){
    ?>
    <tr>
      <td><?= $row->id_sesion ?></td>
      <td><?= $row->fecha     ?></td>
      <td><?= $row->hora      ?></td>
      <td><?= $row->user      ?></td>
      <td><?= $row->navegador ?></td>
      <td><?= $row->so        ?></td>
      <td><?= $row->ip        ?></td>
      </tr>
    <?php
    }
    ?>
</tbody>
</table>
</div>
</main>

</body>