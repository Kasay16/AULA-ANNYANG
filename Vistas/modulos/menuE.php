<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <ul class="sidebar-menu">


      <li>

        <p class="titulo">



          <?php

          if ($_SESSION["foto"] == "") {

            echo '<img src="http://localhost/AULA-ANNYANG/Vistas/img/defecto.png" class="imgperfil  with="100" height="100"" alt="Foto de ' . $_SESSION["apellido"] . ' ' . $_SESSION["nombre"] . '">';
          } else {

            echo '<img src="http://localhost/AULA-ANNYANG/' . $_SESSION["foto"] . '" class="imgperfil  with="100" height="100" alt="Foto de ' . $_SESSION["apellido"] . ' ' . $_SESSION["nombre"] . '">';
          }

          // echo '<span class="hidden-xs"> Usuario '.$_SESSION["apellido"].' '.$_SESSION["nombre"].'</span>';



          ?>



        </p>

      </li>

      </a>
      </li>

      <li>

        <h1 class="titulo3">Menú</h1>

      </li>




      <li>

        <a href="http://localhost/AULA-ANNYANG/Inicio" class="contp">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/home.ico" alt="icono del inicio">
          <span style="color: white;">Inicio</span>
        </a>
      </li>

      <li>

        <a href="http://localhost/AULA-ANNYANG/Mis-Datos" class="contp">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/personal.ico" alt="icono del mis datos">
          <span style="color: white;">Mis Datos</span>
        </a>
      </li>



      <li>
        <a href="http://localhost/AULA-ANNYANG/Aulas-Virtuales" class="contp">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/library.ico" alt="icono de las aulas virtuales">
          <span style="color: white;">Aulas Virtuales</span>
        </a>
      </li>

      <li>
        <a href="http://localhost/AULA-ANNYANG/Mensajes" class="contp">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/mail.ico" alt="icono de los mensajes">
          <span style="color: white;">Mensajes</span>

          <span class="pull-right-container">

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

              echo '<small class="label pull-right bg-blue" data-toggle="tooltip" title="Sin Leer">' . $sinLeer . '</small>';
            }

            ?>


          </span>

        </a>
      </li>

      <li>
        <a href="http://localhost/AULA-ANNYANG/Salir" class="contp">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/exit.ico" alt="icono de las aulas virtuales">
          <span style="color: white;">Salir</span>
        </a>
      </li>

      <li>


        <div class="container">
        <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/fuente.png" alt="icono de aumento tamño de fuente">
        <button alt="aumentar letra"><a onclick="return cambiarTexto('+')" class="button" title="aumentar letra" alt="hola"><i class="fa fa-chevron-up">+</i></a></button>
        <button alt="disminuir letra"><a onclick="return cambiarTexto('-')" class="button" title="disminuir letra"><i class="fa fa-chevron-down">-</i></a></button>
        </div>

      </li>

    </ul>

  </section>
  <!-- /.sidebar -->
</aside>