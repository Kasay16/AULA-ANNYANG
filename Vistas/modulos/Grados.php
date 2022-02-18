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

    <title>Grados</title>
        <h1>Gestor de Grados</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header">
            
                <form method="post">
                
                    <div class="col-md-6 col-xs-12">
                    
                        <input type="text" class="form-control" name="grado" placeholder="Ingresar Nuevo Grado">
                        <button type="submit" class="btn btn-primary">Crear Grado</button>
                    
                    </div>

                    

                    <?php

                    $crear = new GradosC();
                    $crear -> CrearGradoC();

                    ?>
                
                </form>
            
            </div>

            <div class="box-body">

                <table class="table table-hover table-bordered table-striped dt-responsive">
                
                    <thead>
                        <tr>
                        
                            <th>ID</th>
                            <th>Nombre</th>
                            <th></th>
                        
                        </tr>
                    </thead>

                    <tbody>
                    
                        <?php

                        $resultado = GradosC::VerGradosC();

                        foreach ($resultado as $key => $value) {
                            
                            echo '<tr>

                                    <td>'.$value["id"].'</td>
                                    <td>'.$value["nombre"].'</td>

                                    <td>

                                        <div class="btn-group">

                                            <a href="Editar-Grado/'.$value["id"].'">
                                                <button class="btn btn-success">Editar</button>
                                            </a>
                                            
                                            <a href="Grados/'.$value["id"].'">
                                                <button class="btn btn-danger">Borrar</button>
                                            </a>

                                            <a href="Estudiantes/'.$value["id"].'">
                                                <button class="btn btn-primary">Estudiantes</button>
                                            </a>

                                        </div>
                                    
                                    </td>
                            
                                </tr>';

                        }


                        ?>
                    
                    </tbody>
                
                </table>

            </div>

        </div>
    
    </section>

</div>

<?php

$borrar = new GradosC();
$borrar -> BorrarGradoC();

