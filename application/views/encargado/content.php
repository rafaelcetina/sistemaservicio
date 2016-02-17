   <!-- Main Content -->
<div class="container">
    <div class="widget-header">
            <i class="icon-bar-chart"></i>
            <h3>Panel del Encargado. Empresa:</h3>
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
                        <strong>Bien!</strong> se programó el reporte subida con Exito.
                      </div>
                      </div>
                    </div>
                    <?php  } ?>

        <div class="widget big-stats-container">
            <div class="widget-content">
                <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> ALUMNO </th>
                    <th> MATRICULA </th>
                    <th> CARRERA </th>
                    <th> SEMESTRE </th>
                    <th> REPORTE </th>
                    <!--<th class="td-actions"> </th>-->
                  </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($alumnos) and $alumnos!=NULL){
                        foreach ($alumnos as $fila){ ?>
                  <tr>
                    <td> <?=$fila['nombre'];?></td>
                    <td> <?=$fila['matricula'];?> </td>
                    <td> <?=$fila['carrera'];?> </td>
                    <td> <?=$fila['semestre'];?> </td>
                    <td> <a href="subirReporteEncargado/<?=$fila['matricula'];?>"><button class="btn btn-info">Reporte</button></a></td>
                    <!--<td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>-->
                  </tr>
                  <?php } } ?>
                </tbody>
              </table>
                
            </div>
    
        </div>
    </div>
</div>
    