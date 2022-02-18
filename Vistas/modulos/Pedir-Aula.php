<?php

if ($_SESSION["rol"] != "Profesor") {
    
    echo '<script>
    
        windorw.location ="Inicio";
    </script>';

    return;

}

?>


<div class="content-wrapper">

    <section class="content-header">

        <h1>Solicitar aulas virtuales</h1>

    </section>

    <title>Pedir aula</title>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <form method="post">
                
                    <h2>Nombre de la materia:</h2>
                    <input type="text" class="input-lg" name="materia" require="">

                    <?php
                    
                    echo '<input type="hidden" class="input-lg" name="id_profesor" value="'.$_SESSION["id"].'">'
                        ;

                    ?>

                    <br>
                    <h2>Observaciones:</h2>

                    <textarea  id="editor" name="observaciones"></textarea>

                    <br><br>

                    <button type="submit" class="btn btn-primary">Solicitar</button>

                    <?php

                    $solicitar = new AulasC();
                    $solicitar -> SolicitarAulaC();

                    ?>
                
                </form>

            </div>

        </div>
    
    </section>

</div>