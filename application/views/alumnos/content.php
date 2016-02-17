   <!-- Main Content -->
<div class="container">
<div class="widget widget-table action-table">
    
    <div class="widget-header">
            <i class="icon-bar-chart"></i>
            <h3>Panel del Alumno</h3>
    </div>
    <div class="widget-content">

        <?php if(isset($_GET['error'])){ ?>
                    <div class="control-group">
                      <div class="controls">
                      <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error!</strong> Ocurrio un error.
                      </div>
                      </div>
                    </div>
                    <?php  } ?>
                    <?php if(isset($_GET['success'])){ ?>
                    <div class="control-group">
                      <div class="controls">
                      <div class="alert-success">
                        <button type="button" class="close" data-dismiss="alert-success">&times;</button>
                        <strong>Bien!</strong> se subió el reporte con Exito.
                      </div>
                      </div>
                    </div>
                    <?php  } ?>
        <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> REPORTE 1</th>
                    <th> REPORTE 2</th>
                    <th> REPORTE 3</th>
                    <th> LINEAMIENTOS</th>
                    <th> ARCHIVOS</th>
                    <!--<th class="td-actions"> </th>-->
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <?php
                        if(isset($reportes1) and $reportes1!=NULL){
                          foreach ($reportes1 as $fila){ ?>
                              <td rowspan="3">
                              Fecha de entrega:<br> <?=($fila['fecha']!=null) ? $fila['fecha'] : "No hay entrega" ;?><hr>
                              Archivo : <?php if($fila['archivo']!=NULL) { ?>
                              <a href="<?=base_url('public/reportes').'/'.$fila['archivo']?>">
                              <button class="btn btn-default">Descargar</button>
                              </a>
                              <?php }else{ echo "No hay Archivo"; 
                                    ?><br>
                                    <a href="<?=base_url('profile')?>/subirReporteAlumno/<?=$matricula?>?num_reporte=1"><button class="btn btn-danger"> Subir </button></a>
                                    <?php      
                               } ?><hr>
                              Fecha límite :<br> <?=$fila['fecha_limite'] ?>
                              
                          </td>
                            <?php
                            }
                          }else{ ?>
                            <td rowspan="3">
                            No se ha programado reporte<hr>
                              <!--<button class="btn btn-danger doit">subir</button>-->
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
                              <?php }else{ echo "No hay Archivo"; ?>
                                <a href="<?=base_url('profile')?>/subirReporteAlumno/<?=$matricula?>?num_reporte=2"><button class="btn btn-danger"> Subir </button></a>  
                              <?php } ?><hr>
                              Fecha límite :<br> <?=$fila['fecha_limite'] ?>
                          </td>
                            <?php
                            }
                          }else{ ?>
                            <td rowspan="3">
                              No se ha programado reporte
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
                              <?php }else{ echo "No hay Archivo"; 
                                    ?><br>
                                    <a href="<?=base_url('profile')?>/subirReporteAlumno/<?=$matricula?>?num_reporte=3"><button class="btn btn-danger"> Subir </button></a>
                                    <?php      
                               } ?><hr>
                              Fecha límite :<br> <?=$fila['fecha_limite'] ?>
                          </td>
                            <?php
                            }
                          }else{ ?>
                            <td rowspan="3">
                              No se ha programado reporte
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
                              <?php }else{ echo "No hay Archivo"; 
                                    ?><br>
                                    <a href="<?=base_url('profile')?>/subirReporteAlumno/<?=$matricula?>?num_reporte=4"><button class="btn btn-danger"> Subir </button></a>
                                    <?php      
                               } ?><hr>
                              Fecha límite :<br> <?=$fila['fecha_limite'] ?>
                          </td>
                            <?php
                            }
                          }else{ ?>
                            <td rowspan="3">
                              No se ha programado reporte
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
                              <?php }else{ echo "No hay Archivo"; 
                                    ?><br>
                                    <a href="<?=base_url('profile')?>/subirReporteAlumno/<?=$matricula?>?num_reporte=5"><button class="btn btn-danger"> Subir </button></a>
                                    <?php      
                               } ?><hr>
                              Fecha límite :<br> <?=$fila['fecha_limite'] ?>
                          </td>
                            <?php
                            }
                          }else{ ?>
                            <td rowspan="3">
                              No se ha programado reporte
                            </td>
                          <?php
                          
                          }
                        ?>
                  </tr>
                </tbody>
              </table>
    </div>
</div>
</div>
    