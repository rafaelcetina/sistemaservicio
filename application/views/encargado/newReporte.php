<div class="main">
    <div class="main-inner">   
        <div class="container">
            <div class="row">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                      <h3><?=$titulo?> Para Matricula: <?=$matricula ?></h3>
                    </div>
                    <!-- /widget-header -->
                    <div class="widget-content">
                        <?php if(isset($reporteSubido)) { ?>
                            <h3> Ya se subió el reporte </h3><hr>
                            <button class="btn btn-warning">Ver reporte</button>
                            <?php }elseif (isset($noProgramado)) { ?>
                            <h3> No se ha programado reporte </h3>
                            
                            <?php }
                            else { ?>
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
                                    echo form_open_multipart("profile/subirReporteEncargadoAction");
                                    echo form_input_file('Selecciona un Archivo');
                                    ?>
                                    </div> <!-- /plan-price -->
                                </div> <!-- /plan-header -->            
                                
                                <div class="plan-features">
                                
                                </div> <!-- /plan-features -->
                                
                                <div class="plan-actions">
                                    <input type="hidden" id="matricula" name="matricula" value="<?=$matricula?>">
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
                                
                                <div class="plan-features">
                                    <?php
                                    if(isset($reportes) and $reportes!=NULL){
                                    foreach ($reportes as $fila){ ?>
                                    <div class="post-preview">
                                            <h4 class="post-subtitle">
                                                <a href="<?=base_url('public/plantillas/reporte').$fila['num_plantilla'].'/'.$fila['archivo']?>" target="_blank">
                                                <img src="<?=base_url()?>assets/img/word.png" width="100px">
                                                    <?=$fila['archivo'];?>
                                                </a>
                                            </h4>
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
                        <?php } ?>
                    </div> <!-- Widget-->
                </div>
            </div>
        </div>
    </div>
</div>