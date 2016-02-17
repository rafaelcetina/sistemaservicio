<div class="main">

    <div class="main-inner">   
        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <!-- /widget-header -->
                <div class="widget widget-table action-table">
                    <div class="widget-header">
                        <i class="icon-bar-chart"></i>
                        <h3>Empresas</h3>
                    </div>
                        <!-- /widget-header -->
                    <div class="widget-content">
                        <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> ID </th>
                    <th> NOMBRE </th>
                    <th> FECHA DE ALTA </th>
                    <th> ENCARGADO </th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                <?php
                if($empresas->result()!=NULL){
                foreach ($empresas->result() as $fila){
                    ?>
                    <td> <?=$fila->id?> </td>
                    <td> <?=$fila->nombre?> </td>
                    <td> <?=$fila->fecha_alta?> </td>
                    <td style="text-transform: uppercase">
                        <?php
                            $sql2 = "SELECT * FROM encargados WHERE id_empresa = '$fila->id';";
                            $res = $this->db->query($sql2);
                            foreach ($res->result() as $fila2){
                                echo $fila2->nombre;
                            }
                            
                        
                        ?>
                    </td>
                    <!--<td> <?=$fila->semestre?> </td>-->
                    <td> <a href="edit/<?=$fila->id?>"><button class="btn btn-info"> Editar </button></a> </td>
                    
                  </tr>
                    <?php
                }
                    }else{
                        echo "<h2 class='post-title'>
                                No hay Empresas
                            </h2>";
                    }
                ?>
                </tbody>
              </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>