<div class="rojo">
<div class="login-box btn-primary color-rojo contenedor__login-register ">
    <title>Aula Virtual- Pagina de ingreso</title>
    <div class="login-logo">

        <h1>Clases en linea</h1>

    </div>

    <div class="login-box-body">

        <div class="thumbnail">
        <img class="imgen-login" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/user2.png" alt="imagen presentacion de ingreso de usuario">
        </div>
        
        <p class="login-box-text8">Bienvenido usuario. A continuación encontrara los campos correspondientes para el ingreso al aula, si no tiene una cuenta, puede registrarse. </p>

        


        <form method="post">

            <div class="form-group has-feedback">
                <p class="titulo">Nombre de usuario:</p>

                <span class="form-control-feedback"><img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/user.ico" alt="icono del usuario."></span>
                <input type="text" class="form-control" name="usuario" id="campousu" placeholder="Campo de ingreso Usuario">

            </div>

            <!-- <audio>
                <source src="http://localhost/AULA-ANNYANG/Vistas/img/Iconos/vida.mp3" type="audio/mpeg"> 
            </audio>'
            <audio src="http://localhost/AULA-ANNYANG/Vistas/img/Iconos/vida.mp3"></audio> -->

            <div class="form-group has-feedback">
                <p class="titulo">Contraseña:</p>

                <span class="form-control-feedback"><img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/password.ico" alt="icono de la contraseña"></span>
                <input type="password" class="form-control" name="clave" id="campocontra" placeholder="Campo de ingreso Contraseña">

            </div>

            <div class="row">

                <div class="col-xs-6">

                    <button type="submit" class="btn btn-danger btn-block btn-flat contp" id="ingresar">Ingresar</button>

                </div>

                <div class="col-xs-6">

                    <a href="Crear-Cuenta">
                        <button type="button"  id="crcuenta" class="btn btn-info btn-block btn-flat contp">Crear cuenta</button>
                    </a>

                </div>

                <!-- <div class="text-center  p-t-8 p-b-31">

                    <a href="Restablecer-Clave">
<<<<<<< Updated upstream
                        <button type="button" class="btn btn-primary btn-block btn-flat contp">olvidaste tu contraseña</button>
=======
                        olvidaste tu contraseña
>>>>>>> Stashed changes
                    </a>

                </div> -->



            </div>

            <?php

            $ingresar = new UsuariosC();
            $ingresar->IniciarSesionC();

            ?>

        </form>


    </div>



</div>

</div>