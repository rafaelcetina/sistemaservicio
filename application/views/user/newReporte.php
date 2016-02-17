   <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php
                    //send info to method test of controller welcome
                    echo form_open_multipart("profile/insertar");
                    $atributos = array('style'  => 'text-align: left;');
                    echo form_input_file('Selecciona un Archivo');
                    echo form_input_textarea('descripcion','ingresa una descripcion');
                    echo form_submit("Enviar formulario");
                    echo form_close();

                    // send file to method uploadTest of controller welcome
                    /*
                    echo form_open_multipart("welcome/uploadTest");
                    echo form_submit("Enviar formulario");
                    echo form_close();
                    */
                ?>
            </div>
            <hr>
        </div>
    </div>
    <hr>