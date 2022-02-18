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

        <h1>Editar Grado</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <form method="post">
                
                    <?php

                    $editar = new GradosC();
                    $editar -> EditarGradoC();
                    $editar -> ActualizarGradoC();

                    ?>
                
                </form>

            </div>

        </div>
    
    </section>

</div>