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
      <li><a class="btn-floating blue" href="<?=base_url()?>User/Empresas/Add"><i class="material-icons">add</i></a></li>
    </ul>
  </div>
</div>
<!--/Header-->
<main>
<div style="padding-left: 30px; padding-right: 30px">
<table id='large' class='tablesorter highlight centered responsive-table'>
    <thead>
      <tr>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>ID</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Empresa</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Acrónimo</th>
        <th class="tr_selected tooltipped" data-delay='30' data-tooltip='Ordenar' data-position='top'>Editar</th>
      </tr>
    </thead>
    <tbody>
 <?php
  $query = $this->db->query("SELECT * FROM empresa");
  foreach ($query->result() as $row){
 ?>
    <tr>
      <td><?= $row->id_empresa ?></td>
      <td><?= $row->r_social   ?></td>
      <td><?= $row->acronimo   ?></td>
      <td>
        <a href='<?= base_url() ?>User/Empresas/Edit/<?= $row->id_empresa ?>'>
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