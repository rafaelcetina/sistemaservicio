 <div class="container">
        <div class="row">
<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3><?=$nombre?></h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> ALUMNO </th>
                    <th> REPORTE 1</th>
                    <th> REPORTE 2</th>
                    <th> REPORTE 3</th>
                    <th> LINEAMIENTOS</th>
                    <th> ARCHIVOS</th>
                    <th> REPORTE DE ENCARGADO</t>
                    <!--<th class="td-actions"> </th>-->
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td rowspan="3"> <?=$matricula ?> - <?=$nombre ?><hr>Servicio Social: <?=$empresa?><hr> Carrera: <?=$carrera?></td>
                      <?php
                        if(isset($reportes1) and $reportes1!=NULL){
                          foreach ($reportes1 as $fila){ ?>
                              <td rowspan="3">
                              Fecha de entrega:<br> <?=($fila['fecha']!=null) ? $fila['fecha'] : "No hay entrega" ;?><hr>
                              Archivo : <?php if($fila['archivo']!=NULL) { ?>
                              <a href="<?=base_url('public/reportes').'/'.$fila['archivo']?>">
                              <button class="btn btn-default">Descargar</button>
                              </a>
                              <?php }else{ echo "No hay Archivo"; } ?><hr>
                              Fecha límite :<br> <?=$fila['fecha_limite'] ?><hr>
                              <a href="<?=base_url('profile')?>/programar_reporte_alumno/<?=$matricula?>?num_reporte=1"><button class="btn btn-warning"> Volver a programar</button></a>
                          </td>
                            <?php
                            }
                          }else{ ?>
                            <td rowspan="3">
                            No se ha programado reporte<hr>
                              <a href="<?=base_url('profile')?>/programar_reporte_alumno/<?=$matricula?>?num_reporte=1"><button class="btn btn-danger"> Programar </button></a>
                              <!--<button class="btn btn-danger doit">Programar</button>-->
                            </td>
                          <?php
                          }
                        
                          if(isset($reportes2) and $reportes2!=NULL){
                          foreach ($reportes2 as $fila){ ?>
                              <td rowspan="3">
                              Fecha de entrega:<br> <?=($fila['fecha']!=null) ? $fila['fecha'] : "No hay entrega" ;?><hr>
                              Archivo : <?php if($fila['archivo']!=NULL) { ?>
                              <a href="<?=base_url('public/reportes').'/'.$fila['archivo']?>">
                              <button class="btn btn-default">Descargar</button>
                              </a>
                              <?php }else{ echo "No hay Archivo"; } ?><hr>
                              Fecha límite :<br> <?=$fila['fecha_limite'] ?><hr>
                              <a href="<?=base_url('profile')?>/programar_reporte_alumno/<?=$matricula?>?num_reporte=2"><button class="btn btn-warning"> Volver a programar </button></a>
                          </td>
                            <?php
                            }
                          }else{ ?>
                            <td rowspan="3">
                              No se ha programado reporte<hr>
                              <a href="<?=base_url('profile')?>/programar_reporte_alumno/<?=$matricula?>?num_reporte=2"><button class="btn btn-danger"> Programar </button></a>
                            </td>
                          <?php
                          
                          }
                          if(isset($reportes3) and $reportes3!=NULL){
                          foreach ($reportes3 as $fila){ ?>
                              <td rowspan="3">
                              Fecha de entrega:<br> <?=($fila['fecha']!=null) ? $fila['fecha'] : "No hay entrega" ;?><hr>
                              Archivo : <?php if($fila['archivo']!=NULL) { ?>
                              <a href="<?=base_url('public/reportes').'/'.$fila['archivo']?>">
                              <button class="btn btn-default">Descargar</button>
                              </a>
                              <?php }else{ echo "No hay Archivo"; } ?><hr>
                              Fecha límite :<br> <?=$fila['fecha_limite'] ?><hr>
                              <a href="<?=base_url('profile')?>/programar_reporte_alumno/<?=$matricula?>?num_reporte=3"><button class="btn btn-warning"> Volver a programar </button></a>
                          </td>
                            <?php
                            }
                          }else{ ?>
                            <td rowspan="3">
                              No se ha programado reporte<hr>
                              <a href="<?=base_url('profile')?>/programar_reporte_alumno/<?=$matricula?>?num_reporte=3"><button class="btn btn-danger"> Programar </button></a>
                            </td>
                          <?php
                          
                          }
                          if(isset($reportes4) and $reportes4!=NULL){
                          foreach ($reportes4 as $fila){ ?>
                              <td rowspan="3">
                              Fecha de entrega:<br> <?=($fila['fecha']!=null) ? $fila['fecha'] : "No hay entrega" ;?><hr>
                              Archivo : <?php if($fila['archivo']!=NULL) { ?>
                              <a href="<?=base_url('public/reportes').'/'.$fila['archivo']?>">
                              <button class="btn btn-default">Descargar</button>
                              </a>
                              <?php }else{ echo "No hay Archivo"; } ?><hr>
                              Fecha límite :<br> <?=$fila['fecha_limite'] ?><hr>
                              <a href="<?=base_url('profile')?>/programar_reporte_alumno/<?=$matricula?>?num_reporte=4"><button class="btn btn-warning"> Volver a programar </button></a>
                          </td>
                            <?php
                            }
                          }else{ ?>
                            <td rowspan="3">
                              No se ha programado reporte<hr>
                              <a href="<?=base_url('profile')?>/programar_reporte_alumno/<?=$matricula?>?num_reporte=4"><button class="btn btn-danger"> Programar </button></a>
                            </td>
                          <?php
                          
                          }
                          if(isset($reportes5) and $reportes5!=NULL){
                          foreach ($reportes5 as $fila){ ?>
                              <td rowspan="3">
                              Fecha de entrega:<br> <?=($fila['fecha']!=null) ? $fila['fecha'] : "No hay entrega" ;?><hr>
                              Archivo : <?php if($fila['archivo']!=NULL) { ?>
                              <a href="<?=base_url('public/reportes').'/'.$fila['archivo']?>">
                              <button class="btn btn-default">Descargar</button>
                              </a>
                              <?php }else{ echo "No hay Archivo"; } ?><hr>
                              Fecha límite :<br> <?=$fila['fecha_limite'] ?><hr>
                              <a href="<?=base_url('profile')?>/programar_reporte_alumno/<?=$matricula?>?num_reporte=5"><button class="btn btn-warning"> Volver a programar </button></a>
                          </td>
                            <?php
                            }
                          }else{ ?>
                            <td rowspan="3">
                              No se ha programado reporte<hr>
                              <a href="<?=base_url('profile')?>/programar_reporte_alumno/<?=$matricula?>?num_reporte=5"><button class="btn btn-danger"> Programar </button></a>
                            </td>
                          <?php
                          
                          }
                      if(isset($reportesEncargado) and $reportesEncargado!=NULL){
                        foreach ($reportesEncargado as $fila){ ?>
                          <td rowspan="3">
                              Fecha de entrega:<br> <?=($fila['fecha']!=null) ? $fila['fecha'] : "No hay entrega" ;?><hr>
                              Archivo : <?php if($fila['archivo']!=NULL) { ?>
                              <a href="<?=base_url('public/reportes/alumnos').'/'.$fila['archivo']?>">
                              <button class="btn btn-default">Descargar</button>
                              </a>
                              <?php }else{ echo "No hay Archivo"; } ?><hr>
                              Fecha límite :<br> <?=$fila['fecha_limite'] ?><hr>
                              <a href="<?=base_url('profile')?>/programar_reporte_encargado/<?=$matricula?>"><button class="btn btn-warning"> Volver a programar </button></a>
                          </td>
                          <?php
                          }
                        }else{ ?>
                          <td rowspan="3">
                              No se ha programado reporte<hr>
                              <a href="<?=base_url('profile')?>/programar_reporte_encargado/<?=$matricula?>"><button class="btn btn-danger"> Programar </button></a>
                          </td>
                        <?php
                        }
                        ?>
                  </tr>
                </tbody>
              </table>
              
              <!--<div id="programar">
                <form action="profile/programar_reporte_alumno_action" method="post" id="form">
                <!--<?php
                echo form_open("profile/programar_reporte_alumno_action");
                ?>
                <input type="hidden" id="matricula" name="matricula" value="<?=$matricula?>">
                <input type="hidden" id="num_reporte" name="num_reporte" value="1">
                <label for="fecha_limite">Selecciona la Fecha límite</label>
                <input type="date" id="fecha_limite" name="fecha_limite">
                <input type="submit" class="btn" value="Enviar">
                </form>
              </div>
              <div class="info">
                No se ha programado reporte<hr>
              </div>
              
              </div>-->
              </div>
          </div>
        </div>
        <script>
        $('#programar').hide();
        $('#doit').click(function(){
          $('#programar').show().fadeIn('slow');
          $('#doit').hide().fadeOut('slow');

          $('#form').submit(function(e) {
            e.preventDefault();
            request = $.ajax({
                    url: "<?=base_url('profile/programar_reporte_alumno_action')?>",
                    type: "POST",
                    data:$("#form").serialize(),
                    success: function(response){
                        $('.info').html("Fecha de entrega: No hay entrega<hr>Archivo : No hay Archivo<hr>Fecha límite :"+response);
                        $('#programar').hide();
                    }
                });
          })


        })
        </script>