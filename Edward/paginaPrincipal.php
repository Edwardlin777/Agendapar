<!DOCTYPE html>
<html>
  <head lang="es">
    <meta charset="utf-8">

    <title>MAPAT</title>
    <link rel="shortcut icon" type="image/x-icon" href="login/css/agenda.ico">
    <link rel="stylesheet" href="estilos_css\estiloPaginaPrincipal.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
  </head>
  <body>

<?php

  session_start();

  if(!isset($_SESSION['emailEstudiante'])){

    header("location:login/login.html");
  }


?>

    <div class="mapat"><img src="login/css/MAPAT.png"/></div>

    <header>
      <nav class="navegacion">
        <ul class="menu">
          <li><a href="resumen.php">Resumen</a></li>
          <li><a href="materiasEstudiante/codigo.php">Mis materias</a>
              <ul class="submenu">
                  <li><a href="agregarCarrera/agregarCarrera.html">Agregar Carrera</a></li>
                  <li><a href="agregarSemestre/agregarSemestre.html">Agregar Semestre</a></li>
                  <li><a href="agregarMateria/agregarMateria.html">agregarSemestre/agregar Materia</a></li>
              </ul>
          </li>
          <li><a href="billetera.html">Billetera</a></li>
          <li><a href="horario.html">Horario</a></li>
          <li><a href="configuración.html">Configuración</a></li>
        </ul>
      </nav>
    </header>

        <div class="boton1">
          <a href="login/login.html" class="iniciar-sesion">INICIAR SESION</a>
        </div>
        <div class="boton2">
          <a href="login/registrarse.html" class="registrarse">REGISTRARSE</a>
        </div>
      <div class="cuadro1"><h2 class="titulo1"><br><br>Objetivo general</h2>
        <br/><br/><p>Facilitar la gestion y la organizacion de datos
         del usuario mediante una Agenda virtual</p><br><br><img class="agendafea" src="login/css/AGENDA.jpg"/> </div>
      <div class="cuadro2"><h2 class="titulo2"><BR><BR>MAPAT</h2><BR>
      </BR><b>(Mi agenda para administrar el tiempo)</b><br></BR><br>
    <p>"Agenda virtual gestionadora y organizadora de datos
      personales y actividades rutinarias"</p><br><br>
    <p>(AVGDPAR)</p></div>
      <div class="cuadro3" ><br><br><h2>Equipo conformado por:</h2>
      <ul><br><br>
       <li>David esteban Martínez <br> (Frontend Developer)</li> <br>
       <li>Juan diego González neisa <br> (Diseñador UI/UX)</li><br>
       <li>Santiago Steven Cely Rojas <br> (QA (Control de Calidad))</li><br>
       <li>Yerson Fabian Lasso Bautista <br> (Backend Developer)</li><br>
       <li>Edward Vladimir Linares <br> (DBA(Database Administrator))</li></ul>
     </div>


      <?php

      echo "<br>" . "Hola: " . $_SESSION['emailEstudiante'];

      echo "<br>" . "Tu id: " . $_SESSION['id_estudiante'];
      ?>

  </body>
</html>
