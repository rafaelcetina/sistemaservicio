
<div class="main">
    <div class="main-inner">   
        <div class="container">
            <div class="row">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                      <h3><?=$titulo?> <?=$numReporte ?></h3>
                    </div>
                    <!-- /widget-header -->
                    <div class="widget-content">
                        <div class="pricing-plans plans-2">
                            
                        <div class="plan-container">
                            <div class="plan">
                                <div class="plan-header">
                                    
                                    <div class="plan-title">
                                        Plantillas de Reporte                 
                                    </div> <!-- /plan-title -->
                                    
                                    <div class="plan-price">
                                        Seleccione un archivo
                                    <?php
                                    //send info to method test of controller welcome
                                    echo form_open_multipart("profile/subirPlantillaAction");
                                    echo form_input_file('Selecciona un Archivo');
                                    ?>
                                    </div> <!-- /plan-price -->
                                </div> <!-- /plan-header -->            
                                
                                <div class="plan-features">
                                
                                </div> <!-- /plan-features -->
                                
                                <div class="plan-actions">
                                    <input type="hidden" id="num_plantilla" name="num_plantilla" value="<?=$numReporte?>">
                                    <input type="submit" class="btn" value="Enviar">
                                    <?php          
                                    //echo form_submit("Enviar formulario");
                                    echo form_close();
                                    ?>
                                </div> <!-- /plan-actions -->
                    
                            </div> <!-- /plan -->
                        </div> <!-- /plan-container -->
                        <div class="plan-container">
                            <div class="plan">
                                <div class="plan-header">
                                    
                                    <div class="plan-title">
                                        Plantillas de Reporte                 
                                    </div> <!-- /plan-title -->
                                    
                                    <div class="plan-price">
                                        Visualizar plantilla
                                    </div> <!-- /plan-price -->
                                </div> <!-- /plan-header -->            
                                
                                <div class="plan-featurex">
                                    <?php
                                    if($reportes!=NULL){
                                    foreach ($reportes as $fila){ ?>
                                        <div id="number<?=$fila['id']?>">
                                                <a href="<?=base_url('public/plantillas/reporte').$fila['num_plantilla'].'/'.$fila['archivo']?>" target="_blank">
                                                <img src="<?=base_url()?>assets/img/word.png" width="100px">
                                                    <?=$fila['archivo'];?>
                                                </a>
                                                <a href="javascript:;" data-num="<?=$fila['num_plantilla']?>" data-id="<?=$fila['archivo']?>" class="delete btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
                                                
                                        <p class="post-meta">Fecha: <?=$fila['fecha'];?></p>

                                        </div>
                                    
                                <hr>
                                    <?php
                                        }
                                    }else{
                                       ?>
                                       <div class="post-preview">
                                           No hay reportes
                                       </div> 
                                    <?php
                                    }
                                    ?>
                                
                                </div> <!-- /plan-features -->
                    
                            </div> <!-- /plan -->
                        </div> <!-- /plan-container -->

                    </div> <!-- /pricing-plans -->
                        
                    </div> <!-- Widget-->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
        $(document).ready(function(){
            $(".delete").on("click", function(e) {

                var file= $(this).data('id');
                var num = $(this).data('num');
                var request;
                if(request){
                    request.abort();
                }

                swal({   title: "¿Estás seguro?",   text: "Estás apunto de eliminar la plantilla: "+file,   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, eliminar plantilla",   closeOnConfirm: false }, 
                function(){
     
                request = $.ajax({
                    url: "<?=base_url('profile/borrarPlantilla')?>",
                    type: "POST",
                    data: "file="+file+"&num="+num
                });

                request.done(function (response, textStatus, jqXHR) {
                    console.log("Se eliminó la plantilla: "+response);
                    $('#number'+response).remove();
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