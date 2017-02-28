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
<div class="row">
    <div class="col l1 m1 s1">
    </div>
    <div class="col l10 m10 s10">
        <!--Input-->
        <?= form_open('User/Empresas/Form_edit'); ?>
        <!--/-->        
        <?php
        $query = $this->db->query("SELECT * FROM empresa WHERE id_empresa = '$ID' ");
        foreach ($query->result() as $row){
            echo "<div style='display: none'>".form_input('ID', $row->id_empresa)."</div><br>";
        ?>
        <!--/--> 
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">business</i>
        </div>
        <div class="col l2 m3 s6">
            <label><span style="color: red">*&nbsp;</span>Razón Social:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
            <?= form_input('R_Social', $row->r_social) ?>
            <span style="text-align: center;" class="red-text"><b><?php echo form_error('R_Social'); ?></b></span>
        </div>
        <!--/--> 
        <div class="col l4 m3 s6" style="text-align: right">
            <i class="material-icons">stars</i>
        </div>
        <div class="col l2 m3 s6">
            <label><span style="color: red">*&nbsp;</span>Acrónimo:</label>
        </div>
        <div class="col l6 m6 s12" style="text-align: center">
            <?= form_input('Acronimo', $row->acronimo) ?>
            <span style="text-align: center;" class="red-text"><b><?php echo form_error('Acronimo'); ?></b></span>
        </div>
        <!--/Input-->        
        <?php
        }
        ?>
    </div>
    <div class="col l1 m1 s1">
    </div>
</div>
<!--Button-->
<div class="row" style="text-align: center;">
    <div class="col s1 m2 l2">
    </div>
    <div class="col s10 m8 l8">
    <button type="submit" name="submit" class="waves-effect waves-light green btn"><i class="material-icons left">edit</i>
        Modificar
    </button>
    <?= form_close() ?>
</tbody>
</table>
</div>
</main>

</body>