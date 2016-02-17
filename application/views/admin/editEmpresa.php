<div class="main">
    <div class="main-inner">   
        <div class="container">
            <div class="row">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                      <h3><?=$titulo?></h3>
                    </div>
                    <!-- /widget-header -->
                    <div class="widget-content">
                        <?php
                        echo form_open("empresas/editEmpresa_action");

                        ?>
                        <div class="form-group">
                           <div class="control-group">          
                                <div class="controls">
                                <?php

                                    if($empresa->result()!= NULL){
                                    foreach ($empresa->result() as $fila){
                                ?>
                                <label class="control-label" for="nombre">ID de la Empresa</label>
                                    <input type="hidden" value="<?=$fila->id?>" class="span6" name="id" id="id">
                                    <input type="text" value="<?=$fila->id?>" class="span6" name="id" id="id" disabled=""><br>
                                <label class="control-label" for="nombre">Nombre de la Empresa</label>
                                    <input type="text" value="<?=$fila->nombre?>" class="span6" name="nombre" id="nombre">

                                    <?php } } ?>
                                    <p class="help-block"><pre>Este formulario </pre>.</p>
                                </div> <!-- /controls -->               
                            </div> 
                            <input type="submit" class="btn" value="Enviar">
                        </div>
                        <?php          
                        echo form_close();
                        ?>
                    </div> <!-- Widget-->
                </div>
            </div>
        </div>
    </div>
</div>