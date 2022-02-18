<div class="rojo">
<div class="login-box color-rojo contenedor__login-register">

    <div class="login-logo">

        <h1>Clases Online</h1>

    </div>
    <title>Aula Virtual- Pagina de registro</title>
    <div class="login-box-body">

        <p class="login-box-text8">A continuación encontrara los campos a completar para la respectiva la creación de su cuenta.</p>

        <form method="post">

            <div class="form-group has-feedback">
                <p class="contp">Grado:</p>
                <select class="form-control" name="id_grado" required="">
                    
                    <option value="">Seleccionar su grado</option>

                    <?php 
                    
                    $resultado = GradosC::VerGradosC();

                    foreach ($resultado as $key => $value) {
                        
                        echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                    }

                    echo'<input type="hidden" class="form-control" name="link" value="Ingresar">';
                    
                    ?>
                
                </select>
            
            </div>

            <div class="form-group has-feedback">
                <p class="contp">Nombre:</p> 
                <input type="text" class="form-control" name="nombre" id="cnombre" placeholder="Su Nombre">

            </div>

            <div class="form-group has-feedback">
            <p class="contp">Apellido:</p> 
                <input type="text" class="form-control" name="apellido" id="capellido" placeholder="Su Apellido">

            </div>

            <div class="form-group has-feedback">
            <p class="contp">Correo:</p> 
                <input type="email" class="form-control" name="correo" id="ccorreo" placeholder="Su Correo">

            </div>

            <div class="form-group has-feedback">
            <p class="contp">Documento:</p> 
                <input type="text" class="form-control" name="documento" id="cdocumento" placeholder="Su Documento">

            </div>

            <div class="form-group has-feedback">
            <p class="contp">Usuario:</p> 
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">

            </div>

            <div class="form-group has-feedback">
            <p class="contp">Clave:</p> 
                <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña">
                <input type="hidden" class="form-control" name="rol" value="Estudiante">

            </div>

            <div class="row">

                <div class="col-xs-6">

                    <button type="submit" id="fin"class="btn btn-danger  btn-block btn-flat btncrc">Finalizar</button>

                </div>

                <div class="col-xs-6">

                    <a href="Ingresar">
                        <button type="button" class="btn btn-info  btn-block btn-flat btnic">Iniciar sesión</button>
                    </a>

                </div>

            </div>

            <?php

            $crear = new UsuariosC();
            $crear -> CrearUsuarioC();

            ?>

        </form>

        
    </div>



</div>

</div>