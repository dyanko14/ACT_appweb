<main>
<br>
<blockquote>
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
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>ID</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Fecha</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Hora</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Usuario</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Navegador</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>SO</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Dirección IP</th>
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
</blockquote>
<!--Total Records-->
<blockquote>
<div class='center-align' style="border-top: 1px dotted gray">
   <h6><?php echo 'Registros: '.'<b>'.$query->num_rows().'</b>'; ?></h6>
</div>
</blockquote>
</main>