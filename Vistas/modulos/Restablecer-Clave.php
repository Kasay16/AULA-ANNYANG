<div class="login-box color-rojo contenedor__login-register">

    <div class="login-logo">

        <h1>Clases Online</h1>

    </div>

    <div class="login-box-body">

        <p class="login-box-msg titulo">Restablecer Clave</p>

        <span id="aviso1" class="text-success text-bold">texto</span>
        <span id="aviso" class="text-danger text-bold">texto</span>

        <form id="form-recuperar" method="post">

            <h5>Ingrese su correo registrado donde se le enviara un mensaje para restablecer su clave</h5>
            <br>

            <div class="form-group has-feedback">

                <input type="text" class="form-control" name="usuario"  id="usuario-recuperar"  placeholder="Usuario">
                <span class="glyphicon glyphicon-user form-control-feedback contp"></span>

            </div>

            <div class="form-group has-feedback">

                <input type="email" class="form-control" name="correo"  id="correo-recuperar"  placeholder="Correo">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            </div>


            <div class="row">

                <div class="col-xs-6">

                    <!-- <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="RestablecerClave()" data-toggle="modal" data-target="#RestablecerClave">Enviar</button>
                    <button class="btn btn-primary" onclick="RestablecerClave()"><i class="fa fa-check"><b>&nbsp;Enviar</b></i></button>
                     -->
                     <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                    
                    <?php

                        
                    ?>

                </div>

                <div class="col-xs-6">

                    <a href="Ingresar">
                        <button type="button" class="btn btn-secondary btn-block btn-flat">Iniciar Session</button>
                    </a>

                </div>

            </div>

            <?php

            $restablecer = new UsuariosC();
            $restablecer -> CrearUsuarioC();

            ?>

        </form>

        
    </div>



</div>