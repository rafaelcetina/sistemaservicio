<script type="text/javascript">
        $(document).ready(function(){
            $(".delete").on("click", function(e) {

                var name= $(this).attr('name');
               
                var id = $(this).attr('id');

                var request;
                if(request){
                    request.abort();
                }

                swal({   title: "¿Estás seguro?",   text: "Estás apunto de eliminar la Matricula: "+name,   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, eliminar al Alumno!",   closeOnConfirm: false }, 
                function(){
     
                request = $.ajax({
                    url: "<?=base_url('profile/borrar')?>",
                    type: "POST",
                    data: "matricula="+name+"&id="+id
                });

                request.done(function (response, textStatus, jqXHR) {
                    console.log("Se eliminó la Matricula: "+response);
                    $('#tr'+response).html('');
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
   <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- /widget-header -->
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Plantillas para reportes de Alumnos y Encargados.</h3>
            </div>
            <div class="widget-content">
              <div class="widget big-stats-container">
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
                        <strong>Bien!</strong> Plantilla subida con Exito.
                      </div>
                      </div>
                    </div>
                    <?php  } ?>

                  <div id="big_stats" class="cf">
                    <a href="profile/subirPlantilla/1">
                    <div class="stat"> <i class="icon-book"></i> <span class="value">Reporte 1<br>
                    </a>
                    </span> </div>
                    <!-- .stat -->
                    <a href="profile/subirPlantilla/2">
                    <div class="stat"> <i class="icon-book"></i> <span class="value">Reporte 2<br>
                    </a>
                    </span> </div><!-- .stat -->
                    
                    <a href="profile/subirPlantilla/3">
                    <div class="stat"> <i class="icon-book"></i> <span class="value">Reporte 3<br>
                    </a>
                    </span> </div><!-- .stat -->
                    
                    <a href="profile/subirPlantilla/4">
                    <div class="stat"> <i class="icon-book"></i> <span class="value">Lineamientos<br>
                    </a>
                    </span> </div><!-- .stat -->

                    <a href="profile/subirPlantilla/5">
                    <div class="stat"> <i class="icon-book"></i> <span class="value">Archivos<br>
                    </a>

                    </span> </div><!-- .stat --> 
                    <a href="profile/subirPlantilla/6">
                    <div class="stat"> <i class="icon-book"></i> <span class="value">Reporte de Encargado<br>
                    </a>
                    
                    </span> </div><!-- .stat --> 
                  </div><hr>
                </div>
            </div>
        </div>
    </div>
</div>