<aside class="main-sidebar">


  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <ul class="sidebar-menu">

      <li>

        <p class="titulo">



          <?php

          if ($_SESSION["foto"] == "") {

            echo '<img src="http://localhost/AULA-ANNYANG/Vistas/img/defecto.png" class="imgperfil"  width="100" height="100" alt="Foto de ' . $_SESSION["apellido"] . ' ' . $_SESSION["nombre"] . '">';
          } else {

            echo '<img src="http://localhost/AULA-ANNYANG/' . $_SESSION["foto"] . '" class="imgperfil2"  width="150" height="150" alt="Foto de ' . $_SESSION["apellido"] . ' ' . $_SESSION["nombre"] . '">';
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
        <a href="http://localhost/AULA-ANNYANG/Usuarios">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/usuarios.ico" alt="icono de Usuarios">
          <span style="color: white;">Usuarios</span>
        </a>
      </li>

      <li>
        <a href="http://localhost/AULA-ANNYANG/Grados">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/grados.ico" alt="icono de Grados">
          <span style="color: white;">Grados</span>
        </a>
      </li>

      <li>
        <a href="http://localhost/AULA-ANNYANG/Estudiantes">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/estudiantes.ico" alt="icono de mis Estudiantes">
          <span style="color: white;">Estudiantes</span>
        </a>
      </li>

      <li>
        <a href="http://localhost/AULA-ANNYANG/Aulas">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/library.ico" alt="icono de las aulas virtuales">
          <span style="color: white;">Aulas</span>
        </a>
      </li>

      <li>
        <a href="http://localhost/AULA-ANNYANG/Solicitudes">
          <img class="icono" src="http://localhost/AULA-ANNYANG/Vistas/img/iconos/revisar.ico" alt="icono de Ver Solicitudes de aulas">
          <span style="color: white;">Solicitudes de aulas</span>
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