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
<div class="row center-align">
  <div class="col l3 m3 s6">
    <h5><i class="small material-icons">language</i><br><span style="color: gray"><?= $this->agent->browser() ?></span></h5>
  </div>
  <div class="col l3 m3 s6">
    <h5><i class="small material-icons">laptop_mac</i><br><span style="color: gray"><?= $this->agent->platform() ?></span></h5>
  </div>
  <div class="col l3 m3 s6">
    <h5><i class="small material-icons">smartphone</i><br><span style="color: gray"></h5>
      <?php
        if ($this->agent->is_mobile())
        {
          echo $this->agent->mobile();
        }
        else
        {
          echo 'No';
        }
      ?>
    </span>
  </div>
  <div class="col l3 m3 s6">
    <h5><i class="small material-icons">wifi</i><br><span style="color: gray">
        <?php
          //--Validate Real Ip
          function getRealIP() {
            if (!empty($_SERVER['HTTP_CLIENT_IP']))
               return $_SERVER['HTTP_CLIENT_IP'];
            if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
               return $_SERVER['HTTP_X_FORWARDED_FOR'];
            return $_SERVER['REMOTE_ADDR'];
          }
          echo getRealIP();
        ?>
      </span></h5>
  </div>
</div>
<!--Query´s-->
<hr>
<div class="row center-align">
  <div class="col l1 m1 s0">
  </div>
  <div class="col l10 m10 s12">
    <div class="collection">
    <a href="#" class="collection-item" style="color: black"><span class="badge"></span><b>SESIONES</b></a>
    <?php
      $actual = date('Y-m-d');
      //--Data Block 1
      echo "<a href='#!' class='collection-item left-align' style='color: black'><span class='new badge green' data-badge-caption=''>".
            $this->db->count_all_results('sesiones').
            "</span>Total Sesiones:</a>";
      //--
            $query = $this->db->query('SELECT * FROM sesiones WHERE navegador = "Chrome"');
      echo "<a href='#!' class='collection-item left-align' style='color: gray'><span class='new badge blue' data-badge-caption=''>".
            $query->num_rows().
           "</span>- Chrome:</a>";
      //--
            $query = $this->db->query('SELECT * FROM sesiones WHERE navegador = "Firefox"');
      echo "<a href='#!' class='collection-item left-align' style='color: gray'><span class='new badge blue' data-badge-caption=''>".
            $query->num_rows().
           "</span>- Firefox:</a>";
      //--
            $query = $this->db->query('SELECT * FROM sesiones WHERE navegador = "Internet Explorer"');
      echo "<a href='#!' class='collection-item left-align' style='color: gray'><span class='new badge blue' data-badge-caption=''>".
            $query->num_rows().
           "</span>- Internet Explorer:</a>";
      //--
            $query = $this->db->query('SELECT * FROM sesiones WHERE navegador = "Safari"');
      echo "<a href='#!' class='collection-item left-align' style='color: gray'><span class='new badge blue' data-badge-caption=''>".
            $query->num_rows().
           "</span>- Safari:</a>";
      //--
            $query = $this->db->query('SELECT * FROM sesiones WHERE navegador = "Opera"');
      echo "<a href='#!' class='collection-item left-align' style='color: gray'><span class='new badge blue' data-badge-caption=''>".
            $query->num_rows().
           "</span>- Opera:</a>";
      //--
            $query = $this->db->query('SELECT * FROM sesiones WHERE navegador != "Chrome" AND navegador != "Firefox" AND navegador != "Internet Explorer" AND navegador != "Safari" AND navegador != "Opera" ');
      echo "<a href='#!' class='collection-item left-align' style='color: gray'><span class='new badge blue' data-badge-caption=''>".
            $query->num_rows().
           "</span>- Otros:</a>";
    ?>
    </div>
  </div>
  <div class="col l1 m1 s0">
  </div>
</div>
</h5>
</div>
</tbody>
</div>
</main>

</body>