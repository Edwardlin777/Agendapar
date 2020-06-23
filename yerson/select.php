<?php

$add_numero_documento=$_POST["numero_documento"];


// Create connection
$conn = mysqli_connect("localhost", "root", "", "agenda7");
$cambiados = 0;

// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

/*echo "Conexion exitosa a la base de datos cameo";
echo "<br><br>";*/

$sql = "SELECT * FROM estudiante WHERE id_estudiante like '$add_numero_documento' ";

$peticion = mysqli_query($conn, $sql);

if ($peticion) {
      echo "<h2>Operacion completada</h2>";

      $cambiados = mysqli_affected_rows($conn);

        if ($cambiados > 0) {
          echo "<br>";

          while($row = $peticion->fetch_assoc()) {
            echo "id_estudiante : " . $row["id_estudiante"];
            echo "<br><br>";
            echo "nombres : " . $row["nombres"];
            echo "<br><br>";
            echo "apellidos : " . $row["apellidos"];
            echo "<br><br>";
            echo "email : " . $row["email"];
            echo "<br><br>";
            echo "password : " . $row["password"];
            echo "<br><br>";
              }
        }
          else
            {
              echo "<br><br>";
              echo "Datos no encontrados";
            }
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>
