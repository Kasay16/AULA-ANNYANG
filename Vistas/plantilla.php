<?php

session_start();

?>

<script>
    //Todos los elementos a los que les vamos a cambiar el fontSize
    const elementsList = document.getElementsByTagName('p');
    const elementsList2 = document.getElementsByTagName('h1');
    const elementsList3 = document.getElementsByTagName('h2');
    const elementsList4 = document.getElementsByTagName('h3');
    

    function getElementFontSize(element) {
        //getComputedStyle nos devuelve las propiedades css de cada párrafo(elemento)
        const elementFontSize = window.getComputedStyle(element, null).getPropertyValue('font-size');
        return parseFloat(elementFontSize); //Devolvemos el total de pixeles
    }

    function cambiarTexto(operador) {
        for (let element of elementsList) {
            //Obtener el total de pixel de cada párrafo.
            const currentSize = getElementFontSize(element);

            //Restar o sumar, dependiendo del operador.
            const newFontSize = (operador === '+' ? (currentSize + 1) : (currentSize - 1)) + 'px';
            //Aplicarle al parrafo actual el nuevo tamaño.
            element.style.fontSize = newFontSize
        }

        for (let element of elementsList2) {
            //Obtener el total de pixel de cada párrafo.
            const currentSize = getElementFontSize(element);

            //Restar o sumar, dependiendo del operador.
            const newFontSize = (operador === '+' ? (currentSize + 1) : (currentSize - 1)) + 'px';
            //Aplicarle al parrafo actual el nuevo tamaño.
            element.style.fontSize = newFontSize
        }

        for (let element of elementsList3) {
            //Obtener el total de pixel de cada párrafo.
            const currentSize = getElementFontSize(element);

            //Restar o sumar, dependiendo del operador.
            const newFontSize = (operador === '+' ? (currentSize + 1) : (currentSize - 1)) + 'px';
            //Aplicarle al parrafo actual el nuevo tamaño.
            element.style.fontSize = newFontSize
        }

        for (let element of elementsList4) {
            //Obtener el total de pixel de cada párrafo.
            const currentSize = getElementFontSize(element);

            //Restar o sumar, dependiendo del operador.
            const newFontSize = (operador === '+' ? (currentSize + 1) : (currentSize - 1)) + 'px';
            //Aplicarle al parrafo actual el nuevo tamaño.
            element.style.fontSize = newFontSize
        }
    }
</script>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <title>Aula Virtual</title> -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/dist/css/estilos.css">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="http://localhost/AULA-ANNYANG/Vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">


  <!-- bootstrap wysihtml5 - text editor -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<script src="http://localhost/AULA-ANNYANG/Vistas/sweetalert2/sweetalert2.all.js"></script>

</head>
<body class="hold-transition skin-red sidebar-mini login-page">



    <?php

    if(isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true){

      echo '<div class="wrapper">';

      include "modulos/cabecera.php";

      if ($_SESSION["rol"] == "Administrador") {
        
        include "modulos/menu.php";

      }else if ($_SESSION["rol"] == "Estudiante") {
        
        include "modulos/menuE.php";

      }else {
        
        include "modulos/menuP.php";

      }
      

      $url = array();

      if(isset($_GET["url"])){

        $url = explode("/", $_GET["url"]);

        if($url[0] == "Inicio" || $url[0] == "Salir" || $url[0] == "Mis-Datos" || $url[0] == "Usuarios" || $url[0] == "Grados"
          || $url[0] == "Editar-Grado" || $url[0] == "Estudiantes" || $url[0] == "Aulas" || $url[0] == "Aulas-Virtuales" || $url[0] == "Inscribir" 
          || $url[0] == "Inscriptos" || $url[0] == "Aula" || $url[0] == "Mis-Aulas" || $url[0] == "D-S" || $url[0] == "Tarea" || $url[0] == "Entregas" || $url[0] == "Enviar-Mensaje" 
          || $url[0] == "Mensaje" || $url[0] == "Mensajes" || $url[0] == "Pedir-Aula" || $url[0] == "Solicitudes" || $url[0] == "Restablecer-Clave"){

          include "modulos/".$url[0].".php";

        }

      }else{

        include "modulos/Inicio.php";
        
      }

      echo '</div>';

    }else if(isset($_GET["url"])){

      if($_GET["url"] == "Ingresar"){

        include "modulos/Ingresar.php";

      }else if($_GET["url"] == "Crear-Cuenta"){

        include "modulos/Crear-Cuenta.php";

      }else if($_GET["url"] == "Restablecer-Clave"){

        include "modulos/Restablecer-Clave.php";
        
      }else {

        include "modulos/Ingresar.php";
        
      }

    }else{

      include "modulos/Ingresar.php";

    }

    ?>

  <div id="resultado"></div>


<!-- ./wrapper -->

<script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.0/annyang.min.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


<!-- jQuery 3 -->
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/raphael/raphael.min.js"></script>
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/moment/min/moment.min.js"></script>
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="http://localhost/AULA-ANNYANG/Vistas/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/AULA-ANNYANG/Vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="http://localhost/AULA-ANNYANG/Vistas/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/AULA-ANNYANG/Vistas/dist/js/demo.js"></script>

<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/select2/dist/js/select2.full.min.js"></script>


<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/ckeditor/ckeditor.js"></script>

<script src="http://localhost/AULA-ANNYANG/Vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.hotkeys@0.1.0/jquery.hotkeys.min.js"></script>

<!-- <script src="http://localhost/AULA-ANNYANG/Vistas/js/asis3.js"></script> -->
<script src="http://localhost/AULA-ANNYANG/Vistas/js/asis1.8.js"></script> 
<script src="http://localhost/AULA-ANNYANG/Vistas/js/usuarios.js"></script>
<script src="http://localhost/AULA-ANNYANG/Vistas/js/aulas.js"></script>
<script src="http://localhost/AULA-ANNYANG/Vistas/js/secciones.js"></script>
<script src="http://localhost/AULA-ANNYANG/Vistas/js/recuperar.js"></script>
<script src="http://localhost/AULA-ANNYANG/Vistas/js/tletra.js"></script>

<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://rawgit.com/jeresig/jquery.hotkeys/master/jquery.hotkeys.js"></script>

<!-- <script>
        $(document).ready(function(){
            $(document).on('keydown', null, 'shift+t', function(){
                $('#resultado').text('Se ha presionado el atajo shift + T');
            });

            $(document).bind('keydown', 'ctrl+space', function(){
                $('#resultado').text('Se ha presionado el atajo CTRL + G');
            })
        })
</script> -->

</body>
</html>
