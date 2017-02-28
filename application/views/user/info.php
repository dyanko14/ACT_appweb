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
<div class="row center-align">
  <div class="col l3 m3 s6">
    <h5><i class="small material-icons">language</i><br><span style="color: gray"><?= $this->agent->browser() ?></span></h5>
  </div>
  <div class="col l3 m3 s6">
    <h5><i class="small material-icons">laptop_mac</i><br><span style="color: gray"><?= $this->agent->platform() ?></span></h5>
  </div>
  <div class="col l3 m3 s6">
    <h5><i class="small material-icons">smartphone</i><br><span style="color: gray">
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
    </span></h5>
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
<script type="text/javascript">
    $(function () {
        Highcharts.chart('container1', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'TOTALES'
            },
            subtitle: {
                text: 'Filtrados por cantidad'
            },
            xAxis: {
                categories: ['Totales'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Totales',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Totales'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Empleados',
                data: [
                      <?php
                        $query = $this->db->query("SELECT COUNT(*) AS total FROM empleados");
                        foreach ($query->result() as $row)
                        { echo $row->total; }
                      ?>
                      ]
            }, {
                name: 'Visitantes',
                data: [
                      <?php
                        $query = $this->db->query("SELECT COUNT(*) AS total FROM visitante ");
                        foreach ($query->result() as $row)
                        { echo $row->total; }
                      ?>
                      ]
            }, {
                name: 'Empresas',
                data: [
                      <?php
                        $query = $this->db->query("SELECT COUNT(*) AS total FROM empresa ");
                        foreach ($query->result() as $row)
                        { echo $row->total; }
                      ?>
                      ]
            }]
        });
    });
    </script>
<script type="text/javascript">
    $(function () {
        Highcharts.chart('container2', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Visitas de este mes'
            },
            subtitle: {
                text: 'Filtrados por cantidad'
            },
            xAxis: {
                categories: ['Registros', 'Empleados', 'Visitantes'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Registros de Visitas',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: 'Visitas'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Todo',
                data: [
                      <?php
                        $query = $this->db->query("SELECT COUNT(*) AS total FROM registro");
                        foreach ($query->result() as $row)
                        { echo $row->total; }
                      ?>
                      ]
            }, {
                name: 'Hoy',
                data: [
                      <?php
                        $hoy   = date('Y-m-d');
                        $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE fecha_in='$hoy' ");
                        foreach ($query->result() as $row)
                        { echo $row->total; }
                      ?>
                      ]
            }, {
                name: 'Esta semana',
                data: [
                      <?php
                        $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE YEARweek(fecha_in)=YEARweek(CURRENT_date)");
                        foreach ($query->result() as $row)
                        { echo $row->total; }
                      ?>
                      ]
            }, {
                name: 'Este mes',
                data: [
                      <?php
                        $mes = date('m');
                        $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE MONTH(fecha_in)='$mes' ");
                        foreach ($query->result() as $row)
                        { echo $row->total; }
                      ?>
                      ]
            }]
        });
    });
</script>
<script type="text/javascript">
$(function () {
    Highcharts.chart('container3', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Registro de visitas del presente año'
        },
        subtitle: {
            text: ''+<?= date('Y') ?>
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Visitas'
            }
        },
        tooltip: {
            pointFormat: 'Visitas'
        },
        series: [{
            name: 'Visitas mensuales',
            data: [
                ['Enero',
                  <?php
                    $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE MONTH(fecha_in)=1 ");
                    foreach ($query->result() as $row)
                      { echo $row->total; }
                  ?>
                ],
                ['Febrero',
                  <?php
                    $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE MONTH(fecha_in)=2 ");
                    foreach ($query->result() as $row)
                      { echo $row->total; }
                  ?>
                ],                
                ['Marzo',
                  <?php
                    $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE MONTH(fecha_in)=3 ");
                    foreach ($query->result() as $row)
                      { echo $row->total; }
                  ?>
                ],
                ['Abril',
                  <?php
                    $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE MONTH(fecha_in)=4 ");
                    foreach ($query->result() as $row)
                      { echo $row->total; }
                  ?>
                ],
                ['Mayo',
                  <?php
                    $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE MONTH(fecha_in)=5 ");
                    foreach ($query->result() as $row)
                      { echo $row->total; }
                  ?>
                ],
                ['Junio',
                  <?php
                    $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE MONTH(fecha_in)=6 ");
                    foreach ($query->result() as $row)
                      { echo $row->total; }
                  ?>
                ],
                ['Julio',
                  <?php
                    $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE MONTH(fecha_in)=7 ");
                    foreach ($query->result() as $row)
                      { echo $row->total; }
                  ?>
                ],
                ['Agosto',
                  <?php
                    $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE MONTH(fecha_in)=8 ");
                    foreach ($query->result() as $row)
                      { echo $row->total; }
                  ?>
                ],
                ['Septiembre',
                  <?php
                    $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE MONTH(fecha_in)=9 ");
                    foreach ($query->result() as $row)
                      { echo $row->total; }
                  ?>
                ],
                ['Octubre',
                  <?php
                    $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE MONTH(fecha_in)=10 ");
                    foreach ($query->result() as $row)
                      { echo $row->total; }
                  ?>
                ],
                ['Noviembre',
                  <?php
                    $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE MONTH(fecha_in)=11 ");
                    foreach ($query->result() as $row)
                      { echo $row->total; }
                  ?>
                ],
                ['Diciembre',
                  <?php
                    $query = $this->db->query("SELECT COUNT(*) AS total FROM registro WHERE MONTH(fecha_in)=12 ");
                    foreach ($query->result() as $row)
                      { echo $row->total; }
                  ?>
                ],
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.0f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});
</script>
<script type="text/javascript">
    $(function () {
        Highcharts.chart('container4', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {              
                text: 'Visitantes Registrados'
            },
            subtitle: {
                text: 'Filtrado por géneros'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data: [{
                    name: 'Hombres',
                    y: 
                      <?php
                        $query = $this->db->query("SELECT COUNT(*) AS total FROM visitante WHERE v_genero='M' ");
                        foreach ($query->result() as $row)
                        { echo $row->total; }
                      ?>
                },{
                    name: 'Mujeres',
                    y: 
                      <?php
                        $query = $this->db->query("SELECT COUNT(*) AS total FROM visitante WHERE v_genero='F' ");
                        foreach ($query->result() as $row)
                        { echo $row->total; }
                      ?>
                }]
            }]
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        Highcharts.chart('container5', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {              
                text: 'Empleados Registrados'
            },
            subtitle: {
                text: 'Filtrado por géneros'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data: [{
                    name: 'Hombres',
                    y: 
                      <?php
                        $query = $this->db->query("SELECT COUNT(*) AS total FROM empleados WHERE e_genero='M' ");
                        foreach ($query->result() as $row)
                        { echo $row->total; }
                      ?>
                },{
                    name: 'Mujeres',
                    y: 
                      <?php
                        $query = $this->db->query("SELECT COUNT(*) AS total FROM empleados WHERE e_genero='F' ");
                        foreach ($query->result() as $row)
                        { echo $row->total; }
                      ?>
                }]
            }]
        });
    });
</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<div class="row">
  <div class="col l6 m12 s12">
    <div id="container1"><!--Graphic 1--></div>
  </div>
  <div class="col l6 m12 s12">
    <div id="container2"><!--Graphic 2--></div>
  </div>  
</div>
<hr>
<div class="row">
  <div class="col l12 m12 s12">
    <div id="container3"><!--Graphic 3--></div>
  </div>
</div>
<hr>
<div class="row">
  <div class="col l6 m12 s12">
    <div id="container4"><!--Graphic 4--></div>
  </div>
  <div class="col l6 m12 s12">
    <div id="container5"><!--Graphic 5--></div>
  </div>  
</div>
</tbody>
</div>
</main>

</body>