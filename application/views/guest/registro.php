<div class="account-container register">
  
  <div class="content clearfix">
      <h2>Registro de Usuarios</h2>      
      <?php if(isset($_GET['error'])){ ?>
    <div class="control-group">
        <div class="controls">
        <div class="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error!</strong> Datos de acceso incorrectos.
        </div>
        </div>
      </div>
      <?php  } ?>
      <div class="login-fields">
        
        <p>Rellena el siguiente formulario:</p>
        
        <form action='<?=base_url()?>home/nuevoRegistro' method='post' accept-charset='UTF-8' role="form">
          <div class="field">
            <select class="form-control-select" id="rol" name="rol" required>
              <option value="1">ALUMNO</option>
              <option value="2">ENCARGADO DE EMPRESA</option>
            </select>
          </div> <!-- /field -->
          <div class='field form-group-md'>
            <input class='form-control' style='text-align: center;' type='text' name='matricula' id="matricula" placeholder='MATRICULA'/>
          </div>
          <div class='field form-group-md' id="id_empresa">
            <select class="form-control-select" name="id_empresa" required>
                  <option value="">SELECCIONA UNA EMPRESA</option>
              <?php

                foreach ($empresas as $row2) {
                  echo '<option value="'.$row2['id'].'">'
                  .$row2['nombre'].'</option>';
                }
              ?>
                </select>
          </div>
          <div class='field form-group-md'>
            <input class='form-control' style='text-align: center;' type='text' name='nombre' placeholder='NOMBRE COMPLETO' required/>
          </div>
          <div class='field form-group-md' id="carrera">
            <select class="form-control-select" name="carrera">
                  <option value="">SELECCIONA UNA CARRERA</option>
              <?php

                foreach ($carreras as $row3) {
                  echo '<option value="'.$row3['nombre'].'">'
                  .$row3['nombre'].'</option>';
                }
              ?>
            </select>
          </div>
          <div class='field form-group-md' id="semestre">
            <select class="form-control-select" name="semestre">
                  <option value="">SELECCIONA UN SEMESTRE</option>
              <?php
                for($cont=6; $cont < 11; $cont++) {
                  echo '<option value="'.$cont.'">'
                  .$cont.'° SEMESTRE</option>';
                }
              ?>
            </select>
          </div>
          <div class='field form-group-md'>
            <label>* CORREO ELECTRÓNICO: </label>
            <input class='form-control-md' style='text-align: center;' type='email' name='email' placeholder='CORREO ELECTRÓNICO' required/>
          </div>
          <div class='field form-group-md'>
            <label>* LA CONTRASEÑA SERÁ ENVIADA AL CORREO ELECTRÓNICO </label>
            <?php $random_number = mt_rand(1000, 9999); ?>
            
            <input class='form-control-md' style='text-align: center;' type='hidden' name='password' placeholder='Contraseña' value="<?=$random_number?>"/>
          </div>
          <div class='form-group'>
            <hr>
          </div>
  </div> <!-- /content -->
          <input type="submit" class="btn btn-primary btn-large" value="REGISTRAR">
      
    </form>
    
  
</div> <!-- /account-container -->

  
    <script language="javascript">
    $(document).ready(function(){
                  //$('#id_empresa').hide();
       $("#rol").change(function () {
               $("#rol option:selected").each(function () {
                elegido=$(this).val();
                if(elegido==2){
                  //$.post("registroEncargado.php", { elegido: elegido }, function(data){
                  $( "#matricula" ).hide();
                  $( "#carrera" ).hide();
                  $( "#semestre" ).hide();
                  $("#id_empresa").show();
                  }else{
                  $( "#matricula" ).show();
                  $( "#carrera" ).show();
                  $( "#semestre" ).show();
                  }
                });            
            });
       })
    </script>