   <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 text-center">
                <a href="<?=base_url()?>profile/nuevo"><button class="btn btn-primary">Subir Reporte</button></a>&nbsp;
                <a href="<?=base_url()?>profile/alumnosenempresa"><button class="btn btn-warning">Alumnos en Servicio</button></a>&nbsp;
            <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h3 class="post-title">
                        Alumnos en la Empresa
                    </h3>
            <?php
                if($alumnos!=NULL){
                foreach ($alumnos as $fila){ ?>
                <div class="post-preview">
                        <h4 class="post-subtitle">
                            <a href="<?=base_url('lista/verAlumno').'/'.$fila['matricula']?>">
                                <?=$fila['nombre'];?>
                            </a>
                        </h4>
                    <p class="post-meta"><?=$fila['carrera'];?> || <?=$fila['semestre'];?>° Semestre</p>
                </div>
            <hr>
                <?php
                    }
                }else{
                   ?>
                   <div class="post-preview">
                       No hay alumnos
                   </div> 
                <?php
                }
                ?>
            </div>
                <div class="col-lg-12 text-right">
                <!-- Pager -->
                <!--<?=$pagination?>-->
                    
                </div>
        </div>
        </div>
    <hr>

    