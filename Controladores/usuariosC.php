<?php


class UsuariosC{

    public function IniciarSesionC()
    {

        if (isset($_POST["usuario"])) {

            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave"])) {

                $tablaBD = "usuarios";

                $datosC = array("usuario" => $_POST["usuario"], "clave" => $_POST["clave"]);

                $resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);

                if ($resultado["usuario"] == $_POST["usuario"] && $resultado["clave"] == $_POST["clave"]) {

                    $_SESSION["Ingresar"] = true;

                    $_SESSION["id"] = $resultado["id"];
                    $_SESSION["nombre"] = $resultado["nombre"];
                    $_SESSION["apellido"] = $resultado["apellido"];
                    $_SESSION["documento"] = $resultado["documento"];
                    $_SESSION["id_grado"] = $resultado["id_grado"];
                    $_SESSION["foto"] = $resultado["foto"];
                    $_SESSION["rol"] = $resultado["rol"];

                    echo '<script>

                        window.location = "Inicio";
                    </script>';
                } else {

                    echo '<br><div class=" alert alert-danger">Usuario o contraseña incorrectos.</div>';
                }
            }
        }
    }

    public function VerPerfilC()
    {

        $tablaBD = "usuarios";

        $id = $_SESSION["id"];

        $resultado = UsuariosM::VerPerfilM($tablaBD, $id);

        echo '<div class="col-md-6 col-xs-12">

                <h2>Nombre:</h2>
                <input type="text" class="input-lg" name="nombre" value="'.$resultado["nombre"].'">

                <h2>Apellido:</h2>
                <input type="text" class="input-lg" name="apellido" value="'.$resultado["apellido"].'">

                <h2>Correo:</h2>
                <input type="text" class="input-lg" name="correo" value="'.$resultado["correo"].'">
    
                <h2>Documento:</h2>
                <input type="text" class="input-lg" name="documento" value="'. $resultado["documento"].'">

            </div>

            <div class="col-md-6 col-xs-12">
               
                <h2>Contraseña:</h2>
                <input type="password" class="input-lg" name="clave" value="'. $resultado["clave"].'">

                <h2>Foto de Perfil:</h2>
                <br>
                
                <input type="file" class="input-lg" name="fotoPerfil">
                <br>';

                if ($resultado["foto"] == ""){

                    echo '<img src="http://localhost/AULA-ANNYANG/Vistas/img/defecto.png" alt="imagen de perfil de usuario" width="150px" height="150px">';

                } else {

                    echo '<img src="http://localhost/AULA-ANNYANG/'.$resultado["foto"].'" alt="imagen de perfil de usuario" width="150px" height="150px">';
                }

                echo '
                <input type="hidden" class="input-lg" name="fotoActual" value="'.$resultado["foto"].'">

            </div>';
    }


    public function EditarPerfilC(){

        if(isset($_POST["nombre"])) {

            $id = $_SESSION["id"];

            $rutaImg = $_POST["fotoActual"];

            if(isset($_FILES["fotoPerfil"]["tmp_name"]) && !empty($_FILES["fotoPerfil"]["tmp_name"])) {

                if (!empty($_POST["fotoActual"])) {

                    unlink($_POST["fotoActual"]);
                }

                if ($_FILES["fotoPerfil"]["type"] == "image/jpeg"){

                    $nombre = mt_rand(10,999);

                    $rutaImg = "Vistas/img/Usuarios/U-".$nombre.".jpg";

                    $foto = imagecreatefromjpeg($_FILES["fotoPerfil"]["tmp_name"]);

                    imagejpeg($foto, $rutaImg);
                }

                if ($_FILES["fotoPerfil"]["type"] == "image/png"){

                    $nombre = mt_rand(10,999);

                    $rutaImg = "Vistas/img/Usuarios/U-".$nombre.".png";

                    $foto = imagecreatefrompng($_FILES["fotoPerfil"]["tmp_name"]);

                    imagepng($foto, $rutaImg);

                }

            }

            $tablaBD = "usuarios";

            $datosC = array("id"=>$id, "clave"=>$_POST["clave"], "nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"], "correo"=>$_POST["correo"], "documento"=>$_POST["documento"], "foto"=>$rutaImg);

            $resultado = UsuariosM::EditarPerfilM($tablaBD, $datosC);

            if ($resultado == true) {

                echo '<script>

                    swal({

                        type: "success",
                        title: "Sus Datos se han Actualizado Correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar" 

                        }).then(function(resultado){

                            if(resultado.value){

                                window.location = "http://localhost/AULA-ANNYANG/Mis-Datos";

                            }

                        })
                
                    
                </script>';

            }

        }

    }


    public function CrearUsuarioC(){

        if(isset($_POST["rol"])){

            $tablaBD = "usuarios";

            $link = $_POST["link"];

            $datosC = array("nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"], "correo"=>$_POST["correo"], "documento"=>$_POST["documento"], "usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"], "id_grado"=>$_POST["id_grado"], "rol"=>$_POST["rol"]);

            $resultado = UsuariosM::CrearUsuarioM($tablaBD, $datosC);

            if ($resultado == true) {

                echo '<script>

                    swal({

                        type: "success",
                        title: "El usuario se ha creado Correctamente",
                        
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar" 

                        }).then(function(resultado){

                            if(resultado.value){

                                window.location = "http://localhost/AULA-ANNYANG/'.$link.'";

                            }

                        })
                
                    
                </script>';

            }

        }



    }


    static public function VerUsuariosC($columna, $valor){

        $tablaBD = "usuarios";

        $resultado = UsuariosM::VerUsuariosM($tablaBD, $columna, $valor);

        return $resultado;

    }



    public function ActualizarUsuarioC(){

        if(isset($_POST["idE"])){

            $tablaBD = "usuarios";

            $datosC = array("id"=>$_POST["idE"], "nombre"=>$_POST["nombreE"], "apellido"=>$_POST["apellidoE"], "correo"=>$_POST["correoE"], "documento"=>$_POST["documentoE"], "clave"=>$_POST["claveE"], "rol"=>$_POST["rolE"]);

            $resultado = UsuariosM::ActualizarUsuarioM($tablaBD, $datosC);

            if ($resultado == true) {

                echo '<script>

                    swal({

                        type: "success",
                        title: "El usuario se ha Actualizado Correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar" 

                        }).then(function(resultado){

                            if(resultado.value){

                                window.location = "http://localhost/AULA-ANNYANG/Usuarios";

                            }

                        })
                
                    
                </script>';

            }

        }

    }

    
    public function BorrarUsuario(){

        if (isset($_GET["Uid"])) {
            
            $tablaBD = "usuarios";

            $id = $_GET["Uid"];

            if($_GET["Ufoto"] != ""){

                unlink($_GET["Ufoto"]);
            }

            $resultado = UsuariosM::BorrarUsuarioM($tablaBD, $id);

            if($resultado == true){

                echo '<script>
                
                    window.location = "Usuarios";
                </script>';
                
            }

        }


    }

    public function verificarC(){

        $resultado = new usuariosM();
        
        if ($_POST['funcion']=='verificar') {
            $correo = $_POST['correo'];
            $usuario = $_POST['usuario'];
            $resultado->verificar($usuario, $correo);
            
        }



    }

}


