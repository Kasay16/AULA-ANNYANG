<?php

$exp = explode("/", $_GET["url"]);

$columna = "id";
$valor = $exp[1];

$aula = AulasC::VerAulas2C($columna, $valor);

if ($_SESSION["rol"] == "Estudiante") {
    
        echo '<script>
        
            window.location = "http://localhost/AULA-ANNYANG/Inicio";
        </script>';

}else if($_SESSION["rol"] == "Profesor" && $_SESSION["id"] != $aula["id_profesor"]){

    echo '<script>
        
            window.location = "http://localhost/AULA-ANNYANG/Mis-Aulas";
        </script>';

}

?>


<div class="content-wrapper">

    <section class="content-header">

        <?php

        echo '<h1>Listado de alumnos inscriptos en la Materia: <b>'.$aula["materia"].'</b></h1>';

        ?>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <table class="table table-hover table-striped table-bordered dt-responsive">
                
                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                        </tr>
                    </thead>

                    <tbody>
                    
                    <?php

                    $columna = "id_aula";
                    $valor = $exp[1];

                    $resultado = AlumnosC::VerInscriptosC($columna, $valor);

                    foreach ($resultado as $key => $value) {
                        
                        $columna = "id";
                        $valor = $value["id_alumno"];

                        $alumno = UsuariosC::VerUsuariosC($columna, $valor);

                        echo '<tr>
                        
                                <td>'.$alumno["apellido"].'</td>
                                <td>'.$alumno["nombre"].'</td>
                                <td>'.$alumno["documento"].'</td>
                        
                            </tr>';
                    }

                    ?>
                    
                    </tbody>
                
                </table>

            </div>

        </div>
    
    </section>

</div>