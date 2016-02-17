

    <!-- Carousel -->

    <div class=carousel>

  <ul class=panes>

    <li>
      <h2><center>Date de alta en el tiempo establecido</center></h2>
      <center><img src="<?=base_url()?>assets/img/servicio4.png" style="width:60%;" alt=""></center>
    </li>

    <li>
      <h2><center>Envia tus archivos antes que se cierre el sistema!</center></h2>
      <center><img src="<?=base_url()?>assets/img/servicio2.png" style="width:60%;" alt=""></center>
    </li>

    <li>
      <h2><center>Se parte de nuestro Instituto ...</center></h2>
      <center><img src="<?=base_url()?>assets/img/servicio-social-960x332.jpg" style="width:60%;" alt=""></center>
    </li>
    <li>
      <h2><center>Fechas de Inscripción: a partir del 5 de marzo del año en curso ...</center></h2>
      <center><img src="<?=base_url()?>assets/img/serviciosocial.jpg" style="width:60%;" alt=""></center>
    </li>

    <li>
      <h2><center>Instituto Tecnológico de Chetumal</center></h2>
      <center><img src="<?=base_url()?>assets/img/servicio3.png" style="width:60%;" alt=""></center>
    </li>
  </ul>

</div>


    <!-- end Carousel -->
<div class="account-container">

  <div class="content clearfix ">

    <h2 class="txt-center">ACCESANDO AL SISTEMA</h2>   
    <hr>
    <button id="btnAlumno" class='btn btn-info' style='width: 49%;'>ALUMNO</button>
    <a href="javascript:;" id="btnEncargado">
      <button class='btn btn-invert' style='width: 49%;'>ENCARGADO</button>
    </a> 
    <hr>
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
    <?php if(isset($_GET['success'])){ ?>
    <div class="control-group">
      <div class="controls">
      <div class="alert-success">
        <button type="button" class="close" data-dismiss="alert-success">&times;</button>
        <strong>Bien!</strong> Datos registrados correctamente.
      </div>
      </div>
    </div>
    <?php  } ?>
    <div id="formEncargado">
      <p>ENCARGADO Ingresa tus datos para accesar al sistema</p>
      <div class="login-fields">
        <form action='<?= base_url()?>login/loginEncargado' method='post' accept-charset='UTF-8' role="form">
          <div class="field">
            <label for="username">Email</label>
            <input type="email" id="email" name="email" placeholder="Correo Electrónico" required class="login username-field" />
          </div> <!-- /field -->

          <div class="field">
            <label for="password">Contraseña: </label>
            <input type="password" id="password" name="password" placeholder="Contraseña" required class="login password-field"/>
          </div> <!-- /password -->

        </div> <!-- /login-fields -->

        <div class="login-actions">

          <input type="submit" class="button btn btn-success btn-large" value="INGRESAR">

        </div> <!-- .actions -->
      </form>
    </div>

    <div id="formAlumno">
      <p>ALUMNO Ingresa tus datos para accesar al sistema</p>
      <div class="login-fields">
        <form action='<?= base_url()?>login/loginAlumno/' method='post' accept-charset='UTF-8' role="form">
          <div class="field">
            <label for="username">Matricula</label>
            <input type="text" id="Matricula" name="matricula" value="" placeholder="Matricula" required class="login username-field" />
          </div> <!-- /field -->

          <div class="field">
            <label for="password">Contraseña: </label>
            <input type="password" id="password" name="password" value="" placeholder="Contraseña" required class="login password-field"/>
          </div> <!-- /password -->

        </div> <!-- /login-fields -->

        <div class="login-actions">

          <input type="submit" class="button btn btn-success btn-large" value="INGRESAR">

        </div> <!-- .actions -->

      </form>
    </div>
    <div class='form-group'>

      <a href="<?=base_url()?>home/registro">
        <button class='btn btn-warning' style='width: 100%;'>REGISTRARME</button>
      </a>
    </div>      
  </div> <!-- /content -->
  
</div> <!-- /account-container -->   


<script>
  $(document).ready(function(){
    $('#formEncargado').hide();
    $('#formAlumno').hide();

    $('#btnAlumno').click(function(){
      $('#formEncargado').hide();
      $('#formAlumno').show();      
    });

    $('#btnEncargado').click(function(){
      $('#formAlumno').hide();      
      $('#formEncargado').show();      
    });
  });
</script>
<BR>
  <BR>
    <BR>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-xs-9">
          <h3><p>Instituto Tecnológico de Chetumal 2016 --  Av. Insurgentes No. 330, C.P. 77013 Col. David Gustavo Gtz. Chetumal, Quintana Roo </p></h3>
        </div>
        <div class="col-xs-6">
        
        </div>
      </div>
    </div>
  </footer>
