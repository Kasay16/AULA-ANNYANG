<div class="content-wrapper">

    <section class="content-header">

        <h1>Universidad Libre</h1>

    </section>


    <title>Aula Virtual- Pagina de inicio</title>
    <section class="content">

        <div class="box">

            <div class="box-body">

                <?php

                $inicio = InicioC::VerInicioC();


                if ($_SESSION["rol"] == "Administrador") {

                    echo '<form method="post">
                
                            <textarea name="descripcion" id="editor">
                            
                                ' . $inicio["descripcion"] . '
                            
                            </textarea>

                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i></button>
                        
                        </form>';

                    $descripcion = new InicioC();
                    $descripcion->GuardarDescripcionC();
                } else {

                    echo '<p>' . $inicio["descripcion"] . '</p>';
                }



                ?>

                <br>

                <h1>Grados:</h1>

                <div class="row">

                    <?php

                    $resultado = GradosC::VerGradosC();

                    foreach ($resultado as $key => $value) {

                        $car = explode(" ", $value["nombre"]);

                        if ($car[0] == "Séptimo") {

                            echo '<div class="col-lg-4 col-xs-6">
                    
                                <div class="small-box bg-red">

                                    <div class="inner">
                                    
                                        <h3>Grado Séptimo</h3>

                                        <p>' . $value["nombre"] . '</p>
                                    
                                    </div>

                                    

                                </div>
                                
                            </div>';
                        } else if ($car[0] == "Sexto") {

                            echo '<div class="col-lg-4 col-xs-6">
                    
                                <div class="small-box bg-blue">

                                    <div class="inner">
                                    
                                        <h3>Grado Sexto</h3>

                                        <p>' . $value["nombre"] . '</p>
                                    
                                    </div>

                                    <div class="icon">
                                        <i class="fa fa-briefcase"></i>
                                    </div>

                                </div>
                                
                            </div>';
                        } else if ($car[0] == "Noveno") {

                            echo '<div class="col-lg-4 col-xs-6">
                    
                                <div class="small-box bg-yellow">

                                    <div class="inner">
                                    
                                        <h3>Grado ' . $value["nombre"] . '</h3>

                                        <p>' . $value["nombre"] . '</p>
                                    
                                    </div>

                                   

                                </div>
                                
                            </div>';
                        } else if ($car[0] == "Octavo") {

                            echo '<div class="col-lg-4 col-xs-6">
                    
                                <div class="small-box bg-green">

                                    <div class="inner">
                                    
                                        <h3>Grado ' . $value["nombre"] . '</h3>

                                        <p>' . $value["nombre"] . '</p>
                                    
                                    </div>

                                    
                                </div>
                                
                            </div>';
                        } else {

                            echo '<div class="col-lg-4 col-xs-6">
                    
                                <div class="small-box bg-black">

                                    <div class="inner">
                                    
                                        <h3>Grado ' . $car[0] . '</h3>

                                        <p>' . $value["nombre"] . '</p>
                                    
                                    </div>

                                    <div class="icon">
                                        <i class="fa fa-laptop"></i>
                                    </div>

                                </div>
                                
                            </div>';
                        }
                    }

                    ?>

                </div>


                <?php

                if ($_SESSION["rol"] == "Administrador") {

                    echo '<h1>Manuales de Uso:</h1>

                        <div class="col-lg-4">
                                
                            <h2>Manual para profesores</h2>

                
                                <a href="http://localhost/AULA-ANNYANG/' . $inicio["manualProfesor"] . '" target="_blank">
                                    
                                    <h3>Ver Manual</h3>
                                            
                                    </a>
                                            
                                    <form method="post" enctype="multipart/form-data">
                                    
                                        <input type="file" name="manualProfesorN">
                
                                        <input type="hidden" name="manualProfesor" value="' . $inicio["manualProfesor"] . '">
                
                                        <br>
                
                                        <button type="submit" class="btn btn-success btn-xs">Guardar</button>
                                        
                                    </form>';

                    $manualProfesor = new InicioC();
                    $manualProfesor->GuardarManualProfesorC();




                    echo '</div>
                
                                <div class="col-lg-4">
                                
                                    <h2>Manual para estudiantes</h2>
                
                                    
                
                                        <a href="http://localhost/AULA-ANNYANG/' . $inicio["manualEstudiante"] . '" target="_blank">
                                    
                                            <h3>Ver Manual</h3>
                                            
                                        </a>
                                            
                                        <form method="post" enctype="multipart/form-data">
                                    
                                            <input type="file" name="manualEstudianteN">
                
                                            <input type="hidden" name="manualEstudiante" value="' . $inicio["manualEstudiante"] . '">
                
                                            <br>
                
                                            <button type="submit" class="btn btn-success btn-xs">Guardar</button>
                                        
                                        </form>';

                    $manualEstudiante = new InicioC();
                    $manualEstudiante->GuardarManualEstudianteC();



                    echo '</div>';
                } else if ($_SESSION["rol"] == "Profesor") {

                    echo '<h1>Manual de Uso:</h1>

                        <div class="col-lg-4">
                                

                                <a href="http://localhost/AULA-ANNYANG/' . $inicio["manualProfesor"] . '" target="_blank">
                                    
                                    <h3>Ver Manual</h3>
                                            
                                </a>
                                
                        </div>';
                } else {

                    echo '<h1>Manual de Uso:</h1>

                        <div class="col-lg-4">
                                

                                <a href="http://localhost/AULA-ANNYANG/' . $inicio["manualEstudiante"] . '" target="_blank">
                                    
                                    <h3>Ver Manual</h3>
                                            
                                </a>
                                
                        </div>';
                }

                ?>




               

                    
               


            </div>

        </div>

    </section>

</div>