<?php

if ($_SESSION["rol"] != "Administrador") {
    
    echo '<script>
    
        windorw.location ="Inicio";
    </script>';

    return;

}

?>



<div class="content-wrapper">

    <section class="content-header">

        <h1>Estudiantes</h1>

    </section>
    <title>Estudiantes</title>
    <section class="content">

        <div class="box">

            <div class="box-body">

                <table class="table table-hover table-bordered table-striped dt-responsible">
                
                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombres</th>
                            <th>Documento</th>
                            <th>Grado</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                        </tr>
                    </thead>

                    <tbody>
                    
                        <?php

                        $exp = explode("/", $_GET["url"]);

                        $columna = null;
                        $valor = null;

                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);

                        foreach ($resultado as $key => $value) {

                            if (isset($exp[1])) {
                                
                                if($value["id_grado"] == $exp[1]){

                                    echo '<tr>
    
                                            <td>'.$value["apellido"].'</td>
                                            <td>'.$value["nombre"].'</td>
                                            <td>'.$value["documento"].'</td>';
    
                                            $grado = GradosC::VerGradosC();
    
                                            foreach ($grado as $key => $c) {
                                                
                                                if($c["id"] == $value["id_grado"]){
    
                                                    echo '<td>'.$c["nombre"].'</td>';
    
                                                }
    
                                            }
    
                                            
    
                                            echo '<td>'.$value["usuario"].'</td>
                                            <td>'.$value["clave"].'</td>
                                        </tr>';
    
                                }

                            }else {
                                
                                if($value["rol"] == "Estudiante"){

                                    echo '<tr>
    
                                            <td>'.$value["apellido"].'</td>
                                            <td>'.$value["nombre"].'</td>
                                            <td>'.$value["documento"].'</td>';
    
                                            $grado = GradosC::VerGradosC();
    
                                            foreach ($grado as $key => $c) {
                                                
                                                if($c["id"] == $value["id_grado"]){
    
                                                    echo '<td>'.$c["nombre"].'</td>';
    
                                                }
    
                                            }
    
                                            
    
                                            echo '<td>'.$value["usuario"].'</td>
                                            <td>'.$value["clave"].'</td>
                                        </tr>';
    
                                }

                            }
                            
                            
                        }

                        ?>
                    
                    </tbody>
                
                </table>

            

            </div>

        </div>
    
    </section>

</div>