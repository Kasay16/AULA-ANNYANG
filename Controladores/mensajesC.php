<?php

class MensajesC{

    static public function EnviarMensajeC(){

        if (isset($_POST["id_destinatario"])) {
            
            $tablaBD = "mensajes";

            $datosC = array("id_destinatario" => $_POST["id_destinatario"], "id_envia" => $_POST["id_envia"], "asunto" => $_POST["asunto"], "mensaje" => $_POST["mensaje"], "leido" => "No");

            $resultado = MensajesM::EnviarMensajeM($tablaBD, $datosC);

            if ($resultado == true) {

                $resultado2 = MensajesM::VerUltimoId($tablaBD);

                echo '<script>

                    swal({

                        type: "success",
                        title: "El mensaje se ha enviado Correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar" 

                        }).then(function(resultado){

                            if(resultado.value){

                                window.location = "http://localhost/AULA-ANNYANG/Mensaje/'.$resultado2["id"].'";

                            }

                        })
                
                    
                </script>';

            }

        }

    }



    static public function VerMensajesC($columna, $valor){

        $tablaBD = "mensajes";

        $resultado = MensajesM::VerMensajesM($tablaBD, $columna, $valor);

        return $resultado;

    }

    static public function SinLeerC($columna, $valor){

        $tablaBD = "mensajes";

        $resultado = MensajesM::SinLeerM($tablaBD, $columna, $valor);

        return $resultado;

    }



    public function LeerMensajeC(){

        if (isset($_POST["idM"])) {
            
            $tablaBD = "mensajes";

            $datosC = array("id"=>$_POST["idM"], "fecha"=>$_POST["fecha"], "leido"=>"Si");

            $resultado = MensajesM::LeerMensajeM($tablaBD, $datosC);

            if ($resultado == true) {
                
                echo '<script>

                        
                        window.location = "http://localhost/AULA-ANNYANG/Mensaje/'.$_POST["idM"].'";

                    
                </script>';

            }

        }

    }








    
}



