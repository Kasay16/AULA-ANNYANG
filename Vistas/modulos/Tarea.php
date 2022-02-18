<title>Tareas</title>

<?php

$exp = explode("/", $_GET["url"]);

$columna = "id";
$valor = $exp[1];

$tarea = TareasC::VerTareaC($columna, $valor);

$valor = $tarea["id_seccion"];

$seccion = SeccionesC::VerSeccionesC($columna, $valor);

$valor = $seccion["id_aula"];

$aula = AulasC::VerAulas2C($columna, $valor);

if ($_SESSION["rol"] == "Profesor" && $aula["id_profesor"] != $_SESSION["id"]) {
    
    echo '<script>
    
        window.location = "http://localhost/AULA-ANNYANG/Mis-Aulas";
    </script>';

    return;

}else if ($_SESSION["rol"] == "Estudiante") {
    
    $columna = "id_aula";
    $valor = $aula["id"];
    $columna2 = "id_alumno";
    $valor2 = $_SESSION["id"];

    $inscripto = AlumnosC::VerInscriptoC($columna, $valor, $columna2, $valor2);

    if ($inscripto == false) {
        
        echo '<script>
        
            window.location = "http://localhost/AULA-ANNYANG/Aulas-Virtuales";
        </script>';

    }
}

?>
<title></title>


<div class="content-wrapper">

    <section class="content-header">

        <?php

        echo '
        
        <a href="http://localhost/AULA-ANNYANG/Aula/'.$seccion["id_aula"].'">
         <h1>'.$aula["materia"].'</h1>
                    
                </a>
                <h3>Advertencia solo se adminten archivos .doc y .pdf</h3>
                ';

        if ($_SESSION["rol"] == "Profesor") {
            
            echo '
            
                    <form method="post">
         
                    <h3>Tarea: <input type="text" name="nombre" value="'.$tarea["nombre"].'"> 
                    <button class="btn btn-sucsess btn-xs" type="submit" data-toggle="tooltip" title="Guardar"><i class="fa fa-check"></i></button></h3>

                    <input type="hidden" name="id" value="'.$exp["1"].'">

                    <h2>Fecha limite:

                        <i class="fa fa-calendar"></i>

                        <input type="text" id="datepicker" name="fecha_limite" value="'.$tarea["fecha_limite"].'">
                        <button class="btn btn-sucsess btn-xs" type="submit" data-toggle="tooltip" title="Guardar"><i class="fa fa-check"></i></button>
                    
                    </h2>

                   
                
                
                </section>
                
                <section class="content">

                    <div class="box">

                        <div class="box-body">

                            <button class="btn btn-sucsess pull-right" type="submit">Guardar<i class="fa fa-check"></i></button>

                            <br><br>

                            <textarea id="editor" name="descripcion">
                            
                                '.$tarea["descripcion"].'
                            
                            </textarea>

                            </form>';

                        $guardarTarea = new TareasC();
                        $guardarTarea -> GuardarTareaC();

                        
                
                

            echo '<hr>
                <h2>Archivos:</h2>
                
                <form method="post" enctype="multipart/form-data">

                    <input type="text" name="nombre" placeholder="Nombre de la tarea" required><br>

                    Subir Tarea: <input type="file" name="tarea" required>

                    <input type="hidden" name="id_tarea" value="'.$exp[1].'" required>
                    <input type="hidden" name="id_seccion" value="'.$seccion["id"].'" required>

                    <br>

                    <button type="submit" class="btn btn-success">Subir</button>';

                $subirTarea = new TareasC();
                $subirTarea -> SubirTareaC();
            
                echo '</form>';

                $columna = "id_tarea";
                $valor = $exp[1];

                $Tareas = TareasC::VerTC($columna, $valor);

                foreach ($Tareas as $key => $value) {
                    
                    echo '<h2>'.$value["nombre"].'

                            <a href="http://localhost/AULA-ANNYANG/'.$value["tarea"].'" download="'.$value["nombre"].'">
                            
                                Descargar

                            </a>
                            </h2>';

                }
                
                echo '<hr>
                    <a href="http://localhost/AULA-ANNYANG/Entregas/'.$exp[1].'"><button class="btn btn-primary">Ver Entregas</button></a>
                
                </div>

            </div>
                
        </section>';


        }else {

            echo '<h3>Tarea: '.$tarea["nombre"].'

                    <h2>Fecha limite:

                        <i class="fa fa-calendar"></i>

                        '.$tarea["fecha_limite"].'
                    
                    </h2>

                
                
                </section>
                
                <section class="content">

                    <div class="box">

                        <div class="box-body">
                        
                            '.$tarea["descripcion"].'';


                            $columna = "id_tarea";
                            $valor = $exp[1];

                            $Tareas = TareasC::VerTC($columna, $valor);

                            foreach ($Tareas as $key => $value) {
                                
                                echo '<h2>'.$value["nombre"].'

                                        <a href="http://localhost/AULA-ANNYANG/'.$value["tarea"].'" download="'.$value["nombre"].'">
                                        
                                            Descargar

                                        </a>
                                        </h2>';

                            }

                            echo '<hr>
                            <h2>Sus Entregas:</h2>';

                            $columna = "id_alumno";
                            $valor = $_SESSION["id"];

                            $entregas = TareasC::VerEntregasC($columna, $valor);

                            foreach ($entregas as $key => $ent) {
                                
                                if ($ent["id_tarea"] == $exp[1]) {
                                    
                                    $notas = TareasC::VerNotasC();

                                    foreach ($notas as $key => $nota) {
                                        
                                        if ($nota["id_entrega"] == $ent["id"]) {
                                            
                                            if ($nota["estado"] == "Pendiente") {
                                                
                                                echo '<p><a href="http://localhost/AULA-ANNYANG/'.$ent["tarea_alumno"].'" download="'.$ent["tarea_alumno"].'">Descargar</a>

                                                <button class="btn btn-warning btn-xs">'.$nota["estado"].'</button></p>';

                                            }else if ($nota["estado"] == "Reprobado") {
                                                
                                                echo '<p><a href="http://localhost/AULA-ANNYANG/'.$ent["tarea_alumno"].'" download="'.$ent["tarea_alumno"].'">Descargar</a>

                                                <button class="btn btn-danger btn-xs">Nota: '.$nota["nota"].' - '.$nota["estado"].'</button></p>';

                                            }else{

                                                echo '<p><a href="http://localhost/AULA-ANNYANG/'.$ent["tarea_alumno"].'" download="'.$ent["tarea_alumno"].'">Descargar</a>

                                                <button class="btn btn-success btn-xs">Nota: '.$nota["nota"].' - '.$nota["estado"].'</button></p>';

                                            }

                                        }

                                    }

                                }

                            }

                            $mes = date("m");
                            $dia = date("d");
                            $año = date("Y");
                            
                            $fecha = $mes."/".$dia."/".$año;

                            if ($fecha <= $tarea["fecha_limite"]) {
                                
                                echo '<h2>Enviar Entrega:</h2>
                                
                                <form method="post" enctype="multipart/form-data">

                                    <input type="file" name="tarea_alumno" required>

                                    <input type="hidden" name="id_tarea" value="'.$tarea["id"].'">

                                    <input type="hidden" name="id_seccion" value="'.$seccion["id"].'">

                                    <input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
                                
                                    <br>

                                    <button class="btn btn-primary btn-sm" type="submit">Enviar</button>
                                
                                </form>';

                                $entrega = new TareasC();
                                $entrega -> EntregarTarea();

                                

                            }

                        echo '</div>

                    </div>
                
                </section>';
                
                
            

        }

        
        ?>

        

    </section>

    

    

</div>