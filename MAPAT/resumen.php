<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet"  href="estilos_css/estiloResumen.css">
    <title>Resumen</title>
  </head>
  <body>



  <div class="contenedor">

    <h2>Datos del usuario</h2>

    <h4>Sus datos son:</h4>

    <?php

    session_start();

    $id = $_SESSION['id_estudiante'];

    $inc = include("conn.php");

    if ($inc) {
      $consulta = "SELECT * FROM estudiante WHERE id_estudiante like '$id' ";
      $resultado = mysqli_query($conn,$consulta);
      if ($resultado) {
        while ($row = $resultado->fetch_array()) {
          $id_estudiante = $row['id_estudiante'];
          $nombres = $row['nombres'];
          $apellidos = $row['apellidos'];
          $email = $row['email'];
          $password = $row['password'];

        }
      }
    }

    echo "Tu id: " . $id_estudiante . "<br><br>";
    echo "Tus nombres: " . $nombres . "<br><br>";
    echo "Tus apellidos: " . $apellidos . "<br><br>";
    echo "Tu email: " . $email . "<br><br>";
    echo "tu contraseña: " . $password . "<br><br>";


    ?>

  </div>

  </body>
</html>
