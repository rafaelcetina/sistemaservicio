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
                        echo form_open("empresas/addEmpresa_action");

                        ?>
                        <div class="form-group">
                           <div class="control-group">          
                                <label class="control-label" for="nombre">Nombre de la Empresa</label>
                                <div class="controls">
                                    <input type="text" class="span6" name="nombre" id="nombre">
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