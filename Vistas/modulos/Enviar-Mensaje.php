<div class="content-wrapper">

    <section class="content-header">

        <h1>Enviar Mensaje</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <?php 
                
                $exp = explode("/", $_GET["url"]);

                $columna = "id";
                $valor = $exp[1];

                $Destinatario = UsuariosC::VerUsuariosC($columna, $valor);

                echo '<h2>Para: <b>'.$Destinatario["apellido"].' '.$Destinatario["nombre"].'</b></h2>

                    <form method="post">
                    
                        <input type="hidden" name="id_destinatario" value="'.$Destinatario["id"].'">
                        <input type="hidden" name="id_envia" value="'.$_SESSION["id"].'">

                        <h2>Asunto:</h2>
                        <input type="text" class="form-control input-lg" name="asunto" required="">

                        <h2>Mensaje:</h2>
                        <textarea id="editor" name="mensaje" required=""></textarea>

                        <br>
                        <button type="submit" class="btn btn-primary">Enviar menaje</button>
                    
                    </form>';

                    
                    $mensaje = new  MensajesC();
                    $mensaje -> EnviarMensajeC();
                
                ?>

                

            </div>

        </div>
    
    </section>

</div>