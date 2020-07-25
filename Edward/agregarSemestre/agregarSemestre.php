<?php

session_start();

$idEstudiante = $_SESSION['id_estudiante'];
$add_carrera_cursada = $_POST['carrera_cursada'];
$add_creditos_necesarios_aprobar_carrera = $_POST['creditos_necesarios_aprobar_carrera'];


  include("conn.php");

  $inc = include("conn.php");


    $sql = "INSERT INTO semestre
    (id_semestre,
    id_carrera,
    creditos_totales_del_semestre,
    creditos_obtenidos_en_semestre,
    nombre_semestre) VALUES

    ('',
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
