<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">


    <ul class="sidebar-menu">

      <li>

        <p class="titulo">



          <?php

          if ($_SESSION["foto"] == "") {

            echo '<img src="http://localhost/AULA-ANNYANG/Vistas/img/defecto.png" class="imgperfil"  width="100" height="100"" alt="Foto de ' . $_SESSION["apellido"] . ' ' . $_SESSION["nombre"] . '">';
          } else {

            echo '<img src="http://localhost/AULA-ANNYANG/' . $_SESSION["foto"] . '" class="imgperfil2"  width="150" height="150"  alt="Foto de ' . $_SESSION["apellido"] . ' ' . $_SESSION["nombre"] . '">';
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
        <a href="http://localhost/AULA-ANNYANG/Inicio">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/home.ico" alt="icono del inicio">
          <span style="color: white;">Inicio</span>
        </a>
      </li>

      <li>

        <a href="http://localhost/AULA-ANNYANG/Mis-Datos" class="contp">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/personal.ico" alt="icono de mis datos">
          <span style="color: white;">Mis Datos</span>
        </a>
      </li>


      <li>
        <a href="http://localhost/AULA-ANNYANG/Mis-Aulas">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/library.ico" alt="icono de las aulas virtuales">
          <span style="color: white;">Mis Aulas</span>
        </a>
      </li>

      <li class="treeview">

        <a href="#">

          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/aprobado.ico" alt="icono de Solicitar Aulas Virtuales">
          <span>Solicitar Aulas Virtuales</span>

          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>

        </a>

        <ul class="treeview-menu">

          <li>
            <a href="http://localhost/AULA-ANNYANG/Pedir-Aula">
              <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/nueva.ico" alt="icono de Pedir Nueva Aula">
              <span>Pedir Nueva Aula</span>
            </a>
          </li>

          <li>
            <a href="http://localhost/AULA-ANNYANG/Solicitudes">
              <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/revisar.ico" alt="icono de Ver Solicitudes">
              <span>Ver Solicitudes</span>
            </a>
          </li>

        </ul>

      </li>

      <li>
        <a href="http://localhost/AULA-ANNYANG/Mensajes">
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

      <!-- <li>
          <a href="http://localhost/AULA-ANNYANG/Salir">
            <i class="fa fa-window-close-o"></i>
            <span>Cerrar sesion</span>
          </a>
        </li> -->

      <li>
        <a href="http://localhost/AULA-ANNYANG/Salir" class="contp">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/exit.ico" alt="icono de las aulas virtuales">
          <span style="color: white;">Salir</span>
        </a>
      </li>

    </ul>

  </section>
  <!-- /.sidebar -->
</aside>