<main>
<br>
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
</main>