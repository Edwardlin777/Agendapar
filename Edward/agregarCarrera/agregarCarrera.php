<?php

session_start();

$idEstudiante = $_SESSION['id_estudiante'];
$add_carrera_cursada = $_POST['carrera_cursada'];
$add_creditos_necesarios_aprobar_carrera = $_POST['creditos_necesarios_aprobar_carrera'];


  include("conn.php");

  $inc = include("conn.php");


    $sql = "INSERT INTO carrera
    (id_estudiante,
    carrera_cursada,
    creditos_necesarios_aprobar_carrera,
    id_carrera) VALUES

    ('$idEstudiante',
    '$add_carrera_cursada',
    '$add_creditos_necesarios_aprobar_carrera',
    '')";

     mysqli_query($conn, $sql);


if ($sql) {

  echo "Carrera creada";

    header("location:../paginaPrincipal.php");

}else {

  echo "No se pudo crear";

  echo "<br>" . $sql;

}

?>
