<?php

session_start();

$idEstudiante = $_SESSION['id_estudiante'];
$add_nombre_materia = $_POST['nombre_materia'];
$add_creditos_materia = $_POST['creditos_materia'];
$add_profesor = $_POST['profesor'];
$add_nota_maxima = $_POST['nota_maxima'];


  include("conn.php");

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

  if ($inc) {
    $consulta2 = "SELECT * FROM semestre WHERE id_carrera like '$id_carrera' ";
    $resultado2 = mysqli_query($conn,$consulta2);
    if ($resultado2) {
      while ($row2 = $resultado2->fetch_array()) {
        $id_semestre = $row2['id_semestre'];
        $nombre_semestre = $row2['nombre_semestre'];

      }
    }
  }

    $sql = "INSERT INTO materia
    (id_materia,
    nombre_materia,
    creditos_materia,
    id_semestre,
    profesor,
    nota_maxima,
    promedio_materia) VALUES

    ('',
    '$add_nombre_materia',
    '$add_creditos_materia',
    '$id_semestre',
    '$add_profesor',
    '$add_nota_maxima',
    '')";


if (mysqli_query($conn, $sql)) {

    echo "Materia creada";
    $_SESSION['nombre_semestre'] = $nombre_semestre;

    header("location:../paginaPrincipal.php");

}else {

  echo "No se pudo crear";

  echo "<br>" . $sql;

}

?>
