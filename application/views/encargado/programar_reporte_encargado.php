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
                        <?php
                        echo form_open("profile/programar_reporte_encargado_action");

                        ?>
                        <input type="hidden" id="matricula" name="matricula" value="<?=$matricula?>">
                        <label for="fecha_limite">Selecciona la Fecha límite</label>
                        <input type="date" id="fecha_limite" name="fecha_limite"><hr>
                        <input type="submit" class="btn" value="Enviar">
                        <?php          
                        echo form_close();
                        ?>
                    </div> <!-- Widget-->
                </div>
            </div>
        </div>
    </div>
</div>