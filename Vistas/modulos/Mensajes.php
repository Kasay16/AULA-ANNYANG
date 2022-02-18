<title> 
    Mensajes
</title>
<div class="content-wrapper">

    <section class="content-header">

        <h1>Mensajes</h1>

        <?php

            $columna = "id_destinatario";
            $valor = $_SESSION["id"];

            $resultado = MensajesC::SinLeerC($columna, $valor);

            $sinLeer = 0;

            foreach ($resultado as $key => $value) {
              
              if ($value["leido"] == "No") {
                
                ++$sinLeer;
                
              }

            }

            if ($sinLeer > 0) {
              
              echo '<h3>'.$sinLeer.' Mensajes sin leer.</h3>';

            }

        ?>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <p>En esta sección podrá encontrar cuales han sido los mensajes recibidos y enviados. Además de poder buscarlos ya sea por quien envía o por su contenido en la sección de "buscar".</p>

                <a href="http://localhost/AULA-ANNYANG/Mensajes">
                
                    <button class="btn btn-primary">Recibidos</button>
                
                </a>

                <a href="http://localhost/AULA-ANNYANG/Mensajes/Enviados">
                
                    <button class="btn bg-teal">Enviados</button>
                
                </a>

                <br><br>

                <?php

                    $exp = explode("/", $_GET["url"]);

                    if (isset($exp[1])) {
                        
                        echo '<table class="table table-hover table-bordered table-striped dt-responsible">
                
                                <thead>
                                    <tr>
                                        <th>Destinatario</th>
                                        <th>Asunto</th>
                                        <th>Mensaje</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>
            
                                <tbody>';

                                $columna = null;
                                $valor = null;

                                $resultado = MensajesC::VerMensajesC($columna, $valor);

                                foreach ($resultado as $key => $value) {
                                    
                                    if ($_SESSION["id"] == $value["id_envia"]) {
                                        
                                        $columna = "id";
                                        $valor = $value["id_destinatario"];

                                        $destinatario = UsuariosC::VerUsuariosC($columna, $valor);

                                        echo '<tr>

                                                <td>'.$destinatario["apellido"].' '.$destinatario["nombre"].'</td>

                                                <td>'.$value["asunto"].'</td>';

                                                $mensaje = substr($value["mensaje"], 0, 30);

                                            echo '<td>'.$mensaje.'...</td>

                                                <td>'.$value["fecha"].'</td>

                                                <td>
                                                
                                                    <a href="http://localhost/AULA-ANNYANG/Mensaje/'.$value["id"].'">
                                                                
                                                        <button class="btn btn-primary">Leer mensaje</button>
                                                
                                                    </a>
                                                
                                                </td>
                                        
                                            </tr>';

                                    }
                                }
                                
                                
                        echo '</tbody>
                            
                            </table>';

                    }else {
                        
                        echo '<table class="table table-hover table-bordered table-striped dt-responsible">
                
                                <thead>
                                    <tr>
                                        <th>Envia</th>
                                        <th>Asunto</th>
                                        <th>Mensaje</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>
            
                                <tbody>';

                                $columna = null;
                                $valor = null;

                                $resultado = MensajesC::VerMensajesC($columna, $valor);

                                foreach ($resultado as $key => $value) {
                                    
                                    if ($_SESSION["id"] == $value["id_destinatario"]) {
                                        
                                        $columna = "id";
                                        $valor = $value["id_envia"];

                                        $destinatario = UsuariosC::VerUsuariosC($columna, $valor);

                                        if ($value["leido"] == "No") {
                                            
                                            echo '<tr style="background:#0247AD; color:#fff">';

                                        }else {
                                            
                                            echo '<tr style="color:black">';

                                        }

                                        echo '

                                                <td>'.$destinatario["apellido"].' '.$destinatario["nombre"].'</td>

                                                <td>'.$value["asunto"].'</td>';

                                                $mensaje = substr($value["mensaje"], 0, 30);

                                            echo '<td>'.$mensaje.'...</td>

                                                <td>'.$value["fecha"].'</td>';

                                                if ($value["leido"] == "No") {
                                                    
                                                    echo '<td>
                                                    
                                                            <form method="post">
                                                            
                                                                <input type="hidden" name="idM" value="'.$value["id"].'">

                                                                <input type="hidden" name="fecha" value="'.$value["fecha"].'">

                                                                <button class="btn btn-default" type="submit">Leer mensaje</button>
                                                            
                                                            </form>
                                                        
                                                        </td>';

                                                        $leerM = new MensajesC();
                                                        $leerM -> LeerMensajeC();

                                                }else {
                                                    
                                                    echo '<td>
                                                    
                                                            <a href="http://localhost/AULA-ANNYANG/Mensaje/'.$value["id"].'">
                                                            
                                                                <button class="btn btn-primary">Leer mensaje</button>
                                                            
                                                            </a>
                                                            
                                                       
                                                        
                                                        </td>';

                                                }

                                                
                                        
                                        echo '</tr>';

                                    }
                                }
                                
                                
                        echo '</tbody>
                            
                            </table>';

                    }

                ?>

                

            </div>

        </div>
    
    </section>

</div>