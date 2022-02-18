<?php

$exp = explode("/", $_GET["url"]);

$columna = "id";

$valor = $exp[1];
$mensaje = MensajesC::VerMensajesC($columna, $valor);

$valor = $mensaje["id_destinatario"];
$Destinatario = UsuariosC::VerUsuariosC($columna, $valor);

$valor = $mensaje["id_envia"];
$Envia = UsuariosC::VerUsuariosC($columna, $valor);


if ($_SESSION["id"] != $mensaje["id_destinatario"] && $_SESSION["id"] != $mensaje["id_envia"]){

    echo '<script>
    
        window.location ="http://localhost/AULA-ANNYANG/Mensajes";
    </script>';
}


?>
<title> 
    Contenido del mensaje
</title>

<div class="content-wrapper">

    <section class="content-header">

        <a href="http://localhost/AULA-ANNYANG/Mensajes">
        
            <button class="btn btn-primary">Ir a mensajes</button>
        
        </a>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <?php

                    echo '<h2><b>Para: </b>'.$Destinatario["apellido"].' '.$Destinatario["nombre"].'</h2>

                            <h2><b>De: </b>'.$Envia["apellido"].' '.$Envia["nombre"].'</h2>
            
                            <h2><b>Asunto: </b>'.$mensaje["asunto"].'</h2>
                            
                            <h2><b>Mensaje: </b>'.$mensaje["mensaje"].'</h2>
                                                      
                            <br>';

                            if ($Destinatario["id"] == $_SESSION["id"]) {
                                
                                echo '<a href="http://localhost/AULA-ANNYANG/Enviar-Mensaje/'.$Envia["id"].'">
                            
                                        <button class="btn btn-primary">Responder Mensaje</button>
                                    
                                    </a>';

                            }
                            

                ?>

                


            </div>

        </div>
    
    </section>

</div>