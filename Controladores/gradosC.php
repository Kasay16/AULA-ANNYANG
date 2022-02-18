<?php

class GradosC{

    public function CrearGradoC(){

        if (isset($_POST["grado"])) {
            
            $tablaBD = "grados";

            $grado = $_POST["grado"];

            $resultado = GradosM::CrearGradoM($tablaBD, $grado);
            
            if($resultado == true){

                echo '<script>

                    swal({

                        type: "success",
                        title: "La grado se ha Creado Correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar" 

                        }).then(function(resultado){

                            if(resultado.value){

                                window.location = "http://localhost/AULA-ANNYANG/Grados";

                            }

                        })
                
                    
                </script>';

            }

        }

    }


    static public function VerGradosC(){

        $tablaBD = "grados";

        $resultado = GradosM::VerGradosM($tablaBD);

        return $resultado;

    }


    public function EditarGradoC(){

        $tablaBD = "grados";

        $exp = explode("/", $_GET["url"]);

        $id = $exp[1];

        $resultado = GradosM::EditarGradoM($tablaBD, $id);

        echo '<div class="col-md-6 col-xs-12">
                    
                <h2>Nombre de la Grado:</h2>
                <input type="text" class="form-control input-lg" name="nombreE" value="'.$resultado["nombre"].'" required="">

                <input type="hidden" name="Cid" value="'.$resultado["id"].'">

                <br>
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
    
            </div>';

    }


    public function ActualizarGradoC(){

        if(isset($_POST["Cid"])){

            $tablaBD = "grados";

            $datosC = array("id"=>$_POST["Cid"], "grado"=>$_POST["nombreE"]);

            $resultado = GradosM::ActualizarGradoM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>

                    swal({

                        type: "success",
                        title: "La grado se ha Actualizado Correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar" 

                        }).then(function(resultado){

                            if(resultado.value){

                                window.location = "http://localhost/AULA-ANNYANG/Grados";

                            }

                        })
                
                    
                </script>';

            }

        }
        
    }



    public function BorrarGradoC(){

        $exp = explode("/", $_GET["url"]);

        $id = $exp[1];

        if(isset($id)){

            $tablaBD = "grados";

            $resultado = GradosM::BorrarGradoM($tablaBD, $id);

            if($resultado == true){

                echo '<script>
                
                swal({

                    type: "success",
                    title: "La grado se ha Borrado Correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar" 

                    }).then(function(resultado){

                        if(resultado.value){

                            window.location = "http://localhost/AULA-ANNYANG/Grados";

                        }

                    })

                </script>';

            }
            
        }
        
    }




}


