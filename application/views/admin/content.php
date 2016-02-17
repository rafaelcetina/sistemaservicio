<div class="main">

    <div class="main-inner">   
        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <!-- /widget-header -->
                <div class="widget widget-table action-table">
                    <div class="widget-header">
                        <i class="icon-bar-chart"></i>
                        <h3>Alumnos por Carrera</h3>
                    </div>
                        <!-- /widget-header -->
                    <div class="widget-content">
                        <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> MATRICULA </th>
                    <th> NOMBRE </th>
                    <th> SEMESTRE </th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if($consulta->result()!=NULL){
                foreach ($consulta->result() as $fila){
                    ?>
                  <tr id="number<?=$fila->matricula?>">
                    <td> <?=$fila->matricula?> </td>
                    <td> <?=$fila->nombre?> </td>
                    <td> <?=$fila->semestre?> </td>
                    <td> <a href="<?=base_url()?>lista/verAlumno/<?=$fila->matricula?>">
                        <button class="btn btn-success"> Ver </button></a>
                         <a href="<?=base_url()?>lista/eliminarAlumno/<?=$fila->matricula?>">
                    </a>
                        <button class="eliminar btn btn-danger" data-id="<?=$fila->matricula?>"> Eliminar </button>
                    </a> </td>
                    
                  </tr>
                    <?php
                }
                    }else{
                        echo "<h2 class='post-title'>
                                No hay Alumnos
                            </h2>";
                    }
                ?>
                </tbody>
              </table>
                    </div>
                    <div class="col-lg-12 text-right">
                        <!-- Pager -->
                        <?=$pagination?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).ready(function(){
            $(".eliminar").on("click", function(e) {
 
                var id = $(this).data('id');
                //alert(id);
                var request;
                if(request){
                    request.abort();
                }

                swal({   title: "¿Estás seguro?",   text: "Estás apunto de eliminar un Alumno: ", type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, eliminar plantilla",   closeOnConfirm: false }, 
                function(){
     
                request = $.ajax({
                    url: "<?=base_url('lista/eliminarAlumno')?>",
                    type: "POST",
                    data: "matricula="+id
                });

                request.done(function (response, textStatus, jqXHR) {
                    console.log("Se eliminó la plantilla: "+response);
                    $('#number'+id).remove();
                });

                request.fail(function (jqXHR, textStatus, thrown) {
                    console.log("Error: "+textStatus)
                });

                request.always(function () {
                    console.log("Terminó la ejecución de Ajax");
                });



                swal("Eliminado!", "El registro ha sido eliminado.", "success");
                


                });

                e.preventDefault();


            });
        });
    </script>