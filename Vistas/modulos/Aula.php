<?php

$exp = explode("/", $_GET["url"]);

$columna = "id";
$valor = $exp[1];

$aula = AulasC::VerAulas2C($columna, $valor);

if ($_SESSION["rol"] == "Estudiante") {
    
    $columna = "id_aula";
    $valor = $exp[1];
    $columna2 = "id_alumno";
    $valor2 = $_SESSION["id"];

    $inscripto = AlumnosC::VerInscriptoC($columna, $valor, $columna2, $valor2);

    if ($inscripto == false) {
        
        echo '<script>
        
            window.location = "http://localhost/AULA-ANNYANG/Aulas-Virtuales";
        </script>';

    }

}else if($_SESSION["rol"] == "Profesor" && $_SESSION["id"] != $aula["id_profesor"]){

    echo '<script>
        
            window.location = "http://localhost/AULA-ANNYANG/Mis-Aulas";
        </script>';

}

?>

<title> 
    <?php
        echo 'Aula Virtual de '.$aula["materia"].'';
    ?>
</title>

<div class="content-wrapper" id="header-inicio">

    <section class="content-header titulo4">

        <?php

        echo '<h1>Aula Virtual de la Materia: <b>'.$aula["materia"].'</b></h1>';

        ?>

    </section>

    <section class="content" id="">

        <?php 
        

        if ($_SESSION["rol"] == "Profesor") {
            
            echo '<form method="post">

                    <input type="hidden" name="id_aula" value="'.$exp[1].'">

                    <button type="submit" class="btn btn-primary">Agregar Nueva Sección</button>';

                $crearS = new SeccionesC();
                $crearS -> CrearSeccionC();

                echo '</form>';

        }else {

            $columna = "id";
            $valor = $aula["id_profesor"];

            $profesor = UsuariosC:: VerUsuariosC($columna, $valor);
            
            echo '<h2>Profesor: '.$profesor["apellido"].' '.$profesor["nombre"].'</h2>
                    
                    <a href="http://localhost/AULA-ANNYANG/Enviar-Mensaje/'.$profesor["id"].'" id"enviarmsg"><h3>Enviar mensaje al docente</h3></a>

                 ';

        }

        if ($_SESSION["rol"] == "Profesor") {
            
            echo '<a href="http://localhost/AULA-ANNYANG/Inscriptos/'.$exp[1].'">
            
                    <button class="btn btn-success pull-right">Ver Alumnos Inscritos</button>

                </a>';

        }else if ($_SESSION["rol"] == "Estudiante") {
            
            echo '<form method="post">
        
                <input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
                <input type="hidden" name="id_aula" value="'.$exp["1"].'">

                <button type="submit" class="btn btn-danger">Dar de Baja</button>
    
            </form>';

            $darbaja = new AlumnosC();
            $darbaja -> DarBajaC();

        }

        
        ?>

        <br><br>

        <?php

            $columna = null;
            $valor = null;

            $resultado = SeccionesC::VerSeccionesC($columna, $valor);

            foreach ($resultado as $key => $value) {
                
                if ($value["id_aula"] == $exp[1]) {
                    
                    echo '<div class="box">
        
                            <div class="box-header">';

                        if ($_SESSION["rol"] == "Profesor") {
                            
                            echo '<form method="post">
                
                                    <h3 class="box-title contp"><input type="text" name="nombre" class="form-control" value="'.$value["nombre"].'"></h3>

                                    <input type="hidden" name="id_seccion" value="'.$value["id"].'">

                                    <button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i></button>';

                                $nombre =new SeccionesC();
                                $nombre -> EditarNombreSC();
                                
                                echo '</form>';

                        }else {
                            
                            echo '<h1 class="titulo5 contp id="'.$value["nombre"].'">'.$value["nombre"].'</h1>';
                            //alcacer
                            // echo'<a href="#'.$value["nombre"].'">navegacion a '.$value["nombre"].'</a>';
                            //paco
                            

                        }
                        
                
                    //     <button type="button" class="btn" data-widget="collapse">
                    //     <i class="fa fa-minus"></i>
                    // </button>';
                            
                                
                
                                echo '<div class="box-tools pull-right">';
                                    
                                    
                                        
                                    
                            if ($_SESSION["rol"] == "Profesor") {

                                echo '<button class="btn btn-danger BorrarSeccion" Sid="'.$value["id"].'" data-toggle="modal" data-target="#BorrarSeccion">
                                        <i class="fa fa-times"></i>
                                    </button>';
                                
                            }
                                    
                                
                                echo '</div>
                            
                            </div>
                
                            <div class="box-body justify">';

                            if ($_SESSION["rol"] == "Profesor") {

                                if ($value["descripcion"] == "") {
                                    
                                    echo '<a href="http://localhost/AULA-ANNYANG/D-S/'.$value["id"].'">
                                
                                            <button class="btn btn-success">Agregar descripción</button>
                                        
                                        </a>';

                                }else {
                                    
                                    echo ''.$value["descripcion"].'
                                    
                                    <a href="http://localhost/AULA-ANNYANG/D-S/'.$value["id"].'">
                                
                                        <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                        
                                    </a>
                                    
                                    ';

                                }
                                
                            }else {
                                
                                echo $value["descripcion"];

                                
                                

                            }




                            if ($_SESSION["rol"] == "Profesor") {


                                echo '<br>
                                    <h3><b>Imagenes:</b></h3>';

                                    echo '<hr>
                                    <button class="btn btn-danger AgregarImagen" Sidi="'.$value["id"].'"  data-toggle="modal" data-target="#AgregarImagen">Agregar Imagen</button>';

                                $columna = "id_seccion";
                                $valor = $value["id"];
                                
                                $imagenes = SeccionesC::VerImagenesC($columna, $valor);

                                

                                foreach ($imagenes as $key => $imgn) {
                                    
                                    if ($imgn["imagen"] != null) {
                                        
                                        echo '<form method="post">
                                    
                                            '.$imgn["nombre"].' - <a href="http://localhost/AULA-ANNYANG/'.$imgn["imagen"].'" download="'.$imgn["nombre"].'">Descargar Imagen</a>

                                            <input type="hidden" name="id" value="'.$imgn["id"].'">
                                            <input type="hidden" name="id_i" value="'.$exp[1].'">
                                            <input type="hidden" name="imagen" value="'.$imgn["imagen"].'">
                                            <input type="hidden" name="sinopsis" value="'.$imgn["sinopsis"].'">
                                            


                                            <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar Tarea"><i class="fa fa-times"></i></button>
                                            <br><br>

                                            <img alt="'.$imgn["sinopsis"].'" src="http://localhost/AULA-ANNYANG/'.$imgn["imagen"].'">



                                    
                                        </form>
                                        <br>';

                                        $borrarImagen = new SeccionesC();
                                        $borrarImagen -> borrarImagenC();

                                    }
                                    

                                }


                            }else {



                                $columna = "id_seccion";
                                $valor = $value["id"];
                                
                                $imagenes = SeccionesC::VerImagenesC($columna, $valor);

                                // <h2>'.$imgn["nombre"].'</h2>

                                foreach ($imagenes as $key => $imgn) {
                                    
                                    if ($imgn["imagen"] != null) {
                                        
                                        echo '<form method="post">
                                    
                                            

                                            <input type="hidden" name="id" value="'.$imgn["id"].'">
                                            <input type="hidden" name="id_i" value="'.$exp[1].'">
                                            <input type="hidden" name="imagen" value="'.$imgn["imagen"].'">
                                            <input type="hidden" name="sinopsis" value="'.$imgn["sinopsis"].'">
                                            


                                            <br><br>

                                            <img alt="'.$imgn["sinopsis"].'" src="http://localhost/AULA-ANNYANG/'.$imgn["imagen"].'">



                                    
                                        </form>
                                        <br>';

                                        $borrarImagen = new SeccionesC();
                                        $borrarImagen -> borrarImagenC();

                                    }
                                    

                                }


                            }

                            if ($_SESSION["rol"] == "Profesor") {

                               
                                echo '<br>
                                    <h3><b>Videos:</b></h3>';

                                    echo '<hr>
                                    <button class="btn btn-info AgregarVideo" Sidv="'.$value["id"].'"  data-toggle="modal" data-target="#AgregarVideo">Agregar Video</button>

                                    <button type="submit" class="btn btn-info VideoY" Sidy="'.$value["id"].'"  data-toggle="modal" data-target="#VideoY">Agregar Video Youtube</button>';

                                $columna = "id_seccion";
                                $valor = $value["id"];
                                
                                $videos = SeccionesC::VerVideosC($columna, $valor);

                                

                                foreach ($videos as $key => $vid) {
                                    
                                    if ($vid["videoy"] != null) {
                                        
                                        echo '<form method="post">
                                    
                                            '.$vid["nombre"].' 

                                            <input type="hidden" name="id" value="'.$vid["id"].'">
                                            <input type="hidden" name="id_v" value="'.$exp[1].'">
                                            <input type="hidden" name="video" value="'.$vid["video"].'">
                                            <input type="hidden" name="videoy" value="'.$vid["videoy"].'">


                                            <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar Tarea"><i class="fa fa-times"></i></button>
                                            <br><br>



                                            

                                            <iframe width="560" height="315" src="'.$vid["videoy"].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                    
                                        </form>
                                        <br>';

                                        $borrarVid = new SeccionesC();
                                        $borrarVid -> borrarVideoC();

                                    }elseif ($vid["video"] != null) {
                                        
                                        echo '<form method="post">
                                    
                                            '.$vid["nombre"].' - <a href="'.$vid["video"].'" download="'.$vid["nombre"].'">Descargar Video</a>

                                            <input type="hidden" name="id" value="'.$vid["id"].'">
                                            <input type="hidden" name="id_v" value="'.$exp[1].'">
                                            <input type="hidden" name="video" value="'.$vid["video"].'">
                                            <input type="hidden" name="videoy" value="'.$vid["videoy"].'">

                                            <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar Tarea"><i class="fa fa-times"></i></button>
                                            <br><br>

                                            
                                            <iframe width="560" height="315" src="http://localhost/AULA-ANNYANG/'.$vid["video"].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                                    
                                        </form>
                                        <br>';

                                        $borrarVid = new SeccionesC();
                                        $borrarVid -> borrarVideoC();
                                        
                                    }else{
                                        
                                        

                                    }
                                    
                                    //subir videos:
                                    //<video src="http://localhost/AULA-ANNYANG/'.$vid["url"].'" controls="controls" width="450" heigth="450"></video>
                                    //echo '<iframe width="560" height="315" src="'.$vid["url"].' frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
                                        // $borrarArch = new SeccionesC();
                                        // $borrarArch -> borrarArchivoC();

                                }


                            }else {

                                

                                $columna = "id_seccion";
                                $valor = $value["id"];
                                
                                $videos = SeccionesC::VerVideosC($columna, $valor);

                                

                                foreach ($videos as $key => $vid) {
                                    
                                    if ($vid["videoy"] != null) {
                                        
                                        echo '<form method="post">
                                    
                                            <h2>'.$vid["nombre"].'</h2> 

                                            <input type="hidden" name="id" value="'.$vid["id"].'">
                                            <input type="hidden" name="id_v" value="'.$exp[1].'">
                                            <input type="hidden" name="video" value="'.$vid["video"].'">
                                            <input type="hidden" name="videoy" value="'.$vid["videoy"].'">

                                            <br><br>



                                            

                                            <iframe width="560" height="315" src="'.$vid["videoy"].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                    
                                        </form>
                                        <br>';

                                        $borrarVid = new SeccionesC();
                                        $borrarVid -> borrarVideoC();

                                    }elseif ($vid["video"] != null) {
                                        
                                        echo '<form method="post">
                                    
                                            '.$vid["nombre"].'

                                            <input type="hidden" name="id" value="'.$vid["id"].'">
                                            <input type="hidden" name="id_v" value="'.$exp[1].'">
                                            <input type="hidden" name="video" value="'.$vid["video"].'">
                                            <input type="hidden" name="videoy" value="'.$vid["videoy"].'">

                                            <br><br>

                                            
                                            <iframe width="560" height="315" src="http://localhost/AULA-ANNYANG/'.$vid["video"].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                                    
                                        </form>
                                        <br>';

                                        $borrarVid = new SeccionesC();
                                        $borrarVid -> borrarVideoC();
                                        
                                    }else{
                                        
                                        

                                    }
                                    
                                    //subir videos:
                                    //<video src="http://localhost/AULA-ANNYANG/'.$vid["url"].'" controls="controls" width="450" heigth="450"></video>
                                    //echo '<iframe width="560" height="315" src="'.$vid["url"].' frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
                                        // $borrarArch = new SeccionesC();
                                        // $borrarArch -> borrarArchivoC();

                                }

                            }
                            


                            if ($_SESSION["rol"] == "Profesor") {
                                

                                echo '<br>
                                    <h3><b>Archivos:</b></h3>';

                                    echo '<hr>
                                    <button class="btn btn-primary AgregarArchivo" Sid="'.$value["id"].'"  data-toggle="modal" data-target="#AgregarArchivo">Agregar Archivo</button>';

                                $columna = "id_seccion";
                                $valor = $value["id"];

                                $archivos = SeccionesC::VerArchivosC($columna, $valor);

                                foreach ($archivos as $key => $arch) {

                                    if ($arch["archivo"] != null) {
                                        
                                        echo '<form method="post">
                                    
                                            '.$arch["nombre"].' - <a href="http://localhost/AULA-ANNYANG/'.$arch["archivo"].'" download="'.$arch["nombre"].'">Descargar Archivo</a>

                                            <input type="hidden" name="id" value="'.$arch["id"].'">
                                            <input type="hidden" name="id_a" value="'.$exp[1].'">
                                            <input type="hidden" name="archivo" value="'.$arch["archivo"].'">
                                            <input type="hidden" name="video" value="'.$arch["video"].'">
                                            <input type="hidden" name="videoy" value="'.$arch["videoy"].'">

                                            <button class="btn btn-danger btn-xs" type="submit" data-toggle="tooltip" title="Eliminar Archivo"><i class="fa fa-trash"></i></button>
                                            
                                    
                                        </form>
                                        <br>';

                                        $borrarArch = new SeccionesC();
                                        $borrarArch -> borrarArchivoC();

                                        
                                    }
                                    
                                    
                                }

                                

                                

                                echo '<hr>
                                        <h3><b>Tareas:</b></h3>

                                        <form method="post">

                                            <input type="hidden" name="idSeccion" value="'.$value["id"].'">

                                            <button class="btn btn-warning" type="submit">Agregar tarea</button>

                                        </form> 
                                        <br>';
                                       

                                $columna = "id_seccion";
                                $valor = $value["id"];

                                

                                $Tareas = TareasC::VerTareasC($columna, $valor);

                                foreach ($Tareas as $key => $tarea) {
                                    
                                    echo '<form method="post">
                                    
                                        <a href="http://localhost/AULA-ANNYANG/Tarea/'.$tarea["id"].'">
                                    
                                            <button type="button" class="btn btn-warning">'.$tarea["nombre"].'<i class="fa fa-eye"></i></button> - '; 

                                        if ($tarea["fecha_limite"] == "") {
                                            
                                            echo 'Sin Fecha Limite aun';

                                        }else {
                                            
                                            echo $tarea["fecha_limite"];

                                        }
                                    
                                        echo '</a>
                                        
                                        
                                        
                                            <input type="hidden" name="idT" value="'.$tarea["id"].'">
                                            <input type="hidden" name="idAula" value="'.$exp["1"].'">

                                            <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar Tarea"><i class="fa fa-times"></i></button>';
                                        
                                        $borrarTarea = new SeccionesC();
                                        $borrarTarea -> BorrarTareaC();

                                        echo '</form>
                                        
                                        <br><br>';

                                }

                                

                            }else {
                                
                                echo '<br>
                                    <h2><b>Archivos:</b></h2>';

                                $columna = "id_seccion";
                                $valor = $value["id"];

                                $archivos = SeccionesC::VerArchivosC($columna, $valor);

                                foreach ($archivos as $key => $arch) {

                                    if ($arch["archivo"] != null) {
                                        
                                        echo '<form method="post">
                                    
                                            '.$arch["nombre"].' - <a href="http://localhost/AULA-ANNYANG/'.$arch["archivo"].'" download="'.$arch["nombre"]. '">Descargar Archivo</a>

                                            <input type="hidden" name="id" value="'.$arch["id"].'">
                                            <input type="hidden" name="id_a" value="'.$exp[1].'">
                                            <input type="hidden" name="archivo" value="'.$arch["archivo"].'"> 
                                            <input type="hidden" name="video" value="'.$arch["video"].'">
                                            <input type="hidden" name="videoy" value="'.$arch["videoy"].'">

                                            
                                    
                                        </form>
                                        <br>';



                                        
                                    }
                                    
                                    
                                }



                                echo '<hr>
                                        <h2><b>Tareas:</b></h2>

                                        <form method="post">

                                            <input type="hidden" name="idSeccion" value="'.$value["id"].'">

                                        </form> 
                                        <br>';
                                       

                                $columna = "id_seccion";
                                $valor = $value["id"];

                                

                                $Tareas = TareasC::VerTareasC($columna, $valor);

                                foreach ($Tareas as $key => $tarea) {
                                    
                                    echo '<form method="post">
                                    
                                        <a href="http://localhost/AULA-ANNYANG/Tarea/'.$tarea["id"].'">
                                    
                                            <button type="button" class="btn btn-warning">'.$tarea["nombre"].'<i class="fa fa-eye"></i></button> - '; 

                                        if ($tarea["fecha_limite"] == "") {
                                            
                                            echo 'Sin Fecha Limite aun';

                                        }else {
                                            
                                            echo $tarea["fecha_limite"];

                                        }
                                    
                                        echo '</a>
                                        
                                        
                                        
                                            <input type="hidden" name="idT" value="'.$tarea["id"].'">
                                            <input type="hidden" name="idAula" value="'.$exp["1"].'">

                                            ';
                                        
                                        $borrarTarea = new SeccionesC();
                                        $borrarTarea -> BorrarTareaC();

                                        echo '</form>
                                        
                                        <br><br>';

                                }

                            }
                            
                                
                            
                            echo '</div>
                            
                        
                        </div>';

                }

            }

        ?>

        
        <button><a href="#header-inicio" class="button" title="volver al inicio" id="volverbtn"><i class="fa fa-chevron-up"></i></a></button>

        
    
    </section>

</div>

<div class="modal fade" id="AgregarArchivo">

    <div class="modal-dialog">
    
        <div class="modal-content">

        <form method="post" enctype="multipart/form-data">
        
            <div class="modal-body">
            
                <div class="box-body">
                
                    <div class="form-group">
                    
                        <h2>Nombre del Archivo:</h2>

                        <input type="text" class="form-control input-lg" name="nombreA" required="">

                        <input type="hidden" id="idS" name="id_s" value="">

                        <?php

                        echo '<input type="hidden" name="id_a" value="'.$exp[1].'">';

                        ?>

                        

                    </div>

                    <div class="form-group">
                    
                        <h2>Archivo:</h2>

                        <input type="file" class="form-control input-lg" name="archivo" required="">

                    </div>
                
                </div>
            
            </div>

            <div class="modal-footer">
            
                <button type="submit" class="btn btn-primary">Agregar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            
            </div>

            <?php

            $agregar = new SeccionesC();
            $agregar -> AgregarArchivoC();

            ?>
        
        </form>
        
        
        
        </div>
    
    </div>

</div>

<div class="modal fade" id="BorrarSeccion">

<div class="modal-dialog">
    
    <div class="modal-content">

    <form method="post">
    
        <div class="modal-body">
        
            <div class="box-body">
            
                <div class="form-group">
                
                    <h2>¿Eliminar esta sección?</h2>

                    <input type="hidden" class="form-control input-lg" id="idSE" name="idS" required="">


                    <?php

                    echo '<input type="hidden" name="id_a" value="'.$exp[1].'">';

                    ?>

                    

                </div>

            
            </div>
        
        </div>

        <div class="modal-footer">
        
            <button type="submit" class="btn btn-success">Si</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            
        
        </div>

        <?php

        $borrarSeccion = new SeccionesC();
        $borrarSeccion -> BorrarSeccionC();

        ?>

        
    
    </form>
    
    
    
    
    </div>
    

</div>

</div>

<div class="modal fade" id="AgregarVideo">

    <div class="modal-dialog">
    
        <div class="modal-content">

        <form method="post" enctype="multipart/form-data">
        
            <div class="modal-body">
            
                <div class="box-body">
                
                    <div class="form-group">
                    
                        <h2>Nombre del Video:</h2>

                        <input type="text" class="form-control input-lg" name="nombreV" required="">

                        <input type="hidden" id="idSV" name="id_sv" value="">

                        <?php

                        echo '<input type="hidden" name="id_v" value="'.$exp[1].'">';

                        ?>

                        

                    </div>

                    <div class="form-group">
                    
                        <h2>Video:</h2>

                        <input type="file" class="form-control input-lg" name="video" required="">

                    </div>
                
                </div>
            
            </div>

            <div class="modal-footer">
            
                <button type="submit" class="btn btn-primary">Agregar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            
            </div>

            <?php

            $agregarvid = new SeccionesC();
            $agregarvid -> AgregarVideoC();

            ?>
        
        </form>
        
        
        
        </div>
    
    </div>

</div>

<div class="modal fade" id="VideoY">

    <div class="modal-dialog">
    
        <div class="modal-content">

        <form method="post" enctype="multipart/form-data">
        
            <div class="modal-body">
            
                <div class="box-body">
                
                    <div class="form-group">
                    
                        <h2>Nombre del Video Youtube:</h2>

                        <input type="text" class="form-control input-lg" name="nombreVY" required="">
                        <br>

                        <h2>Link del video:</h2>
                        <div class="form-group has-feedback">

                            <input type="text" class="form-control input-lg" id="videoy" name="videoy" placeholder="Link">

                        </div>
                        

                        <input type="hidden" id="idSY" name="id_sy" value="">

                        <?php

                        echo '<input type="hidden" name="id_y" value="'.$exp[1].'">';

                        ?>

                        

                    </div>

                  
                
                </div>
            
            </div>

            <div class="modal-footer">
            
                <button type="submit" class="btn btn-primary">Agregar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            
            </div>

            <?php

            $agregarvidy = new SeccionesC();
            $agregarvidy -> VideoYC();

            ?>
        
        </form>
        
        
        
        </div>
    
    </div>

</div>

<div class="modal fade" id="AgregarImagen">

    <div class="modal-dialog">
    
        <div class="modal-content">

        <form method="post" enctype="multipart/form-data">
        
            <div class="modal-body">
            
                <div class="box-body">
                
                    <div class="form-group">
                    
                        <h2>Nombre de la Imagen:</h2>

                        <input type="text" class="form-control input-lg" name="nombreI" required="">

                        <input type="hidden" id="idSI" name="id_si" value="">

                        <?php

                        echo '<input type="hidden" name="id_i" value="'.$exp[1].'">';

                        ?>

                        

                    </div>

                    <div class="form-group">
                    
                        <h2>Imagen:</h2>

                        <input type="file" class="form-control input-lg" name="imagen" required="">

                    </div>

                    <div class="form-group">

                        <div class="box-body">

                            <!-- <button class="btn btn-sucsess pull-right" type="submit">Guardar<i class="fa fa-check"></i></button> -->

                            <br><br>

                            <div class="form-group has-feedback">
                            <h2 class="#">Texto alternativo:</h2> 
                                <input type="text" class="form-control input-lg" id="sinopsis" name="sinopsis" placeholder="Digite la descripción de la imagen">

                            </div>

                            <!-- <textarea type="submit" id="editor" name="sinopsis">
                            
                                Descripcion de la imagen
                            
                            </textarea> -->

                    </div>

                    


                    
                
                </div>
            
            </div>

            <div class="modal-footer">
            
                <button type="submit" class="btn btn-primary">Agregar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            
            </div>

            <?php

            $agregarimagena = new SeccionesC();
            $agregarimagena -> AgregarImagenC();

            ?>
        
        </form>
        
        
        
        </div>
    
    </div>

</div>


<!-- 
<div class="modal fade" id="BorrarseccionBMNU">

    <div class="modal-dialog">
    
        <div class="modal-content">

        <form method="post">
        
            <div class="modal-body">
            
                <div class="box-body">
                
                    <div class="form-group">
                    
                        <h2>Eliminar esta sección?</h2>

                        <input type="hidden" class="form-control input-lg" id="idSE" name="idS" required="">


                        <?php

                        echo '<input type="hidden" name="id_a" value="'.$exp[1].'">';

                        ?>

                        

                    </div>

                
                </div>
            
            </div>

            <div class="modal-footer">
            
                <button type="submit" class="btn btn-success">Si</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                
            
            </div>

            <?php

            $borrarSeccion = new SeccionesC();
            $borrarSeccion -> BorrarSeccionC();

            ?>

            
        
        </form>
        
        
        
        
        </div>
        
    
    </div>

</div> -->


<?php

$tarea = new TareasC();
$tarea -> AgregarTareaC();

?>