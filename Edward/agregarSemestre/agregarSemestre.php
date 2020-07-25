<?php

session_start();

$idEstudiante = $_SESSION['id_estudiante'];
$add_creditos_totales_del_semestre = $_POST['creditos_totales_del_semestre'];
$add_nombre_semestre = $_POST['nombre_semestre'];


  include("conn.php");

  $inc = include("conn.php");

  session_start();

  $id = $_SESSION['id_estudiante'];

  $inc = include("conn.php");

  if ($inc) {
    $consulta = "SELECT * FROM carrera WHERE id_estudiante like '$id' ";
    $resultado = mysqli_query($conn,$consulta);
    if ($resultado) {
      while ($row = $resultado->fetch_array()) {
        $id_estudiante = $row['id_estudiante'];
        $id_carrera = $row['id_carrera'];


      }
    }
  }


    $sql = "INSERT INTO semestre
    (id_semestre,
    id_carrera,
    creditos_totales_del_semestre,
    creditos_obtenidos_en_semestre,
    nombre_semestre) VALUES

    ('',
    '$id_carrera',
    '$add_creditos_totales_del_semestre',
    '',
    '$add_nombre_semestre')";

     mysqli_query($conn, $sql);


if ($sql) {

  echo "Semestre creado";

    header("location:../paginaPrincipal.php");

}else {

  echo "No se pudo crear";

  echo "<br>" . $sql;

}

?>
