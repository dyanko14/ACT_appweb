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
<div class="row" style="text-align: center;">
  <div class="col l4 m4 s12">
    <h5><i class="small material-icons">settings_applications</i><br><span style="color: gray"><?= $this->load->db->version() ?></span></h5>
  </div>
  <div class="col l4 m4 s12">
    <h5><i class="small material-icons">build</i><br><span style="color: gray"><?= $this->load->db->platform() ?></span></h5>
  </div>
  <div class="col l4 m4 s12">
    <h5><i class="small material-icons">code</i><br><span style="color: gray"><?='CI <strong>'.CI_VERSION.'</strong>'?></span></h5>
  </div>
</div>
<br>

<div class="row" style="text-align: center;">
  <?= form_open('Admin/Inicio/Backup')?>
  <button type="submit" name="submit" class="waves-effect waves-light blue-grey darken-2 btn"><i class="material-icons left">flash_on</i>
  	Respaldar BD
  </button>
  <?= form_close()?>
</div>
</div>
</tbody>
</div>
</main>

</body>